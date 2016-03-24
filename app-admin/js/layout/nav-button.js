(function (module) {
    'use strict';

    module.directive('navButton', directive);

    directive.$inject = ['$location'];

    function directive($location) {
        return {
            restrict: 'A',
            link: function (scope, elem, attr) {

                var parent = angular.element(elem).parent(),
                    active_class = 'is-active';

                scope.$on('$routeChangeSuccess', function () {
                    var is_active = ($location.path().indexOf(attr.href) === 0);
                    if (is_active) {
                        parent.addClass(active_class);
                    } else {
                        parent.removeClass(active_class);
                    }
                });

            }
        };
    }

})(angular.module('admin'));
