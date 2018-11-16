<!DOCTYPE html>
<html ng-app="admin">

    <head>
        <base href="/">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

        <!-- build:style admin -->
        <link rel="stylesheet" href="/build/css/admin.dev.css">
        <!-- /build -->
    </head>

    <body>

        <div class="Layout">

            <div class="Layout-nav">

                <div class="Nav">

                    <a class="Nav-logoWrap" href="">
                        <svg class="Nav-logo" role="img" title="Faith Promise Church Logo">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/build/website/svg/general.svg#logo-faith-promise"></use>
                        </svg>
                    </a>

                    <ul class="Nav-menu">
                        <li class="Nav-item">
                            <a nav-button class="Nav-link" href="/admin/events">Events</a>
                        </li>
                        <li class="Nav-item">
                            <a nav-button class="Nav-link" href="/admin/series">Series</a>
                        </li>
                        <li class="Nav-item">
                            <a nav-button class="Nav-link" href="/admin/staff">Staff</a>
                        </li>
                        <li class="Nav-item" uib-dropdown>
                            <span nav-button class="Nav-link Nav-link--dropdown" uib-dropdown-toggle>More</span>
                            <ul class="NavDropdown">
                                <li class="NavDropdown-item">
                                    <a nav-button class="NavDropdown-link" href="/admin/ministries">Ministries</a>
                                </li>
                                <li class="NavDropdown-item">
                                    <a nav-button class="NavDropdown-link" href="/admin/missions">Missions</a>
                                </li>
                                <li class="NavDropdown-item">
                                    <a nav-button class="NavDropdown-link" href="/admin/topics">Topics</a>
                                </li>
                                <li class="NavDropdown-item">
                                    <a nav-button class="NavDropdown-link" href="/admin/campuses">Campuses</a>
                                </li>
                                <li class="NavDropdown-item">
                                    <a nav-button class="NavDropdown-link" href="/admin/studies">Studies</a>
                                </li>
                                <li class="NavDropdown-item">
                                    <a nav-button class="NavDropdown-link" href="/admin/volunteer-positions">Vol Positions</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>

            </div>

            <div class="Layout-content">
                <ng-view></ng-view>
            </div>
        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-animate.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-resource.min.js"></script>

        <!-- build:script admin -->
        <script src="/build/js/admin/admin.dev.js"></script>
        <!-- /build -->

    </body>

</html>