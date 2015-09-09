(function(module) {
    'use strict';

    module.factory('volunteerPositionsService', service);

    service.$inject = ['$http'];

    function service($http) {

        return {

            all: function() {
                return $http.get('/api/volunteer-positions');
            },

            find: function(id) {
                return $http.get('/api/volunteer-positions/' + id);
            },

            save: function(model) {
                if (model.id) {
                    return $http.put('/api/volunteer-positions/' + model.id, model);
                } else {
                    return $http.post('/api/volunteer-positions', model);
                }
            },

            destroy: function(model) {
                return $http.delete('/api/volunteer-positions/' + model.id, model);
            }

        };

    }

})(angular.module('admin'));
