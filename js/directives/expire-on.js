(function (module, moment) {
    'use strict';

    module.directive('expireOn', directive);

    function directive() {
        return {
            restrict: 'A',
            link: Link
        };
    }

    function Link(scope, elem, attr) {

        var dateFormat = 'YYYY-MM-DD HH:mm:ss ZZ',
            now = moment().utc(),
            expire_date = moment(attr.expireOn, dateFormat).utc();

        console.log('expire_date', expire_date.format());
        console.log('now', now.format());

        if (expire_date.isAfter(now)) {
            elem.addClass('expire-on-show');
        }

    }

})(angular.module('app'), moment);