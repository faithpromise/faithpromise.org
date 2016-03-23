(function (module, angular) {
    'use strict';

    module.directive('navToggle', directive);

    directive.$inject = ['$document'];

    function directive($document) {
        return {
            restrict: 'A',
            link: function(scope, elem) {
                var body = $document[0].body;
                elem.on('click', function() {
                    angular.element(body).toggleClass('is-navOpen');
                });
            },
            scope: {}
        };
    }

})(angular.module('app'), angular);