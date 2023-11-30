
function refbrg()
{
    $.get('/barang', function(data) {
        var i = 0;
        var table = $("#tbl_barang").DataTable();
        table.clear().draw();
        $('#modal_body').html('');
        $.each(data.data, function(index, item) {
            var editButton = '<a class="btn btn-sm btn-warning edit-btn" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete-btn" data-id="' + item.id + '" href="#"><i class="fa-solid fa-trash"></i></a>';
            // if (item.golongan == '1') {var golongan = 'TANAH';}
            // if (item.golongan == '2') {var golongan = 'PERALATAN DAN MESIN';}
            // if (item.golongan == '3') {var golongan = 'GEDUNG DAN BANGUNAN';}
            // if (item.golongan == '4') {var golongan = 'JALAN,IRIGASI DAN JARINGAN';}
            // if (item.golongan == '5') {var golongan = 'ASET TETAP LAINNYA';}
            // if (item.golongan == '6') {var golongan = 'KONSTRUKSI';}
            // if (item.golongan == '7') {var golongan = 'KIR';}
            table.row.add([
                 ++i,
                item.golongan,
                item.nama_barang,
                item.kode_barang,
                item.id ? editButton + '' + deleteButton : ''
            ]).draw();
         });
    });
}

function refDep()
{
    $.get('/departemen', function(data) {
        var i = 0;
        var table = $("#tbl_dep").DataTable();
        table.clear().draw();
        $('#modal_body').html('');
        $.each(data.data, function(index, item) {
            var editButton = '<a class="btn btn-sm btn-warning edit-btn" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete-btn" data-id="' + item.id + '" href="#"><i class="fa-solid fa-trash"></i></a>';
            table.row.add([
                 ++i,
                item.nama_dep,
                item.kode_dep,
                item.id ? editButton + '' + deleteButton : ''
            ]).draw();
         });
        })
}

function refDiv()
{
    $.get('/divisi', function(data) {
        var i = 0;
        var table = $("#tbl_div").DataTable();
        table.clear().draw();
        $('#modal_body').html('');
        $.each(data.data, function(index, item) {
            var editButton = '<a class="btn btn-sm btn-warning edit-div" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete-div" data-id="' + item.id + '" href="#"><i class="fa-solid fa-trash"></i></a>';
            table.row.add([
                 ++i,
                item.nama_div,
                item.kode_div,
                item.id ? editButton + '' + deleteButton : ''
            ]).draw();
         });
        })
}

function refRuang()
{
    $.get('/ruang', function(data) {
        var i = 0;
        var table = $("#tbl_ruang").DataTable();
        table.clear().draw();
        $('#modal_body').html('');
        $.each(data.data, function(index, item) {
            var editButton = '<a class="btn btn-sm btn-warning edit" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete" data-id="' + item.id + '" href="#"><i class="fa-solid fa-trash"></i></a>';
            table.row.add([
                 ++i,
                item.nama_ruang,
                item.kode,
                item.id ? editButton + '' + deleteButton : ''
            ]).draw();
         });
        })
}

function refSdm()
{
    $.get('/sdm', function(data) {
        var i = 0;
        var table = $("#tbl_sdm").DataTable();
        table.clear().draw();
        $('#modal_body').html('');
        $.each(data.data, function(index, item) {
            var editButton = '<a class="btn btn-sm btn-warning edit" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete" data-id="' + item.id + '" href="#"><i class="fa-solid fa-trash"></i></a>';
            table.row.add([
                 ++i,
                item.nama_sdm,
                item.nip,
                item.jabat,
                item.nama_div,
                item.id ? editButton + '' + deleteButton : ''
            ]).draw();
         });
        })
}

function refLok()
{
    $.get('/lok', function(data) {
        var i = 0;
        var table = $("#tbl_lok").DataTable();
        table.clear().draw();
        $('#modal_body').html('');
        $.each(data.data, function(index, item) {
            var editButton = '<a class="btn btn-sm btn-warning edit" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete" data-id="' + item.id + '" href="#"><i class="fa-solid fa-trash"></i></a>';
            var img = '<img src="http://127.0.0.1:8000/assets/img/lokasi/'+item.img+'" height="100px" width="100px"></img>';
            table.row.add([
                 ++i,
                item.lokasi,
                item.alamat,
                item.lat,
                item.long,
                img,
                item.id ? editButton + '' + deleteButton : ''
            ]).draw();
         });
        })
}

function refBah()
{
    $.get('/bahan', function(data) {
        var i = 0;
        var table = $("#tbl_bahan").DataTable();
        table.clear().draw();
        $('#modal_body').html('');
        $.each(data.data, function(index, item) {
            var editButton = '<a class="btn btn-sm btn-warning edit" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete" data-id="' + item.id + '" href="#"><i class="fa-solid fa-trash"></i></a>';

            table.row.add([
                 ++i,
                item.nama,
                item.id ? editButton + '' + deleteButton : ''
            ]).draw();
         });
        })
}

function refAkt()
{
    $.get('/aktiva', function(data) {
        var i = 0;
        var table = $("#tbl_aktiva").DataTable();
        table.clear().draw();
        $('#modal_body').html('');
        $.each(data.data, function(index, item) {
            var editButton = '<a class="btn btn-sm btn-warning edit" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete" data-id="' + item.id + '" href="#"><i class="fa-solid fa-trash"></i></a>';

            table.row.add([
                 ++i,
                item.kode,
                item.aktiva,
                item.gol,
                item.kib,
                item.id ? editButton + '' + deleteButton : ''
            ]).draw();
         });
        })
}

function refNil()
{
    $.get('/nilai', function(data) {
        var i = 0;
        var table = $("#tbl_nilai").DataTable();
        table.clear().draw();
        $('#modal_body').html('');
        $.each(data.data, function(index, item) {
            var editButton = '<a class="btn btn-sm btn-warning edit" data-id="' + item.id_ak + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete" data-id="' + item.id_ak + '" href="#"><i class="fa-solid fa-trash"></i></a>';

            table.row.add([
                 ++i,
                item.no_voucher,
                item.tgl_voucher,
                item.aktiva,
               
,                item.nilai,
                item.kib,
                item.urai,
                item.id ? editButton + '' + deleteButton : ''
            ]).draw();
         });
        })
}


