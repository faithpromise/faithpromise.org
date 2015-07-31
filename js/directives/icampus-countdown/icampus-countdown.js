(function(module) {

    module.directive('icampusCountdown', directive);

    function directive() {
        return {
            restrict: 'E',
            scope: {
                seriesTitle: '='
            },
            controller: Controller,
            templateUrl: '/app/directives/icampus-countdown/icampus-countdown.html',
            replace: true
        };
    }

    Controller.$inject = ['$scope', 'countdownService'];

    function Controller(scope, countdownService) {
        scope.countdown = countdownService.data;
    }

})(angular.module('app'));
