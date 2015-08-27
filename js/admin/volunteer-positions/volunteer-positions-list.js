(function (module) {
    'use strict';

    module.directive('volunteerPositionsList', directive);

    function directive() {
        return {
            templateUrl: '/build/js/admin/volunteer-positions/volunteer-positions-list.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm'
        };
    }

    Controller.$inject = ['volunteerPositionsService'];

    function Controller(volunteerPositionsService) {

        var vm = this;

        vm.get_edit_url = get_edit_url;
        vm.build_skills_summary = build_skills_summary;

        init();

        function init() {

            volunteerPositionsService.all().then(function (response) {
                vm.positions = response.data;
            });

        }

        function get_edit_url(position) {
            return '/admin/volunteer-positions/' + position.id;
        }

        function build_skills_summary(skills) {
            var list = [];

            if (skills.length === 0) return '';

            skills.map(function (skill) {
                list.push(skill.title);
            });

            return list.join(', ');
        }
    }

})(angular.module('admin'));