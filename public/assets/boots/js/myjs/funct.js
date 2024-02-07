
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
            var img = '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img+'" height="100px" width="100px"></img>';
            table.row.add([
                 item.id,
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
                item.id,
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
            var editButton = '<a class="btn btn-sm btn-warning edit" data-id="' + item.id_nilai + '" href="#"><i class="fa-solid fa-edit"></i></a>';
            var deleteButton = '<a class="btn btn-sm btn-danger delete" data-id="' + item.id_nilai + '" href="#"><i class="fa-solid fa-trash"></i></a>';
            table.row.add([
                 ++i,
                item.no_voucher,
                item.tgl_voucher,
                item.aktiva,
                item.kib,
                item.nilai,
                item.urai,
                item.id_nilai ? editButton + '' + deleteButton : ''
            ]).draw();
         });
        })
}

function refA()
{
    $.get('/tanah', function(data) {
        var i = 0;
        var table = $("#tbl_a").DataTable();
        table.clear().draw();
        $('#modal_body').html('');

        $.each(data.data, function(index, item) {
            var editButton =
            '<div class="btn-group">'+
                '<button class="btn btn-default border border-secondary btn-sm detail" data-id="' + item.id_tanah + '"type="button">DETAIL</button>'+
                '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                '<ul class="dropdown-menu">'+
                    '<li><a class="dropdown-item  edit" data-id="' + item.id_tanah + '" href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
                    '<li><a class="dropdown-item delete" data-id="' + item.id_tanah + '" href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
                    '<li><a class="dropdown-item nilai" data-id="' + item.idLok + ',1,' + item.lokasi +'" href="#"><i class="fa-solid fa-trash"></i>&nbsp;NILAI</a></li>'+
                    '<li><hr class="dropdown-divider"></li>'+

                '</ul>'+
            '</div>';
            var img = '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img+'" height="100px" width="100px"></img>';
            // var nilaiAk = new Intl.NumberFormat('id-ID', {
            //     style: 'currency',
            //     currency: 'IDR',
            // }).format(item.nilaiak);
            // var detailNilai = '<td><a href="#" id="detailNilai" data-id="' + item.idLok + ',' + item.id_aktiva + ',' + item.lokasi +'">'+ nilaiAk +'</a></td>'
            
            table.row.add([
                 ++i,
                item.nama_barang,
                item.guna,
                item.lokasi,
                item.no_tunjuk,
                // detailNilai,
                img,
                editButton
            ]).draw();
        });

    })
}

function refB()
{
    $.get('/mesin', function(data) {
        var i = 0;
        var table = $("#tbl_b").DataTable();
        table.clear().draw();
        $('#modal_body').html('');

        $.each(data.data, function(index, item) {
            var editButton =
            '<div class="btn-group">'+
                '<button class="badge bg-primary border border-secondary btn-sm tree" data-id="' + item.id_lokasi + '" data-bs-toggle="offcanvas" href="#data" role="button" aria-controls="offcanvasExample"><i class="fa-solid fa-eye"></i></button>'+
            '</div>';
            var img = '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img_lok+'" height="100px" width="100px"></img>';
            table.row.add([
                 ++i,
                item.lokasi,
                item.alamat,
                img,
                editButton
            ]).draw();


         });
        })
}
function refBData()
{
    $.get('/mesin', function(data) {
        var i = 0;
        var table = $("#tbl_b").DataTable();
        table.clear().draw();
        $('#modal_body').html('');

        $.each(data.data, function(index, item) {
            var editButton =
            '<div class="btn-group">'+
                '<button class="btn btn-default border border-secondary btn-sm tree" data-id="' + item.id_lokasi + '" data-bs-toggle="offcanvas" href="#data" role="button" aria-controls="offcanvasExample">AKSI</button>'+
            '</div>';
            var img = '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img_lok+'" height="100px" width="100px"></img>';
            table.row.add([
                 ++i,
                item.lokasi,
                item.alamat,
                img,
                editButton
            ]).draw();
        });
    })
}

function refC()
{
    $.get('/gedung', function(data) {
        var i = 0;
        var table = $("#tbl_c").DataTable();
        table.clear().draw();
        $('#modal_body').html('');

        $.each(data.data, function(index, item) {
            var editButton =
            '<div class="btn-group">'+
                '<button class="badge bg-primary border border-secondary btn-sm tree" data-id="' + item.id_lokasi + '" data-bs-toggle="offcanvas" href="#data" role="button" aria-controls="offcanvasExample"><i class="fa-solid fa-eye"></i></button>'+
            '</div>';
            var img = '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img_lok+'" height="100px" width="100px"></img>';
            table.row.add([
                 ++i,
                item.lokasi,
                item.alamat,
                img,
                editButton
            ]).draw();
        });
    })
}

