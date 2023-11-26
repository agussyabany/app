$(document).ready(function() {
    
    
    




    //TANAH

    //Klik menu TANAH Sidebar
    $('#a').on('click', function() {
        //membuat tombol menu SideBar menjadi selected
        $('#a').addClass('btn btn-primary');
        //Dan Tombol lain menjadi notSelected
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');

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
                                                '<th>Golongan</th>'+
                                                '<th>Nama Barang</th>'+
                                                '<th>Kode Barang</th>'+
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


        //Tutup Tab Content
        $(document).on('click', '#a_x', function() {
            $('#tab_a').parent().remove(); // Hapus tab
            $('#a_tab').remove(); // Hapus konten tab
        });

        // END OF TANAH

        // PERALATAN DAN MESIN
    $('#b').on('click', function() {
        $('#b').addClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
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
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#d,#e,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#d,#e,#f,#kir').addClass('btn btn-defult');
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
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#c,#e,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#c,#e,#f,#kir').addClass('btn btn-defult');
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
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#c,#d,#f,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#c,#d,#f,#kir').addClass('btn btn-defult');
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
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#c,#d,#e,#kir').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#c,#d,#e,#kir').addClass('btn btn-defult');
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
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#c,#d,#e,#f').removeClass('btn btn-primary');
        $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#a,#b,#c,#d,#e,#f').addClass('btn btn-defult');
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


    



});
