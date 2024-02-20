        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        {{-- <script>window.jQuery || document.write('<script src="{{ asset('assets/landingpage/js/vendor/jquery-1.12.0.min.js')}}"><\/script>')</script> --}}
		<!-- Bootstarp Min js file -->
        <script src="{{ asset('assets/landingpage/js/bootstrap.min.js')}}"></script>
		<!-- Paralux -->
		<script src="{{ asset('assets/landingpage/js/simpleparallax.js')}}"></script>
		<!-- My Custom slider js -->
		<script type='text/javascript' src='{{ asset("assets/landingpage/js/jquery.easing.1.3.js")}}'></script>
		<script type='text/javascript' src="{{ asset('assets/landingpage/js/camera.min.js')}}"></script>
		<!-- Counter Up js -->
		<script src="{{ asset('assets/landingpage/js/waypoints.min.js')}}"></script>
		<script src="{{ asset('assets/landingpage/js/jquery.countup.js')}}"></script>
		<!-- FancyBox Js -->
        <script src="{{ asset('assets/landingpage/js/jquery.fancybox.js')}}"></script>
		<!-- swiper -->
        <script src="{{ asset('assets/landingpage/js/swiper.min.js')}}"></script>
		<!--for skill chat jquary-->
		<script src="{{ asset('assets/landingpage/js/jquery.easypiechart.js')}}"></script>
		<!-- google map js -->
		{{-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="{{ asset('assets/landingpage/js/gmap3.min.js')}}"></script> --}}
		<!-- Flex Slider js -->
		<script src="{{ asset('assets/landingpage/js/jquery.flexslider.js')}}"></script>
		<!-- Filtering js -->
		<script src="{{ asset('assets/landingpage/js/jquery.nstSlider.min.js')}}"></script>
		<!-- Smoth scroll js -->
		<script src="{{ asset('assets/landingpage/js/jQuery.scrollSpeed.js')}}"></script>
		<!-- All Plugin Active code Here -->
        <script src="{{ asset('assets/landingpage/js/plugins.js')}}"></script>
		<!-- Main js code here -->
        <script src="{{ asset('assets/landingpage/js/main.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>

        <script>
            // Make a GET request to the Laravel backend endpoint using jQuery
                    $.get('/nilai.dashboard', function(response) {
                    const { sum8085, sum8590, sum9095, sum9520, sum200205,sum205210,sum210215,sum215220,sum220223 } = response;
                    const data = [sum8085, sum8590, sum9095, sum9520, sum200205,sum205210,sum210215,sum215220,sum220223 ];
                    const ctx = document.getElementById('myChart').getContext('2d');

                    console.log(response);

                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["1980-1985", "1985-1990", "1990-1995", "1995-2000", "2000-2005", "2005-2010","2010-2015","2015-2020","2020-2023"],
                            datasets: [{
                                label: 'Total Values',
                                data: data,
                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.5)',
                                                    'rgba(54, 162, 235, 0.5)',
                                                    'rgba(255, 206, 86, 0.5)',
                                                    'rgba(75, 192, 192, 0.5)',
                                                    'rgba(153, 102, 255, 0.5)',
                                                    'rgba(255, 159, 64,0.5)',
                                                    'rgba(255, 159, 64,0.5)',
                                                    'rgba(255, 159, 64,0.5)',
                                                    'rgba(255, 159, 64,0.5)'
                                                ],
                                    borderColor: [
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,

                                }
                            }
                        }
                    });
                })
            .fail(function(error) {
                // Handle errors if any
                console.error('Error fetching data:', error);
            });

            $.get('/jumlah.dashboard', function(response) {
                const { totalA, totalB, totalC, totalD, totalE } = response;
                const data = [totalA, totalB, totalC, totalD, totalE];
                const ctx = document.getElementById('myChart2').getContext('2d');
                //console.log(response)
                const myChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["TANAH", "MESIN", "GEDUNG", "PIPA", "DLL", "KONSTRUKSI"],
				datasets: [{
					label: '# of Votes',
					data: data,
					backgroundColor: [
					'rgba(255, 99, 132, 0.5)',
					'rgba(54, 162, 235, 0.5)',
					'rgba(255, 206, 86, 0.5)',
					'rgba(75, 192, 192, 0.5)',
					'rgba(153, 102, 255, 0.5)',
					'rgba(255, 159, 64,0.5)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});

    })
</script>
<script>
let map, markers = [];

/* ----------------------------- Initialize Map ----------------------------- */
function initMap() {
    map = L.map('map', {
        center: {
            lat: -0.5096839,
            lng: 117.0107155
        },
        zoom: 11
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);
}
initMap();

$.get('/marker', function (data) {
    data.forEach(function (markerData) {

        let lat = parseFloat(markerData.lat);
        let long = parseFloat(markerData.long);
        var lokasi = markerData.lokasi;

        if (!isNaN(lat) && !isNaN(long)) {
            let popupContent = '<div class="container">'+
                                    '<div class="row">'+
                                            '<div class="col">'+
                                                '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/' + markerData.img + '" alt="" widht="100px" height="100px">'+
                                            '</div>'+
                                    '<div><h6><a href="#" type="button" id="lok" data-id=' + lat +','+ long +',' + lokasi + '>' + lokasi + '</h6></a></div>'+
                                '</div>';

            let newMarker = L.marker([lat, long]).addTo(map).bindPopup(popupContent);
            markers.push(newMarker);
        } else {
            console.error('Invalid latitude or longitude:', markerData.lat, markerData.long);
        }
    });
});


</script>
<script>
    $(document).on('click', '#lok', function(){
        var id = $(this).data('id');
        var delimiter = ",";
        var id_key = id.split(delimiter);
        var lat = id_key[0];
        var long = id_key[1];
        var lokasi = id_key[2];
        event.preventDefault();
        $('#modalLok').modal('show');
        $('#judul_modalLG').html('DETAIL LOKASI');
        $('#modal_bodyLG').html('<a href="http://maps.google.com/maps?q=&layer=c&cbll=' + lat + ',' + long + '&cbp=11,0,0,0,0" target="_blank"><b>' + lokasi + ' </b> </a>');

    })
</script>
