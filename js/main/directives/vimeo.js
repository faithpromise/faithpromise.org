(function (module) {
    'use strict';

    module.directive('vimeo', directive);

    function directive() {
        return {
            template: '<div class="VideoPlayer"><iframe ng-src="{{ src }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>',
            restrict: 'E',
            controller: Controller,
            //replace: true,
            scope: {
                id: '@',
                autoplay: '='
            }
        };
    }

    Controller.$inject = ['$scope', '$sce', '$window', 'localStorageService', 'LOCAL_STORAGE_KEYS'];

    function Controller($scope, $sce, $window, localStorageService, LOCAL_STORAGE_KEYS) {

        init();

        removeAutoPlay();

        function init() {
            var autoplay = shouldAutoPlay();
            console.log('autoplay: ', typeof $scope.autoplay, $scope.autoplay);
            $scope.src = $sce.trustAsResourceUrl('https://player.vimeo.com/video/' + $scope.id + '?title=0&byline=0&portrait=0&badge=0&autoplay=' + autoplay);
        }

        function shouldAutoPlay() {
            return ($scope.autoplay || (localStorageService.get(LOCAL_STORAGE_KEYS.AUTO_PLAY_VIDEO) == $window.location.pathname)) ? 1 : 0;
        }

        function removeAutoPlay() {
            localStorageService.remove(LOCAL_STORAGE_KEYS.AUTO_PLAY_VIDEO);
        }

    }

})(angular.module('app'));