
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

