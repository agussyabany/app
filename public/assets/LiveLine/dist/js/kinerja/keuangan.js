$(document).ready(function() {

    //REO BUTTON
  $(document).on('click', '#roe', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RETURN ON EQUITY');
    kosong();
    $('#persen').html('X 100%');
    $('#a').html('Laba Setelah Pajak');
    $('#a_nilai').html('73.897.071.387');
    $('#b').html('Jumlah Ekuitas');
    $('#b_nilai').html('577.162.239.562');
    $('#hasil').html('12,8 %');
    $('#nilai').html('5');
    $('#target').html('5')
  })
  //Ratio Operational BUTTON
  $(document).on('click', '#rop', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RATIO OPERATIONAL');
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
  //Ratio Kas Button
  $(document).on('click', '#rok', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RATIO KAS');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Kas + Setara Kas');
    $('#a_nilai').html('132.205.857.557');
    $('#b').html('Hutang Lancar');
    $('#b_nilai').html('40.259.283.931');
    $('#hasil').html('328,39 %');
    $('#nilai').html('5');
    $('#target').html('5')
    
  })
  //Efektifitas Penagihan Button
  $(document).on('click', '#ep', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('EFEKTIFITAS PENAGIHAN');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Jumlah Penerimaan Rekening Air');
    $('#a_nilai').html('354.089.247.034');
    $('#b').html('Jumlah Rekening Air');
    $('#b_nilai').html('408.213.909.865');
    $('#hasil').html('86,74 %');
    $('#nilai').html('4');
    $('#target').html('5')
  })
  //Solavbilitas Button
  $(document).on('click', '#solv', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('SOLVABILITAS');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Total Aktiva');
    $('#a_nilai').html('630.296.415.666');
    $('#b').html('Total Hutang');
    $('#b_nilai').html('53.134.176.104');
    $('#hasil').html('1.186,24 %');
    $('#nilai').html('5');
    $('#target').html('5')
  })


            /* Chart.js Charts */
  // Sales chart
  var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [
      {
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label: 'Electronics',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [65, 59, 80, 81, 56, 55, 40]
      }
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  })

  

})