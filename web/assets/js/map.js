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

    new google.maps.Marker({
        position: new google.maps.LatLng(56.8714744, 24.3291625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
        map: map
    });

    new google.maps.Marker({
        position: new google.maps.LatLng(56.9714744, 24.1291625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
        map: map
    });

    new google.maps.Marker({
        position: new google.maps.LatLng(57, 24.1291625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        map: map
    });

    new google.maps.Marker({
        position: new google.maps.LatLng(56.73, 24.2291625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        map: map
    });

    new google.maps.Marker({
        position: new google.maps.LatLng(56.81, 24.1791625),
        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        map: map
    });
}
