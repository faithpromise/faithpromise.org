@extends('layouts.page', ['title' => 'Locations'])

@section('page')

    @cardsection(['title' => 'Find a Location', 'cards' => $campuses, 'class' => 'GridSection--center'])
    <!-- TODO: Text is not centered. Center all cardsection text? Search for occurrences -->
    <p>Join us this weekend at a location near you.</p>
    @endcardsection

    <div id="LocationsMap" class="LocationsMap"></div>

    <script>
        window.fp = window.fp || {};
        window.fp.locations = <?= $campuses_json ?>;
    </script>

    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="//google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>

    <script>
        var fpMap = (function (window, fp) {

            var map,
                markers = {},
                campusWindow,
                map_styles = [
                    {featureType: "road", elementType: "geometry", stylers: [{visibility: "on"}, {lightness: 70}]},
                    {featureType: "poi", elementType: "geometry", stylers: [{visibility: "off"}]},
                    {featureType: "landscape", elementType: "geometry", stylers: [{color: "#fffffa"}]},
                    {featureType: "water", stylers: [{lightness: 0}]},
                    {featureType: "road", elementType: "labels", stylers: [{visibility: "on"}]},
                    {featureType: "transit", stylers: [{visibility: "off"}]},
                    {featureType: "administrative", elementType: "geometry", stylers: [{lightness: 0}]}
                ];

            google.maps.event.addDomListener(window, 'load', initLocationsMap);

            return {
                openLocation: openCampusWindow,
                closeCampusWindow: closeCampusWindow
            };

            function initLocationsMap() {

                createMap();
                createInfoWindow();
                createCampusMarkers();

                google.maps.event.addListener(map, "click", function () {
                    closeCampusWindow();
                });

            }

            function createMap() {
                map = new google.maps.Map(document.getElementById('LocationsMap'), {
                    zoom: 10,
                    draggable: !fp.isMobile(),
                    scrollwheel: false,
                    center: new google.maps.LatLng(36.0706850, -84.0721176),
                    styles: map_styles
                });
            }

            function createInfoWindow() {
                var firstCampus = fp.locations[Object.keys(fp.locations)[0]];
                campusWindow = new InfoBox({
                    content: createCampusContent(firstCampus),
                    alignBottom: true,
                    infoBoxClearance: new google.maps.Size(20, 40),
                    enableEventPropagation: false,
                    maxWidth: 320,
                    pixelOffset: new google.maps.Size(-160, -55),
                    disableAutoPan: false,
                    closeBoxURL: ''
                });
            }

            function createCampusMarkers() {
                var campus_ident;
                for (var campus in fp.locations) {
                    if (fp.locations.hasOwnProperty(campus)) {
                        campus_ident = fp.locations[campus].ident;
                        markers[campus_ident] = createMarker(map, fp.locations[campus]);
                    }
                }
            }

            function createMarker(map, campus) {

                var marker = new google.maps.Marker({
                    map: map,
                    position: new google.maps.LatLng(campus.lat, campus.lng)
                });

                google.maps.event.addListener(marker, 'click', function () {
                    openCampusWindow(campus.ident);
                });

                return marker;

            }

            function openCampusWindow(campus_ident) {

                var campus = fp.locations[campus_ident],
                    marker = markers[campus_ident],
                    content;

                content = createCampusContent(campus);
                campusWindow.setContent(content);
                campusWindow.open(map, marker);
            }

            function closeCampusWindow() {
                campusWindow.close();
            }

            function createCampusContent(campus) {

                var content =
                            '<div class="LocationWindow">' +
                            '<img class="LocationWindow-photo" src="' + campus.thumbnail + '">' +
                            '<div class="LocationWindow-body">' +
                            '<h1 class="LocationWindow-title">' +
                            campus.title +
                            '</h1>' +
                            '<p class="LocationWindow-address">' +
//              (campus.location.length ? (campus.location + '<br>') : '') +
                            campus.address + '<br>' +
                            campus.city + ', ' + campus.state + ' ' + campus.zip + '<br>' +
                            '<a href="' + campus.directions_url + '">Get Directions</a>' +
                            '</p>' +
                            '<h2 class="LocationWindow-subtitle">Service Times</h2>' +
                            '<p>' +
                            campus.times +
                            '</p>' +
                            '</div>' +
                            '<div class="LocationWindow-footer">' +
                            '<span class="LocationWindow-phone">865-555-1234</span>' +
                            '<span class="LocationWindow-moreWrap">' +
                            '<a class="LocationWindow-more" href="' + campus.url + '">More Details</a>' +
                            '</span>' +
                            '</div>' +
                            '<span class="LocationWindow-close" onclick="fpMap.closeCampusWindow();"></span>' +
                            '<span class="LocationWindow-arrow"></span>'
                '</div>';
                return content;
            }

        }(window, window.fp));

    </script>

@endsection
