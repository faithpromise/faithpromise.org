(function (module) {
    'use strict';

    module.controller('videoPopup', controller);

    function controller($scope, $modalInstance, video) {

        $scope.vimeo_id = video.vimeo_id;
        $scope.close = close;

        function close() {
            $modalInstance.close();
        }

    }

})(angular.module('app'));