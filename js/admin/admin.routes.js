(function(module) {

    module.config(Config);

    Config.$inject = ['$routeProvider'];

    function Config(routeProvider) {

        routeProvider.when('/admin', {
            template: ''
        });

        routeProvider.when('/admin/events', {
            template: '<view-events></view-events>'
        });

        routeProvider.when('/admin/events/:id', {
            template: '<view-event-edit></view-event-edit>'
        });

        routeProvider.otherwise({
            template: 'no route'
        });

    }

})(angular.module('admin'));
