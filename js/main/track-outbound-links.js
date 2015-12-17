(function (ga) {
    'use strict';


    function addEvent(element, eventName, handler) {
        if (element.addEventListener) {
            element.addEventListener(eventName, handler);
        } else {
            element.attachEvent('on' + eventName, function () {
                handler.call(element);
            });
        }
    }

    if (document.getElementsByTagName) {

        var i,
            href,
            anchors = document.getElementsByTagName('a');

        for (i = 0; i < anchors.length; i++) {

            if (anchors[i].host && (window.location.host !== anchors[i].host)) {

                addEvent(anchors[i], 'click', function (event) {

                    var url = this.getAttribute('href');

                    if (typeof ga === 'function') {

                        event.preventDefault();

                        ga('send', 'event', 'Outbound', 'click', url, {
                            'transport':      'beacon',
                            'hitCallback':    function () {
                                window.document.location = url;
                            },
                            'nonInteraction': 1
                        });
                    }

                });

            }

        }

    }

})(window.ga);
