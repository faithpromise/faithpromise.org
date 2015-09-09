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

    Controller.$inject = ['$sce'];

    function Controller($sce) {

        var vm = this;
        vm.toggle = toggle;
        vm.get_description = get_description;

        function toggle() {
            vm.onToggle({
                position: vm.position
            });
        }

        function get_description() {
            return $sce.trustAsHtml(vm.position.description);
        }

    }

})(angular.module('app'));
