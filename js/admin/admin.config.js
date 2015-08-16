(function(module) {

  module.config(Config);

  Config.$inject = ['$locationProvider', '$resourceProvider'];

  function Config(locationProvider, resourceProvider) {

    locationProvider.html5Mode(true);
    resourceProvider.defaults.stripTrailingSlashes = false;

  }

})(angular.module('admin'));
