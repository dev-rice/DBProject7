var map;
var markers = new Array();

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
    return {
        lat: latitude,
        lng: longitude
    };

}

function putMarkersForCrime() {
    setMapOnAll(null);

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
            addCrimeMarkers(data);
        }
    );
}

function addCrimeMarkers(data) {
    // data = "{\"locations\": [{\"lat\":102, \"lon\":103}]}"
    // console.log(data);
    markers_from_php = JSON.parse(data);
    console.log("Received " + markers_from_php.locations.length + " results");

    num_records = markers_from_php.locations.length;
    if (num_records == 1) {
        $("#crime_counter").text(markers_from_php.locations.length + " record");
    } else {
        $("#crime_counter").text(markers_from_php.locations.length + " records");
    }

    for (i = 0; i < markers_from_php.locations.length; i++) {
        // console.log(markers_from_php.locations[i]);
        latitude = markers_from_php.locations[i].latitude;
        longitude = markers_from_php.locations[i].longitude;
        addMarker(packageCoordinates(latitude, longitude));
    }

}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
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
