var App = angular.module('App', ['ngRoute','ngResource']);

App.run(function($rootScope) {
    $rootScope.loading = true;
});