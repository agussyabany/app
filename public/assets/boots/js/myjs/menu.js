$(document).ready(function() {
    $('#barang').addClass('text-start btn btn-default');
    $('#divisi').addClass('text-start btn btn-default');
    $('#departemen').addClass('text-start btn btn-default');
    $('#ruang').addClass('text-start btn btn-default');
    $('#sdm').addClass('text-start btn btn-default');
    $('#lokasi').addClass('text-start btn btn-default');
    $('#dokumen').addClass('text-start btn btn-default');
    $('#bahan').addClass('text-start btn btn-default');

    //BARANG
    $('#barang').on('click', function() {
        $('#barang').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_barang" data-bs-toggle="tab" href="#barang_tab" role="tab" aria-controls="tab2" aria-selected="false">BARANG<button type="submit"  id="barang_x" class="" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<br><div class="tab-pane fade" id="barang_tab" role="tabpanel" aria-labelledby="tab_barang">' +
                         '<div class="container"> <div class="card"><div class="card-header">DATA BARANG</div><div class="card-body" id=tbl_barang></div></div>' +
                    '</div>'
                );
            });
        });
        $(document).on('click', '#barang_x', function() {
            $('#tab_barang').parent().remove(); // Hapus tab
            $('#barang_tab').remove(); // Hapus konten tab
        });
        // END OF BARANG

    // DIVISI
    $('#divisi').on('click', function() {
        $('#divisi').addClass('btn btn-primary');
        $('#barang,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').removeClass('btn btn-primary');
        $('#barang,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_div" data-bs-toggle="tab" href="#div_tab" role="tab" aria-controls="tab2" aria-selected="false">SDM<button type="submit"  id="div_x" class="" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="div_tab" role="tabpanel" aria-labelledby="tab_div">' +
                        '<p>DATA SDM PENDUKUNG</p>' +
                    '</div>'
                );
            });
     });
        $(document).on('click', '#div_x', function() {
            $('#tab_div').parent().remove(); // Hapus tab
            $('#div_tab').remove(); // Hapus konten tab
        });
    // END OF DIVISI

    // DEPARTEMEN
    $('#departemen').on('click', function() {
        $('#departemen').addClass('btn btn-primary');
        $('#barang,#ruang,#sdm,#lokasi,#dokumen,#bahan,#divisi').removeClass('btn btn-primary');
        $('#barang,#ruang,#sdm,#lokasi,#dokumen,#bahan,#divisi').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_dep" data-bs-toggle="tab" href="#dep_tab" role="tab" aria-controls="tab2" aria-selected="false">DEPARTEMEN<button type="submit"  id="dep_x" class="" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="dep_tab" role="tabpanel" aria-labelledby="tab_dep">' +
                        '<p>DATA DEPARTEMEN</p>' +
                    '</div>'
                );
            });
        });

            //del
            $(document).on('click', '#dep_x', function() {
                $('#tab_dep').parent().remove();
                $('#dep_tab').remove();
            });
        // END OF DEPARTEMEN

    //RUANGAN
    $('#ruang').on('click', function() {
        $('#ruang').addClass('btn btn-primary');
        $('#divisi,#departemen,#sdm,#lokasi,#dokumen,#bahan,#barang').removeClass('btn btn-primary');
        $('#divisi,#departemen,#sdm,#lokasi,#dokumen,#bahan,#barang').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_ruang" data-bs-toggle="tab" href="#ruang_tab" role="tab" aria-controls="tab2" aria-selected="false">RUANGAN<button type="submit"  id="ruang_x" class="" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="ruang_tab" role="tabpanel" aria-labelledby="tab_ruang">' +
                        '<p>DATA RUANGAN</p>' +
                    '</div>'
                );
            });
     });
        $(document).on('click', '#ruang_x', function() {
            $('#tab_ruang').parent().remove(); // Hapus tab
            $('#ruang_tab').remove(); // Hapus konten tab
        });
       //END OF RUANGAN

    //SDM
    $('#sdm').on('click', function() {
        $('#sdm').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#bahan').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#bahan').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_sdm" data-bs-toggle="tab" href="#sdm_tab" role="tab" aria-controls="tab2" aria-selected="false">SDM<button type="submit"  id="sdm_x" class="" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="sdm_tab" role="tabpanel" aria-labelledby="tab_sdm">' +
                        '<p>DATA SDM PENDUKUNG</p>' +
                    '</div>'
                );
            });
     });
        $(document).on('click', '#sdm_x', function() {
            $('#tab_sdm').parent().remove(); // Hapus tab
            $('#sdm_tab').remove(); // Hapus konten tab
        });
    //END OF SDM

    //LOKASI
    $('#lokasi').on('click', function() {
        $('#lokasi').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#dokumen,#bahan,#sdm').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#dokumen,#bahan,#sdm').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_lokasi" data-bs-toggle="tab" href="#lokasi_tab" role="tab" aria-controls="tab2" aria-selected="false">LOKASI<button type="submit"  id="lokasi_x" class="" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="lokasi_tab" role="tabpanel" aria-labelledby="tab_lokasi">' +
                        '<p>DATA LOKASI</p>' +
                    '</div>'
                );
            });
     });
        $(document).on('click', '#lokasi_x', function() {
            $('#tab_lokasi').parent().remove(); // Hapus tab
            $('#lokasi_tab').remove(); // Hapus konten tab
        });
    //END OF LOKASI

    //DOKUMEN
    $('#dokumen').on('click', function() {
        $('#dokumen').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#bahan,#sdm').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#bahan,#sdm').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_dok" data-bs-toggle="tab" href="#dok_tab" role="tab" aria-controls="tab2" aria-selected="false">DOKUMEN<button type="submit"  id="dok_x" class="" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="dok_tab" role="tabpanel" aria-labelledby="tab_dok">' +
                        '<div class="container"> <div class="card"><div class="card-header">DATA BARANG</div> </div>' +
                    '</div>'
                );
            });
     });
    $(document).on('click', '#dok_x', function() {
            $('#tab_dok').parent().remove(); // Hapus tab
            $('#dok_tab').remove(); // Hapus konten tab
        });
    //END OF DOK


    //BAHAN
    $('#bahan').on('click', function() {
        $('#bahan').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#sdm').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#sdm').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_bahan" data-bs-toggle="tab" href="#bahan_tab" role="tab" aria-controls="tab2" aria-selected="false">BAHAN<button type="submit"  id="bahan_x" class="" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="bahan_tab" role="tabpanel" aria-labelledby="tab_bahan">' +
                        '<p>DATA BAHAN</p>' +
                    '</div>'
                );
            });
     });
        $(document).on('click', '#bahan_x', function() {
            $('#tab_bahan').parent().remove(); // Hapus tab
            $('#bahan_tab').remove(); // Hapus konten tab
        });;
    //END OF BAHAN


});
