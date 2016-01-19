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
            data.human_start = response.data.human_start;
            data.human_start_time = response.data.human_start_time;
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
                data.heading = "We're Live Online!";
                data.isLive = true;
                data.isLoaded = true;
                return;
            }

            data.has_days = days > 0;
            data.has_hours = hours > 0 || data.has_days;
            data.has_minutes = minutes > 0 || data.has_hours;

            data.days = days;
            data.hours = hours;
            data.minutes = minutes;
            data.seconds = seconds;

            data.isLive = false;
            data.isLoaded = true;

            if (days >= 1) {
                data.heading = 'Watch Online';
            } else if (hours >= 1) {
                data.heading = 'Live at ' + data.human_start_time;
            } else if (minutes > 15) {
                data.heading = 'Live in ' + minutes + ' Minute' + (minutes > 1 ? 's' : '');
            } else {
                data.heading = 'Live in ' + (minutes > 9 ? minutes : '0' + minutes)  + ':' + (seconds > 9 ? seconds : '0' + seconds);
            }

            interval = $timeout(icampusTick, 1000);
        }

    }

})(angular.module('app'));
