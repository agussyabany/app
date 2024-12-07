<div class="modal fade" id="modal-lg" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-center" id="judul">Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="body">
        <div class="card">
            <div class="card-body box-profile">

                  <div class="row">
                    <div class="col">
                      <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
                        
                        <tr>
                            <td id="a"><h2>NAMA OBJECT 1</h2></td>
                            <td id="a_nilai" style="text-align: right; text-size-adjust: 10px;"><h2>1000.000</h2></td>
                            <td rowspan="2" class="text-center mt-2" id="persen" style="width: 100%; text-align: center;"></td>
                        </tr>
                        <tr>
                            <td id="b"><h2>NAMA OBJECT 2</h2></td>
                            <td id="b_nilai" style="text-align: right;"><h2>2000.000</h2></td>
                        </tr>
                     </table>

                    </div>
                    <div class="col">
                      <table class="table table-striped text-center">
                        <thead>
                          <tr>
                            <th><h4>HASIL</h4></th>
                            <th><h4>NILAI</h4></th>
                            <th><h4>TARGET</h4></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td id="hasil"><h4>2,90 %</h4></td>
                            <td id="nilai"><h4>5</h4></td>
                            <td id="target"><h4>2</h4></td>
                          </tr>
                          
                        </tbody>
                      </table>
                      
                    </div>
                  </div><br>

                  <canvas id="chartKinerja" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 443px;" width="443" height="250" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>
</div>


<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/LiveLine/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/LiveLine/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/LiveLine/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/LiveLine/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/LiveLine/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('assets/LiveLine/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/LiveLine/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/LiveLine/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/LiveLine/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/LiveLine/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets/LiveLine/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('assets/LiveLine/dist/js/pages/dashboard2.js')}}"></script> -->
<script src="{{ asset('assets/LiveLine/dist/js/rapat.js')}}"></script>
<script src="{{ asset('assets/LiveLine/dist/js/kinerja/fungsi.js')}}"></script>
<script src="{{ asset('assets/LiveLine/dist/js/kinerja/kinerja.js')}}"></script>
<script src="{{ asset('assets/LiveLine/dist/js/kinerja/home.js')}}"></script>
<script src="{{ asset('assets/LiveLine/dist/js/kinerja/keuangan.js')}}"></script>
<script src="{{ asset('assets/LiveLine/dist/js/kinerja/operasional.js')}}"></script>
<script src="{{ asset('assets/LiveLine/dist/js/kinerja/pelayanan.js')}}"></script>
<script src="{{ asset('assets/LiveLine/dist/js/kinerja/sdm.js')}}"></script>
<script>
    $(document).ready(function() {

        $(document).on('click', '#laba', function() {
            $('#modal-laba').modal('show');
            $('#judulLaba').empty();
            $('#judulLaba').html('LABA');
            kosong();
            $('#persen').html('/');
            $('#a').html('Biaya Operasi');
            $('#a_nilai').html('354.746.734.631');
            $('#b').html('Pendapatan Operasi');
            $('#b_nilai').html('467.368.442.487');
            $('#hasil').html('0,76');
            $('#nilai').html('3');
            $('#target').html('5')
        })
       
            if (on === 1) {$('#1').addClass('nav-link active hoverable'); $('#nav_kinerja').addClass('nav-item menu-open');}
            if (on === 2) {$('#2').addClass('nav-link active hoverable');}
            if (on === 3) {$('#3').addClass('nav-link active hoverable');}
            if (on === 4) {$('#4').addClass('nav-link active hoverable');}
            if (on === 5) {$('#5').addClass('nav-link active hoverable');}
            if (on === 6) {$('#6').addClass('nav-link active hoverable');}

            if (on === 7) {$('#7').addClass('nav-link active hoverable');}
            if (on === 8) {$('#8').addClass('nav-link active hoverable');}
            if (on === 9) {$('#9').addClass('nav-link active hoverable');}
            if (on === 10) {$('#10').addClass('nav-link active hoverable');}
            if (on === 11) {$('#11').addClass('nav-link active hoverable');}
            if (on === 12) {$('#12').addClass('nav-link active hoverable');}

            if (on === 13) {$('#13').addClass('nav-link active hoverable');$('#nav_adminKinerja').addClass('nav-item menu-open');}
            if (on === 14) {$('#14').addClass('nav-link active hoverable');}
            if (on === 15) {$('#15').addClass('nav-link active hoverable');}
            if (on === 16) {$('#16').addClass('nav-link active hoverable');}
            if (on === 17) {$('#17').addClass('nav-link active hoverable');}
            if (on === 18) {$('#18').addClass('nav-link active hoverable');}
        });
</script>
<script>
     $(document).ready(function() {
        $('#tbl').DataTable({
            dom: 'Bfrtip',
            buttons: [
            'excel'
            ]
        });

     })
</script>
<script>
  $(function(){

    
    $(document).ready(function() {

       
    //DONUT SL BERDASAR GOLONGAN TANUN 2024
    $.ajax({
    url: '/donut',
    method: 'GET',
    success: function(response) {
        if (response.status === 'true') {
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
            var donutData = {
                labels: [
                    'SS',
                    'D1',
                    'D2',
                    'D3',
                    'D4',
                    'P1',
                    'P2',
                    'P3',
                    'P4'
                ],
                datasets: [{
                    data: response.data,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#8e44ad', '#e74c3c', '#2ecc71']
                }]
            };
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'white', // Ubah ini dengan warna yang Anda inginkan untuk label
                        fontSize: 14 // Ubah ukuran font jika diperlukan
                    }
                }
            };
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            });
        }
    }
});
//DONUT JUMLAH PELANGGAN BERDASARKAN WILAYAH TAHUN 2024
$.ajax({
    url: '/donut.duo',
    method: 'GET',
    success: function(response) {
        if (response.status === true) {
            var donutChartCanvas = $('#DonutPlgn').get(0).getContext('2d');
            var donutData = {
                labels: [
                    'UNIT I',
                    'UNIT II',
                    'UNIT III',
                    'UNIT IV'
                ],
                datasets: [{
                    data: response.data,
                    backgroundColor: ['#17a2b8', '#dc3545', '#28a745', '#ffc107']
                }]
            };
           
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'white', // Ubah ini dengan warna yang Anda inginkan untuk label
                        fontSize: 14 // Ubah ukuran font jika diperlukan
                    }
                }
            };
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            });
        } else {
            console.log('Data tidak tersedia atau error dalam pengambilan data.');
        }
    },
    error: function(xhr, status, error) {
        console.log('Error: ' + error);
    }
});

