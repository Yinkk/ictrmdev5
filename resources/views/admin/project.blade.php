@extends('admin.layout')

@section('content')
    <div id="ProjectListing" ng-app="ProjectApp">
        <ui-view></ui-view>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">

//        angular.module("textAngularTest", ['textAngular']);
//        function wysiwygeditor($scope) {
//            $scope.orightml = 'asdfasdfasdf';
//            $scope.htmlcontent = $scope.orightml;
//            $scope.disabled = false;
//        };

        var app = angular.module("ProjectApp", ['ui.router']);

        app.config(function ($stateProvider, $urlRouterProvider) {

            $urlRouterProvider.otherwise("/list");

            $stateProvider
                    .state('list', {
                        url: "/list",
                        templateUrl: "/app/admin/project/_list.html",
                        controller: "ListCtrl",
                        resolve: {
                            projects: function ($http) {
                                return $http({
                                    url: "/api/project",
                                    method: 'get'
                                })
                            }
                        }
                    })
                    .state('add', {
                        url: "/add",
                        templateUrl: "/app/admin/project/_add.html",
                        controller: "AddCtrl",
                        resolve: {}
                    })
                    .state('edit', {
                        url: "/edit/:id",
                        templateUrl: "/app/admin/project/_edit.html",
                        controller: "EditCtrl",
                        resolve: {
                            project: function ($http, $stateParams) {
                                return $http({
                                    url: "/api/project/" + $stateParams.id + "/edit",
                                    method: 'get'
                                })
                            }
                        }
                    })
        })
        app.controller("ListCtrl", function ($scope, $http, projects) {
            console.log("ListCtrl Start...")
            console.log(projects);

            $scope.projects = projects.data;


            $scope.delete = function (project) {
                if (confirm("Are you sure to delete this project [id:" + project.id + "]?")) {
                    $http({
                        url: '/api/project/' + project.id,
                        method: 'delete',
                        data: project
                    }).success(function (response) {
                        var index = $scope.projects.indexOf(project);
                        $scope.projects.splice(index, 1);
                    })
                }
            }
        })

        app.controller("AddCtrl", function ($scope, $http, $state) {
            console.log("AddCtrl Start..")

            $scope.project = {};

            $scope.save = function () {
                console.log($scope.project);
                $http({
                    url: '/api/project',
                    method: 'post',
                    data: $scope.project
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }
        })

        app.controller("EditCtrl", function ($scope, $http, $state, project) {
            console.log("EditCtrl Start..")
            console.log(project);

            $scope.project = project.data;

            $scope.save = function () {
                console.log($scope.project);
                $http({
                    url: '/api/project/' + $scope.project.id,
                    method: 'put',
                    data: $scope.project
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }
        })
    </script>
@stop