<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.313/pdf.min.js"></script>
{{-- <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script> --}}
<script src="{{ asset('assets/boots/js/myjs/asetmaster.js')}}"></script>
<script src="{{ asset('assets/boots/js/myjs/asetkib.js') }}"></script>
<script src="{{ asset('assets/boots/js/myjs/funct.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>

<script>
    let map, markers = [];

    /* ----------------------------- Initialize Map ----------------------------- */
    function initMap() {
        map = L.map('map', {
            center: {
                lat: -0.4951403071438513,
                lng: 117.14425132443439
            },
            zoom: 13
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);
    }
    initMap();

    let markersCat1 = [];
    let markersCat2 = [];
    let markersCat3 = [];

    $.get('/marker', function(data) {
    data.forEach(function(markerData) {
        let lat = parseFloat(markerData.lat);
        let long = parseFloat(markerData.long);
        console.log(markerData.cat);

        if (!isNaN(lat) && !isNaN(long)) {
            let iconUrl;
            if (markerData.cat === 2) {
                iconUrl = 'http://127.0.0.1:8000/assets/img/marker/IPA2.png'; // Ganti dengan lokasi file PNG ikon kategori 1 Anda
            }else if (markerData.cat === 4) {
                iconUrl = 'http://127.0.0.1:8000/assets/img/marker/IPA1.png'; // Ganti dengan lokasi file PNG ikon kategori 2 Anda
            }else if (markerData.cat === 3) {
                iconUrl = 'http://127.0.0.1:8000/assets/img/marker/BOOST2.png'; // Ganti dengan lokasi file PNG ikon kategori 2 Anda
            }
            else {
                iconUrl = 'http://127.0.0.1:8000/assets/img/marker/logo.png'; // Ganti dengan lokasi file PNG ikon default jika diperlukan
            }

            let customIcon = L.icon({
                iconUrl: iconUrl,
                iconSize: [32, 32], // Sesuaikan dengan ukuran ikon Anda
                iconAnchor: [16, 32], // Sesuaikan dengan titik anchor ikon Anda
                popupAnchor: [0, -32] // Sesuaikan dengan posisi pop-up ikon Anda
            });

            let popupContent = '<div class="container">' +
                '<div><img src="http://127.0.0.1:8000/assets/img/lokasi/' + markerData.img + '" alt="" width="100px" height="100px">' +
                '<div><h6>' + markerData.lokasi + '</h6></div>' +
                '</div>';

            let newMarker = L.marker([lat, long], { icon: customIcon }).addTo(map).bindPopup(popupContent);

            // Kategorisasi marker
            if (markerData.cat === 2) {
                markersCat1.push(newMarker);
            } else if (markerData.cat === 4) {
                markersCat2.push(newMarker);
            } else if (markerData.cat === 3) {
                markersCat3.push(newMarker);
            }
            // Tambahkan logika kategori lain jika diperlukan

        } else {
            console.error('Invalid latitude or longitude:', markerData.lat, markerData.long);
        }
    });

    let baseMaps = {
        "OpenStreetMap": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        })
        // Tambahkan layer dasar lain jika diperlukan
    };

    let overlayMaps = {
        "IPA": L.layerGroup(markersCat1),
        "BOOSTER": L.layerGroup(markersCat2),
        "INTAKE": L.layerGroup(markersCat3)
        // Tambahkan layer marker untuk kategori lain jika diperlukan
    };

    L.control.layers(baseMaps, overlayMaps).addTo(map);


});
</script>

