$(document).ready(function() {
  $(function () {
  
    
          //SDM
          //pelanggan
          var donutPelangganCanvas = $('#pelanggan').get(0).getContext('2d');
          var valuePelanggan = 3.89; // The value you want to show (e.g., 50%)
          var remainingPelanggan = 100 - valuePelanggan; // The remaining percentage to make it 100%
  
          var pelangganData = {
            labels: ['Completed', 'Remaining'],
            datasets: [{
              data: [valuePelanggan, remainingPelanggan], // Your value and the remaining percentage
              backgroundColor: ['#f1c40f', '#d2d6de'], // Color for the value and the remaining part
            }]
          };
  
          var pelangganOptions = {
            maintainAspectRatio: false,
            responsive: true,
            cutout: '70%', // This will make it look like a donut (inner circle cutout)
            plugins: {
              tooltip: {
                callbacks: {
                  label: function(tooltipItem) {
                    return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                  }
                }
              }
            }
          };
  
          // Create doughnut chart
          new Chart(donutPelangganCanvas, {
            type: 'doughnut',
            data: pelangganData,
            options: pelangganOptions
          });
  
          //pegawai
          var donutPegawaiCanvas = $('#pegawai').get(0).getContext('2d');
          var valuePegawai = 88.67; // The value you want to show (e.g., 50%)
          var remainingPegawai = 100 - valuePegawai; // The remaining percentage to make it 100%
  
          var pegawaiData = {
            labels: ['Completed', 'Remaining'],
            datasets: [{
              data: [valuePegawai, remainingPegawai], // Your value and the remaining percentage
              backgroundColor: ['#3498db', '#d2d6de'], // Color for the value and the remaining part
            }]
          };
  
          var pegawaiOptions = {
            maintainAspectRatio: false,
            responsive: true,
            cutout: '70%', // This will make it look like a donut (inner circle cutout)
            plugins: {
              tooltip: {
                callbacks: {
                  label: function(tooltipItem) {
                    return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                  }
                }
              }
            }
          };
  
          // Create doughnut chart
          new Chart(donutPegawaiCanvas, {
            type: 'doughnut',
            data: pegawaiData,
            options: pegawaiOptions
          });
  
           //diklat
          var donutDiklatCanvas = $('#diklat').get(0).getContext('2d');
          var valueDiklat = 2.90; // The value you want to show (e.g., 50%)
          var remainingDiklat = 100 - valueDiklat; // The remaining percentage to make it 100%
  
          var diklatData = {
            labels: ['Completed', 'Remaining'],
            datasets: [{
              data: [valueDiklat, remainingDiklat], // Your value and the remaining percentage
              backgroundColor: ['#28a745', '#d2d6de'], // Color for the value and the remaining part
            }]
          };
  
          var diklatOptions = {
            maintainAspectRatio: false,
            responsive: true,
            cutout: '70%', // This will make it look like a donut (inner circle cutout)
            plugins: {
              tooltip: {
                callbacks: {
                  label: function(tooltipItem) {
                    return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                  }
                }
              }
            }
          };
  
          // Create doughnut chart
          new Chart(donutDiklatCanvas, {
            type: 'doughnut',
            data: diklatData,
            options: diklatOptions
          });
  
          $('#modal-lg').on('shown.bs.modal', function () {
  
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
    
   
     
  
  
   })
  })
   