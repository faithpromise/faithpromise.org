(function (module) {
    'use strict';

    module.directive('eventsList', directive);

    function directive() {
        return {
            templateUrl: '/build/js/admin/events/events-list.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm',
            scope: {}
        };
    }

    Controller.$inject = ['eventsService'];

    function Controller(eventsService) {

        var vm = this;

        vm.getUrl = getUrl;

        init();

        function init() {

            eventsService.all().then(function(response) {
                vm.events = response.data;
            });

        }

        function getUrl(event) {
            return '/admin/events/' + event.id;
        }
    }

})(angular.module('admin'));