//TABEL SL BERASDASARKAN GOLONGAN

$.ajax({
                url: '/donut',
                method: 'GET',
                success: function(response) {
                    if (response.status === 'true') {
                        let data = response.data;
                        let tableBody = $('#data-table tbody');
                        tableBody.empty(); // Kosongkan tabel sebelum menambahkan data baru

                        // Daftar label yang diharapkan
                        const labels = ['SOSIAL', 'DASAR 1', 'DASAR 2', 'DASAR 3', 'DASAR 4', 'PENUH 1', 'PENUH 2', 'PENUH 3', 'PENUH 4'];

                        labels.forEach((label, index) => {
                            let row = $('<tr>');
                            row.append($('<td>').text(label));
                            row.append($('<td>').text(data[index]));
                            tableBody.append(row);
                        });
                    } else {
                        console.log('Data Gagal Diambil')
                    }
                },
                error: function() {
                    console.log('Terjadi kesalahan saat mengambil data');
                }
            });

            //PIECHART SL BERDASAR WILAYAH
                $.ajax({
        url: '/bar',
        method: 'GET',
        success: function(data) {
            var labels = ['UNIT I', 'UNIT II', 'UNIT III', 'UNIT IV'];
            var counts = [];

            $.each(labels, function(index, unit) {
                counts.push(data[unit]);
            });

            var pieChartData = {
                labels: labels,
                datasets: [{
                    label: '-',
                    backgroundColor: [
                        '#17a2b8',  // Warna untuk UNIT I
                        '#dc3545',  // Warna untuk UNIT II
                        '#28a745',  // Warna untuk UNIT III
                        '#ffc107'   // Warna untuk UNIT IV
                    ],
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 2,
                    data: counts
                }]
            };

            var pieChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: 'white' // Mengubah warna label legend menjadi putih
                        }
                    }
                }
            };

            var pieChartCanvas = $('#barChartUnit').get(0).getContext('2d');
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieChartData,
                options: pieChartOptions
            });
        },
        error: function() {
            console.log('Terjadi kesalahan saat mengambil data.');
        }
    });

