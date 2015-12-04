var map;
var markers = [];
var crime_locations = [];
var heatmap;

function getLatitude() {
    return parseFloat($('#lat').val());
}

function getLongitude() {
    return parseFloat($('#lon').val());
}

function getMarkerCoordinates() {
    return {
        lat: getLatitude(),
        lng: getLongitude()
    }
}

function getDenverCoordinates() {
    return packageCoordinates(39.7500956, -105.0021028);
}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: getDenverCoordinates(),
        zoom: 12
    });
}

function packageCoordinates(latitude, longitude) {
    return new google.maps.LatLng(latitude, longitude);
}

function putMarkersForCrime() {
    clearCrimeLocations();

    full_code = $("#crime_select").val()

    // Split the code and ext code
    code_array = full_code.split(",");
    offense_code = code_array[0];
    offense_ext = code_array[1];

    $.get("get_locations.php", {
            code: offense_code,
            ext: offense_ext,
            crimes: $("#crimes_check").is(':checked'),
            traffic: $("#traffic_check").is(':checked')
        },
        function(data) {
            addCrimeLocations(data);
            // addMarkersFromCrimeLocations();
            addHeatmapsFromCrimeLocations();
        }
    );
}

function showAllCrimes() {
    return $("#crimes_check").is(':checked');
}

function showAllTrafficAccidents() {
    return $("#traffic_check").is(':checked');
}

function addCrimeLocations(data) {
    markers_from_php = JSON.parse(data);

    for (i = 0; i < markers_from_php.locations.length; i++) {
        latitude = markers_from_php.locations[i].latitude;
        longitude = markers_from_php.locations[i].longitude;
        crime_locations.push(packageCoordinates(latitude, longitude));
    }

    num_records = crime_locations.length;
    if (num_records == 1) {
        $("#crime_counter").text(num_records + " record");
    } else {
        $("#crime_counter").text(num_records + " records");
    }
}

function addMarkersFromCrimeLocations() {
    clearMarkers();
    for (i = 0; i < crime_locations.length; i++) {
        console.log(crime_locations[i]);
        addMarker(crime_locations[i]);
    }
}

function addHeatmapsFromCrimeLocations() {
    clearHeatmap();
    heatmap = new google.maps.visualization.HeatmapLayer({
        data: crime_locations,
        map: map
    });
    heatmap.set('opacity', 0.8);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function clearCrimeLocations() {
    crime_locations = [];
}

function clearHeatmap() {
    if (heatmap) {
        heatmap.setMap(null);
    }
}

function clearMarkers() {
    setMapOnAll(null);
    markers = [];
}

function addMarker(coordinates) {
    // Create a marker and set its position.
    var marker = new google.maps.Marker({
        map: map,
        position: coordinates,
        title: 'CRIMEEEEEE!'
    });
    markers.push(marker);
}

$("#show_btn").click(function() {
    putMarkersForCrime();
});

$("#crimes_check").click(function() {
    putMarkersForCrime();
});

$("#traffic_check").click(function() {
    putMarkersForCrime();
})
