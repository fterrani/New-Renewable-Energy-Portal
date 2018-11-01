var map;
var markers = [];

function initMap() {
    var tp = {lat: 46.283600, lng: 7.539214};
    map = new google.maps.Map(document.getElementById('map'), {
        center: tp,
        zoom: 10,
        mapTypeId: 'roadmap',
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
    });
    infoWindow = new google.maps.InfoWindow();

    var marker = new google.maps.Marker({
        position: tp,
        map: map,
    });
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

$(document).ready(function(){
    initMap();
});