(function(module) {

    module.config(Config);

    Config.$inject = ['$routeProvider'];

    function Config(routeProvider) {

        routeProvider.when('/admin/events', {
            template: '<events-list></events-list>'
        });

        routeProvider.when('/admin/events/new', {
            template: '<events-edit></events-edit>'
        });

        routeProvider.when('/admin/events/:id', {
            template: '<events-edit></events-edit>'
        });

    }

})(angular.module('admin'));
