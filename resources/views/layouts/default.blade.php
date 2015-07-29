<?php

$body_class = (isset($body_class) ? $body_class : '') . ' ' . (isset($nav_style) ? 'navStyle--' . $nav_style : '');

?><!DOCTYPE html>
<html ng-app="app">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title : $site['title'] }}</title>
        <meta name="description" content="{{ isset($description) ? $description : $site['description'] }}">
        <meta property="og:description" content="{{ isset($facebook_description) ? $facebook_description : isset($title) ? $title : $site['title'] }}">

        <!-- build:style main -->
        <link rel="stylesheet" href="/build/css/main.dev.css">
        <!-- /build -->

        <link rel="canonical" href="{{ isset($canonical) ? $canonical : URL::current()  }}">

        @include('includes.google_analytics')
    </head>

    <body class="{{ $body_class }}" ng-controller="page">

        <div class="Layout">

            <div id="js-nav" class="Nav">
                <div class="Nav-container">

                    <a class="Nav-logoWrap" href="/">
                        <svg class="Nav-logo" role="img" title="Faith Promise Church Logo">
                            <use xlink:href="/build/svg/general.svg#logo-faith-promise"></use>
                        </svg>
                    </a>

                    <ul class="Nav-menu">
                        @foreach ($nav as $topnav)
                        <li class="Nav-item" dropdown>
                            @if (!isset($topnav['subnav']))
                            <a class="Nav-link" href="{{ $topnav['url'] }}">{{ $topnav['title'] }}</a>
                            @else
                            <span class="Nav-link Nav-link--dropdown" dropdown-toggle>{{ $topnav['title'] }}</span>
                            <ul class="NavDropdown">
                                @foreach ($topnav['subnav'] as $subnav)
                                <li class="NavDropdown-item">
                                    <a class="NavDropdown-link" href="{{ $subnav['url'] }}">{{ $subnav['title'] }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>

            <div class="MobileNav-background"></div>
            <div class="MobileNav-dismiss" nav-toggle></div>

            <div class="Layout-contentWrap">
                <!--<div class="MobileBar-background"></div>-->
                <div class="MobileBar">
                    <a class="MobileBar-logoWrap" href="/">
                        <svg class="MobileBar-logo" role="img" title="Faith Promise Logo">
                            <use xlink:href="/build/svg/general.svg#logo-faith-promise"></use>
                        </svg>
                    </a>
                    <span class="MobileBar-navToggle"><i class="icon-menu" nav-toggle></i></span>
                </div>
                <!--<div class="Hero-shim"></div>-->
                @yield('content')
                <div class="Footer">
                    <div class="Footer-container">
                        <div class="Footer-social">
                            <h5 class="Footer-socialHeading">Connect with us</h5>
                            <ul class="Footer-socialList">
                                <li class="Footer-socialItem">
                                    <a class="Footer-socialLink" href="https://www.facebook.com/faithpromise"><i class="Footer-socialIcon icon-facebook-circled"></i></a>
                                </li>
                                <li class="Footer-socialItem">
                                    <a class="Footer-socialLink" href="https://twitter.com/faithpromise"><i class="Footer-socialIcon icon-twitter-circled"></i></a>
                                </li>
                                <li class="Footer-socialItem">
                                    <a class="Footer-socialLink" href="https://instagram.com/faithpromise"><i class="Footer-socialIcon icon-instagram"></i></a>
                                </li>
                                <li class="Footer-socialItem">
                                    <a class="Footer-socialLink" href="https://vimeo.com/faithpromise"><i class="Footer-socialIcon icon-vimeo-circled"></i></a>
                                </li>
                                <li class="Footer-socialItem">
                                    <a class="Footer-socialLink" href="https://www.pinterest.com/faithpromise/"><i class="Footer-socialIcon icon-pinterest-circled"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="Footer-grid">
                            <div class="Footer-item">
                                <ul class="Footer-linkList">
                                    <li class="Footer-linkItem">
                                        <a class="Footer-link" href="/locations">Times and locations</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                        <a class="Footer-link" href="/events">Upcoming events</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                        <a class="Footer-link" href="/updates">Get email updates</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                        <a class="Footer-link" href="http://blog.faithpromise.org/">Blog</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                        <a class="Footer-link" href="/jobs">Jobs</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                        <a class="Footer-link" href="/give">Give Online</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="Footer-item">
                                <p class="Footer-addressLine">Mailing address:</p>
                                <p class="Footer-addressLine">10740 Faith Promise Lane, Knoxville, TN 37931</p>
                                <p class="Footer-addressLine"><a href="mailto:office@faithpromise.org">office@faithpromise.org</a>  &nbsp;|&nbsp;  <a href="tel:1-865-251-2590">(865) 251-2590</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-animate.min.js"></script>

        <script>
            (function () {
                var module = angular.module('siteConfig', []);
                module.constant('site', {
                            isMobile: isMobile()
                        }
                );

                function isMobile() {
                    var a = navigator.userAgent || navigator.vendor || window.opera;
                    return /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4));
                }

            })(angular);
        </script>

        <!-- build:script main -->
        <script src="/build/js/main.dev.js"></script>
        <!-- /build -->

        <!-- http://dinbror.dk/blog/blazy/ -->
        <script src="//cdn.jsdelivr.net/blazy/latest/blazy.min.js"></script>
        <script>
            var fp = window.fp || {};
            /*! contentloaded.min.js - https://github.com/dperini/ContentLoaded - Author: Diego Perini - License: MIT */
            fp.contentLoaded = function(b,i){var j=false,k=true,a=b.document,l=a.documentElement,f=a.addEventListener,h=f?'addEventListener':'attachEvent',n=f?'removeEventListener':'detachEvent',g=f?'':'on',c=function(d){if(d.type=='readystatechange'&&a.readyState!='complete')return;(d.type=='load'?b:a)[n](g+d.type,c,false);if(!j&&(j=true))i.call(b,d.type||d)},m=function(){try{l.doScroll('left')}catch(e){setTimeout(m,50);return}c('poll')};if(a.readyState=='complete')i.call(b,'lazy');else{if(!f&&l.doScroll){try{k=!b.frameElement}catch(e){}if(k)m()}a[h](g+'DOMContentLoaded',c,false);a[h](g+'readystatechange',c,false);b[h](g+'load',c,false)}};
            fp.contentLoaded(window, function() { new Blazy({
                breakpoints: [
                    { width: 320, src: 'data-src-sm' },
                    { width: 480, src: 'data-src-md' },
                    { width: 600, src: 'data-src-lg' },
                    { width: 960, src: 'data-src-xl' }
                ]
            }); });
        </script>

        <!--[if gte IE 9]>
        <script src="/build/js/svg4everybody.min.js"></script>
        <![endif]-->

    </body>

</html>
