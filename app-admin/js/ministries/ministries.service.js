(function(module) {
    'use strict';

    module.factory('ministriesService', service);

    service.$inject = ['$http'];

    function service($http) {

        return {

            all: function() {
                return $http.get('/api/ministries');
            }

        };

    }

})(angular.module('admin'));
