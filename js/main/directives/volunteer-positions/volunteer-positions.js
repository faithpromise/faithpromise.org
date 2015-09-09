(function (module) {
    'use strict';

    module.directive('volunteerPositions', directive);

    function directive() {
        return {
            templateUrl: '/build/js/main/directives/volunteer-positions/volunteer-positions.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm',
            scope: {}
        };
    }

    Controller.$inject = ['$http', 'campusesService'];

    function Controller($http, campusesService) {

        var selected_position_ids = [],
            vm = this;
        vm.user = {
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            message_body: '',
            subject: '',
            campus: ''
        };
        vm.selected_positions = [];
        vm.campuses = null;
        vm.skills = null;
        vm.toggle_position = toggle_position;
        vm.is_selected = is_selected;
        vm.send_form = send_form;
        vm.selected_skill = null;
        vm.select_skill = select_skill;
        vm.clear_selected_skill = clear_selected_skill;

        init();

        function init() {

            $http.get('/serve/opportunities.json').then(function (response) {
                vm.ministries = response.data;
            });

            $http.get('/serve/opportunities.json?by=skill').then(function (response) {
                vm.skills = response.data;
            });

            campusesService.all().then(function (response) {
                vm.campuses = response.data;
            });
        }

        function toggle_position(position) {

            var idx = selected_position_ids.indexOf(position.id);

            if (idx >= 0) {
                selected_position_ids.splice(idx, 1);
                vm.selected_positions.splice(idx, 1);
            } else {
                selected_position_ids.push(position.id);
                vm.selected_positions.push(position);
            }

            vm.user.message_body = build_description();
            vm.user.subject = build_subject();

        }

        function is_selected(position) {
            return selected_position_ids.indexOf(position.id) >= 0;
        }

        function build_description() {
            var areas_list = build_areas_list();
            return 'Please contact me with more information about the ' + areas_list + ' opportunities.';
        }

        function build_subject() {
            return build_areas_list();
        }

        function build_areas_list() {
            var i,
                areas = [],
                areas_string = '';

            if (vm.selected_positions.length === 0) {
                return '';
            }

            for (i = 0; i < vm.selected_positions.length; i++) {
                areas.push(vm.selected_positions[i].title);
            }

            if (areas.length === 1) {
                areas_string = areas[0];
            } else if (areas.length === 2) {
                areas_string = areas.join(' and ');
            } else {
                areas[areas.length - 1] = 'and ' + areas[areas.length - 1];
                areas_string = areas.join(', ');
            }

            return areas_string;
        }

        function send_form() {
            vm.is_sending = true;
            //$http.post('/serve/opportunities', vm.user).then(on_form_success, on_form_error);
            on_form_success();
        }

        function on_form_success() {
            vm.is_sending = false;
            vm.is_sent = true;
            vm.user.message_body = '';
            vm.user.subject = '';
            vm.selected_positions = [];
            selected_position_ids = [];
        }

        function on_form_error(response) {
            console.log(response.data);
            vm.is_sending = false;
            vm.has_error = true;
        }

        function select_skill(skill) {
            vm.selected_skill = skill;
        }

        function clear_selected_skill() {
            vm.selected_skill = null;
        }

    }

})(angular.module('app'));
