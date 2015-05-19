@extends('admin.layout')

@section('content')
    <div id="FacultyListing" ng-app="FacultyApp">
        <ui-view></ui-view>
    </div>
@stop


@section('javascript')
    <script type="text/javascript">
        var app = angular.module("FacultyApp", ['ui.router']);

        app.config(function ($stateProvider, $urlRouterProvider) {

            $urlRouterProvider.otherwise("/list");

            $stateProvider
                    .state('list', {
                        url: "/list",
                        templateUrl: "/app/admin/faculty/_list.html",
                        controller: "ListCtrl",
                        resolve: {
                            facultys: function ($http) {
                                return $http({
                                    url: "/api/faculty",
                                    method: 'get'
                                })
                            }
                        }
                    })
                    .state('add', {
                        url: "/add",
                        templateUrl: "/app/admin/faculty/_add.html",
                        controller: "AddCtrl",
                        resolve: {}
                    })
                    .state('edit', {
                        url: "/edit/:id",
                        templateUrl: "/app/admin/faculty/_edit.html",
                        controller: "EditCtrl",
                        resolve: {
                            faculty: function ($http, $stateParams) {
                                return $http({
                                    url: "/api/faculty/" + $stateParams.id + "/edit",
                                    method: 'get'
                                })
                            }
                        }
                    })
        });

        app.controller("ListCtrl", function ($scope, $http, facultys) {

            console.log("ListCtrl Start...")
            console.log(facultys);
            $scope.facultys = facultys.data;


            $scope.delete = function (faculty) {
                if (confirm("Are you sure to delete this faculty [id:" + faculty.id + "]?")) {
                    $http({
                        url: '/api/faculty/' + faculty.id,
                        method: 'delete',
                        data: faculty
                    }).success(function (response) {
                        var index = $scope.facultys.indexOf(faculty);
                        $scope.facultys.splice(index, 1);
                    })
                }
            }

        })

        app.controller("AddCtrl", function ($scope, $http, $state) {
            console.log("AddCtrl Start...")

            $scope.faculty = {};

            $scope.save = function () {
                console.log($scope.faculty);
                $http({
                    url: '/api/faculty',
                    method: 'post',
                    data: $scope.faculty
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }

        })

        app.controller("EditCtrl", function ($scope, $http, $state, faculty) {
            console.log("EditCtrl Start...")

            $scope.faculty = faculty.data;

            $scope.save = function () {
                console.log($scope.faculty);
                $http({
                    url: '/api/faculty/' + $scope.faculty.id,
                    method: 'put',
                    data: $scope.faculty
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }

        })
    </script>
@stop