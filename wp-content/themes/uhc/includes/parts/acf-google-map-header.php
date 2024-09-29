<?php
$google_api_key = google_map_api_key();

if (empty($google_api_key)) return;
?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_api_key ?>&callback=Function.prototype"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {

        function initMap(el) {
            let markers = el.querySelectorAll('.marker'),
                zoomValue = parseInt(el.getAttribute('data-zoom')) || 16, // Приведение zoom к числу
                mapArgs = {
                    zoom: zoomValue,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: true
                };

            let map = new google.maps.Map(el, mapArgs);

            // Add markers.
            map.markers = [];
            markers.forEach(function (marker) {
                initMarker(marker, map);
            });

            centerMap(map);

            return map;
        }

        function initMarker(marker, map) {
            let lat = marker.getAttribute('data-lat'),
                lng = marker.getAttribute('data-lng'),
                latLng = {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng)
                };

            let mapMarker = new google.maps.Marker({
                position: latLng,
                map: map
            });

            map.markers.push(mapMarker);

            if (marker.innerHTML) {
                let infowindow = new google.maps.InfoWindow({
                    content: marker.innerHTML
                });

                mapMarker.addListener('click', function () {
                    infowindow.open(map, mapMarker);
                });
            }
        }

        function centerMap(map) {
            let bounds = new google.maps.LatLngBounds();
            map.markers.forEach(function (marker) {
                bounds.extend({
                    lat: marker.position.lat(),
                    lng: marker.position.lng()
                });
            });

            if (map.markers.length === 1) {
                map.setCenter(bounds.getCenter());
            } else {
                map.fitBounds(bounds);
            }
        }

        document.querySelectorAll('.acf-map').forEach(function (el) {
            initMap(el);
        });
    });
</script>
