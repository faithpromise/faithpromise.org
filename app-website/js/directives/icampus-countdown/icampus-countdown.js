(function (module) {

    module.directive('icampusCountdown', directive);

    function directive() {
        return {
            templateUrl:      '/build/js/main/directives/icampus-countdown/icampus-countdown.html?v=1',
            transclude:       true,
            restrict:         'A',
            controller:       Controller,
            controllerAs:     'vm',
            bindToController: true,
            scope:            {
                times:       '@',
                image:       '@',
                liveImage:   '@',
                seriesTitle: '@'
            }

        };
    }

    Controller.$inject = ['$scope', 'countdownService'];

    function Controller(scope, countdownService) {
        scope.countdown = countdownService.data;
    }

})(angular.module('app'));
