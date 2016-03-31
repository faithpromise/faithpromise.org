(function (module, angular) {
    'use strict';

    module.directive('openVideo', directive);

    function directive() {
        return {
            restrict: 'A',
            controller: Controller,
            controllerAs: 'vm',
            bindToController: true,
            scope: {
                openVideo: '@'
            },
            link: function(scope, elem) {
                angular.element(elem).on('click', function() {
                    scope.vm.open_popup();
                });
            }
        };
    }

    Controller.$inject = ['$uibModal', 'videosService', 'vimeoService', 'site'];

    function Controller($modal, videosService, vimeoService, site) {

        var vm = this;
        vm.open_popup = open_popup;

        function open_popup() {

            $modal.open({
                animation: false,
                backdrop: 'static',
                controller: modalController,
                controllerAs: 'vm',
                templateUrl: '/build/website/js/video/video-popup.html',
                windowClass: 'VideoPopup-modal',
                backdropClass: 'VideoPopup-backdrop',
                resolve: {
                    video_id: function() {
                        return vm.openVideo;
                    },
                    videoService: function() {
                        return videosService;
                    },
                    vimeoService: function() {
                        return vimeoService;
                    },
                    site: function() {
                        return site;
                    }
                }
            });

        }

    }

    modalController.$inject = ['$uibModalInstance', 'video_id', 'videosService', 'vimeoService', 'site'];

    function modalController($modalInstance, video_id, videoService, vimeoService, site) {

        var vm = this;

        init();

        vm.close = close;
        vm.logo_mark = site.logoMark;

        function init() {

            videoService.find(video_id).then(function(result) {

                vm.video = result.data;

                return vimeoService.find(vm.video.vimeo_id).then(function(data) {
                    vm.vimeo = data;
                });

            });

        }

        function close() {
            $modalInstance.close();
        }

    }

})(angular.module('app'), angular);
