(function (module) {
    'use strict';

    module.directive('cardGrid', directive);

    function directive() {
        return {
            restrict: 'A',
            link: Link,
            scope: {}
        };
    }

    function Link(scope, elem) {

        var i,
            paragraph,
            heighest = 0,
            cardBodies = angular.element(elem).find('div');

        for(i = 0; i < cardBodies.length; i++) {

            paragraph = angular.element(cardBodies[i]);

            if (paragraph.hasClass('Card-body')) {
                heighest = Math.max(cardBodies[i].offsetHeight, heighest);
            }

        }

        for(i = 0; i < cardBodies.length; i++) {

            paragraph = angular.element(cardBodies[i]);

            if (paragraph.hasClass('Card-body')) {
                paragraph.css('min-height', heighest + 'px');
            }

        }

    }

})(angular.module('app'));