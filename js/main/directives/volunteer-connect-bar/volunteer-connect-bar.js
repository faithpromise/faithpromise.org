(function (module, angular, window) {
    'use strict';

    var timer;

    module.directive('volunteerConnectBar', directive);

    directive.$inject = ['$window', '$timeout'];

    function directive($window, $timeout) {
        return {
            templateUrl: '/build/js/main/directives/volunteer-connect-bar/volunteer-connect-bar.html',
            restrict: 'E',
            controller: Controller,
            controllerAs: 'vm',
            bindToController: true,
            scope: {
                numChecked: '='
            },
            link: function (scope, elem) {

                elem.on('click', function () {
                    scope.vm.connect_form_is_visible = true;
                    scope.$apply();
                });

                angular.element($window).on('scroll', function () {

                    if (timer) return;

                    timer = $timeout(function () {
                        console.log('timer', new Date());
                        scope.vm.connect_form_is_visible = is_form_in_view();
                        $timeout.cancel(timer);
                        timer = null;
                    }, 300);

                });


            }
        };
    }

    function is_form_in_view() {
        var form_elem = document.getElementById('connect');
        var form_elem_top = form_elem.getBoundingClientRect().top;
        console.log('form_elem_top', form_elem_top);
        return (window.innerHeight - form_elem_top) > 240;
    }

    Controller.$inject = [];

    function Controller() {

        var vm = this;
        vm.connect_form_is_visible = false;

    }

})(angular.module('app'), angular, window);