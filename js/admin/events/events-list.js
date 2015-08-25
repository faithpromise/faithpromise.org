(function (module) {
    'use strict';

    module.directive('viewEvents', function () {
        return {
            templateUrl: '/build/js/admin/views/view-events.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm',
            scope: {}
        };
    });

    Controller.$inject = ['eventsService'];

    function Controller(eventsService) {

        var vm = this;

        vm.getUrl = getUrl;

        init();

        function init() {

            eventsService.list().then(function(response) {
                vm.events = response.data;
            });

        }

        function getUrl(event) {
            return '/admin/events/' + event.id;
        }
    }

})(angular.module('admin'));