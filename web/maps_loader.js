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

function addMarker() {
    // Create a marker and set its position.
    var marker = new google.maps.Marker({
        map: map,
        position: getMarkerCoordinates(),
        title: 'CRIMEEEEEE!'
    });
}

$("#add_marker").click(function() {
    addMarker();
});
