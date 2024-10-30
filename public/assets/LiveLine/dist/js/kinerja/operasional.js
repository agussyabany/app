$(document).ready(function() {
    //Rasio Produksi
  $(document).on('click', '#rasioProd', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('RASIO PRODUKSI');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Volume Produksi Riil');
    $('#a_nilai').html('100.083.675');
    $('#b').html('Jumlah Kapasitas Terpasang');
    $('#b_nilai').html('106.749.360');
    $('#hasil').html('93,76%');
    $('#nilai').html('5');
    $('#target').html('5')
  })

  //Kehilangan Air
  $(document).on('click', '#nrw', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('KEHILANGAN AIR');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Air Disistribusikan - Air Terjual');
    $('#a_nilai').html('35.385.634');
    $('#b').html('Jumlah Air Didistribusikan');
    $('#b_nilai').html('89.495.486');
    $('#hasil').html('39,54%');
    $('#nilai').html('2');
    $('#target').html('5')
  })

  //Jam Operasi Layanan
  $(document).on('click', '#jam', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('JAM OPERASI LAYANAN');
    kosong();
    $('#persen').html('/');
    $('#a').html('Jumlah Waktu Pelayanan/Distribusi Air ke Pelanggan dalam Setahun');
    $('#a_nilai').html('8.585');
    $('#b').html('Jumlah Hari');
    $('#b_nilai').html('365');
    $('#hasil').html('23,53');
    $('#nilai').html('5');
    $('#target').html('5')
  })

  //Tekanan Air Pada SL
  $(document).on('click', '#tekanan', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('TEKANAN AIR PADA SR');
    kosong();
    $('#persen').html('x 100%');
    $('#a').html('Jumlah Pelanggan yang Dilayanai dengan Tekanan > 0,7 Bar');
    $('#a_nilai').html('166.089');
    $('#b').html('Jumlah Pelanggan Aktiv');
    $('#b_nilai').html('173.100');
    $('#hasil').html('95,95%');
    $('#nilai').html('5');
    $('#target').html('5')
  })

  //Kalibrasi
  $(document).on('click', '#kalibrasi', function() {
    $('#modal-lg').modal('show');
    $('#judul').empty();
    $('#judul').html('PENGGANTIAN / KALIBRASI METER AIR');
    kosong();
    $('#persen').html('X 100 %');
    $('#a').html('Jml Meter yg diganti/kalibrasi dalam setahun');
    $('#a_nilai').html('8.695');
    $('#b').html('Jumlah Pelanggan Aktif');
    $('#b_nilai').html('173.100');
    $('#hasil').html('5,2 %');
    $('#nilai').html('2');
    $('#target').html('5')
  })


})