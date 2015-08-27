(function(module) {
    'use strict';

    module.factory('volunteerPositionSkillsService', service);

    service.$inject = ['$http'];

    function service($http) {

        return {

            all: function(id) {
                return $http.get('/api/volunteer-position-skills/' + id);
            },

            save: function(volunteer_position_id, skills) {
                return $http.put('/api/volunteer-position-skills/' + volunteer_position_id, skills);
            }

        };

    }

})(angular.module('admin'));
