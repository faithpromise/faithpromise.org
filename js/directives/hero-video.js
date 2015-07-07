(function (module) {
    'use strict';

    module.directive('heroVideo', directive);

    function directive() {
        return {
            restrict: 'A',
            template: '<div ng-transclude></div>',
            transclude: true,
            controller: Controller
        };
    }

    Controller.$inject = ['$scope'];

    function Controller($scope) {

        init();

        function init() {
            $scope.foo = 'bar';
        }

    }

})(angular.module('app'));