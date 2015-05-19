@extends('admin.layout')

@section('content')
<div id="NewsListing" ng-app="NewsApp">
        <ui-view></ui-view>
    </div>
@stop

@section('javascript')
<script type="text/javascript">
            var app = angular.module("NewsApp", ['ui.router']);

            app.config(function ($stateProvider, $urlRouterProvider) {

                $urlRouterProvider.otherwise("/list");

                $stateProvider
                        .state('list', {
                            url: "/list",
                            templateUrl: "/app/admin/news/_list.html",
                            controller: "ListCtrl",
                            resolve: {
                                news: function ($http) {
                                    return $http({
                                        url: "/api/news",
                                        method: 'get'
                                    })
                                }
                            }
                        });
            });

           app.controller("ListCtrl", function ($scope, $http, news) {

                       console.log("ListCtrl Start...")
                       console.log(news);
                       $scope.users = news.data;
            });

</script>
@stop