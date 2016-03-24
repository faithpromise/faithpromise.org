(function (module) {
    'use strict';

    module.directive('groupsSearch', directive);

    function directive() {
        return {
            templateUrl:      '/build/website/js/groups/groups-search.html',
            restrict:         'E',
            controller:       Controller,
            controllerAs:     'vm',
            bindToController: true,
            scope:            {}
        };
    }

    Controller.$inject = ['groupsService'];

    function Controller(groupsService) {

        var vm = this;

        init();

        function init() {
            groupsService.all().then(function (response) {
                vm.groups = response.data;
            });
        }

    }

})(angular.module('app'));