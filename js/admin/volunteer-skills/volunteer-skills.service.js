(function(module) {
    'use strict';

    module.factory('volunteerSkillsService', service);

    service.$inject = ['$http'];

    function service($http) {

        return {

            all: function() {
                return $http.get('/api/volunteer-skills');
            },

            save: function(model) {
                if (model.id) {
                    return $http.put('/api/volunteer-skills/' + model.id, model);
                } else {
                    return $http.post('/api/volunteer-skills', model);
                }
            },

            destroy: function(model) {
                return $http.delete('/api/volunteer-skills/' + model.id, model);
            }

        };

    }

})(angular.module('admin'));
