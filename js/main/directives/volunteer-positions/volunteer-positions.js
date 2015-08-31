(function (module) {
    'use strict';

    module.directive('volunteerPositions', directive);

    function directive() {
        return {
            templateUrl: '/build/js/main/directives/volunteer-positions/volunteer-positions.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm',
            scope: {}
        };
    }

    Controller.$inject = ['$http'];

    function Controller($http) {

        var vm = this;

        init();

        function init() {
            $http.get('/serve/opportunities.json').then(function (response) {
                vm.skills = response.data;
            });
        }

    }

})(angular.module('app'));
