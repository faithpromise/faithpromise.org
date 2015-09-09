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

    Controller.$inject = ['volunteerPositionsService', 'toastr'];

    function Controller(volunteerPositionsService, Notification) {

        var vm = this;

        vm.get_edit_url = get_edit_url;
        vm.build_skills_summary = build_skills_summary;
        vm.remove = remove;

        init();

        function init() {

            fetch_positions();

        }

        function fetch_positions() {
            return volunteerPositionsService.all().then(function (response) {
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

        function remove(position) {
            if (confirm('Permanently remove ' + position.title + '. Are you sure?')) {

                volunteerPositionsService.destroy(position).then(function () {
                    fetch_positions().then(function () {
                        Notification.success(position.title + ' removed');
                    });
                });
            }
        }
    }

})(angular.module('admin'));