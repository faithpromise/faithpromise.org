(function (module) {
    'use strict';

    module.controller('countdown', controller);

    controller.$inject = ['$scope', 'countdownService'];

    function controller($scope, countdownService) {
        $scope.countdown = countdownService.data;
    }

})(angular.module('app'));
