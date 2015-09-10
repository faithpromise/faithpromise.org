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
        vm.skills = null;
        vm.toggle = toggle;
        vm.get_description = get_description;

        init();

        function init() {
            vm.skills = get_skills_list();
        }

        function toggle() {
            vm.onToggle({
                position: vm.position
            });
        }

        function get_description() {
            return $sce.trustAsHtml(vm.position.description);
        }

        function get_skills_list() {

            var i,
                skills = [];

            if (vm.position.skills.length === 0) {
                return null;
            }

            for (i = 0; i < vm.position.skills.length; i++) {
                skills.push(vm.position.skills[i].title);
            }

            return skills.join(', ');
        }

    }

})(angular.module('app'));
