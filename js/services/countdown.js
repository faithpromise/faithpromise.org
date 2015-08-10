(function (module) {
    'use strict';

    module.factory('countdownService', countdownService);

    countdownService.$inject = ['$http', '$timeout'];

    function countdownService($http, $timeout) {

        var interval,
            live_interval,
            data = {
                isLoaded: false
            };

        activate();

        return {
            data: data
        };

        function activate() {
            icampusFetch().then(icampusLoadCountdown);
        }

        function icampusFetch() {
            return $http.get('/countdown.js?v=' + (new Date().getTime()));
        }

        function icampusLoadCountdown(response) {
            data.next = response.data.start;
            data.start = new Date(response.data.start_utc);
            icampusTick();
        }

        function icampusTick() {
            var secondsTill = (data.start - (new Date())) / 1000;
            var days = Math.floor(secondsTill / 86400);
            var hours = Math.floor((secondsTill % 86400) / 3600);
            var minutes = Math.floor((secondsTill % 3600) / 60);
            var seconds = Math.floor(secondsTill % 60);

            if (days < 1 && hours < 1 && minutes < 1 && seconds < 1) {
                live_interval = $timeout(activate, 300000); /* 5 min = 300000 ms */
                data.isLive = true;
                data.isLoaded = true;
                return;
            }

            data.has_days = days > 0;
            data.has_hours = hours > 0; // TODO: Include days
            data.has_minutes = minutes > 0; // TODO: Include days and hours

            data.days = days;
            data.hours = hours;
            data.minutes = minutes > 9 ? minutes : ('0' + minutes);
            data.seconds = seconds > 9 ? seconds : ('0' + seconds);

            data.isLive = false;
            data.isLoaded = true;

            interval = $timeout(icampusTick, 1000);
        }

    }

})(angular.module('app'));
