@extends('admin.layout')

@section('content')
    <div id="UserListing" ng-app="UserApp">
        <ui-view></ui-view>
    </div>
@stop


@section('javascript')
    <script type="text/javascript">
        var app = angular.module("UserApp", ['ui.router','datatables','datatables.bootstrap']);

        app.config(function ($stateProvider, $urlRouterProvider) {

            $urlRouterProvider.otherwise("/list");

            $stateProvider
                    .state('list', {
                        url: "/list",
                        templateUrl: "/app/admin/user/_list.html",
                        controller: "ListCtrl",
                        resolve: {
                            users: function ($http) {
                                return $http({
                                    url: "/api/user",
                                    method: 'get'
                                })
                            }
                        }
                    })
                    .state('add', {
                        url: "/add",
                        templateUrl: "/app/admin/user/_add.html",
                        controller: "AddCtrl",
                        resolve: {}
                    })
                    .state('edit', {
                        url: "/edit/:id",
                        templateUrl: "/app/admin/user/_edit.html",
                        controller: "EditCtrl",
                        resolve: {
                            user: function ($http, $stateParams) {
                                return $http({
                                    url: "/api/user/" + $stateParams.id + "/edit",
                                    method: 'get'
                                })
                            }
                        }
                    })
        });

        app.controller("ListCtrl", function ($scope, $http, users,DTOptionsBuilder) {

            console.log("ListCtrl Start...")
            console.log(users);
            $scope.users = users.data;

            //$scope.dtOptions = {}

            $scope.delete = function (user) {
                if (confirm("Are you sure to delete this user [id:" + user.id + "]?")) {
                    $http({
                        url: '/api/user/' + user.id,
                        method: 'delete',
                        data: user
                    }).success(function (response) {
                        var index = $scope.users.indexOf(user);
                        $scope.users.splice(index, 1);
                    })
                }
            }

        })

        app.controller("AddCtrl", function ($scope, $http, $state) {
            console.log("AddCtrl Start...")

            $scope.user = {};

            $scope.save = function () {
                console.log($scope.user);
                $http({
                    url: '/api/user',
                    method: 'post',
                    data: $scope.user
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }

        })

        app.controller("EditCtrl", function ($scope, $http, $state, user) {
            console.log("EditCtrl Start...")

            $scope.user = user.data;

            $scope.save = function () {
                console.log($scope.user);
                $http({
                    url: '/api/user/' + $scope.user.id,
                    method: 'put',
                    data: $scope.user
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }

        })
    </script>
@stop