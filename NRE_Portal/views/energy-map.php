<h1><?=$title?></h1>

<div class="nre-container">

    <div id="map" style="width: 800px; height: 500px"></div>

    <?php View::render('energy-switch-buttons'); ?>

    <!--
    <p>Is the user logged? <b><?=(isset($_SESSION['logged']) ? 'YES':'NO')?></b></p>
    -->

    <script type="text/javascript">
        var map;
        var markers = [];

        function initMap() {
            //Map instanciated at TechnoPole
            var tp = {lat: 46.283600, lng: 7.539214};
            map = new google.maps.Map(document.getElementById('map'), {
                center: tp,
                zoom: 10,
                mapTypeId: 'roadmap',
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
            });
            infoWindow = new google.maps.InfoWindow();

            //Adds the markers from DB to map
            markers.forEach(addMarker);

        }

        // Adds a marker to the map.
        function addMarker(value) {
            var marker = new google.maps.Marker({
                position: {lat: +value.lat, lng: +value.lng},
                label: value.InstallationIdInstallation,
                map: map,
                title: 'Location: ' + value.Street + ' ' + value.Number + ', ' + value.Postcode + ' ' + value.City,
            });

            var contentString = 'Location: ' + value.Street + ' ' + value.Number + ', ' + value.Postcode + ' ' + value.City + '<br> Latitude: ' + value.lat + ', Longitude: ' + value.lng;

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });


            marker.addListener('click', function() {
                //map.setZoom(15);
                smoothZoom(map, 15, map.getZoom());
                map.setCenter(marker.getPosition());
                infowindow.open(map, marker);
            });
        }

        // the smooth zoom function
        function smoothZoom (map, max, cnt) {
            if (cnt >= max) {
                return;
            }
            else {
                z = google.maps.event.addListener(map, 'zoom_changed', function(event){
                    google.maps.event.removeListener(z);
                    smoothZoom(map, max, cnt + 1);
                });
                setTimeout(function(){map.setZoom(cnt)}, 80); // 80ms is what I found to work well on my system -- it might not work well on all systems
            }
        }

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request.responseText, request.status);
                }
            };

            request.open('GET', url, true);
            request.send(null);
        }

        var dataMarkers = $.ajax({
            type: "POST",
            url: "<?=__BASE_URL__?>/ajaxinstallations",
            data: {},
            success: function (response) {
                console.log(response);
                response.forEach(function(v){
                    markers.push(v);
                });

            },
            dataType: "json"
        });

        $(document).ready(function(){

            initMap();
        });

    </script>

</div>
