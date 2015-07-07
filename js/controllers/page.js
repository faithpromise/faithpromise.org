(function (module) {
    'use strict';

    module.controller('page', controller);

    controller.$inject = ['$scope', '$modal'];

    function controller($scope, $modal) {

        $scope.openVideo = openVideo;

        function openVideo(vimeo_id) {

            console.log('modal video window');

            var videoModal = $modal.open({
                animation: true,
                backdrop: 'static',
                controller: 'videoPopup',
                templateUrl: 'templates/video-popup.html',
                resolve: {
                    video: function() {
                        return {
                            vimeo_id: vimeo_id
                        };
                    }
                }
            });

        }

    }

})(angular.module('app'));
