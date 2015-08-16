(function(module) {

    module.config(Config);

    Config.$inject = ['$routeProvider'];

    function Config(routeProvider) {

        routeProvider.when('/', {
            template: 'dashboard',
            bodyClass: 'home'
        });

        routeProvider.when('/events', {
            template: 'view events'
        });

        routeProvider.when('/events/:slug', {
            template: 'edit event'
        });

        routeProvider.otherwise({
            template: 'no route'
        });

    }

})(angular.module('admin'));
