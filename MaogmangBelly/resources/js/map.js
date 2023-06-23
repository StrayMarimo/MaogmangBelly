window.onload = function () {
    let mapContainer = document.getElementById('mapView');
    if (mapContainer != null) {
        let map = L.map('map').setView([13.6303, 123.1851], 18);
        let popup = L.popup();
        let marker = L.marker();

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 15,
            attribution:
                '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        }).addTo(map);

        function onMapClick(e) {
            marker.setLatLng(e.latlng).addTo(map);

            console.log(e);
            fetch(
                `https://nominatim.openstreetmap.org/reverse?lat=${e.latlng.lat}&lon=${e.latlng.lng}&format=json`,
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                }
            )
                .then((res) => res.json())
                .then((res) => {
                    $('#address').val(res.display_name);
                });
        }
        map.on('click', onMapClick);
    }
};
