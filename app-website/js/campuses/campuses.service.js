(function(module) {
    'use strict';

    module.factory('campusesService', service);

    service.$inject = ['$http'];

    function service($http) {

        return {

            all: function() {
                return $http.get('/api/campuses');
            }

        };

    }

})(angular.module('app'));
