(function (module) {
    'use strict';

    module.directive('videoLink', directive);

    directive.$inject = ['localStorageService', 'LOCAL_STORAGE_KEYS'];

    function directive(localStorageService, LOCAL_STORAGE_KEYS) {
        return {
            restrict: 'A',
            link: Link,
            scope: {}
        };

        function Link(scope, elem, attr) {

            elem.on('click', function (e) {
                localStorageService.set(LOCAL_STORAGE_KEYS.AUTO_PLAY_VIDEO, attr.href);
            });

        }
    }

})(angular.module('app'));