(function (module, angular) {
    'use strict';

    module.directive('openVideo', directive);

    function directive() {
        return {
            restrict: 'A',
            controller: Controller,
            controllerAs: 'vm',
            bindToController: true,
            scope: {
                openVideo: '@'
            },
            link: function(scope, elem) {
                angular.element(elem).on('click', function() {
                    console.log('clickity');
                    scope.vm.open_popup();
                });
            }
        };
    }

    Controller.$inject = ['$modal', '$http'];

    function Controller($modal, $http) {

        console.log('yay!');

        var vm = this;
        vm.open_popup = open_popup;

        init();

        function init() {

        }

        function open_popup() {

            var endpoint = 'http://vimeo.com/api/v2/video/' + vm.openVideo + '.json?callback=JSON_CALLBACK';

            $http.jsonp(endpoint).then(function(result) {

                vm.video = result.data[0];

                $modal.open({
                    animation: true,
                    backdrop: 'static',
                    controller: 'videoPopup',
                    templateUrl: '/build/js/main/video/video-popup.html',
                    resolve: {
                        video: function() {
                            return {
                                vimeo_id: vm.openVideo,
                                title: 'foo',
                                plays: vm.video.stats_number_of_plays
                            };
                        }
                    }
                });

            });

        }

    }

})(angular.module('app'), angular);