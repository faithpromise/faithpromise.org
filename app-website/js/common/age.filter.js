/* http://stackoverflow.com/questions/24883308/convert-birthday-to-age-in-angularjs */
(function (module) {
    'use strict';

    module.filter('age', filter);

    function filter() {

        return function(birthday) {

            var birth_date = Date.parse(birthday),
                age_dif_ms = Date.now() - birth_date,
                age_date = new Date(age_dif_ms);

            return Math.abs(age_date.getUTCFullYear() - 1970);
        };

    }

})(angular.module('app'));