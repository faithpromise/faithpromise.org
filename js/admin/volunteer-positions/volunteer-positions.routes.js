(function(module) {

    module.config(Config);

    Config.$inject = ['$routeProvider'];

    function Config(routeProvider) {

        routeProvider.when('/admin/volunteer-positions', {
            template: '<volunteer-positions-list></volunteer-positions-list>'
        });

        routeProvider.when('/admin/volunteer-positions/new', {
            template: '<volunteer-position-edit></volunteer-position-edit>'
        });

        routeProvider.when('/admin/volunteer-positions/:id', {
            template: '<volunteer-position-edit></volunteer-position-edit>'
        });

    }

})(angular.module('admin'));