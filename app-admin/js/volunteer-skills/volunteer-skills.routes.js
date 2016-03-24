(function(module) {

    module.config(Config);

    Config.$inject = ['$routeProvider'];

    function Config(routeProvider) {

        routeProvider.when('/admin/volunteer-skills', {
            template: '<volunteer-skills-list></volunteer-skills-list>'
        });

    }

})(angular.module('admin'));