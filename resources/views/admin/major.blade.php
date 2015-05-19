@extends('admin.layout')

@section('content')
    <div id="MajorListing" ng-app="MajorApp">
        <ui-view></ui-view>
    </div>
@stop


@section('javascript')
    <script type="text/javascript">
        var app = angular.module("MajorApp", ['ui.router']);

        app.config(function ($stateProvider, $urlRouterProvider) {

            $urlRouterProvider.otherwise("/list");

            $stateProvider
                    .state('list', {
                        url: "/list",
                        templateUrl: "/app/admin/major/_list.html",
                        controller: "ListCtrl",
                        resolve: {
                            majors: function ($http) {
                                return $http({
                                    url: "/api/major",
                                    method: 'get'
                                })
                            }
                        }
                    })
                    .state('add', {
                        url: "/add",
                        templateUrl: "/app/admin/major/_add.html",
                        controller: "AddCtrl",
                        resolve: {}
                    })
                    .state('edit', {
                        url: "/edit/:id",
                        templateUrl: "/app/admin/major/_edit.html",
                        controller: "EditCtrl",
                        resolve: {
                            major: function ($http, $stateParams) {
                                return $http({
                                    url: "/api/major/" + $stateParams.id + "/edit",
                                    method: 'get'
                                })
                            }
                        }
                    })
        });

        app.controller("ListCtrl", function ($scope, $http, majors) {

            console.log("ListCtrl Start...")
            console.log(majors);
            $scope.majors = majors.data;


            $scope.delete = function (major) {
                if (confirm("Are you sure to delete this major [id:" + major.id + "]?")) {
                    $http({
                        url: '/api/major/' + major.id,
                        method: 'delete',
                        data: major
                    }).success(function (response) {
                        var index = $scope.majors.indexOf(major);
                        $scope.majors.splice(index, 1);
                    })
                }
            }

        })

        app.controller("AddCtrl", function ($scope, $http, $state) {
            console.log("AddCtrl Start...")

            $scope.major = {};

            $scope.save = function () {
                console.log($scope.major);
                $http({
                    url: '/api/major',
                    method: 'post',
                    data: $scope.major
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }

        })

        app.controller("EditCtrl", function ($scope, $http, $state, major) {
            console.log("EditCtrl Start...")

            $scope.major = major.data;

            $scope.save = function () {
                console.log($scope.major);
                $http({
                    url: '/api/major/' + $scope.major.id,
                    method: 'put',
                    data: $scope.major
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }

        })
    </script>
@stop