var map;

function getLatitude() {
    return parseFloat($('#lat').val());
}

function getLongitude() {
    return parseFloat($('#lon').val());
}

function initMap() {
    longitude = getLatitude();
    latitude = getLongitude();
    console.log(longitude);
    console.log(latitude);
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: latitude, lng: longitude},
        zoom: 12
    });
}

$( "#go" ).click(function() {
    console.log("On click called!!");
    initMap();
});
