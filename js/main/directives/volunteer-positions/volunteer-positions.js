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
            campus: ''
        };
        vm.selected_positions = [];
        vm.campuses = null;
        vm.skills = null;
        vm.toggle_position = toggle_position;
        vm.is_selected = is_selected;
        vm.send_form = send_form;
        vm.group_by = 'skill';
        vm.group_by_skill = group_by_skill;
        vm.group_by_ministry = group_by_ministry;

        init();

        function init() {

            group_by_skill();

            campusesService.all().then(function(response) {
                vm.campuses = response.data;
            });
        }

        function group_by_skill() {
            vm.group_by = 'skill';
            return $http.get('/serve/opportunities.json?by=skill').then(function (response) {
                vm.skills = response.data;
            });
        }

        function group_by_ministry() {
            vm.group_by = 'ministry';
            return $http.get('/serve/opportunities.json?by=ministry').then(function (response) {
                vm.ministries = response.data;
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

        }

        function is_selected(position) {
            return selected_position_ids.indexOf(position.id) >= 0;
        }

        function build_description() {
            var i,
                areas = [],
                areas_string = '';

            if (vm.selected_positions.length === 0) {
                return '';
            }

            for(i = 0; i < vm.selected_positions.length; i++) {
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

            return 'Please contact me with more information about the ' + areas_string + ' opportunities.';

        }

        function send_form() {

            vm.is_sending = true;

            $http.post('/serve/opportunities', vm.user).then(on_form_success, on_form_error);

        }

        function on_form_success() {
            vm.is_sending = false;
            vm.is_sent = true;
        }

        function on_form_error(response) {
            console.log(response.data);
            vm.is_sending = false;
            vm.has_error = true;
        }

    }

})(angular.module('app'));
