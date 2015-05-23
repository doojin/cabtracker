$(document).ready(function() {
    initialize();
});

function initialize() {

    var mapOptions = {
        center: { lat: 56.8714744, lng: 24.1291625 },
        zoom: 10,

        disableDefaultUI: true,
        styles: [
            {stylers: [
                {hue: "#4E4D78"},
                {saturation: 0},
                {lightness: 10},
                {gamma: 1.51}
            ]}
        ]
    };

    var map = new google.maps.Map(
        document.getElementById('map'),
        mapOptions
    );

    var marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(56.8714744, 24.3291625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
        map: map
    });

    var marker2 = new google.maps.Marker({
        position: new google.maps.LatLng(56.9714744, 24.1291625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
        map: map
    });

    var marker3 = new google.maps.Marker({
        position: new google.maps.LatLng(57, 24.1291625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        map: map
    });

    var marker4 = new google.maps.Marker({
        position: new google.maps.LatLng(56.73, 24.2291625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        map: map
    });

    var marker5 = new google.maps.Marker({
        position: new google.maps.LatLng(56.81, 24.1791625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        map: map
    });

    var infowindow = new google.maps.InfoWindow({
        content: infoWindowContent
    });

    google.maps.event.addListener(marker1, 'click', function() {
        infowindow.open(map, marker1);
    });
    google.maps.event.addListener(marker2, 'click', function() {
        infowindow.open(map, marker2);
    });
    google.maps.event.addListener(marker3, 'click', function() {
        infowindow.open(map, marker3);
    });
    google.maps.event.addListener(marker4, 'click', function() {
        infowindow.open(map, marker4);
    });
    google.maps.event.addListener(marker5, 'click', function() {
        infowindow.open(map, marker5);
    });


}
