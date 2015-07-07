(function (module, Waypoint) {
    'use strict';

    module.directive('contentScroll', directive);

    directive.$inject = ['$animate', '$timeout'];

    function directive($animate, $timeout) {

        return {
            restrict: 'A',
            link: Link
        };

        function Link(scope, elem, attr) {

            var nav = document.getElementById('js-nav'),
                navHeight = 60,
                navStickyClass = 'sticky-yes',
                navNoStickyClass = 'sticky-no';

            // Scrolling down as top of content reaches top of viewport
            new Waypoint({
                element: elem[0],
                handler: function (direction) {

                    if (direction === 'down') {
                        angular.element(nav).removeClass(navNoStickyClass);
                        // http://stackoverflow.com/questions/12729122/prevent-error-digest-already-in-progress-when-calling-scope-apply
                        $timeout(function () {
                            $animate.addClass(angular.element(nav), navStickyClass);
                        });
                    }

                }
            });

            // Scrolling up as top of content meets bottom of nav
            new Waypoint({
                element: elem[0],
                offset: navHeight,
                handler: function (direction) {

                    if (direction === 'up') {
                        angular.element(nav).removeClass(navStickyClass);
                        scope.$apply(function () {
                            $animate.addClass(angular.element(nav), navNoStickyClass);
                        });
                    }

                }
            });
        }
    }

})(angular.module('app'), window.Waypoint);
