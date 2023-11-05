$(document).ready(function() {
    $('#barang').addClass('text-start btn btn-default');
    $('#divisi').addClass('text-start btn btn-default');
    $('#departemen').addClass('text-start btn btn-default');
    $('#ruang').addClass('text-start btn btn-default');
    $('#sdm').addClass('text-start btn btn-default');
    $('#lokasi').addClass('text-start btn btn-default');
    $('#dokumen').addClass('text-start btn btn-default');
    $('#bahan').addClass('text-start btn btn-default');
  

    $('#barang').on('click', function() {
        $('#barang').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" id="tab_barang">' +
                '<a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">BARANG<button type="submit"  id="brg_x" class="" ></button></a>' +
            '</li>'
            );
        });
        $(document).on('click', '#brg_x', function() {
            console.log('hapus');
            // Hapus elemen tab_barang
            $('#tab_barang').remove();
        });

    $('#divisi').on('click', function() {
        $('#divisi').addClass('btn btn-primary');
        $('#barang,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').removeClass('btn btn-primary');
        $('#barang,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').addClass('btn btn-defult');
    });

    $('#departemen').on('click', function() {
        $('#departemen').addClass('btn btn-primary');
        $('#barang,#ruang,#sdm,#lokasi,#dokumen,#bahan,#divisi').removeClass('btn btn-primary');
        $('#barang,#ruang,#sdm,#lokasi,#dokumen,#bahan,#divisi').addClass('btn btn-defult');
        openTab('#tab1');
    });
    $('#ruang').on('click', function() {
        $('#ruang').addClass('btn btn-primary');
        $('#divisi,#departemen,#sdm,#lokasi,#dokumen,#bahan,#barang').removeClass('btn btn-primary');
        $('#divisi,#departemen,#sdm,#lokasi,#dokumen,#bahan,#barang').addClass('btn btn-defult');
    });

    $('#sdm').on('click', function() {
        $('#sdm').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#bahan').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#bahan').addClass('btn btn-defult');
    });

    $('#lokasi').on('click', function() {
        $('#lokasi').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#dokumen,#bahan,#sdm').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#dokumen,#bahan,#sdm').addClass('btn btn-defult');
    });
    $('#dokumen').on('click', function() {
        $('#dokumen').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#bahan,#sdm').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#bahan,#sdm').addClass('btn btn-defult');
    });

    $('#bahan').on('click', function() {
        $('#bahan').addClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#sdm').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#sdm').addClass('btn btn-defult');
    });

   
});