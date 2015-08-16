(function (module, Waypoint) {
    'use strict';

    module.directive('waypointAddClass', directive);

    directive.$inject = ['$animate'];

    function directive($animate) {

        return {
            restrict: 'A',
            link: Link
        };

        function Link(scope, elem, attr) {

            var params = scope.$eval(attr.waypointAddClass);

            if (params.constructor !== Array) {
                addWaypoint(elem[0], params);
                return;
            }

            for (var i = 0; i < params.length; i++) {
                addWaypoint(elem[0], params[i]);
            }

            function addWaypoint(elem, params) {

                var options = {
                    element: elem,
                    target: elem,
                    addDirection: 'down',
                    handler: function (direction) {
                        if (direction === options.addDirection) {
                            console.log('options.target', options.target);
                            console.log('options.class', options.class);
                            scope.$apply(function () {
                                $animate.addClass(angular.element(options.target), options.class);
                            });
                        } else {
                            scope.$apply(function () {
                                $animate.removeClass(angular.element(options.target), options.class);
                            });
                        }
                    }
                };

                angular.extend(options, params);

                if (options.target.substring(0, 1) === '#') {
                    options.target = document.getElementById(options.target.substring(1));
                } else if (options.target === 'body') {
                    options.target = document.body;
                }

                new Waypoint(options);
            }

        }

    }

})(angular.module('app'), window.Waypoint);
