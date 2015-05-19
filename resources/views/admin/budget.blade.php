@extends('admin.layout')

@section('content')
    <div id="BudgetListing" ng-app="BudgetApp">
        <ui-view></ui-view>
    </div>
@stop


@section('javascript')
    <script type="text/javascript">
        var app = angular.module("BudgetApp", ['ui.router']);

        app.config(function ($stateProvider, $urlRouterProvider) {

            $urlRouterProvider.otherwise("/list");

            $stateProvider
                    .state('list', {
                        url: "/list",
                        templateUrl: "/app/admin/budget/_list.html",
                        controller: "ListCtrl",
                        resolve: {
                            budgets: function ($http) {
                                return $http({
                                    url: "/api/budget",
                                    method: 'get'
                                })
                            }
                        }
                    })
                    .state('add', {
                        url: "/add",
                        templateUrl: "/app/admin/budget/_add.html",
                        controller: "AddCtrl",
                        resolve: {}
                    })
                    .state('edit', {
                        url: "/edit/:id",
                        templateUrl: "/app/admin/budget/_edit.html",
                        controller: "EditCtrl",
                        resolve: {
                            budget: function ($http, $stateParams) {
                                return $http({
                                    url: "/api/budget/" + $stateParams.id + "/edit",
                                    method: 'get'
                                })
                            }
                        }
                    })
        });

        app.controller("ListCtrl", function ($scope, $http, budgets) {

            console.log("ListCtrl Start...")
            console.log(budgets);
            $scope.budgets = budgets.data;


            $scope.delete = function (budget) {
                if (confirm("Are you sure to delete this budget [id:" + budget.id + "]?")) {
                    $http({
                        url: '/api/budget/' + budget.id,
                        method: 'delete',
                        data: budget
                    }).success(function (response) {
                        var index = $scope.budgets.indexOf(budget);
                        $scope.budgets.splice(index, 1);
                    })
                }
            }

        })

        app.controller("AddCtrl", function ($scope, $http, $state) {
            console.log("AddCtrl Start...")

            $scope.budget = {};

            $scope.save = function () {
                console.log($scope.budget);
                $http({
                    url: '/api/budget',
                    method: 'post',
                    data: $scope.budget
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }

        })

        app.controller("EditCtrl", function ($scope, $http, $state, budget) {
            console.log("EditCtrl Start...")

            $scope.budget = budget.data;

            $scope.save = function () {
                console.log($scope.budget);
                $http({
                    url: '/api/budget/' + $scope.budget.id,
                    method: 'put',
                    data: $scope.budget
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }

        })
    </script>
@stop