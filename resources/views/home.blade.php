<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB GIS</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.8/dist/esri-leaflet.js"
        integrity="sha512-E0DKVahIg0p1UHR2Kf9NX7x7TUewJb30mxkxEm2qOYTVJObgsAGpEol9F6iK6oefCbkJiA4/i6fnTHzM6H1kEA=="
        crossorigin=""></script>

    <!-- Load Esri Leaflet Vector from CDN -->
    <script src="https://unpkg.com/esri-leaflet-vector@3.1.2/dist/esri-leaflet-vector.js"
        integrity="sha512-SnA/TobYvMdLwGPv48bsO+9ROk7kqKu/tI9TelKQsDe+KZL0TUUWml56TZIMGcpHcVctpaU6Mz4bvboUQDuU3w=="
        crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <style>
        #map {
            height: 500px;
        }

    </style>
</head>

<body>
    <div id="map"></div>

</body>
<script>
    var map = L.map('map').setView([-0.025956507397552307, 109.34018363488666], 13);

    // L.esri.basemapLayer('Topographic').addTo(map);

    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);


    // var drinkIcon = L.icon({
    //     iconUrl: 'images/drink.png',
    //     iconSize: [24, 28], // size of the icon
    //     shadowSize: [50, 64], // size of the shadow
    //     iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
    //     shadowAnchor: [4, 62], // the same for the shadow
    //     popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    // });
    // L.marker([-0.025956507397552307, 109.34018363488666], {
    //     icon: drinkIcon
    // }).addTo(map);

    $(document).ready(function() {
        $.getJSON('titik/json', function(data) {
            $.each(data, function(index) {
                var drinkIcon = L.icon({
                    iconUrl: 'images/drink.png',
                    iconSize: [24, 28],
                    shadowSize: [50, 64],
                    iconAnchor: [22, 94],
                    shadowAnchor: [4, 62],
                    popupAnchor: [-3, -76]
                });
                const popupContent = '<h3>' + data[index].Title + '<h3>'
                marker = L.marker([data[index].Latitude, data[index]
                    .Longitude
                ], {
                    icon: drinkIcon
                }).addTo(map).bindPopup(popupContent);

                marker.on('mouseover', function(ev) {
                    const popupLocation = '<p>' + data[index].Latitude + ',' + data[
                        index].Longitude
                    ev.target.bindPopup(popupLocation).openPopup();
                })
                marker.on('click', function(ev) {
                    const popupContent = '<h3>' + data[index].Title + '<h3>'
                    ev.target.bindPopup(popupContent).openPopup();
                })
            });
        });
    });
</script>

</html>
