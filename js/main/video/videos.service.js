(function(module) {
    'use strict';

    module.factory('videosService', service);

    service.$inject = ['$http'];

    function service($http) {

        return {

            find: function(id) {
                return $http.get('/api/videos/' + id);
            }

        };

    }

})(angular.module('app'));
