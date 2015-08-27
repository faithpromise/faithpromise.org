(function(module) {
    'use strict';

    module.factory('eventsService', service);

    service.$inject = ['$http'];

    function service($http) {

        return {

            all: function() {
                return $http.get('/api/events');
            }

        };

    }

})(angular.module('admin'));