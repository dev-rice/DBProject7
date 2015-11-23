var map;
function initMap() {
    longitude = -105.040443;
    latitude = 39.7237545;
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: latitude, lng: longitude},
        zoom: 12
    });
}
