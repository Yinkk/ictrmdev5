@extends('admin.layout')

@section('content')
    <div id="RoleListing" ng-app="RoleApp">
        <ui-view></ui-view>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        var app = angular.module('RoleApp', ['ui.router']);

        app.config(function ($stateProvider, $urlRouterProvider) {
            $urlRouterProvider.otherwise('/list');

            $stateProvider
                    .state('list', {
                        url: '/list',
                        templateUrl: '/app/admin/role/_list.html',
                        controller: 'ListCtrl',
                        resolve: {
                            roles: function ($http) {
                                return $http({
                                    url: '/api/role',
                                    method: 'get'
                                });
                            }
                        }
                    })
                    .state('add', {
                        url: '/add',
                        templateUrl: '/app/admin/role/_add.html',
                        controller: 'AddCtrl',
                        resolve: {}
                    })
                    .state('edit', {
                        url: '/edit/:id',
                        templateUrl: '/app/admin/role/_edit.html',
                        controller: 'EditCtrl',
                        resolve: {
                            role: function ($http, $stateParams) {
                                return $http({
                                    url: '/api/role/' + $stateParams.id + "/edit",
                                    method: 'get'
                                });
                            }
                        }
                    });
        });

        app.controller('ListCtrl', function($scope, $http, roles){
            console.log('ListCtrl Start...')
            console.log(roles);
            $scope.roles = roles.data;

            $scope.delete = function (role){
                if(confirm("Are you sure to delete this role [id:" + role.id + "]?")){
                    $http({
                        url: '/api/role/' + role.id,
                        method: 'delete',
                        data: role
                    }).success(function (response){
                        var index = $scope.roles.indexOf(role);
                        $scope.roles.splice(index,1);
                    })
                }
            }
        });

        app.controller("AddCtrl", function ($scope, $http, $state) {
            console.log("AddCtrl Start...")

            $scope.role = {};

            $scope.save = function () {
                console.log($scope.role);
                $http({
                    url: '/api/role',
                    method: 'post',
                    data: $scope.role
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }

        });

        app.controller("EditCtrl", function ($scope, $http, $state, role) {
            console.log("EditCtrl Start...")

            $scope.role = role.data;

            $scope.save = function () {
                console.log($scope.role);
                $http({
                    url: '/api/role/' + $scope.role.id,
                    method: 'put',
                    data: $scope.role
                }).success(function (response) {
                    console.log(response);
                    $state.go('list');
                })
            }
        });
    </script>
@stop