@extends('admin.layout')

@section('content')
    <div id="NewsListing" ng-app="NewsApp">
        <ui-view></ui-view>
    </div>
@stop

@section('javascript')
    <script type="text/javascript">
        var app = angular.module('NewsApp', ['ui.router']);

        app.config(function ($stateProvider, $urlRouterProvider) {

            $urlRouterProvider.otherwise('/list');

            $stateProvider
                    .state('list', {
                        url: '/list',
                        templateUrl: '/app/admin/news/_list.html',
                        controller: 'ListCtrl',
                        resolve: {
                            news: function ($http) {
                                return $http({
                                    url: '/api/news',
                                    method: 'get'
                                })
                            }
                        }
                    })
                    .state('add', {
                        url: '/add',
                        templateUrl: '/app/admin/news/_add.html',
                        controller: 'AddCtrl',
                        resolve: {}
                    })
                    .state('edit', {
                        url: '/edit/:id',
                        templateUrl: '/app/admin/news/_edit.html',
                        controller: 'EditCtrl',
                        resolve: {
                            news: function ($http, $stateParams) {
                                return $http({
                                    url: '/api/news/' + $stateParams.id + "/edit",
                                    method: 'get'
                                })
                            }
                        }
                    })
        })

        app.controller('ListCtrl', function ($scope, $http, news) {

            console.log("ListCtrl Start...")
            console.log(news);
            $scope.news = news.data;

            $scope.delete = function (news){
                if(confirm("Are you sure to delete this user [id:" + news.id + "]?")){
                    $http({
                        url: '/api/news/' + news.id,
                        method: 'delete',
                        data: news
                    }).success(function (response){
                        var index = $scope.news.indexOf(news);
                        $scope.news.splice(index, 1);
                    })
                }
            }
        })

        app.controller('AddCtrl', function ($scope, $http, $state) {
            console.log("AddCtrl start..")
            $scope.news = {};
            $scope.save = function () {
                console.log($scope.news);
                $http({
                    url: '/api/news',
                    method: 'post',
                    data: $scope.news
                }).success(function (response) {
                    console.log(response);
                    $state.go('list')
                })
            }
        })

        app.controller('EditCtrl', function ($scope, $http, $state, news) {
            console.log("EditCtrl start...")
            $scope.news = news.data;
            $scope.save = function () {
                console.log($scope.news)

                $http({
                    url: '/api/news/' + $scope.news.id,
                    method: 'put',
                    data: $scope.news
                }).success(function (response) {
                    console.log(response);
                    $state.go('list')
                })
            }
        })


    </script>
@stop