function refKir()
{
    $.get('/kir', function(data) {
        var i = 0;
        var table = $("#tbl_kir").DataTable();
        table.clear().draw();
        $('#modal_body').html('');

        $.each(data.data, function(index, item) {
            var editButton =
            '<div class="btn-group">'+
                '<button class="badge bg-primary border border-secondary btn-sm tree" data-id="' + item.id_lokasi + '" data-bs-toggle="offcanvas" href="#data" role="button" aria-controls="offcanvasExample"><i class="fa-solid fa-eye"></i></button>'+
            '</div>';
            var img = '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img_lok+'" height="100px" width="100px"></img>';
            table.row.add([
                 ++i,
                item.lokasi,
                item.alamat,
                img,
                editButton
            ]).draw();
        });
    })
}

function refMesinInput()
{
    $.get('/mesin.input', function(data) {
        var i = 0;
        var table = $("#tbl_mesin_input").DataTable();
        table.clear().draw();
        //$('#modal_body').html('');

        $.each(data.data, function(index, item) {
            // var editButton =
            // '<div class="btn-group">'+
            //     '<button class="badge bg-primary border border-secondary btn-sm tree" data-id="' + item.id_lokasi + '" data-bs-toggle="offcanvas" href="#data" role="button" aria-controls="offcanvasExample"><i class="fa-solid fa-eye"></i></button>'+
            // '</div>';
            // var img = '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img_lok+'" height="100px" width="100px"></img>';
            table.row.add([
                 ++i,
                item.lokasi,
                item.nama_div,
                item.nama_barang,
                item.merk,
                // img,
                // editButton
            ]).draw();
        });
    })
}

function pilih()
{
    $.get('/lok', function (data) {
        $.each(data.data, function (index, item) {
            $('#lokasi_kir').append('<option value="' + item.id + '">' + item.alamat + ' | ' +  item.lokasi + '</option>');
        });
    });
    $.get('/departemen', function (data) {
        $.each(data.data, function (index, item) {
            $('#dep').append('<option value="' + item.id + '"> ' +  item.kode_dep + '</option>');
        });
    });

    $.get('/divisi', function (data) {
        $.each(data.data, function (index, item) {
            $('#div').append('<option value="' + item.id + '"> ' +  item.nama_div + ' </option>');
        });
    });

    $.get('/barang.mesin', function (data) {
        $.each(data.data, function (index, item) {
            $('#nama_aset').append('<option value="' + item.id + '"> ' +  item.nama_barang + ' </option>');
        });
    });

    $.get('/bahan', function (data) {
        $.each(data.data, function (index, item) {
            $('#bahan_kir').append('<option value="' + item.id + '"> ' +  item.nama + ' </option>');
        });
    });

    $.get('/opsi.gedung', function (data) {
        $.each(data.data, function (index, item) {
            $('#gedung').append('<option value="' + item.gedung + '"> ' +  item.gedung + ' </option>');
        });
    });

    $.get('/ruang', function (data) {
        $.each(data.data, function (index, item) {
            $('#ruang_kir').append('<option value="' + item.nama_ruang + '"> ' +  item.nama_ruang + ' </option>');
        });
    });
}

function refKirInput()
{
    $.get('/kir.input', function(data) {
        var i = 0;
        var table = $("#tbl_kir_input").DataTable();
        table.clear().draw();
        //$('#modal_body').html('');

        $.each(data.data, function(index, item) {
            // var editButton =
            // '<div class="btn-group">'+
            //     '<button class="badge bg-primary border border-secondary btn-sm tree" data-id="' + item.id_lokasi + '" data-bs-toggle="offcanvas" href="#data" role="button" aria-controls="offcanvasExample"><i class="fa-solid fa-eye"></i></button>'+
            // '</div>';
            // var img = '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img_lok+'" height="100px" width="100px"></img>';
            table.row.add([
                 ++i,
                item.lokasi,
                item.nama_div,
                item.gedung,
                item.ruangan,
                item.nama_barang,
                item.merk,
                // img,
                // editButton
            ]).draw();
        });
    })
}

function openNewWindow() {
    var url = '/tanah.print';
    var features = 'width=800,height=600';
    window.open(url, '_blank', features);
}

function printB() {
    
}
