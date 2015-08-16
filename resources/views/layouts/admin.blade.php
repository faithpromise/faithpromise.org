<!DOCTYPE html>
<html ng-app="admin">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- build:style main -->
    <link rel="stylesheet" href="/build/css/admin.dev.css">
    <!-- /build -->
</head>

<body>

    <div class="Layout">

        <ul class="Nav">
            <li class="Nav-item">
                <a class="Nav-link" href="/admin/events">Events</a>
            </li>
            <li class="Nav-item">
                <a class="Nav-link" href="/admin/ministries">Ministries</a>
            </li>
            <li class="Nav-item">
                <a class="Nav-link" href="/admin/missions">Missions</a>
            </li>
            <li class="Nav-item">
                <a class="Nav-link" href="/admin/series">Series</a>
            </li>
            <li class="Nav-item">
                <a class="Nav-link" href="/admin/staff">Staff</a>
            </li>
            <li class="Nav-item">
                <a class="Nav-link" href="/admin/topics">Topics</a>
            </li>
            <li class="Nav-item">
                <a class="Nav-link" href="/admin/campuses">Campuses</a>
            </li>
        </ul>

        <ng-view></ng-view>

    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-animate.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-route.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-resource.min.js"></script>

    <!-- build:script admin -->
    <script src="/build/js/admin/admin.dev.js"></script>
    <!-- /build -->

</body>

</html>