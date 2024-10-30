$(document).ready(function() {

    //Cakupan Layanan
    $(document).on('click', '#cakup', function() {
        $('#modal-lg').modal('show');
        $('#judul').empty();
        $('#judul').html('CAKUPAN PELAYANAN TEKNIS');
        kosong();
        $('#persen').html('X 100 %');
        $('#a').html('Jumlah Penduduk Terlayani');
        $('#a_nilai').html('679.057');
        $('#b').html('Jumlah penduduk wilayah pelayanan');
        $('#b_nilai').html('850.629');
        $('#hasil').html('79,83 %');
        $('#nilai').html('4');
        $('#target').html('5')
      })
      //Aduan
      $(document).on('click', '#aduan', function() {
        $('#modal-lg').modal('show');
        $('#judul').empty();
        $('#judul').html('PENEYELESAIAN PENGADUAN');
        kosong();
        $('#persen').html('X 100 %');
        $('#a').html('Pengaduan Selesai Ditangani');
        $('#a_nilai').html('10.653');
        $('#b').html('Jumlah Pengaduan');
        $('#b_nilai').html('10.653');
        $('#hasil').html('100 %');
        $('#nilai').html('5');
        $('#target').html('5')
      })
      //Konsumsi Air Domestik
      $(document).on('click', '#dom', function() {
        $('#modal-lg').modal('show');
        $('#judul').empty();
        $('#judul').html('KONSUMSI AIR DOMESTIK');
        kosong();
        $('#persen').html('X 100 %');
        $('#a').html('Jml air yg terjual pada pel.domestik');
        $('#a_nilai').html('51.734.497');
        $('#b').html('Jumlah Pelanggan Domestik');
        $('#b_nilai').html('168.787');
        $('#hasil').html('25,54');
        $('#nilai').html('4');
        $('#target').html('5')
      })

//Kulaitas Air Pelnggan
  $(document).on('click', '#kualitas', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('KUALIATAS AIR PELANGGAN');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Jml Uji Kualitas Yg Memenuhi Syarat ');
    $('#a_nilai').html('188');
    $('#b').html('Jumlah Titik yg Diuji atau Titik Minimal');
    $('#b_nilai').html('1.914');
    $('#hasil').html('9,82 %');
    $('#nilai').html('1');
    $('#target').html('5')
  })
})

//Pertumbuhan Pelanggan
$(document).on('click', '#pertumbuhan', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('PERTUMBUHAN PELANGGAN');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Jumlah Pelanggan Tahun ini - Jumlah Pelanggan Tahun Lalu');
    $('#a_nilai').html('9.721');
    $('#b').html('Jumlah Pelanggan Tahun Lalu');
    $('#b_nilai').html('163.933');
    $('#hasil').html('5,93%');
    $('#nilai').html('2');
    $('#target').html('5')
  })