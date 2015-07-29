(function(module) {
    'use strict';

    module.factory('countdownService', countdownService);

    countdownService.$inject = ['$http', '$interval'];

    function countdownService($http, $interval) {

        var interval,
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
            return $http.get('/countdown.js');
        }

        function icampusLoadCountdown(response) {
            data.next = response.data.start;
            data.start = new Date(response.data.start_utc);
            interval = $interval(icampusTick, 1000);
        }

        function icampusTick() {
            var secondsTill = (data.start - (new Date())) / 1000;
            var days = Math.floor(secondsTill / 86400);
            var hours = Math.floor((secondsTill % 86400) / 3600);
            var minutes = Math.floor((secondsTill % 3600) / 60);
            var seconds = Math.floor(secondsTill % 60);

            if (days < 1 && hours < 1 && minutes < 1 && seconds < 1) {
                data.isLive = true;
                return clearInterval(interval);
            }

            data.isLoaded = true;
            data.days = days > 9 ? days : ('0' + days);
            data.hours = hours > 9 ? hours : ('0' + hours);
            data.minutes = minutes > 9 ? minutes : ('0' + minutes);
            data.seconds = seconds > 9 ? seconds : ('0' + seconds);

        }

    }

})(angular.module('app'));
