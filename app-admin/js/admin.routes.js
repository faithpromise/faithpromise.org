(function(module) {

    module.config(Config);

    Config.$inject = ['$routeProvider'];

    function Config(routeProvider) {

        routeProvider.when('/admin', {
            template: ''
        });

        routeProvider.otherwise({
            template: 'no route'
        });

    }

})(angular.module('admin'));