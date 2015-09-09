(function (module) {
    'use strict';

    module.directive('volunteerPosition', directive);

    function directive() {
        return {
            templateUrl: '/build/js/main/directives/volunteer-positions/volunteer-position.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm',
            bindToController: true,
            scope: {
                position: '=',
                isSelected: '=',
                onToggle: '&'
            }
        };
    }

    Controller.$inject = [];

    function Controller() {

        var vm = this;
        vm.toggle = toggle;

        function toggle() {
            vm.onToggle({
                position: vm.position
            });
        }

    }

})(angular.module('app'));
