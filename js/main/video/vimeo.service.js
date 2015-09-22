(function(module) {
    'use strict';

    module.factory('vimeoService', service);

    service.$inject = ['$http'];

    function service($http) {

        return {

            find: function(vimeo_id) {

                var endpoint = 'http://vimeo.com/api/v2/video/' + vimeo_id + '.json?callback=JSON_CALLBACK';

                return $http.jsonp(endpoint).then(function(result) {
                    return result.data[0];
                });
            }

        };

    }

})(angular.module('app'));
