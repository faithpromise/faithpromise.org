(function (module) {
    'use strict';

    module.directive('volunteerSkillsList', directive);

    function directive() {
        return {
            templateUrl: '/build/js/admin/volunteer-skills/volunteer-skills-list.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm'
        };
    }

    Controller.$inject = ['volunteerSkillsService', 'toastr'];

    function Controller(volunteerSkillsService, Notification) {

        var vm = this;

        vm.get_edit_url = get_edit_url;
        vm.editing_skill = null;
        vm.edit = edit;
        vm.save = save;
        vm.remove = remove;
        vm.cancel = clear_form;

        init();

        function init() {
            clear_form();
            fetch_skills();
        }

        function edit(skill) {
            vm.is_new = 0;
            vm.editing_skill = skill;
        }

        function save() {
            volunteerSkillsService.save(vm.editing_skill).then(function () {
                fetch_skills();
                clear_form();
            });
        }

        function remove(skill) {
            if (confirm('Permanently remove ' + skill.title + '. Are you sure?')) {
                clear_form();
                volunteerSkillsService.destroy(skill).then(function () {
                    fetch_skills().then(function() {
                        Notification.success(skill.title + ' removed');
                    });
                });
            }
        }

        function clear_form() {
            vm.is_new = 1;
            vm.editing_skill = null;
        }

        function get_edit_url(position) {
            return '/admin/volunteer-skills/' + position.id;
        }

        function fetch_skills() {
            return volunteerSkillsService.all().then(function (response) {
                vm.skills = response.data;
            });
        }

    }

})(angular.module('admin'));