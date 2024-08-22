<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/LiveLine/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/LiveLine/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/Liveline/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/Liveline/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/LiveLine/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('assets/LiveLine/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/LiveLine/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/LiveLine/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/LiveLine/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets/LiveLine/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('asssts/LiveLine/dist/js/pages/dashboard2.js')}}"></script>
<script>
  $(function(){

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }
    
    $(document).ready(function() {
      //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
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

//TABEL

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
                        alert('Data gagal diambil');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan saat mengambil data');
                }
            });

            //BAR
            $.ajax({
              url: '/bar',
              method: 'GET',
              success: function(data) {
                  var labels = ['UNIT I', 'UNIT II', 'UNIT III', 'UNIT IV'];
                  var counts = [];

                  $.each(labels, function(index, unit) {
                      counts.push(data[unit]);
                  });

                  var barChartData = {
                      labels: labels,
                      datasets: [{
                          label: 'Jumlah Sambungan',
                          backgroundColor: [
                              'rgba(255, 99, 132, 0.8)',  // Warna untuk UNIT I
                              'rgba(54, 162, 235, 0.8)',  // Warna untuk UNIT II
                              'rgba(255, 206, 86, 0.8)',  // Warna untuk UNIT III
                              'rgba(75, 192, 192, 0.8)'   // Warna untuk UNIT IV
                          ],
                          borderColor: [
                              'rgba(255, 99, 132, 1)',
                              'rgba(54, 162, 235, 1)',
                              'rgba(255, 206, 86, 1)',
                              'rgba(75, 192, 192, 1)'
                          ],
                          borderWidth: 1,
                          data: counts
                      }]
                  };

                  var barChartOptions = {
                  responsive: true,
                  maintainAspectRatio: false,
                  scales: {
                      x: {
                          ticks: {
                              color: '#ffffff' // Mengubah warna label x-axis menjadi putih
                          }
                      },
                      y: {
                          min: 0, // Memastikan y-axis mulai dari 0
                          ticks: {
                              color: '#ffffff' // Mengubah warna label y-axis menjadi putih
                          }
                      }
                  },
                  plugins: {
                      legend: {
                          labels: {
                              color: 'white' // Mengubah warna label legend menjadi putih
                          }
                      }
                  },
                  datasetFill: false
              };;

                  var barChartCanvas = $('#barChartUnit').get(0).getContext('2d');
                  new Chart(barChartCanvas, {
                      type: 'bar',
                      data: barChartData,
                      options: barChartOptions
                  });
              },
              error: function() {
                  alert('Terjadi kesalahan saat mengambil data.');
              }
          });

        //TABEL

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
            $('#unitII').text(formatNumber(data['UNIT II'] + 51513));      // Format menjadi dengan pemisah ribuan
            $('#unitIII').text(formatNumber(data['UNIT III'] + 55297));    // Format menjadi dengan pemisah ribuan
            $('#unitIV').text(formatNumber(data['UNIT IV'] + 32267));      // Format menjadi dengan pemisah ribuan
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
    function refreshPage() {
        location.reload(); // Menyegarkan halaman
    }

    // Setel interval untuk menyegarkan halaman setiap 5 menit (300000 milidetik)
    setTimeout(refreshPage, 300000);


        
});


   

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })

  })
</script>