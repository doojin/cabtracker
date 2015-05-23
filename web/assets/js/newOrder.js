$(document).ready(function() {

    var mapOptions = {
        center: { lat: 56.9714744, lng: 24.1291625 },
        zoom: 9,

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

    var input = document.getElementById('address');

    var map = new google.maps.Map(
        document.getElementById('map'),
        mapOptions
    );

    var marker = new google.maps.Marker({
        map: map,
        icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
    });

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        map.setZoom(14);
        map.setCenter(place.geometry.location);
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    });
});