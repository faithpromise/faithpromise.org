(function(module) {

  module.config(Config);

  Config.$inject = ['toastrConfig'];

  function Config(toastrConfig) {

    angular.extend(toastrConfig, {
        positionClass: 'toast-top-center',
        closeButton: true,
        timeOut: 2500
    });

  }

})(angular.module('admin'));
