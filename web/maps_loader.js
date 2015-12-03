var map;

function getLatitude() {
    return parseFloat($('#lat').val());
}

function getLongitude() {
    return parseFloat($('#lon').val());
}

function getMarkerCoordinates() {
    return {lat: getLatitude(), lng: getLongitude()}
}

function getDenverCoordinates() {
    return {lat: 39.723, lng: -105.04}
}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: getDenverCoordinates(),
        zoom: 12
    });
}

function putMarkersForCrime() {
    full_code = $("#crime_select").val()

    // Split the code and ext code
    code_array = full_code.split(",");
    offense_code = code_array[0];
    offense_ext = code_array[1];

    $.get("get_locations.php", { code:offense_code, ext:offense_ext },
        function(data){
            addCrimeMarkers(data)
        }
    );
}

function addCrimeMarkers(data) {
    // data = "{\"locations\": [{\"lat\":102, \"lon\":103}]}"
    // console.log(data);
    markers = JSON.parse(data);
    console.log(markers);
    
}

function addMarker(coordinates) {
    // Create a marker and set its position.
    var marker = new google.maps.Marker({
        map: map,
        position: coordinates,
        title: 'CRIMEEEEEE!'
    });
}

$("#show_btn").click(function() {
    putMarkersForCrime();
})