//END OF BAR

        //TABEL SL BERDASARKAN WILAYAH

        $.ajax({
            url: '/bar',
            type: 'GET',
            success: function(data) {
                var tableBody = $('#unitTable tbody');
                tableBody.empty(); // Kosongkan tabel sebelum mengisi ulang

                $.each(data, function(unit, count) {
                    tableBody.append('<tr><td>' + unit + '</td><td>' + count + '</td></tr>');
                });
            },
            error: function(xhr, status, error) {
                console.error(error); // Log error jika ada
            }
        });
//KLIK NAVBAR KEUANGAN
        $('#keuangan').click(function(){
            $.ajax({
                url: '/nilai', // Ubah ini sesuai dengan route ke controller Anda
                method: 'GET',
                success: function(data) {
                    // Format nilai total_rppiutang ke dalam format uang
                    var formattedRppiutang = parseInt(data.total_rppiutang).toLocaleString('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    });

                    // Tampilkan nilai yang sudah diformat
                    $('#pBody').text(formattedRppiutang);
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });


    function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

    $.ajax({
        url: '/bar', // Ubah ini sesuai dengan route ke controller Anda
        method: 'GET',
        success: function(data) {
            // Mengupdate nilai di setiap info-box berdasarkan unit menggunakan id
            $('#unitI').text(formatNumber(data['UNIT I'] + 38226)); // Format menjadi dengan pemisah ribuan
            $('#unitII').text(formatNumber(data['UNIT II'] + 51513));// Format menjadi dengan pemisah ribuan
            $('#unitIII').text(formatNumber(data['UNIT III'] + 55297));// Format menjadi dengan pemisah ribuan
            $('#unitIV').text(formatNumber(data['UNIT IV'] + 32267));// Format menjadi dengan pemisah ribuan
        },
        error: function(error) {
            console.log('Error:', error);
        }
    });


    function updateClock() {
        // Mendapatkan waktu saat ini
        var now = new Date();

        // Mendapatkan jam, menit, dan detik
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Menambahkan angka nol di depan angka satuan (0-9)
        if (hours < 10) hours = '0' + hours;
        if (minutes < 10) minutes = '0' + minutes;
        if (seconds < 10) seconds = '0' + seconds;

        // Format jam digital
        var timeString = hours + ':' + minutes + ':' + seconds;

        // Menampilkan jam di elemen dengan id "digitalClock"
        $('#digitalClock').text(timeString);
    }

    // Memanggil fungsi updateClock setiap detik
    setInterval(updateClock, 1000);

    // Memanggil fungsi updateClock pertama kali untuk menampilkan jam saat halaman dimuat
    updateClock();


    // Fungsi untuk menyegarkan halaman
    

   

    $.ajax({
    url: '/donut.duo',
    method: 'GET',
    success: function(response) {
        if (response.status === true) {
            var donutChartCanvas = $('#MyDonutChart').get(0).getContext('2d');
            //console.log($('#MyDonutChart').get(0)); 
            var donutData = {
                labels: [
                    'UNIT I',
                    'UNIT II',
                    'UNIT III',
                    'UNIT IV'
                ],
                datasets: [{
                    data: response.data,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef']
                }]
            };
           
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: true,
                    labels: {
                        fontColor: 'white', // Ubah ini dengan warna yang Anda inginkan untuk label
                        fontSize: 14 // Ubah ukuran font jika diperlukan
                    }
                }
            };
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            });
        } else {
            console.log('Data tidak tersedia atau error dalam pengambilan data.');
        }
    },
    error: function(xhr, status, error) {
        console.log('Error: ' + error);
    }
});

    // Fungsi untuk memformat angka dengan pemisah ribuan
    function formatNumber(number) {
        return number.toLocaleString();
    }
});



//$('#modal-lg').on('shown.bs.modal', function () {
  
  

//})
})
</script>