(function (module) {
    'use strict';

    module.directive('volunteerPositions', directive);

    directive.$inject = ['$window', '$timeout'];

    function directive($window, $timeout) {
        return {
            templateUrl: '/build/js/main/directives/volunteer-positions/volunteer-positions.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm',
            scope: {},
            link: function(scope, elem) {

                var timer,
                    // First time - form may be visible because content (vol positions) hasn't loaded yet.
                    timeout = 2000;

                angular.element($window).on('scroll', function () {

                    if (timer) return;

                    timer = $timeout(function () {
                        scope.vm.is_form_in_view = is_form_in_view();
                        $timeout.cancel(timer);
                        timer = null;
                        timeout = 300;
                    }, timeout);

                });

            }
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
        vm.show_continue_bar = false;
        vm.selected_positions = [];
        vm.campuses = null;
        vm.skills = null;
        vm.toggle_position = toggle_position;
        vm.is_selected = is_selected;
        vm.send_form = send_form;
        vm.selected_skill = null;
        vm.select_skill = select_skill;
        vm.deselect_skill = deselect_skill;
        vm.close_form_confirmation = close_form_confirmation;
        vm.is_form_in_view = false;

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

        function select_skill(skill) {
            vm.selected_skill = skill;
        }

        function deselect_skill() {
            vm.selected_skill = null;
        }

        function send_form() {
            vm.is_sending = true;
            $http.post('/serve/opportunities', vm.user).then(on_form_success, on_form_error);
        }

        function on_form_success() {
            vm.is_sending = false;
            vm.is_sent = true;
            clear_selected_positions();
            clear_form();
        }

        function on_form_error(response) {
            vm.is_sending = false;
            vm.has_error = true;
        }

        function close_form_confirmation() {
            vm.is_sent = false;
        }

        function clear_form() {
            vm.user.message_body = '';
            vm.user.subject = '';
        }

        function clear_selected_positions() {
            vm.selected_positions = [];
            selected_position_ids = [];
        }

    }

    function is_form_in_view() {
        var form_elem = document.getElementById('continue');
        var form_elem_top = form_elem.getBoundingClientRect().top;
        console.log('form_elem_top', form_elem_top);
        return (window.innerHeight - form_elem_top) > 240;
    }

})(angular.module('app'));
