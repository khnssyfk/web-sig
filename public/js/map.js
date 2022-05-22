
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