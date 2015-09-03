(function (module) {
    'use strict';

    module.directive('focusInView', directive);

    directive.$inject = ['$window', '$timeout'];

    function directive($window, $timeout) {
        return {
            restrict: 'A',
            scope: {
                focusInView: '@'
            },
            link: Link
        };

        function Link (scope, elem) {

            var timer,
                // Generous timeout first time because elem may be visible since content hasn't loaded yet.
                timeout = 2000,
                offset = parseInt(scope.focusInView) || 100;

            angular.element($window).on('scroll', onScroll);

            function onScroll() {

                if (timer) return;

                timer = $timeout(function () {

                    console.log('focus timer', new Date());

                    var top = elem[0].getBoundingClientRect().top;
                    var diff = ($window.innerHeight - top);

                    console.log('diff', diff);

                    if (diff > offset) {
                        // Only focus once
                        angular.element($window).off('scroll', onScroll);
                        elem[0].focus();
                    }

                    timeout = 300;
                    timer = null;

                }, timeout);

            }

        }
    }

})(angular.module('app'));
