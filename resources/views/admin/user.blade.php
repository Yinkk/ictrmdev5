@extends('admin.layout')

@section('content')
    <div id="UserListing" ng-app="UserApp">
        <ui-view></ui-view>
    </div>
@stop


@section('javascript')
    <script type="text/javascript">
        var app = angular.module("UserApp", ['ui.router']);

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
                        resolve: {
                            roles: function ($http) {
                                return $http({
                                    url: "/api/role",
                                    method: 'get'
                                })
                            },
                            facultys: function ($http) {
                                return $http({
                                    url: "/api/faculty",
                                    method: 'get'
                                })
                            },
                            majors: function ($http) {
                                return $http({
                                    url: "/api/major",
                                    method: 'get'
                                })
                            },
                            types: function ($http) {
                                return $http({
                                    url: "/api/type",
                                    method: 'get'
                                })
                            },
                            positions: function($http){
                                return $http({
                                    url:"/api/position",
                                    method: 'get'
                                })
                            },
                            degrees: function($http){
                                return $http({
                                    url: "/api/degree",
                                    method: 'get'
                                })
                            }
                        }
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
                            },
                            roles: function ($http) {
                                return $http({
                                    url: "/api/role",
                                    method: 'get'
                                })
                            },
                            facultys: function ($http) {
                                return $http({
                                    url: "/api/faculty",
                                    method: 'get'
                                })
                            },
                            majors: function ($http) {
                                return $http({
                                    url: "/api/major",
                                    method: 'get'
                                })
                            },
                            types: function ($http) {
                                return $http({
                                    url: "/api/type",
                                    method: 'get'
                                })
                            },
                            positions: function($http){
                                return $http({
                                    url:"/api/position",
                                    method: 'get'
                                })
                            },
                            degrees: function($http){
                                return $http({
                                    url: "/api/degree",
                                    method: 'get'
                                })
                            }
                        }
                    })
        });

        app.controller("ListCtrl", function ($scope, $http, users) {

            console.log("ListCtrl Start...")
            console.log(users);
            $scope.users = users.data;


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

        app.controller("AddCtrl", function ($scope, $http, $state, roles, facultys, majors, types, positions , degrees) {
            console.log("AddCtrl Start......")
            //console.log(roles)

            $scope.user = {
                roles : []
//                faculty : [],
//                major : [],
//                userType : []
            };

            $scope.roles = roles.data
            $scope.facultys = facultys.data
            $scope.majors = majors.data
            $scope.types = types.data
            $scope.positions = positions.data
            $scope.degrees = degrees.data

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

            $scope.selectFaculty = function(faculty){
                $scope.user.faculty = faculty;
            }

            $scope.selectMajor = function(major){
                $scope.user.major = major;
            }

            $scope.selectType = function(type){
                if($scope.user.type ==type){

                }else {
                    $scope.user.type = type;
                    if($scope.user.position){
                        $scope.user.position = null;
                    }
                }
            }
//            $scope.selectPosition = function(position){
//                $scope.user.position = position;
//            }

            $scope.selectDegree = function(degree){
                $scope.user.degree = degree;
            }

            $scope.addRole = function(role){
                var users = $scope.user;
                var found = false;
                for(i=0;i<users.roles.length;i++){
                    if(role.id == users.roles[i].id){
                        found = true;
                    }
                }

                if(!found){
                    $scope.user.roles.push(role);
                }

            }

            $scope.removeRole = function(role){
                $scope.user.roles.splice($scope.user.roles.indexOf(role),1);
            }
        })

        app.controller("EditCtrl", function ($scope, $http, $state, user, roles, facultys, majors, types, positions , degrees) {
            console.log("EditCtrl Start...")
            //console.log(facultys)
           // $scope.user = {
           //     facultys : []
           // };
           //console.log($scope.user.faculty);
            $scope.user = user.data;
            $scope.roles = roles.data;
            $scope.facultys = facultys.data;
            $scope.majors = majors.data
            $scope.types = types.data
            $scope.positions = positions.data
            $scope.degrees = degrees.data

            $scope.selectFaculty = function(faculty){
                $scope.user.faculty = faculty;
            }

            $scope.selectMajor = function(major){
                $scope.user.major = major;
            }

            $scope.selectType = function(type){
                if($scope.user.type == type){

                }else {
                    $scope.user.type = type;
                    if($scope.user.position){
                        $scope.user.position = null;
                    }
                }

            }

            $scope.selectPosition = function(position){
                $scope.user.position = position;
            }

            $scope.selectDegree = function(degree){
                $scope.user.degree = degree;
            }

            $scope.addRole = function(role){
                found = false;
                for(i=0;i<$scope.user.roles.length;i++){
                    if($scope.user.roles[i].id == role.id){
                        found = true;
                        break;
                    }
                }
                if (!found){
                    $scope.user.roles.push(role);
                }
            }

            $scope.removeRole = function(role){
                $scope.user.roles.splice($scope.user.roles.indexOf(role),1);
            }

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