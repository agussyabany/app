$(document).ready(function() {

    //TANAH

    //Klik menu TANAH Sidebar
    $('#a').on('click', function() {
        //membuat tombol menu SideBar menjadi selected
        $('#a').addClass('btn btn-primary');
        //Dan Tombol lain menjadi notSelected
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');

        //Menampilkan Header Tab BARANG
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link border" id="tab_a" data-bs-toggle="tab" href="#a_tab" role="tab" aria-controls="tab2" aria-selected="false">TANAH &nbsp;<button style="border:none;background-color: white;color: grey;" type="submit"  id="a_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
           //Menampilkan Konten berupa HEAD tabel pada body TAB
            $(document).ready(function() {
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="a_tab" role="tabpanel" aria-labelledby="tab_a">' +
                    '<br>' +
                    '<div class="tab-pane show" id="a_tab" role="tabpanel" aria-labelledby="tab_a">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA TANAH <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_a"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body">'+
                                    '<table class="table table-striped" id="tbl_a">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>NO</th>'+
                                                '<th>Nama Aset</th>'+
                                                '<th>Penggunaan</th>'+
                                                '<th>Alamat</th>'+
                                                '<th>No Dokumen</th>'+
                                                '<th>Foto</th>'+
                                                '<th><i class="fa-regular fa-cog"></i></th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>'+
                        '</div>' +
                    '</div>'
                );
                refA();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    //Klik pada tombol tambah bahan, maka menampilkan modal TAMBAH DATA BAHAN
                $('#tambah_a').on('click', function() {
                    $('#lgModal').modal('show');
                    $('#judul_modalLG').html('TAMBAH KIB A -  TANAH');
                    $('#modal_bodyLG').html('');
                    $('#modal_bodyLG').prepend(
                        '<form action="" id="form_a" enctype="multipart/form-data">'+
                            '<div class="container">'+
                                    '<div class="row  border border-primary rounded">'+
                                        '<div class="container"><br>'+
                                            '<table class="table table-striped table-bordered rounded">'+
                                                '<thead>'+
                                                    '<tr class="text-center">'+
                                                        '<th>Alamat</th>'+
                                                        '<th>Kode</th>'+
                                                        ' <th>Tahun</th>'+
                                                        '<th>Nama</th>'+
                                                        '<th>Penggunaan</th>'+
                                                      '</tr>'+
                                                '</thead>'+
                                            ' <tbody>'+
                                                    '<tr>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+
                                                                '<select class="select2 form-control" name="lokasi" id="lokasi_a">'+
                                                                    '<option>- PILIH LOKASI -</option>'+


                                                                '</select>'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+
                                                                '<input name="kode" id="kode" type="text" class="form-control">'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+
                                                                '<input type="number" name="tahun" id="tahun" value="2023" class="form-control">'+
                                                            '</div><br>'+
                                                        '</td>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+

                                                                '<select class="select2 form-control" style"width:100%;"  id="nama" name="nama">'+
                                                                    '<option> -NAMA BARANG- </option>'+

                                                                '</select>'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+
                                                                '<input type="text" nama="guna" id="guna" class="form-control">'+
                                                            '</div>'+
                                                        '</td>'+
                                                ' </tr>'+
                                                '<tbody/>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div><br>'+





                                    '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                        '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                            '<div style="font-size: 15px;"><strong>PENUNJUKAN</strong></div>'+
                                        '</legend>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No Surat</span><input nama="no_tunjuk" id="no_tunjuk" type="text" placeholder="Penunjukan" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" placeholder="Penunjukan" nama="tgl_tunjuk" id="tgl_tunjuk" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Luas</span><input type="text" nama="luas_tunjuk" placeholder="Penunjukan" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                     ' </fieldset><br>'+

                                     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                        '<legend class="float-none w-auto px-1 border border-secondary rounded">'+
                                        '<div style="font-size: 15px;"><strong>SURAT SPPT/SPHAT/SPJBT</strong></div>'+
                                        '</legend>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No Surat</span><input type="text" nama="sertifikat" id="sertifikat" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_sertifikat" id="tgl_sertifikat" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_sertifikat" id="luas_sertifikat" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                     ' </fieldset><br>'+

                                     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                        '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                        '<div style="font-size: 15px;"><strong>GAMBAR SITUASI</strong></div>'+
                                        '</legend>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No Surat</span><input type="text" name="no_gambar" id="no_gambar" placeholder="GAMBAR SITUASI" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_gambar" id="tgl_gambar" placeholder="GAMBAR SITUASI" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm  mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_gambar" id="luas_gambar" placeholder="GAMBAR SITUASI" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                     ' </fieldset><br>'+


                                     '<div class="row  border border-primary rounded">'+

                                            '<div class="col"><br>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    // '<span class="input-group-text col-sm-3">Hak</span>'+
                                                    '<select name="hak" id="hak" class="select2 form-control">'+
                                                        '<option>-HAK-</option>'+
                                                        '<option>SHM</option>'+
                                                        '<option>Tanah Milik Perumdam</option>'+
                                                        '<option>Tanah Milik Negara</option>'+
                                                        '<option>Tanah Milik Pemda</option>'+
                                                        '<option>Hibah</option>'+
                                                        '<option>SPHAT</option>'+
                                                        '<option>Hak Pakai</option>'+
                                                        '<option>HGB</option>'+
                                                        '<option>SPPT</option>'+
                                                    '</select>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Pemilik Asal</span><input name="asal" id="asal" type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Asal</span><input type="number" name="pemilik" id="pemilik" value="2023" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    // '<span class="input-group-text col-sm-3">Nilai perolehan</span>'+
                                                    '<select class="select2 form-control" name="nilai_a" id="nilai_a">'+
                                                        '<option> -PILH NILAI AKTIVA- </option>'+
                                                    '</select>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Nilai saat ini</span><input name="nilai_now" id="nilai_now" type="text" class="form-control">'+
                                                '</div>'+
                                            '</div><br>'+

                                            '<div class="col"><br>'+

                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>'+
                                                '</div>'+
                                            '</div>'+

                                    '</div><br>'+

                             '</div>'+
                        '</form >');

                        $('.select2').select2({
                            dropdownParent: $('#lgModal')
                        });

                        $.get('/lok', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#lokasi_a').append('<option value="' + item.id + '">' + item.alamat + ' | ' +  item.lokasi + '</option>');
                            });
                        });
                        $.get('/barang.tanah', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#nama').append('<option value="' + item.id + '"> ' +  item.nama_barang + '</option>');
                            });
                        });

                        $.get('/nilai', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#nilai_a').append('<option value="' + item.id + '"> ' +  item.kode + ' | ' + item.nilai + ' </option>');
                            });
                        });

                    });
                    //Memberikan atribut id pada tombol submit modal
                 $('.tombol').attr('id', 'submit_a');

                 $(document).on('click', '#submit_a', function (event) {
                    event.preventDefault();
                    var fileInput = $('#dok')[0].files;
                    console.log(fileInput);
                        if (!fileInput || fileInput.length === 0) {
                            alert('Please select at least one file.');
                            return;
                        }

                        for (var i = 0; i < fileInput.length; i++) {
                            var currentFile = fileInput[i];
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var arrayBuffer = e.target.result;
                                // Send the data to the server
                                sendDataToServer(arrayBuffer);
                            };
                             // Read the file as an ArrayBuffer
                            reader.readAsArrayBuffer(currentFile);
                        }
                        function sendDataToServer(arrayBuffer) {
                            // Additional form data
                            var additionalData = 
                                {
                                    lokasi: $('#lokasi_a').val(),
                                    kode: $('#kode').val(),
                                    lokasi: $('#lokasi_a').val(),
                                    kode: $('#kode').val(),
                                    tahun: $('#tahun').val(),
                                    nama: $('#nama').val(),
                                    guna: $('#guna').val(),
                                    no_tunjuk: $('#no_tunjuk').val(),
                                    tgl_tunjuk: $('#tgl_tunjuk').val(),
                                    luas_tunjuk: $('#luas_tunjuk').val(),
                                    sertifikat: $('#sertifikat').val(),
                                    tgl_sertifikat: $('#tgl_sertifikat').val(),
                                    luas_sertifikat: $('#luas_sertifikat').val(),
                                    no_gambar: $('#no_gambar').val(),
                                    tgl_gambar: $('#tgl_gambar').val(),
                                    luas_gambar: $('#luas_gambar').val(),
                                    hak: $('#hak').val(),
                                    asal: $('#asal').val(),
                                    pemilik: $('#pemilik').val(),
                                    nilai_a: $('#nilai_a').val(),
                                    nilai_now: $('#nilai_now').val(),
                                    ket: $('#ket').val(),
                                    dok: arrayBuffer,
                                };
                        
                            // Assuming you are using AJAX to send data to the server
                            $.ajax({
                                url: '/tanah.save', // Replace with your actual server endpoint
                                type: 'POST',
                                data: additionalData,
                                success: function (response) {
                                    console.log('Data sent successfully:', response);
                                },
                                error: function (error) {
                                    console.error('Error sending data:', error);
                                }
                            });
                        }

                });
                //Modal DETAIL show
             $('#tbl_a').on('click', '.detail', function() {
                var id = $(this).data('id');
                
                $.ajax({
                    type: "GET",
                    url: "/tanah.detail/"+ id,
                    success: function (data) {
                        $.each(data.data, function (index, item) {
                        $('#lgModal').modal('show');
                        $('#judul_modalLG').html('DETAIL KIB A TANAH '+item.lokasi );
                        $('#modal_bodyLG').html('');
                        $('#modal_bodyLG').prepend(
                            '<div class="container">'+
                                '<img src="http://127.0.0.1:8000/assets/img/lokasi/'+item.img+'" height="500px" width="500px" class="rounded mx-auto d-block" alt="..."><br>'+

                                '<div class="row">'+
                                    '<div class="col">'+
                                        '<div class="container border border-primary rounded"><br>'+
                                            '<table class="table table-striped table-bordered">'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<th>Letak</th>'+
                                                        '<td>' + item.alamat+ '</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>Nama Barang</th>'+
                                                        '<td>' + item.nama_barang+ '</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>Penggunaan</th>'+
                                                        '<td>' + item.guna+ '</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+

                                    '<div class="col">'+
                                        '<div class="container border border-primary rounded"><br>'+
                                            '<table class="table table-striped table-bordered">'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<th>Asal Usul</th>'+
                                                        '<td>' + item.asal+ '</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>Tahun Pengadan</th>'+
                                                        '<td>' + item.tahun+ '</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>-</th>'+
                                                        '<td>' + item.guna+ '</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+
                                
                                '</div><br>'+

                                '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                        '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                            '<div style="font-size: 15px;"><strong>PENUNJUKAN</strong></div>'+
                                        '</legend>'+
                                            '<div class="col">'+
                                            '<table class="table table-striped table-bordered">'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<th>Nomor Surat</th>'+
                                                        '<td>' + item.no_tunjuk+ '</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<table class="table table-striped table-bordered">'+
                                                    '<tbody>'+
                                                        '<tr>'+
                                                            '<th>Tanggal</th>'+
                                                            '<td>' + item.tgl_tunjuk+ '</td>'+
                                                        '</tr>'+
                                                    '</tbody>'+
                                                '</table>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<table class="table table-striped table-bordered">'+
                                                    '<tbody>'+
                                                        '<tr>'+
                                                            '<th>Luas</th>'+
                                                            '<td>' + item.luas_tunjuk+ '</td>'+
                                                        '</tr>'+
                                                    '</tbody>'+
                                                '</table>'+
                                            '</div>'+
                                     ' </fieldset><br>'+

                                     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                        '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                            '<div style="font-size: 15px;"><strong>SPPT/SPHAT/SPJBT</strong></div>'+
                                        '</legend>'+
                                            '<div class="col">'+
                                            '<table class="table table-striped table-bordered">'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<th>Nomor Surat</th>'+
                                                        '<td>' + item.sertifikat+ '</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<table class="table table-striped table-bordered">'+
                                                    '<tbody>'+
                                                        '<tr>'+
                                                            '<th>Tanggal</th>'+
                                                            '<td>' + item.tgl_sertifikat+ '</td>'+
                                                        '</tr>'+
                                                    '</tbody>'+
                                                '</table>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<table class="table table-striped table-bordered">'+
                                                    '<tbody>'+
                                                        '<tr>'+
                                                            '<th>Luas</th>'+
                                                            '<td>' + item.luas_sertifikat+ '</td>'+
                                                        '</tr>'+
                                                    '</tbody>'+
                                                '</table>'+
                                            '</div>'+
                                     ' </fieldset><br>'+

                                     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                        '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                            '<div style="font-size: 15px;"><strong>GAMBAR SITUASI</strong></div>'+
                                        '</legend>'+
                                            '<div class="col">'+
                                            '<table class="table table-striped table-bordered">'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<th>Nomor Surat</th>'+
                                                        '<td>' + item.no_gambar+ '</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<table class="table table-striped table-bordered">'+
                                                    '<tbody>'+
                                                        '<tr>'+
                                                            '<th>Tanggal</th>'+
                                                            '<td>' + item.tgl_gambar+ '</td>'+
                                                        '</tr>'+
                                                    '</tbody>'+
                                                '</table>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<table class="table table-striped table-bordered">'+
                                                    '<tbody>'+
                                                        '<tr>'+
                                                            '<th>Luas</th>'+
                                                            '<td>' + item.luas_gambar+ '</td>'+
                                                        '</tr>'+
                                                    '</tbody>'+
                                                '</table>'+
                                            '</div>'+
                                     ' </fieldset><br>'+

                                     '<div class="row">'+
                                    '<div class="col">'+
                                        '<div class="container border border-primary rounded"><br>'+
                                            '<table class="table table-striped table-bordered">'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<th>Hak</th>'+
                                                        '<td>' + item.hak+ '</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>Asal Usul</th>'+
                                                        '<td>' + item.asal+ '</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>Pemilik Asal</th>'+
                                                        '<td>' + item.pemilik+ '</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+

                                    '<div class="col">'+
                                        '<div class="container border border-primary rounded"><br>'+
                                            '<table class="table table-striped table-bordered">'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<th>Nilai Perolehan</th>'+
                                                        '<td>' + item.nilai+ '</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>Nilai Perolehan Saat Ini</th>'+
                                                        '<td>' + item.nilai_now+ '</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<th>Keterangan</th>'+
                                                        '<td>' + item.ket+ '</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+
                                
                                '</div><br>'+

                                '<fieldset class="border border-secondary rounded-3 p-2 row" id="filed">'+
                                        '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                            '<div style="font-size: 15px;"><strong>DOKUMEN</strong></div>'+
                                        '</legend>'+
                                            
                                     '</fieldset><br>'+


                            '</div>');
                            $.get('/show/' + id, function (data) {
                                $.each(data.data, function (index, items) {
                                    $('#filed').append('<embed width="100px" height="200px" name="plugin" src="http://127.0.0.1:8000/assets/img/lokasi/'+item.img+'"" type="application/pdf">');
                                });
                            });
                            

                        })
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
            //Modal EDIT show
            $('#tbl_a').on('click', '.edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/tanah.detail/" + id,
                    success: function (data) {
                        $.each(data.data, function (index, item) {
                        $('#lgModal').modal('show');
                        $('#judul_modalLG').html('EDIT KIB A TANAH '+item.lokasi );
                        $('#modal_bodyLG').html('');
                        $('.tombol').attr('id', 'edit_submit');
                        $('#modal_bodyLG').prepend(
                            '<form action="" id="form_a" enctype="multipart/form-data">'+
                                '<div class="container">'+
                                        '<div class="row  border border-primary rounded">'+
                                            '<div class="container"><br>'+
                                                '<table class="table table-striped table-bordered rounded">'+
                                                    '<thead>'+
                                                        '<tr class="text-center">'+
                                                            '<th>Alamat</th>'+
                                                            '<th>Kode</th>'+
                                                            ' <th>Tahun</th>'+
                                                            '<th>Nama</th>'+
                                                            '<th>Penggunaan</th>'+
                                                          '</tr>'+
                                                    '</thead>'+
                                                ' <tbody>'+
                                                        '<tr>'+
                                                            '<td>'+
                                                                '<div class="input-group input-group-sm mb-1">'+
                                                                    '<select class="select2 form-control" name="lokasi" id="lokasi_a">'+
                                                                        '<option value="'+ item.id_lokasi +'">'+ item.lokasi +'</option>'+
                                                                    '</select>'+
                                                                '</div>'+
                                                            '</td>'+
                                                            '<td>'+
                                                                '<div class="input-group input-group-sm mb-1">'+
                                                                    '<input name="kode" value="'+ item.kode_barang +'" id="kode" type="text" class="form-control">'+
                                                                '</div>'+
                                                            '</td>'+
                                                            '<td>'+
                                                                '<div class="input-group input-group-sm mb-1">'+
                                                                    '<input type="number" name="tahun" value="'+ item.tahun +'" id="tahun" value="2023" class="form-control">'+
                                                                '</div><br>'+
                                                            '</td>'+
                                                            '<td>'+
                                                                '<div class="input-group input-group-sm mb-1">'+
    
                                                                    '<select class="select2 form-control" style"width:100%;"  id="nama" name="nama">'+
                                                                        '<option "'+ item.id_barang +'">'+ item.nama_barang +'</option>'+
    
                                                                    '</select>'+
                                                                '</div>'+
                                                            '</td>'+
                                                            '<td>'+
                                                                '<div class="input-group input-group-sm mb-1">'+
                                                                    '<input type="text" nama="guna" value="'+ item.guna +'" id="guna" class="form-control">'+
                                                                '</div>'+
                                                            '</td>'+
                                                    ' </tr>'+
                                                    '<tbody/>'+
                                                '</table>'+
                                            '</div>'+
                                        '</div><br>'+
    
    
    
    
    
                                        '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                            '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                                '<div style="font-size: 15px;"><strong>PENUNJUKAN</strong></div>'+
                                            '</legend>'+
                                                '<div class="col">'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">No Surat</span><input nama="no_tunjuk" id="no_tunjuk" value="'+ item.no_tunjuk +'" type="text" placeholder="Penunjukan" class="form-control">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col">'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" placeholder="Penunjukan" value="'+ item.tgl_tunjuk +'" nama="tgl_tunjuk" id="tgl_tunjuk" class="form-control">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col">'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Luas</span><input type="text" nama="luas_tunjuk" placeholder="Penunjukan" value="'+ item.luas_tunjuk +'" class="form-control">'+
                                                    '</div>'+
                                                '</div>'+
                                         ' </fieldset><br>'+
    
                                         '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                            '<legend class="float-none w-auto px-1 border border-secondary rounded">'+
                                            '<div style="font-size: 15px;"><strong>SURAT SPPT/SPHAT/SPJBT</strong></div>'+
                                            '</legend>'+
                                                '<div class="col">'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">No Surat</span><input type="text" nama="sertifikat" id="sertifikat" value="'+ item.sertifikat +'" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col">'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_sertifikat" id="tgl_sertifikat" value="'+ item.tgl_sertifikat +'" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col">'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_sertifikat" id="luas_sertifikat" value="'+ item.luas_sertifikat +'" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
                                                    '</div>'+
                                                '</div>'+
                                         ' </fieldset><br>'+
    
                                         '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                            '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                            '<div style="font-size: 15px;"><strong>GAMBAR SITUASI</strong></div>'+
                                            '</legend>'+
                                                '<div class="col">'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">No Surat</span><input type="text" name="no_gambar" id="no_gambar" placeholder="GAMBAR SITUASI" value="'+ item.no_gambar +'" class="form-control">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col">'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_gambar" id="tgl_gambar" value="'+ item.tgl_gambar +'" placeholder="GAMBAR SITUASI" class="form-control">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col">'+
                                                    '<div class="input-group input-group-sm  mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_gambar" id="luas_gambar" placeholder="GAMBAR SITUASI" value="'+ item.luas_gambar +'" class="form-control">'+
                                                    '</div>'+
                                                '</div>'+
                                         ' </fieldset><br>'+
    
    
                                         '<div class="row  border border-primary rounded">'+
    
                                                '<div class="col"><br>'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        // '<span class="input-group-text col-sm-3">Hak</span>'+
                                                        '<select name="hak" id="hak" class="select2 form-control">'+
                                                            '<option value="'+ item.hak +'">'+item.hak+'</option>'+
                                                            '<option>SHM</option>'+
                                                            '<option>Tanah Milik Perumdam</option>'+
                                                            '<option>Tanah Milik Negara</option>'+
                                                            '<option>Tanah Milik Pemda</option>'+
                                                            '<option>Hibah</option>'+
                                                            '<option>SPHAT</option>'+
                                                            '<option>Hak Pakai</option>'+
                                                            '<option>HGB</option>'+
                                                            '<option>SPPT</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Pemilik Asal</span><input name="asal" value="'+ item.pemilik +'" id="asal" type="text" class="form-control">'+
                                                    '</div>'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Asal</span><input value="'+ item.asal +'" type="number" name="pemilik" id="pemilik" value="2023" class="form-control">'+
                                                    '</div>'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        // '<span class="input-group-text col-sm-3">Nilai perolehan</span>'+
                                                        '<select class="select2 form-control" name="nilai_a" id="nilai_a">'+
                                                            '<option> -PILH NILAI AKTIVA- </option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Nilai saat ini</span><input name="nilai_now" id="nilai_now" value="'+ item.nilai_now +'" type="text" class="form-control">'+
                                                    '</div>'+
                                                '</div><br>'+
    
                                                '<div class="col"><br>'+
    
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>'+
                                                    '</div>'+
                                                    '<div class="input-group input-group-sm mb-1">'+
                                                        '<span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control">'+item.ket+'</textarea>'+
                                                    '</div>'+
                                                '</div>'+
    
                                        '</div><br>'+
    
                                 '</div>'+
                            '</form >');
                        

                        })
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });




            
            });
    });


        //Tutup Tab Content
        $(document).on('click', '#a_x', function() {
            $('#tab_a').parent().remove(); // Hapus tab
            $('#a_tab').remove(); // Hapus konten tab
        });

        // END OF TANAH

        // PERALATAN DAN MESIN
    $('#b').on('click', function() {
        $('#b').addClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_b" data-bs-toggle="tab" href="#b_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB-B &nbsp;<button style="border:none;background-color: white; type="submit"  id="b_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            //Menampilkan Konten berupa HEAD tabel pada body TAB
            $(document).ready(function() {
                $('#myTabContent').append(

                    '<br>' +
                    '<div class="tab-pane show" id="b_tab" role="tabpanel" aria-labelledby="tab_b">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA PERALATAN DAN MESIN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_b"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body" >'+

                                    '<table class="table table-striped table-border" id="tbl_b">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>NO</th>'+
                                                '<th>Lokasi</th>'+
                                                '<th>Alamat</th>'+
                                                '<th>Foto</th>'+
                                                '<th>Aksi</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                    '<tbody>'+
                                '</tbody>'+
                            '</table>'+
                        '</div>'+
                    '</div>'+
                '</div>' +
            '</div>'+

                '<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">'+
                    '<div class="offcanvas-header">'+
                        '<h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>'+
                        '<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>'+
                    '</div>'+
                    '<div class="offcanvas-body">'+
                    '<div class="container border border-primary rounded" style="width=100%"><br>'+
                        '<ol class="tree" id="canvas_body"></ol>'+
                    '</div>'+
                    '</div>'+
                '</div>'
                );
                refB();
                //Canvas  Mesin show
                $('#tbl_b').on('click', '.tree', function() {
                var id = $(this).data('id');
                $('#canvas_body').html('');
                $.ajax({
                    type: "GET",
                    url: "/mesin.group/"+ id,
                    success: function (data) {
                        $.each(data.data, function (index, item) {
                            
                            $('#canvas_body').append(
                                '<li><span class="border border-primary">' + item.kode_dep +  '</span>'+
                                        '<ol id="mesin_div'+ item.id_departemen +'"></ol>'+
                                    '</li>');
                            var dep = item.id_departemen;
                            $.get("/mesin.div/"+ dep, function(data) {
                                var i = 0;
                                $.each(data.data, function(index, item) {
                                    $("#mesin_div" + item.id_departemen).append('<li><span>'+ item.nama_div +'</span></li>')
                                });
                            })
                        })
                            


                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
                
            });

            })
             

        });

            //del
            $(document).on('click', '#b_x', function() {
                $('#tab_b').parent().remove();
                $('#b_tab').remove();
            });
        // END OF PERALATAN DAN MESIN

    // GEDUNG DAN BANGUNAN
    $('#c').on('click', function() {
        $('#c').addClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#d,#e,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#d,#e,#f,#kir').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_c" data-bs-toggle="tab" href="#c_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB-C &nbsp;<button style="border:none;background-color: white; type="submit"  id="c_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(

                    '<div class="tab-pane show" id="c_tab" role="tabpanel" aria-labelledby="tab_c">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA GEDUNG DAN BANGUNAN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_c"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body">'+
                                    '<table class="table table-striped" id="tbl_c">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>NO</th>'+
                                                '<th>Kode Divisi</th>'+
                                                '<th>Nama Divisi</th>'+
                                                '<th>Aksi</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>'+
                        '</div>' +
                    '</div>'
                );



            });
     });
        $(document).on('click', '#c_x', function() {
            $('#tab_c').parent().remove(); // Hapus tab
            $('#c_tab').remove(); // Hapus konten tab-+
        });
    // END OF GEDUNG DAN BANGUNAN



    //JALAN IRIGASI DAN JARINGAN D
    $('#d').on('click', function() {
        $('#d').addClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#e,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#e,#f,#kir').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_d" data-bs-toggle="tab" href="#d_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB-D &nbsp;<button style="border:none;background-color: white; type="submit"  id="d_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<br>'+
                    '<div class="tab-pane show" id="d_tab" role="tabpanel" aria-labelledby="tab_d">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA JALAN , IRIGASI DAN JARINGAN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_ruang"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body">'+
                                    '<table class="table table-striped" id="tbl_d">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>NO</th>'+
                                                '<th>Kode Ruangan</th>'+
                                                '<th>Nama Ruangan</th>'+
                                                '<th>Aksi</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>'+
                        '</div>' +
                    '</div>'
                );

        });
     });
        $(document).on('click', '#d_x', function() {
            $('#tab_d').parent().remove(); // Hapus tab
            $('#d_tab').remove(); // Hapus konten tab
        });
       //END OF JALAN,IRIGASI DAN JARINGAN

    //ASET TETAP LAINNYA E
    $('#e').on('click', function() {
        $('#e').addClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#f,#kir').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_e" data-bs-toggle="tab" href="#e_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB-E &nbsp;<button style="border:none;background-color: white; type="submit"  id="e_x" class="fa-regular fa-circle-xmark"></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<br>'+
                    '<div class="tab-pane show" id="e_tab" role="tabpanel" aria-labelledby="tab_e">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA ASET TETAP LAINNYA <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_e"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body">'+
                                    '<table class="table table-striped" id="tbl_e">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>NO</th>'+
                                                '<th>Nama</th>'+
                                                '<th>Nip</th>'+
                                                '<th>Jabatan</th>'+
                                                '<th>Divisi/Departemen</th>'+
                                                '<th>-</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>'+
                        '</div>' +
                    '</div>'
                );

        });
     });
        $(document).on('click', '#e_x', function() {
            $('#tab_e').parent().remove(); // Hapus tab
            $('#e_tab').remove(); // Hapus konten tab
        });
    //END OF SDM

    //KONSTRUKSI
    $('#f').on('click', function() {
        $('#f').addClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#kir').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_f" data-bs-toggle="tab" href="#f_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB F &nbsp;<button style="border:none;background-color: white; type="submit"  id="f_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<br>'+
                    '<div class="tab-pane show" id="f_tab" role="tabpanel" aria-labelledby="tab_f">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA KONSTRUKSI <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_f"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body">'+
                                    '<table class="table table-striped" id="tbl_f">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>NO</th>'+
                                                '<th>Lokasi</th>'+
                                                '<th>Alamat</th>'+
                                                '<th>Latitude</th>'+
                                                '<th>Longitude</th>'+
                                                '<th>Gambar</th>'+
                                                '<th>-</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>'+
                        '</div>' +
                    '</div>'
                );

        });
     });
        $(document).on('click', '#f_x', function() {
            $('#tab_f').parent().remove(); // Hapus tab
            $('#f_tab').remove(); // Hapus konten tab
        });
    //END OF LOKASI

    //KIR
    $('#kir').on('click', function() {
        $('#kir').addClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_kir" data-bs-toggle="tab" href="#kir_tab" role="tab" aria-controls="tab2" aria-selected="false">K.I.R &nbsp;<button style="border:none;background-color: white; type="submit"  id="kir_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="kir_tab" role="tabpanel" aria-labelledby=tab_kir">' +
                        '<div class="container"> <div class="card"><div class="card-header">DATA KARTU INVENTARIS RUANGAN</div> </div>' +
                    '</div>'
                );
            });
     });
    $(document).on('click', '#kir_x', function() {
            $('#tab_kir').parent().remove(); // Hapus tab
            $('#kir_tab').remove(); // Hapus konten tab
        });
    //END OF DOK

    //KIR
    $('#nilai').on('click', function() {
        $('#nilai').addClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#a,#b,#c,#d,#e,#f').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#a,#b,#c,#d,#e,#f').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_nilai" data-bs-toggle="tab" href="#nilai_tab" role="tab" aria-controls="tab2" aria-selected="false">NILAI ASET &nbsp;<button style="border:none;background-color: white; type="submit"  id="nilai_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
        // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<br>'+
                    '<div class="tab-pane show" id="nilai_tab" role="tabpanel" aria-labelledby="tab_nilai">'+
                     '<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA NILAI AKTIVA <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_nilai"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body">'+
                                    '<table class="table table-striped" id="tbl_nilai">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>NO</th>'+
                                                '<th>No Voucher</th>'+
                                                '<th>Tgl Voucher</th>'+
                                                '<th>Aktiva</th>'+
                                                '<th>KIB</th>'+
                                                '<th>Nilai</th>'+
                                                '<th>Uraian</th>'+
                                                '<th>Aksi</th>'+
                                            '</tr>'+
                                        '</thead>'+
                                        '<tbody>'+
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>'+
                        '</div>' +
                    '</div>'
                );
                refNil();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                //Klik pada tombol tambah bahan, maka menampilkan modal TAMBAH DATA BAHAN
                $('#tambah_nilai').on('click', function() {
                    $('#myModal').modal('show');
                    $('#judul_modal').html('TAMBAH NILAI');
                    $('#modal_body').html('');
                    $('#modal_body').prepend(
                        '<form action="" id="form_nilai">'+
                            '<input type="text" class="form-control" id="no" name="no" placeholder="Nomer Voucher"><br>' +
                            '<input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tgl Voucher"><br>' +
                            '<input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun"><br>' +
                            '<select class="form-control" id="kode_aktiva" name="kode_aktiva">'+
                            '</select><br>'+
                            '<input type="number" class="form-control" name="nilai">'+
                            '<textarea name="urai" class="form-control">Uraian</textarea>' +
                        '</form >');
                        $.get('/aktiva', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#kode_aktiva').append('<option value="' + item.id + '">' + item.kode + ' | ' +  item.aktiva + '</option>');
                            });
                        });

                    });
                //Memberikan atribut id pada tombol submit modal
                 $('.tombol').attr('id', 'submit_nilai');
                //Klik Untuk menyimpan data sdm ke database
                  $(document).on('click', '#submit_nilai', function (event) {
                    event.preventDefault();
                    $.ajax({
                        data: $('#form_nilai').serialize(),
                        url: "/nilai.save",
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            $('#modal_body').html('');
                            $('#myModal').modal('hide');
                            alert('Data berhasil Disimpan')
                            refNil();
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            alert('Failed to submit the form');
                        },
                      });
                  });
                    //Modal EDIT show
                    $('#tbl_nilai').on('click', '.edit', function() {
                        var id = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            url: "/nilai.edit/"+ id,
                            success: function (data) {
                                $.each(data.data, function (index, item) {
                                $('#myModal').modal('show');
                                $('#judul_modal').html('UPDATE NILAI');
                                $('#modal_body').html('');
                                $('.tombol').attr('id', 'edit_submit');
                                $('#modal_body').prepend(
                                    '<form action="" id="edit_nilai_submit">' +
                                        '<input type="hidden" name="id" value = "' + item.idn + '">' +
                                        '<input type="text" class="form-control" id="no" name="no" value="' + item.no_voucher + '" placeholder="Nomer Voucher"><br>' +
                                        '<input type="date" class="form-control" id="tgl" name="tgl" value="' + item.tgl_voucher +  '" placeholder="Tgl Voucher"><br>' +
                                        '<input type="number" class="form-control" id="tahun" name="tahun" value="' + item.tahun +  '" placeholder="Tahun"><br>' +
                                        '<select class="form-control" id="kode_aktiva" name="kode_aktiva">'+
                                        '<option value="' + item.idA + '">' + item.kode + ' | ' +  item.aktiva + '</option>'+
                                        '</select><br>'+
                                        '<input type="number" class="form-control" name="nilai" value="' + item.nilai +  '"><br>'+
                                        '<textarea name="urai" class="form-control">' + item.urai +  '</textarea>' +
                                    '</form>');
                                    $.get('/aktiva', function (data) {
                                        $.each(data.data, function (index, item) {
                                            $('#kode_aktiva').append('<option value="' + item.id + '">' + item.kode + ' | ' +  item.aktiva + '</option>');
                                        });
                                    });

                                })

                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    });
                        //Klik Untuk update data NILAI ke database
                        $(document).on('click', '#edit_submit', function (event) {
                            event.preventDefault();
                            $.ajax({
                                data: $('#edit_nilai_submit').serialize(),
                                url: "/nilai.update",
                                type: "POST",
                                dataType: 'json',
                                success: function (data) {
                                    alert('Data berhasil diUpdate')
                                    $('#modal_body').html('');
                                    $('#myModal').modal('hide');
                                    refNil();
                                },
                                error: function (xhr, textStatus, errorThrown) {
                                    alert('Failed to submit the form');
                                },

                            });
                        });
                        //Hapus Data
                        $('#tbl_nilai').on('click', '.delete', function() {
                            var id = $(this).data('id');
                            var del = confirm("Anda yakin menghapus data ini ?");
                            if (del) {
                                $.ajax({
                                    url: "/nilai.hapus/" + id,
                                    type: "POST",
                                    dataType: 'json',
                                        success: function (data) {
                                        alert('Data berhasil Dihapus')
                                        refNil();
                                    },
                                    error: function (xhr, textStatus, errorThrown) {
                                        alert('Data gagal dihapus');
                                    },
                                });
                            }
                        })
                    });
            });
    $(document).on('click', '#nilai_x', function() {
            $('#tab_nilai').parent().remove(); // Hapus tab
            $('#nilai_tab').remove(); // Hapus konten tab
        });
    //END OF DOK
});
