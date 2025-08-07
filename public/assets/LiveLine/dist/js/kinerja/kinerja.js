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
  
          
  
  
          })
    
   
     
  
  
   })
  })
   