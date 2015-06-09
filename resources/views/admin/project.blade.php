@extends('admin.layout')

@section('content')
    <div id="ProjectListing" ng-app="ProjectApp">
        <ui-view></ui-view>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">

        var app = angular.module("ProjectApp", ['ui.router','ngCkeditor', 'flow','ngCookies']);

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
                        resolve: {
                            budgets: function ($http){
                                return $http({
                                    url: "/api/budget",
                                    method: 'get'
                                })
                            },
                            users: function ($http){
                                return $http({
                                    url: "/api/user",
                                    method: 'get'
                                })
                            },
                            facultys: function($http){
                                return $http({
                                    url: "/api/faculty",
                                    method: 'get'
                                })
                            }
                        }
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
                            },
                            budgets: function ($http){
                                return $http({
                                    url: "/api/budget",
                                    method: 'get'
                                })
                            },
                            users: function ($http){
                                return $http({
                                    url: "/api/user",
                                    method: 'get'
                                })
                            },
                            facultys: function($http){
                                return $http({
                                    url: "/api/faculty",
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

        app.controller("AddCtrl", function ($scope, $http, $state, budgets, users, facultys) {
            console.log("AddCtrl Start..")

            // ckeditor
            $scope.editorOptions = {
//                language: 'en',
//                uiColor: '#000000,
            };

            $scope.project = {};
            $scope.budgets = budgets.data;
            $scope.users = users.data;
            $scope.facultys = facultys.data;

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

            $scope.selectBudget = function(budget){
                $scope.project.budget = budget;
            }

            $scope.selectUser = function(user){
                $scope.project.user = user;
            }

            $scope.selectFaculty = function(faculty){
                $scope.project.faculty = faculty;
            }
        })

        app.controller("EditCtrl", function ($scope, $http, $state, project, budgets, users, facultys,$cookies) {
            console.log("EditCtrl Start..")


            $scope.project = project.data;
            $scope.budgets = budgets.data;
            $scope.users = users.data;
            $scope.facultys = facultys.data;

            $scope.filetype = 2;
            $scope.fileTypeChange = function(id){
                console.log(id);
                $scope.filetype = id;

                $http.get('/api/project/'+$scope.project.id+'/file?filetype_id='+id).success(function(response){
                    $scope.files = response;

                    console.log(response);
                })

            }

            $scope.selectBudget = function(budget){
                $scope.project.budget = budget;
            }

            $scope.selectUser = function(user){
                $scope.project.user = user;
            }

            $scope.selectFaculty = function(faculty){
                $scope.project.faculty = faculty;
            }

            console.log($cookies.get('XSRF-TOKEN'));

            $scope.myFlow = new Flow({
                target: '/api/project/' + $scope.project.id + '/file',
                singleFile: true,
                method: 'post',
                testChunks: false,
                headers: function (file, chunk, isTest) {
                    return {
                        'X-XSRF-TOKEN': $cookies.get('XSRF-TOKEN')// call func for getting a cookie
                    }
                },
                query : function(file,chunk,isTest){
                    return {
                        'filetype_id' : $scope.filetype
                    }
                }
            })

            $scope.myFlow.on('fileSuccess',function(file,msg,chunk){
                console.log(msg);
                $scope.files.push(JSON.parse(msg))
            })

            $scope.uploadFile = function () {
                $scope.myFlow.upload();
            }

            $scope.deleteProjectFile = function (file) {
                if (confirm("Are you sure to delete this file [id:" + file.id + "]?")) {
                    $http({
                        url: '/api/project/'+$scope.project.id+'/file/' + file.id,
                        method: 'delete',
                        data: file
                    }).success(function (response) {
                        var index = $scope.files.indexOf(file);
                        $scope.files.splice(index,1);
                    })
                }
            }
//            $scope.cancelFile = function (file) {
//                var index = $scope.myFlow.files.indexOf(file)
//                $scope.myFlow.files.splice(index, 1);
//            }

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