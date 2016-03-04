(function (module) {
    'use strict';

    module.directive('specialServices', directive);

    function directive() {
        return {
            templateUrl:      '/build/js/main/directives/special-services/special-services.html',
            restrict:         'E',
            controller:       Controller,
            controllerAs:     'vm',
            bindToController: true,
            scope:            {
                'type': '@'
            }
        };
    }

    Controller.$inject = ['$http', "$sce"];

    function Controller($http, $sce) {

        var vm       = this;
        vm.selectDay = selectDay;
        vm.timesHtml = timesHtml;

        init();

        function timesHtml(times) {
            return $sce.trustAsHtml(times);
        }

        function selectDay(day) {
            vm.selected = day;
        }

        function init() {

            $http.get('/' + vm.type + '/times.json').then(function (response) {
                vm.days     = response.data.days;
                vm.selected = response.data.selected;
            });

        }

    }

})(angular.module('app'));
