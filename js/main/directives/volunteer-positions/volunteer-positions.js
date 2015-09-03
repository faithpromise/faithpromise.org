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

        var vm = this;
        vm.user = {
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            message_body: '',
            campus: ''
        };
        vm.selected_positions = []
        vm.campuses = null;
        vm.skills = null;
        vm.toggle_position = toggle_position;
        vm.is_selected = is_selected;
        vm.send_form = send_form;

        init();

        function init() {
            $http.get('/serve/opportunities.json').then(function (response) {
                vm.skills = response.data;
            });

            campusesService.all().then(function(response) {
                vm.campuses = response.data;
            });
        }

        function toggle_position(position) {

            var i,
                idx = -1;

            position.is_selected = !position.is_selected;

            for(i = 0; i < vm.selected_positions.length; i++) {
                if (vm.selected_positions[i].id === position.id) {
                    idx = i;
                    break;
                }
            }

            if (idx >= 0) {
                vm.selected_positions.splice(idx, 1);
            } else {
                vm.selected_positions.push(position);
            }

            vm.user.message_body = build_description();

        }

        function is_selected(position_id) {
            return vm.selected_positions.indexOf(position_id) >= 0;
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

            $http.post('/serve/opportunities', vm.user).then(function(response) {
                vm.is_sending = false;
                vm.is_sent = true;
            });

        }

    }

})(angular.module('app'));
