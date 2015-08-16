(function (module) {
    'use strict';

    module.directive('cardGrid', directive);

    directive.$inject = ['site'];

    function directive(site) {
        return {
            restrict: 'A',
            scope: {},
            link: function (scope, elem) {

                if (site.isMobile) {
                    return;
                }

                var i,
                    paragraph,
                    heighest = 0,
                    cardBodies = angular.element(elem).find('div');

                for (i = 0; i < cardBodies.length; i++) {

                    paragraph = angular.element(cardBodies[i]);

                    if (paragraph.hasClass('Card-body')) {
                        heighest = Math.max(cardBodies[i].offsetHeight, heighest);
                    }

                }

                for (i = 0; i < cardBodies.length; i++) {

                    paragraph = angular.element(cardBodies[i]);

                    if (paragraph.hasClass('Card-body')) {
                        paragraph.css('min-height', heighest + 'px');
                    }

                }

            }
        };
    }

})(angular.module('app'));