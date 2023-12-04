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
                        '<form action="" id="form_a">'+
                            '<div class="container">'+
                                    '<div class="row  border border-primary rounded">'+
                                        '<div class="container"><br>'+
                                            '<table class="table table-striped table-bordered">'+
                                                '<thead>'+
                                                    '<tr class="text-center">'+
                                                        '<th>Alamat</th>'+
                                                        '<th>Kode</th>'+
                                                    ' <th>Tahun</th>'+
                                                        '<th>Nama</th>'+
                                                        '<th>Penggunaan</th>'+
                                                ' </tr>'+
                                            ' </thead>'+
                                            ' <tbody>'+
                                                    '<tr>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+
                                                                '<select class="form-control">'+
                                                                    '<option>Muhammad agus syabany</option>'+
                                                                    '<option>Muhammad agus syabany</option>'+
                                                                    '<option>sfasf</option>'+
                                                                '</select>'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+
                                                                '<input type="text" class="form-control">'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+
                                                            '<input type="number" value="2023" class="form-control">'+
                                                            '</div><br>'+
                                                        '</td>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+

                                                                '<select class="form-control">'+
                                                                    '<option>Muhammad agus syabany</option>'+
                                                                    '<option>Muhammad agus syabany</option>'+
                                                                    '<option>sfasf</option>'+
                                                                '</select>'+
                                                            '</div>'+
                                                        '</td>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+
                                                                '<input type="text" class="form-control">'+
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
                                                    '<span class="input-group-text col-sm-3">No Surat</span><input type="text" placeholder="Penunjukan" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" placeholder="Penunjukan" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Luas</span><input type="text" placeholder="Penunjukan" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                     ' </fieldset><br>'+

                                     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                        '<legend class="float-none w-auto px-1 border border-secondary rounded">'+
                                        '<div style="font-size: 15px;"><strong>SURAT SPPT/SPHAT/SPJBT</strong></div>'+
                                        '</legend>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No Surat</span><input type="text" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Luas</span><input type="text" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                     ' </fieldset><br>'+

                                     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                        '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                        '<div style="font-size: 15px;"><strong>GAMBAR SITUASI</strong></div>'+
                                        '</legend>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No Surat</span><input type="text" placeholder="GAMBAR SITUASI" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" placeholder="GAMBAR SITUASI" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="col">'+
                                                '<div class="input-group input-group-sm  mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Luas</span><input type="text" placeholder="GAMBAR SITUASI" class="form-control">'+
                                                '</div>'+
                                            '</div>'+
                                     ' </fieldset><br>'+


                                     '<div class="row  border border-primary rounded">'+

                                            '<div class="col"><br>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Hak</span>'+
                                                    '<select class="form-control">'+
                                                        '<option>sfasf</option>'+
                                                        '<option>sfasf</option>'+
                                                        '<option>sfasf</option>'+
                                                    '</select>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Pemilik Asal</span><input type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Asal</span><input type="number" value="2023" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Nilai perolehan</span>'+
                                                    '<select class="form-control">'+
                                                        '<option>sfasf</option>'+
                                                        '<option>sfasf</option>'+
                                                        '<option>sfasf</option>'+
                                                    '</select>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Nilai saat ini</span><input type="text" class="form-control">'+
                                                '</div>'+
                                            '</div><br>'+

                                            '<div class="col"><br>'+

                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Foto</span><input type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Dokumen</span><input type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Keterangan</span><textarea class="form-control"></textarea>'+
                                                '</div>'+
                                            '</div>'+

                                    '</div><br>'+




                          '</div>'+
                        '</form >');
                        $.get('/aktiva', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#kode_aktiva').append('<option value="' + item.id + '">' + item.kode + ' | ' +  item.aktiva + '</option>');
                            });
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
                                    '<table class="table table-striped" id="tbl_b">'+
                                        '<thead>'+
                                            '<tr>'+
                                                '<th>NO</th>'+
                                                '<th>Kode Departeman</th>'+
                                                '<th>Nama Departemen</th>'+
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
