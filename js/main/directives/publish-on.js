(function (module) {
    'use strict';

    module.directive('publishOn', directive);

    function directive() {
        return {
            restrict: 'A',
            link: Link
        };
    }

    function Link(scope, elem, attr) {

        var now = new Date(),
            publish_date = new Date(attr.publishOn);

        if (publish_date <= now) {
            elem.addClass('publish-on-show');
        }

    }

})(angular.module('app'));