(function (module, angular) {
    'use strict';

    module.directive('openVideoResources', directive);

    function directive() {
        return {
            restrict: 'A',
            controller: Controller,
            controllerAs: 'vm',
            bindToController: true,
            scope: {
                openVideoResources: '@'
            },
            link: function(scope, elem) {
                angular.element(elem).on('click', function() {
                    scope.vm.open_popup();
                });
            }
        };
    }

    Controller.$inject = ['$uibModal', 'videosService', 'site', '$sce'];

    function Controller($modal, videosService, site) {

        var vm = this;
        vm.open_popup = open_popup;

        function open_popup() {

            $modal.open({
                animation: false,
                backdrop: 'static',
                controller: modalController,
                controllerAs: 'vm',
                templateUrl: '/build/website/js/video/video-resources-popup.html',
                windowClass: 'VideoResources-modal',
                backdropClass: 'VideoResources-backdrop',
                resolve: {
                    video_id: function() {
                        return vm.openVideoResources;
                    },
                    videoService: function() {
                        return videosService;
                    },
                    site: function() {
                        return site;
                    }
                }
            });

        }

    }

    modalController.$inject = ['$uibModalInstance', 'video_id', 'videosService', 'site', '$sce'];

    function modalController($modalInstance, video_id, videoService, site, $sce) {

        var vm = this;

        init();

        vm.close = close;
        vm.get_resources = get_resources;
        console.log(site.logoMark);
        vm.logo_mark = site.logoMark;

        function init() {

            videoService.find(video_id).then(function(result) {
                vm.video = result.data;
            });

        }

        function close() {
            $modalInstance.close();
        }

        function get_resources() {
            return $sce.trustAsHtml(vm.video.resources);
        }

    }

})(angular.module('app'), angular);
