(function (module, angular) {
    'use strict';

    module.directive('linkTo', directive);

    directive.$inject = ['$window'];

    function directive($window) {
        return {
            restrict: 'A',
            link: function(scope, elem, attr) {
                if (! attr.linkTo) {
                    return;
                }
                angular.element(elem).addClass('clickable');
                elem.on('click', function(e) {
                    if (e.target.tagName !== 'A') {
                        $window.location.href = attr.linkTo;
                    }
                });
            }
        };
    }

})(angular.module('app'), angular);
