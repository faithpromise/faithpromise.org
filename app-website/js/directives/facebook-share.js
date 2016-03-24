(function (module) {
    'use strict';

    module.directive('facebookShare', directive);

    directive.$inject = ['$window'];

    function directive($window) {
        return {
            restrict: 'A',
            link: Link
        };

        function Link(scope, elem, attr) {

            elem.on('click', function() {
                var shareUrl = fullUrl(attr.facebookShare || $window.location.href);

                FB.ui({
                    method: 'share',
                    href: shareUrl
                }, function(response){});
            });

        }

        function fullUrl(url) {
            var baseUrl = $window.location.protocol + '//' + $window.location.hostname + ($window.location.port !== 80 ? (':' + $window.location.port) : '');
            if (url.charAt(0) === '/') {
                return baseUrl + url;
            }
            return url;
        }
    }

})(angular.module('app'));