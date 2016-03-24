(function (module, _) {
    'use strict';

    module.directive('volunteerPositionEdit', directive);

    function directive() {
        return {
            templateUrl: '/build/js/admin/volunteer-positions/volunteer-position-edit.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm'
        };
    }

    Controller.$inject = ['$routeParams', '$location', 'volunteerPositionsService', 'volunteerSkillsService', 'volunteerPositionSkillsService', 'ministriesService', 'toastr'];

    function Controller($routeParams, $location, volunteerPositionsService, volunteerSkillsService, volunteerPositionSkillsService, ministriesService, Notification) {

        var is_new = (typeof $routeParams.id === 'undefined');
        var is_edit = !is_new;
        var vm = this;
        vm.page_title = null;
        vm.position = null;
        vm.skills = null;
        vm.selected_skill_ids = null;
        vm.ministries = null;
        vm.save = save;
        vm.has_skill = has_skill;
        vm.toggle_skill = toggle_skill;

        init();

        function init() {
            _fetchVolunteerPosition();
            _fetchSkillsList();
            _fetchRelatedSkills();
            _fetchMinistries();
        }

        function save() {
            volunteerPositionsService
                .save(vm.position)
                .then(function (response) {
                    vm.position.id = response.data.id;
                })
                .then(saveSkills)
                .then(function () {
                    Notification.success('Updated!');
                    $location.path('/admin/volunteer-positions');
                });
        }

        function saveSkills() {
            var data = {
                skill_ids: vm.selected_skill_ids
            };
            console.log('data', data);
            return volunteerPositionSkillsService.save(vm.position.id, data);
        }

        function has_skill(skill_id) {
            return vm.selected_skill_ids.indexOf(skill_id) >= 0;
        }

        function toggle_skill(skill_id) {

            var idx = vm.selected_skill_ids.indexOf(skill_id);

            if (idx >= 0) {
                vm.selected_skill_ids.splice(idx, 1);
            } else {
                vm.selected_skill_ids.push(skill_id);
            }

            console.log('vm.selected_skill_ids', vm.selected_skill_ids);
        }

        function _fetchVolunteerPosition() {
            if (is_edit) {
                return volunteerPositionsService.find($routeParams.id).then(function (response) {
                    vm.position = response.data;
                    vm.page_title = vm.position.title;
                });
            }
            vm.page_title = 'New Position';
            vm.position = {};
        }

        function _fetchSkillsList() {
            return volunteerSkillsService.all().then(function (response) {
                vm.skills = response.data;
            });
        }

        function _fetchRelatedSkills() {
            if (is_edit) {
                return volunteerPositionSkillsService.all($routeParams.id).then(function (response) {
                    vm.selected_skill_ids = _.pluck(response.data, 'id');
                    console.log('vm.selected_skill_ids', vm.selected_skill_ids);
                });
            }
            vm.selected_skill_ids = [];
        }

        function _fetchMinistries() {
            console.log('fetching ministries');
            return ministriesService.all().then(function (response) {
                vm.ministries = response.data;
                console.log('vm.ministries', vm.ministries);
            });
        }

    }

})(angular.module('admin'), window._);
