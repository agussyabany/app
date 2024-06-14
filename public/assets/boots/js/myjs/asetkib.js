$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    //TANAH
    $(document).on('click', '#detail_tanah', function() {
        var id = $(this).data('id');
        //$('#exampleModal').modal('show');
        $('#judul_modalLG_detail').html("DETAIL TANAH");
        $.ajax({
                type: "GET",
                url: "/tanah.detail/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#alamat_D').html(item.alamat);
                    $('#nama_barang_D').html(item.nama_barang);
                    $('#guna_D').html(item.guna);
                    $('#asal_D').html(item.asal);
                    $('#tahun_D').html(item.tahun);
                    $('#guna_D').html(item.guna);
                    $('#no_tunjuk_D').html(item.no_tunjuk);
                    $('#tgl_tunjuk_D').html(item.tgl_tunjuk);
                    $('#luas_tunjuk_D').html(item.luas_tunjuk);
                    $('#sertifikat_D').html(item.sertifikat);
                    $('#tgl_sertifikat_D').html(item.tgl_sertifikat);
                    $('#luas_sertifikat_D').html(item.luas_sertifikat);
                    $('#no_gambar_D').html(item.no_gambar);
                    $('#tgl_gambar_D').html(item.tgl_gambar);
                    $('#luas_gambar_D').html(item.luas_gambar);
                    $('#hak_D').html(item.hak);
                    $('#asal_D').html(item.asal);
                    $('#pemilik_D').html(item.pemilik);
                    $('#ket_D').html(item.ket);
                    $('#gambar_D').attr('src', 'http://app.perumdamtirtakencana.id/assets/img/lokasi/' + item.img);

                });

                $.get('/show/' + id, function (data) {
                    $('#filed').empty();
                    $.each(data.data, function (index, items) {
                        var thumbnail = $(
                            '<div class="pdf-thumbnail col ">' +
                                '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="http://app.perumdamtirtakencana.id/assets/img/lokasi/' + items.dok + '" type="application/pdf" border border-secondary rounded>' +
                                '<p><a href="#" onclick="window.open(\'http://app.perumdamtirtakencana.id/assets/img/lokasi/' + items.dok + '\', \'_blank\'); return false;">' + items.dok + '</p>' +
                            '</div>'
                        );
                    $('#filed').append(thumbnail);
                    });
                });
            }
        });
    })
    //Detail Nilai Tanah
    $(document).on('click', '#klik_nilai', function() {
        var id = $(this).data('id');

        var i = 0;
        var table = $("#tbl_detailNilai").DataTable();
        table.clear().draw();
            $.get("/nilaiTanah.detail/"+ id , function(data) {
                $('#card-header').html('<strong>Divisi:'+ lokasi +' </strong>');
                $.each(data.data, function (index, items) {
                var nilaiAk = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    }).format(items.nilai);
                    table.row.add([
                    ++i,
                    items.kode,
                    items.aktiva,
                    items.tgl_voucher,
                    items.tahun,
                    nilaiAk,
                    items.urai,
                    ]).draw();
                })
        })

    })
    //INPUT DATA TANAH
    $(document).on('click', '#add', function() {
        selectOptAll();
        $.get('/barang.tanah', function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
            });
        });

        $.get('/vTanah', function (data) {
            $.each(data.data, function (index, item) {
                $('#voucher_tanah').append('<option value="' + item.no_voucher + '">' + item.no_voucher + '</option>');
            });
        });

        $('body').on('change', '#voucher_tanah', function (event) {
            event.preventDefault();
            var idv = $(this).val();
            $('#kode_aktiva').empty().append('<option value="">Select an aktiva</option>');
            $.get('/kir_aktiva/' + idv , function (data) {
                $.each(data.data, function (index, item) {
                    $('#kode_aktiva').prepend('<option value="' + item.id + '">'+  item.kode +' | ' + item.aktiva + '</option>');
                    $('#bulan_voc').val(item.tgl_voucher);
                    $('#urai_voc').val(item.urai);
              }
              )})
        });
    })
    //MESIN
    $(document).on('click', '#klik_nilai_mesin', function() {
        var id = $(this).data('id');

        var i = 0;
        var table = $("#tbl_detailNilai_mesin").DataTable();
        table.clear().draw();
            $.get("/nilaiMesin.detail/"+ id , function(data) {
                $('#card-header').html('<strong>Divisi:'+ lokasi +' </strong>');
                $.each(data.data, function (index, items) {
                var nilaiAk = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    }).format(items.nilai);
                    table.row.add([
                    ++i,
                    items.kode,
                    items.aktiva,
                    items.tgl_voucher,
                    items.tahun,
                    nilaiAk,
                    items.urai,
                    ]).draw();
                })
        })

    })
    //INPUT DATA TANAH
    $(document).on('click', '#add_mesin', function() {
        selectOptAll();
        $.get('/barang.mesin', function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
            });
        });

        $.get('/vMesin', function (data) {
            $.each(data.data, function (index, item) {
                $('#voucher_mesin').append('<option value="' + item.no_voucher + '">' + item.no_voucher + '</option>');
            });
        });

        $('body').on('change', '#voucher_mesin', function (event) {
            event.preventDefault();
            var idv = $(this).val();
            $('#kode_aktiva').empty().append('<option value="">Select an aktiva</option>');
            $.get('/kir_aktiva/' + idv , function (data) {
                $.each(data.data, function (index, item) {
                    $('#kode_aktiva').prepend('<option value="' + item.id + '">'+  item.kode +' | ' + item.aktiva + '</option>');
                    $('#bulan_voc').val(item.tgl_voucher);
                    $('#urai_voc').val(item.urai);
              }
              )})
        });
    })
//Data Mesin
    $(document).on('click', '#detail_mesin', function() {
        var id = $(this).data('id');
        $('#canvas_tree').empty();
        $('#card-header').empty();


            $.ajax({
                type: "GET",
                url: "/mesin.dep/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#kepala').html('DATA PERALATAN DAN MESIN <strong>' + item.lokasi + '<strong>');
                    $('#canvas_tree').append(
                        '<li><span><strong>' + item.kode_dep +  '</strong></span>'+
                                '<ol id="mesin_div'+ item.id_departemen +'"></ol>'+
                            '</li>');
                    var dep = item.id_departemen;
                    var lok = item.id_lokasi;
                    $.get("/mesin.div/"+ dep + "/" + lok , function(data) {

                        $.each(data.data, function(index, item) {
                            var div = item.id_div;

                            $("#mesin_div" + item.id_departemen).append('<li><span><a data-id="' + dep + ',' + lok + ',' + div +
                            ',' + item.nama_div +'" href="#" style="text-decoration: none;" id="tampil_mesin">'+ item.nama_div +'</a></span></li>')
                        });
                    })
                });
            }
        });
    })
    $(document).on('click', '#tampil_mesin', function() {
        var id = $(this).data('id');
        var delimiter = ",";
        var id_key = id.split(delimiter);
        var dep = id_key[0];
        var lok = id_key[1];
        var div = id_key[2];
        var nama_div = id_key[3];
        var i = 0;
        var table = $("#tbl_b_data").DataTable();
            table.clear().draw();
            $.get("/mesin.show/"+ lok + "/" + dep + "/" + div , function(data) {
                $('#card-header').html('<strong>Divisi: '+ nama_div +'</strong><button class="btn btn-sm btn-primary float-end" id="print_b" data-id="' + lok + "," + dep + "," + div + '"><i class="fa-solid fa-print"></i></button>');

                $.each(data.data, function (index, items) {
                     var editButton =
                                        '<div class="btn-group">'+
                                            '<button class="btn btn-default border border-secondary btn-sm" type="button"><i class="fa-solid fa-ellipsis-vertical"></i></button>'+
                                            '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                                            '<ul class="dropdown-menu">'+

                                                '<li><a class="dropdown-item  edit" data-id=" '+ items.id_mesin +' " href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
                                                '<li><a class="dropdown-item deleteB" data-id=" '+ items.id_mesin +' " href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
                                                '<li><hr class="dropdown-divider"></li>'+

                                            '</ul>'+
                                        '</div>';
                                        var img = '<a href="#" data-bs-toggle="modal" data-bs-target="#modal_mesin_detail" id="detail_mesin_divisi" data-id="'+ items.id_mesin +'"><img src="http://app.perumdamtirtakencana.id/assets/img/mesin/'+items.img+'" height="100px" width="100px"></img></a>';
                                        table.row.add([
                                            ++i,
                                            items.nama_barang,
                                            items.merk,
                                            items.guna,
                                            items.tahun,
                                            img,
                                            editButton
                                        ]).draw();
                                    })
                                })
                            })
$(document).on('click', '#detail_mesin_divisi', function(){
    var id = $(this).data('id');
        //$('#exampleModal').modal('show');
        $('#judul_modal_detail').html();
        $.ajax({
                type: "GET",
                url: "/mesin.detail/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#kode_D').html(item.kode);
                    $('#nama_barang_D').html(item.nama_barang);
                    $('#guna_D').html(item.guna);
                    $('#asal_D').html(item.asal);
                    $('#tahun_D').html(item.tahun);
                    $('#guna_D').html(item.guna);
                    $('#merk_D').html(item.merk);
                    $('#ukuran_D').html(item.ukuran);
                    $('#bahan_D').html(item.bahan);
                    $('#tahun_D').html(item.tahun);
                    $('#bpkb_D').html(item.bpkb);
                    $('#pabrik_D').html(item.pabrik);
                    $('#rangka_D').html(item.rangka);
                    $('#mesin_D').html(item.mesin);
                    $('#polisi_D').html(item.polisi);
                    $('#susut_D').html(item.susut);
                    $('#ket_D').html(item.ket);
                    $('#gambar_D').attr('src', 'http://app.perumdamtirtakencana.id/assets/img/mesin/' + item.img);

                });

                $.get('/show/' + id, function (data) {
                    $('#filed').empty();
                    $.each(data.data, function (index, items) {
                        var thumbnail = $(
                            '<div class="pdf-thumbnail col ">' +
                                '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="http://app.perumdamtirtakencana.id/assets/img/mesin/' + items.dok + '" type="application/pdf" border border-secondary rounded>' +
                                '<p><a href="#" onclick="window.open(\'http://app.perumdamtirtakencana.id/assets/img/mesin/' + items.dok + '\', \'_blank\'); return false;">' + items.dok + '</p>' +
                            '</div>'
                        );

                    // Append the thumbnail to the fieldset
                    $('#filed').append(thumbnail);
                    });
                });
            }
        });

})

    //GEDUNG
    $(document).on('click', '#klik_nilai_gedung', function() {
        var id = $(this).data('id');

        var i = 0;
        var table = $("#tbl_detailNilai_gedung").DataTable();
        table.clear().draw();
            $.get("/nilaiGedung.detail/"+ id , function(data) {
                $('#card-header').html('<strong>Divisi:'+ lokasi +' </strong>');
                $.each(data.data, function (index, items) {
                var nilaiAk = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    }).format(items.nilai);
                    table.row.add([
                    ++i,
                    items.kode,
                    items.aktiva,
                    items.tgl_voucher,
                    items.tahun,
                    nilaiAk,
                    items.urai,
                    ]).draw();
                })
        })

    })
    //Data Gedung
    $(document).on('click', '#detail_gedung', function() {
        var id = $(this).data('id');
        $('#canvas_tree').empty();
        $('#card-header').empty();
         $.ajax({
                type: "GET",
                url: "/gedung.dep/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#kepala').html('DATA GEDUNG DAN BANGUNAN <strong>' + item.lokasi + '<strong>');
                    $('#canvas_tree').append(
                        '<li><span><strong>' + item.kode_dep +  '</strong></span>'+
                                '<ol id="gedung_div'+ item.id_departemen +'"></ol>'+
                            '</li>');
                    var dep = item.id_departemen;
                    var lok = item.id_lokasi;
                    $.get("/gedung.div/"+ dep + "/" + lok , function(data) {

                        $.each(data.data, function(index, item) {
                            var div = item.id_div;

                            $("#gedung_div" + item.id_departemen).append('<li><span><a data-id="' + dep + ',' + lok + ',' + div +
                            ',' + item.nama_div +'" href="#" style="text-decoration: none;" id="tampil_gedung">'+ item.nama_div +'</a></span></li>')
                        });
                    })
                });
            }
        });
    })

    $(document).on('click', '#tampil_gedung', function() {
        var id = $(this).data('id');
        var delimiter = ",";
        var id_key = id.split(delimiter);
        var dep = id_key[0];
        var lok = id_key[1];
        var div = id_key[2];
        var nama_div = id_key[3];
        var i = 0;
        var table = $("#tbl_c_data").DataTable();
            table.clear().draw();
            $.get("/gedung.show/"+ lok + "/" + dep + "/" + div , function(data) {
                $('#card-header').html('<strong>Divisi: '+ nama_div +'</strong><button class="btn btn-sm btn-primary float-end" id="print_b" data-id="' + lok + "," + dep + "," + div + '"><i class="fa-solid fa-print"></i></button>');

                $.each(data.data, function (index, items) {
                     var editButton =
                                        '<div class="btn-group">'+
                                            '<button class="btn btn-default border border-secondary btn-sm" type="button"><i class="fa-solid fa-ellipsis-vertical"></i></button>'+
                                            '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                                            '<ul class="dropdown-menu">'+

                                                '<li><a class="dropdown-item  edit" data-id=" '+ items.id_gedung +' " href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
                                                '<li><a class="dropdown-item deleteB" data-id=" '+ items.id_gedung +' " href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
                                                '<li><hr class="dropdown-divider"></li>'+

                                            '</ul>'+
                                        '</div>';
                                        var img = '<a href="#" data-bs-toggle="modal" data-bs-target="#modal_gedung_detail" id="detail_gedung_divisi" data-id="'+ items.id_gedung +'"><img src="http://app.perumdamtirtakencana.id/assets/img/gedung/'+items.img+'" height="100px" width="100px"></img></a>';
                                        table.row.add([
                                            ++i,
                                            items.nama_barang,
                                            items.guna,
                                            img,
                                            editButton
                                        ]).draw();
                                    })
                                })
                            })

$(document).on('click', '#detail_gedung_divisi', function(){
                var id = $(this).data('id');
                //$('#exampleModal').modal('show');
                $('#judul_modal_detail').html();
                $.ajax({
                    type: "GET",
                    url: "/gedung.detail/"+ id,
                    success: function (data) {
                    $.each(data.data, function (index, item) {
                        $('#kode_d').html(item.kode);
                        $('#nama_barang_d').html(item.nama_barang);
                        $('#guna_d').html(item.guna);
                        $('#reg_d').html(item.reg);
                        $('#kondisi_d').html(item.kondisi);
                        $('#konstruksi_d').html(item.konstruksi);
                        $('#materi_d').html(item.materi);
                        $('#tgl_imb_d').html(item.tgl_imb);
                        $('#luas_d').html(item.luas);
                        $('#status_d').html(item.status);
                        $('#luastanah_d').html(item.luastanah);
                        $('#kode_tanah_d').html(item.kode_tanah);
                        $('#no_imb_d').html(item.no_imb);
                        $('#asal_d').html(item.asal);
                        $('#nilai_d').html(item.nilai);
                        $('#susut_d').html(item.susut);
                        $('#ket_d').html(item.ket);
                        $('#gambar_d').attr('src','http://app.perumdamtirtakencana.id/assets/img/gedung/' + item.img);
});

    $.get('/show/' + id, function (data) {
    $('#filed').empty();
    $.each(data.data, function (index, items) {
    var thumbnail = $(
                '<div class="pdf-thumbnail col ">' +
                '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="http://app.perumdamtirtakencana.id/assets/img/gedung/' + items.dok + '" type="application/pdf" border border-secondary rounded>' +
                    '<p><a href="#" onclick="window.open(\'http://app.perumdamtirtakencana.id/assets/img/gedung/' + items.dok + '\', \'_blank\'); return false;">' + items.dok + '</p>' +
                '</div>');
                $('#filed').append(thumbnail);
        });
    });
   }
});
})
    //KIR
    $(document).on('click', '#klik_nilai_kir', function() {
        var id = $(this).data('id');

        var i = 0;
        var table = $("#tbl_detailNilai_kir").DataTable();
        table.clear().draw();
            $.get("/nilaiKir.detail/"+ id , function(data) {
                $('#card-header').html('<strong>Divisi:'+ lokasi +' </strong>');
                $.each(data.data, function (index, items) {
                var nilaiAk = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    }).format(items.nilai);
                    table.row.add([
                    ++i,
                    items.kode,
                    items.aktiva,
                    items.tgl_voucher,
                    items.tahun,
                    nilaiAk,
                    items.urai,
                    ]).draw();
                })
             })
            })
        })
        $(document).on('click', '#data_kir', function() {
            $('#canvas_tree').empty();
            var id = $(this).data('id');
             $.ajax({
                type: "GET",
                url: "/kir.dep/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#kepala').html('DATA KIR LOKASI <strong>'+ item.lokasi + '<strong>');
                    $('#canvas_tree').append(
                        '<li><span><strong>' + item.kode_dep +  '</strong></span>'+
                                '<ol id="kir_div'+ item.id_departemen +'"></ol>'+
                            '</li>');
                    var dep = item.id_departemen;
                    var lok = item.id_lokasi;
                    $.get("/kir.div/"+ dep + "/" + lok , function(data) {

                        $.each(data.data, function(index, item) {
                            var div = item.id_div;
                            $("#kir_div" + item.id_departemen).append('<li ><strong><span style="color:green;">'+ item.nama_div +'</span></strong>'+
                                    '<ol id="kir_ged'+ item.id_div +'"></ol>'+
                                '</li>')

                            $.get("/kir.gedung/"+ lok + "/" + dep + "/" + div, function(data){
                                $.each(data.data,function(index,items) {
                                   $("#kir_ged" + item.id_div).append('<li><a href="#" id="kir_ruang" style="text-decoration: none;" data-id="' + dep + ',' + lok + ',' + div + ',' + items.gedung + ',' + item.nama_div + '"><span">Gedung '+ items.gedung +'</a></span>'+

                                    '</li>')
                                 })
                            })
                        });
                    })
                });
             }
        });
    })

    $(document).on('click', '#kir_ruang', function() {
        var id = $(this).data('id');

        var delimiter = ",";
        var id_key = id.split(delimiter);
        var dep = id_key[0];
        var lok = id_key[1];
        var div = id_key[2];
        var ged = id_key[3];
        var nama_div = id_key[4];
        var i = 0;

        var table = $("#tbl_kir_data").DataTable();
        table.clear().draw();
        $.get("/kir.ruang/"+ lok + "/" + dep + "/" + div + "/" + ged, function(data){
            $('#card-header').html('<strong>Divisi:</strong> '+ nama_div +'<br><strong>Gedung: </strong>' + ged  );
                $.each(data.data, function (index, items) {
                var ruang = items.ruangan
                var editButton =
                '<div class="btn-group">'+
                    '<button class="badge bg-success border border-secondary btn-sm tree" data-id="' + lok + ',' + dep + ',' + div + ',' + ged + ',' + ruang + ',' + nama_div + '" id="kir_detail" data-bs-toggle="modal" data-bs-target="#modal_kir_detail"><i class="fa-solid fa-eye"></i></button>'+
                '</div>';
                var tambahButton =
                '<div class="btn-group">'+
                    '<button class="badge bg-primary border border-secondary btn-sm tree" data-id="' + lok + ',' + dep + ',' + div + ',' + ged + ',' + ruang + ',' + nama_div + '" id="kir_tambah_detail"><i class="fa-solid fa-plus"></i></button>'+
                '</div>';
                table.row.add([
                    ++i,
                    items.ruangan,
                    editButton,
                    tambahButton
                ]).draw();
            })
        })
    })
//KIR DETAIL
    $(document).on('click', '#kir_detail', function() {

        var id = $(this).data('id');
        console.log(id);
        var delimiter = ",";
        var id_key = id.split(delimiter);
        var lok = id_key[0];
        var dep = id_key[1];
        var div = id_key[2];
        var ged = id_key[3];
        var ruang = id_key[4];
        var nama_div = id_key[5];
        var i = 0;

$('#judul_modal').html('<strong>Divisi:</strong> '+ nama_div +'<br><strong>Gedung:</strong> '+ ged +'<br><strong>Ruang: </strong>' + ruang +'<button class="btn btn-sm btn-primary float-end" id="print_kir" data-id="' + lok + "," + dep + "," + div + "," + ged + "," + ruang + '"><i class="fa-solid fa-print"></i></button>' );
    var table = $("#tbl_kir_detail").DataTable();
    table.clear().draw();

$.get("/kir.detail/"+ lok +"/"+ dep +"/"+ div +"/"+ ged +"/"+ ruang, function(data){
    $.each(data.data, function (index, items) {
        var img = '<a href="#" id="detail_gedung_divisi"><img src="http://app.perumdamtirtakencana.id/assets/img/kir/'+items.img+'" height="100px" width="100px"></img></a>';
        var editButton = '<button type="button" id="edit" data-id="' + items.id + '" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>';

        table.row.add([
        ++i,
        items.nama_barang,
        items.merk,
        items.bahan,
        items.jumlah,
        items.satuan,
        items.baik,
        items.ringan,
        items.berat,
        img,
        editButton

    ]).draw();

        })
    })
})
//Tambah Kir

$(document).on('click', '#tambah_kir', function() {

    $('.select2').select2({
        dropdownParent: $('#modal_bodyLG')
    });
    $('#jenis_input').val(1);
    selectOptKir();
    selectOptAll();
    refKirInput()

})
//MASUKAN KE KERANJANG KIR
$(document).on('click', '#submit_kir', function (event) {
        event.preventDefault();
        var lok =$('#lokasi_kir').val();
        var dep =$('#dep').val();
        var div =$('#div').val();
        var ged =$('#gedung_kir').val();
        var ruang =$('#ruang_kir').val();
        var jenis =$('#jenis_input').val();

        var fileInput = $('#img')[0].files[0];
        if (!fileInput) {
            alert('Please select an image.');
            return;
        }
        var reader = new FileReader();
         reader.onload = function (e) {
            var base64Image = e.target.result.split(',')[1]; // Extract base64 data

            // Send the base64 encoded image data in the AJAX request
            $.ajax({
                data: {
                    lokasi: $('#lokasi_kir').val(),
                    dep: $('#dep').val(),
                    div:$('#div').val(),
                    gedung_kir:$('#gedung_kir').val(),
                    nilai_v:$('#nilai_v').val(),
                    ruang_kir:$('#ruang_kir').val(),
                    nama_aset:$('#nama_aset').val(),
                    kode_aset:$('#kode_aset').val(),
                    merk:$('#merk').val(),
                    bahan:$('#bahan_kir').val(),
                    jumlah:$('#jumlah').val(),
                    baik:$('#baik').val(),
                    ringan:$('#ringan').val(),
                    berat:$('#berat').val(),
                    ket:$('#ket').val(),
                    aktiva:$('#kode_aktiva').val(),
                    img: base64Image
                },
                url: "/kir.save",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    if (jenis == 1) {
                        refKirInput();
                    } else {
                        kirTambah(lok,dep,div,ged,ruang);
                    }





                },
                error: function(xhr) {
                    if (xhr.status === 400) {
                        // Validation error, handle it
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            // Display each error message for the specific field
                            $('#'+field+'_error').text(messages[0]); // Assume you have an element with an ID like 'reg_error'
                        });
                    } else {
                        // Handle other errors
                        console.error('An error occurred:', xhr.responseText);
                    }
                }
            });
        };

        // Read the selected file as a data URL
        reader.readAsDataURL(fileInput);
    });
    //HAPUS KERANJANG KIR
    $(document).on('click', '#haps', function (event) {
        var id = $(this).data('id');
        var del = confirm("HAPUS DATA ?");
        if (del) {
            $.ajax({
                url: "/kir.del/" + id,
                type: "POST",
                dataType: 'json',
                    success: function (data) {
                    alert('Data berhasil Dihapus')
                    refKirInput();
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert('Data gagal dihapus');
                },
            });
        }
    })
    //PROSES KIR
    $(document).on('click', '#proses_kir', function (event) {
        $.ajax({
            url: "/kir.clear",
            type: "POST",
            dataType: 'json',
                success: function (data) {
                alert('Data berhasil Diproses')
                refKirInput();
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Data gagal Diproses');
            },
    });
})
//TAMBAH BARANG PADA KIR RUANG EXISTING
$(document).on('click', '#kir_tambah_detail', function (event) {
        var id = $(this).data('id');
        $('#modal_tambah').modal('show');
        $('#jenis_input').val(2);
        console.log(id);
        var delimiter = ",";
        var id_key = id.split(delimiter);
        var lok = id_key[0];
        var dep = id_key[1];
        var div = id_key[2];
        var ged = id_key[3];
        var ruang = id_key[4];
        var nama_div = id_key[5];
        var i = 0;

$('#judul_modal').html('<strong>Divisi:</strong> '+ nama_div +'<br><strong>Gedung:</strong> '+ ged +'<br><strong>Ruang: </strong>' + ruang +'<button class="btn btn-sm btn-primary float-end" id="print_kir" data-id="' + lok + "," + dep + "," + div + "," + ged + "," + ruang + '"><i class="fa-solid fa-print"></i></button>' );


$('#head-off').empty();
$('#head-off').append('<input type="hidden" value="'+ lok +'" id="lokasi_kir">'+
                      '<input type="hidden" value="'+ dep +'" id="dep">'+
                      '<input type="hidden" value="'+ div +'" id="div">'+
                      '<input type="hidden" value="'+ ged +'" id="gedung_kir">'+
                      '<input type="hidden" value="'+ ruang +'" id="ruang_kir">'+
                      '<input type="hidden" value="" id="kode_aktiva">');

$('#tabel_tambah').empty();
$('#tabel_tambah').append('<table class="table table-striped table-border" id="tbl_kir_input_tambah">'+
                            '<thead>'+
                                '<tr>'+
                                    '<th>NO</th>'+
                                    '<th>Nama Aktiva</th>'+
                                    '<th>Merk/Type</th>'+
                                    '<th>Bahan</th>'+
                                    '<th>Jumlah</th>'+
                                    '<th>Satuan</th>'+
                                    '<th>Baik</th>'+
                                    '<th>Rusak Ringan</th>'+
                                    '<th>Rusak Berat</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                            '</tbody>'+
                            '</table>')
selectOptKir();
kirTambah(lok,dep,div,ged,ruang);
})
//ARSIP
$(document).on('click', '#data_arsip', function() {
    $('#canvas_tree').empty();
    var id = $(this).data('id');
    var gd = id;
    $('#kepala').html('DATA ARSIP <strong>GEDUNG ' + id + '<strong>');

    $.ajax({
        type: "GET",
        url: "/arsip.rak/" + gd,
        success: function(response) {
            $.each(response.data, function(index, fillItem) {
                $('#canvas_tree').append(
                    '<li><span><strong>FILLING ' + fillItem.fill + '</strong></span>' +
                    '<ul id="fill' + fillItem.fill + '"></ul>' +
                    '</li>'
                );
                var fill = fillItem.fill;
                $.each(fillItem.raks, function(index, rakItem) {
                    $('#fill' + fillItem.fill).append(

                        '<li><a href="#" id="rak_detail" data-id="' + gd +','+ fill +','+ rakItem.rak +'" style="text-decoration:none;"><strong>Rak ' + rakItem.rak + '</strong></a></li>'
                    );
                });
            });
        },
        error: function(xhr) {
            console.error("An error occurred:", xhr);
        }
    });
});
//Arsip Detail
$(document).on('click', '#rak_detail', function() {
    var id = $(this).data('id');
    var delimiter = ",";
    var id_key = id.split(delimiter);
    var ged = id_key[0];
    var fil = id_key[1];
    var rak = id_key[2];
    $('#td_gedung').html(ged);
    $('#td_fil').html(fil);
    $('#td_rak').html(rak);

    var table = $("#tbl_detail_arsip").DataTable();
    table.clear().draw();

    $.get("/arsip.detail/"+ ged +"/"+ fil +"/"+ rak , function(data){
        $.each(data.data, function (index, items) {
            var bulans = items.bulan;
            if (bulans == 1) {
                var bulan = 'JANUARI';
            }
            if (bulans == 2) {
                var bulan = 'FEBRUARI';
            }
            if (bulans == 3) {
                var bulan = 'MARET';
            }
            if (bulans == 4) {
                var bulan = 'APRIL';
            }
            if (bulans == 5) {
                var bulan = 'MEI';
            }
            if (bulans == 6) {
                var bulan = 'JUNI';
            }
            if (bulans == 7) {
                var bulan = 'JULI';
            }
            if (bulans == 8) {
                var bulan = 'AGUSTUS';
            }
            if (bulans == 9) {
                var bulan = 'SEPTEMBER';
            }
            if (bulans == 10) {
                var bulan = 'OKTOBER';
            }
            if (bulans == 11) {
                var bulan = 'NOVEMBER';
            }
            if (bulans == 12) {
                var bulan = 'DESEMBER';
            }
            // var img = '<a href="#" id="detail_gedung_divisi"><img src="http://app.perumdamtirtakencana.id/assets/img/kir/'+items.img+'" height="100px" width="100px"></img></a>';
            var editButton = '<button type="button" id="edit" data-id="' + items.id + '" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus"></i></button>';
            var baris = '<a href="#" style="text-decoration:none;" id="isi_arsip" data-id="'+ items.id +'"><strong>' + items.no_file + '</strong></a>';

            table.row.add([
            baris,
            items.nama_dok,
            bulan,
            items.kode_dok,
            items.tahun,
            editButton

        ]).draw();

            })
        })
})
$(document).on('click', '#isi_arsip', function() {
    var id = $(this).data('id');
    $('#modal_isi').modal('show');
    //$('#judul_modalLG').html(id);
    var no = 1;
    var table = $("#tbl_isi_arsip").DataTable();
    table.clear().draw();

    $.get("/arsip.isi/"+ id , function(data){
        $.each(data.data, function (index, items) {
            table.row.add([
            ++no,
            items.reg,
            items.kondisi,
            items.rekanan,
            items.judul,
            items.nilai,
            items.retensi,
            items.ket
            //editButton

        ]).draw();

            })
        })


})

// $(document).ready(function() {

//     //TANAH

//     //Klik menu TANAH Sidebar
//     $('#a').on('click', function() {
//         $('#db_body').remove();
//         //membuat tombol menu SideBar menjadi selected
//         $('#a').addClass('btn btn-primary');
//         //Dan Tombol lain menjadi notSelected
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         //Menampilkan Header Tab BARANG

//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link border" id="tab_a" data-bs-toggle="tab" href="#a_tab" role="tab" aria-controls="tab2" aria-selected="false">TANAH &nbsp;<button style="border:none;background-color: white;color: grey;" type="submit"  id="a_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//            //Menampilkan Konten berupa HEAD tabel pada body TAB
//             $(document).ready(function() {
//                 $('#myTabContent').html('');
//                 $('#myTabContent').append(
//                     '<div class="tab-pane fade" id="a_tab" role="tabpanel" aria-labelledby="tab_a">' +
//                     '<br>' +
//                     '<div class="tab-pane show" id="a_tab" role="tabpanel" aria-labelledby="tab_a">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header text-center">DATA TANAH <div class="position-absolute top-0 end-0"><button class="btn  btn-primary btn-outline me-1" id="tambah_a"><i class="fa-solid fa-circle-plus"></i></button><button class="btn  btn-danger mt-1 mb-1 me-1" id="print_a"><i class="fa-solid fa-print"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_a">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Nama Aset</th>'+
//                                                 '<th>Penggunaan</th>'+
//                                                 '<th>Alamat</th>'+
//                                                 '<th>No Dokumen</th>'+

//                                                 '<th>Foto</th>'+
//                                                 '<th>Aksi</th>'+
//                                             '</tr>'+
//                                         '</thead>'+
//                                         '<tbody>'+
//                                         '</tbody>'+
//                                     '</table>'+
//                                 '</div>'+
//                             '</div>'+
//                         '</div>' +
//                     '</div>'
//                 );
//                 refA();
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });

//                     $('#print_a').on('click', function() {
//                         openNewWindow();
//                     })
//                     //Klik pada tombol tambah bahan, maka menampilkan modal TAMBAH DATA BAHAN
//                 $('#tambah_a').on('click', function() {
//                     $('#lgModal').modal('show');
//                     $('#judul_modalLG').html('TAMBAH KIB A -  TANAH');
//                     $('#modal_bodyLG').html('');
//                     $('#modal_bodyLG').prepend(
//                         '<form action="" id="form_a" enctype="multipart/form-data">'+
//                             '<div class="container">'+
//                                     '<div class="row  border border-primary rounded">'+
//                                         '<div class="container"><br>'+
//                                             '<table class="table table-striped table-bordered rounded">'+
//                                                 '<thead>'+
//                                                     '<tr class="text-center">'+
//                                                         '<th>Alamat</th>'+
//                                                         '<th>Kode</th>'+
//                                                         ' <th>Tahun</th>'+
//                                                         '<th>Nama</th>'+
//                                                         '<th>Penggunaan</th>'+
//                                                       '</tr>'+
//                                                 '</thead>'+
//                                             ' <tbody>'+
//                                                     '<tr>'+
//                                                         '<td>'+
//                                                             '<div class="input-group input-group-sm mb-1">'+
//                                                                 '<select class="select2 form-control" name="lokasi" id="lokasi_a">'+
//                                                                     '<option>- PILIH LOKASI -</option>'+


//                                                                 '</select>'+
//                                                             '</div>'+
//                                                         '</td>'+
//                                                         '<td>'+
//                                                             '<div class="input-group input-group-sm mb-1">'+
//                                                                 '<input name="kode" id="kode" type="text" class="form-control">'+
//                                                             '</div>'+
//                                                         '</td>'+
//                                                         '<td>'+
//                                                             '<div class="input-group input-group-sm mb-1">'+
//                                                                 '<input type="number" name="tahun" id="tahun" value="2023" class="form-control">'+
//                                                             '</div><br>'+
//                                                         '</td>'+
//                                                         '<td>'+
//                                                             '<div class="input-group input-group-sm mb-1">'+

//                                                                 '<select class="select2 form-control" style"width:100%;"  id="nama" name="nama">'+
//                                                                     '<option> -NAMA BARANG- </option>'+

//                                                                 '</select>'+
//                                                             '</div>'+
//                                                         '</td>'+
//                                                         '<td>'+
//                                                             '<div class="input-group input-group-sm mb-1">'+
//                                                                 '<input type="text" nama="guna" id="guna" class="form-control">'+
//                                                             '</div>'+
//                                                         '</td>'+
//                                                 ' </tr>'+
//                                                 '<tbody/>'+
//                                             '</table>'+
//                                         '</div>'+
//                                     '</div><br>'+





//                                     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                         '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
//                                             '<div style="font-size: 15px;"><strong>PENUNJUKAN</strong></div>'+
//                                         '</legend>'+
//                                             '<div class="col">'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">No Surat</span><input nama="no_tunjuk" id="no_tunjuk" type="text" placeholder="Penunjukan" class="form-control">'+
//                                                 '</div>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" placeholder="Penunjukan" nama="tgl_tunjuk" id="tgl_tunjuk" class="form-control">'+
//                                                 '</div>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Luas</span><input type="text" nama="luas_tunjuk" placeholder="Penunjukan" class="form-control">'+
//                                                 '</div>'+
//                                             '</div>'+
//                                      ' </fieldset><br>'+

//                                      '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                         '<legend class="float-none w-auto px-1 border border-secondary rounded">'+
//                                         '<div style="font-size: 15px;"><strong>SURAT SPPT/SPHAT/SPJBT</strong></div>'+
//                                         '</legend>'+
//                                             '<div class="col">'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">No Surat</span><input type="text" nama="sertifikat" id="sertifikat" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
//                                                 '</div>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_sertifikat" id="tgl_sertifikat" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
//                                                 '</div>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_sertifikat" id="luas_sertifikat" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
//                                                 '</div>'+
//                                             '</div>'+
//                                      ' </fieldset><br>'+

//                                      '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                         '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
//                                         '<div style="font-size: 15px;"><strong>GAMBAR SITUASI</strong></div>'+
//                                         '</legend>'+
//                                             '<div class="col">'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">No Surat</span><input type="text" name="no_gambar" id="no_gambar" placeholder="GAMBAR SITUASI" class="form-control">'+
//                                                 '</div>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_gambar" id="tgl_gambar" placeholder="GAMBAR SITUASI" class="form-control">'+
//                                                 '</div>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<div class="input-group input-group-sm  mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_gambar" id="luas_gambar" placeholder="GAMBAR SITUASI" class="form-control">'+
//                                                 '</div>'+
//                                             '</div>'+
//                                      ' </fieldset><br>'+


//                                      '<div class="row  border border-primary rounded">'+

//                                             '<div class="col"><br>'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     // '<span class="input-group-text col-sm-3">Hak</span>'+
//                                                     '<select name="hak" id="hak" class="select2 form-control">'+
//                                                         '<option>-HAK-</option>'+
//                                                         '<option>SHM</option>'+
//                                                         '<option>Tanah Milik Perumdam</option>'+
//                                                         '<option>Tanah Milik Negara</option>'+
//                                                         '<option>Tanah Milik Pemda</option>'+
//                                                         '<option>Hibah</option>'+
//                                                         '<option>SPHAT</option>'+
//                                                         '<option>Hak Pakai</option>'+
//                                                         '<option>HGB</option>'+
//                                                         '<option>SPPT</option>'+
//                                                     '</select>'+
//                                                 '</div>'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Pemilik Asal</span><input name="asal" id="asal" type="text" class="form-control">'+
//                                                 '</div>'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Asal</span><input type="number" name="pemilik" id="pemilik" value="2023" class="form-control">'+
//                                                 '</div>'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     // '<span class="input-group-text col-sm-3">Nilai perolehan</span>'+
//                                                     '<select class="select2 form-control" name="nilai_a" id="nilai_a">'+
//                                                         '<option> -PILH NILAI AKTIVA- </option>'+
//                                                     '</select>'+
//                                                 '</div>'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Nilai saat ini</span><input name="nilai_now" id="nilai_now" type="text" class="form-control">'+
//                                                 '</div>'+
//                                             '</div><br>'+

//                                             '<div class="col"><br>'+

//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>'+
//                                                 '</div>'+
//                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                     '<span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>'+
//                                                 '</div>'+
//                                             '</div>'+

//                                     '</div><br>'+

//                              '</div>'+
//                         '</form >');

//                         $('.select2').select2({
//                             dropdownParent: $('#lgModal')
//                         });

//                         $.get('/lok', function (data) {
//                             $.each(data.data, function (index, item) {
//                                 $('#lokasi_a').append('<option value="' + item.id + '">' + item.alamat + ' | ' +  item.lokasi + '</option>');
//                             });
//                         });
//                         $.get('/barang.tanah', function (data) {
//                             $.each(data.data, function (index, item) {
//                                 $('#nama').append('<option value="' + item.id + '"> ' +  item.nama_barang + '</option>');
//                             });
//                         });

//                         $.get('/nilai', function (data) {
//                             $.each(data.data, function (index, item) {
//                                 $('#nilai_a').append('<option value="' + item.id + '"> ' +  item.kode + ' | ' + item.nilai + ' </option>');
//                             });
//                         });

//                     });
//                     //Memberikan atribut id pada tombol submit modal
//                  $('.tombol').attr('id', 'submit_a');

                //  $(document).on('click', '#submit_a', function (event) {
                //     event.preventDefault();
                //     var fileInput = $('#dok')[0].files;
                //     console.log(fileInput);
                //         if (!fileInput || fileInput.length === 0) {
                //             alert('Please select at least one file.');
                //             return;
                //         }

                //         for (var i = 0; i < fileInput.length; i++) {
                //             var currentFile = fileInput[i];
                //             var reader = new FileReader();
                //             reader.onload = function (e) {
                //                 var arrayBuffer = e.target.result;
                //                 // Send the data to the server
                //                 sendDataToServer(arrayBuffer);
                //             };
                //              // Read the file as an ArrayBuffer
                //             reader.readAsArrayBuffer(currentFile);
                //         }
                //         function sendDataToServer(arrayBuffer) {
                //             // Additional form data
                //             var additionalData =
                //                 {
                //                     lokasi: $('#lokasi_a').val(),
                //                     kode: $('#kode').val(),
                //                     lokasi: $('#lokasi_a').val(),
                //                     kode: $('#kode').val(),
                //                     tahun: $('#tahun').val(),
                //                     nama: $('#nama').val(),
                //                     guna: $('#guna').val(),
                //                     no_tunjuk: $('#no_tunjuk').val(),
                //                     tgl_tunjuk: $('#tgl_tunjuk').val(),
                //                     luas_tunjuk: $('#luas_tunjuk').val(),
                //                     sertifikat: $('#sertifikat').val(),
                //                     tgl_sertifikat: $('#tgl_sertifikat').val(),
                //                     luas_sertifikat: $('#luas_sertifikat').val(),
                //                     no_gambar: $('#no_gambar').val(),
                //                     tgl_gambar: $('#tgl_gambar').val(),
                //                     luas_gambar: $('#luas_gambar').val(),
                //                     hak: $('#hak').val(),
                //                     asal: $('#asal').val(),
                //                     pemilik: $('#pemilik').val(),
                //                     nilai_a: $('#nilai_a').val(),
                //                     nilai_now: $('#nilai_now').val(),
                //                     ket: $('#ket').val(),
                //                     dok: arrayBuffer,
                //                 };

                //             // Assuming you are using AJAX to send data to the server
                //             $.ajax({
                //                 url: '/tanah.save', // Replace with your actual server endpoint
                //                 type: 'POST',
                //                 data: additionalData,
                //                 success: function (response) {
                //                     console.log('Data sent successfully:', response);
                //                 },
                //                 error: function (error) {
                //                     console.error('Error sending data:', error);
                //                 }
                //             });
                //         }

                // });
//                 //Modal DETAIL show
//              $('#tbl_a').on('click', '.detail', function() {
//                 var id = $(this).data('id');

//                 $.ajax({
//                     type: "GET",
//                     url: "/tanah.detail/"+ id,
//                     success: function (data) {
//                         $.each(data.data, function (index, item) {

//                         $('#lgModal').modal('show');
//                         $('#judul_modalLG').html('DETAIL KIB A TANAH '+item.lokasi );
//                         $('#modal_bodyLG').html('');
//                         $('#modal_bodyLG').prepend(
//                             '<div class="container">'+
//                                 '<img src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img+'" height="500px" width="500px" class="rounded mx-auto d-block" alt="..."><br>'+

//                                 '<div class="row">'+
//                                     '<div class="col">'+
//                                         '<div class="container border border-primary rounded"><br>'+
//                                             '<table class="table table-striped table-bordered">'+
//                                                 '<tbody>'+
//                                                     '<tr>'+
//                                                         '<th>Letak</th>'+
//                                                         '<td>' + item.alamat+ '</td>'+
//                                                     '</tr>'+
//                                                     '<tr>'+
//                                                         '<th>Nama Barang</th>'+
//                                                         '<td>' + item.nama_barang+ '</td>'+
//                                                     '</tr>'+
//                                                     '<tr>'+
//                                                         '<th>Penggunaan</th>'+
//                                                         '<td>' + item.guna+ '</td>'+
//                                                     '</tr>'+
//                                                 '</tbody>'+
//                                             '</table>'+
//                                         '</div>'+
//                                     '</div>'+

//                                     '<div class="col">'+
//                                         '<div class="container border border-primary rounded"><br>'+
//                                             '<table class="table table-striped table-bordered">'+
//                                                 '<tbody>'+
//                                                     '<tr>'+
//                                                         '<th>Asal Usul</th>'+
//                                                         '<td>' + item.asal+ '</td>'+
//                                                     '</tr>'+
//                                                     '<tr>'+
//                                                         '<th>Tahun Pengadan</th>'+
//                                                         '<td>' + item.tahun+ '</td>'+
//                                                     '</tr>'+
//                                                     '<tr>'+
//                                                         '<th>-</th>'+
//                                                         '<td>' + item.guna+ '</td>'+
//                                                     '</tr>'+
//                                                 '</tbody>'+
//                                             '</table>'+
//                                         '</div>'+
//                                     '</div>'+

//                                 '</div><br>'+

//                                 '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                         '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
//                                             '<div style="font-size: 15px;"><strong>PENUNJUKAN</strong></div>'+
//                                         '</legend>'+
//                                             '<div class="col">'+
//                                             '<table class="table table-striped table-bordered">'+
//                                                 '<tbody>'+
//                                                     '<tr>'+
//                                                         '<th>Nomor Surat</th>'+
//                                                         '<td>' + item.no_tunjuk+ '</td>'+
//                                                     '</tr>'+
//                                                 '</tbody>'+
//                                             '</table>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<table class="table table-striped table-bordered">'+
//                                                     '<tbody>'+
//                                                         '<tr>'+
//                                                             '<th>Tanggal</th>'+
//                                                             '<td>' + item.tgl_tunjuk+ '</td>'+
//                                                         '</tr>'+
//                                                     '</tbody>'+
//                                                 '</table>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<table class="table table-striped table-bordered">'+
//                                                     '<tbody>'+
//                                                         '<tr>'+
//                                                             '<th>Luas</th>'+
//                                                             '<td>' + item.luas_tunjuk+ '</td>'+
//                                                         '</tr>'+
//                                                     '</tbody>'+
//                                                 '</table>'+
//                                             '</div>'+
//                                      ' </fieldset><br>'+

//                                      '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                         '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
//                                             '<div style="font-size: 15px;"><strong>SPPT/SPHAT/SPJBT</strong></div>'+
//                                         '</legend>'+
//                                             '<div class="col">'+
//                                             '<table class="table table-striped table-bordered">'+
//                                                 '<tbody>'+
//                                                     '<tr>'+
//                                                         '<th>Nomor Surat</th>'+
//                                                         '<td>' + item.sertifikat+ '</td>'+
//                                                     '</tr>'+
//                                                 '</tbody>'+
//                                             '</table>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<table class="table table-striped table-bordered">'+
//                                                     '<tbody>'+
//                                                         '<tr>'+
//                                                             '<th>Tanggal</th>'+
//                                                             '<td>' + item.tgl_sertifikat+ '</td>'+
//                                                         '</tr>'+
//                                                     '</tbody>'+
//                                                 '</table>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<table class="table table-striped table-bordered">'+
//                                                     '<tbody>'+
//                                                         '<tr>'+
//                                                             '<th>Luas</th>'+
//                                                             '<td>' + item.luas_sertifikat+ '</td>'+
//                                                         '</tr>'+
//                                                     '</tbody>'+
//                                                 '</table>'+
//                                             '</div>'+
//                                      ' </fieldset><br>'+

//                                      '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                         '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
//                                             '<div style="font-size: 15px;"><strong>GAMBAR SITUASI</strong></div>'+
//                                         '</legend>'+
//                                             '<div class="col">'+
//                                             '<table class="table table-striped table-bordered">'+
//                                                 '<tbody>'+
//                                                     '<tr>'+
//                                                         '<th>Nomor Surat</th>'+
//                                                         '<td>' + item.no_gambar+ '</td>'+
//                                                     '</tr>'+
//                                                 '</tbody>'+
//                                             '</table>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<table class="table table-striped table-bordered">'+
//                                                     '<tbody>'+
//                                                         '<tr>'+
//                                                             '<th>Tanggal</th>'+
//                                                             '<td>' + item.tgl_gambar+ '</td>'+
//                                                         '</tr>'+
//                                                     '</tbody>'+
//                                                 '</table>'+
//                                             '</div>'+
//                                             '<div class="col">'+
//                                                 '<table class="table table-striped table-bordered">'+
//                                                     '<tbody>'+
//                                                         '<tr>'+
//                                                             '<th>Luas</th>'+
//                                                             '<td>' + item.luas_gambar+ '</td>'+
//                                                         '</tr>'+
//                                                     '</tbody>'+
//                                                 '</table>'+
//                                             '</div>'+
//                                      ' </fieldset><br>'+

//                                      '<div class="row">'+
//                                     '<div class="col">'+
//                                         '<div class="container border border-primary rounded"><br>'+
//                                             '<table class="table table-striped table-bordered">'+
//                                                 '<tbody>'+
//                                                     '<tr>'+
//                                                         '<th>Hak</th>'+
//                                                         '<td>' + item.hak+ '</td>'+
//                                                     '</tr>'+
//                                                     '<tr>'+
//                                                         '<th>Asal Usul</th>'+
//                                                         '<td>' + item.asal+ '</td>'+
//                                                     '</tr>'+
//                                                     '<tr>'+
//                                                         '<th>Pemilik Asal</th>'+
//                                                         '<td>' + item.pemilik+ '</td>'+
//                                                     '</tr>'+
//                                                 '</tbody>'+
//                                             '</table>'+
//                                         '</div>'+
//                                     '</div>'+

//                                     '<div class="col">'+
//                                         '<div class="container border border-primary rounded"><br>'+
//                                             '<table class="table table-striped table-bordered">'+
//                                                 '<tbody>'+
//                                                     '<tr>'+
//                                                         '<th>Nilai</th>'+
//                                                         '<td><a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><h5 id="sumNilai"></h5></a></td>'+
//                                                     '</tr>'+
//                                                     '<tr>'+
//                                                         '<th></th>'+
//                                                         '<td></td>'+
//                                                     '</tr>'+
//                                                     '<tr>'+
//                                                         '<th>Keterangan</th>'+
//                                                         '<td>' + item.ket+ '</td>'+
//                                                     '</tr>'+
//                                                 '</tbody>'+
//                                             '</table>'+
//                                         '</div>'+
//                                     '</div>'+

//                                 '</div><br>'+
//                                 '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                         '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
//                                             '<div style="font-size: 15px;"><strong>DETAIL NILAI</strong></div>'+
//                                         '</legend>'+

//                                             ' <div class="container">'+
//                                                 '<div class="collapse" id="collapseExample">'+
//                                                     '<table class="table table-striped table-border" id="tbl_detailNilai">'+
//                                                         '<thead>'+
//                                                             '<tr>'+
//                                                                 '<th>NO</th>'+
//                                                                 '<th>Kode Perkiraan</th>'+
//                                                                 '<th>Nama Aktiva</th>'+
//                                                                 '<th>Tanggal</th>'+
//                                                                 '<th>Tahun</th>'+
//                                                                 '<th>Nilai</th>'+
//                                                                 '<th>Uraian</th>'+
//                                                             '</tr>'+
//                                                         '</thead>'+
//                                                         '<tbody>'+
//                                                         '</tbody>'+
//                                                 '</table>'+
//                                             '</div>'+
//                                         '</div>'+
//                                      '</fieldset><br>'+
//                                 '<fieldset class="border border-secondary rounded-3 p-2 row" id="filed">'+
//                                         '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
//                                             '<div style="font-size: 15px;"><strong>DOKUMEN</strong></div>'+
//                                         '</legend>'+

//                                      '</fieldset><br>'+


//                             '</div>');
//                             var lok = item.id_lokasi;
//                             $.get('/tanah.nilai/' + lok, function(data) {
//                                 var nilaiAk = new Intl.NumberFormat('id-ID', {
//                                     style: 'currency',
//                                     currency: 'IDR',
//                                 }).format(data.data);
//                                 $('#sumNilai').html(nilaiAk);
//                             })
                                // var i = 0;
                                // var table = $("#tbl_detailNilai").DataTable();
                                // table.clear().draw();
                                // $.get("/nilaiTanah.detail/"+ lok , function(data) {
                                //     $('#card-header').html('<strong>Divisi:'+ lokasi +' </strong>');
                                //     $.each(data.data, function (index, items) {
                                //         var nilaiAk = new Intl.NumberFormat('id-ID', {
                                //             style: 'currency',
                                //             currency: 'IDR',
                                //         }).format(items.nilai);
                                //         table.row.add([
                                //             ++i,
                                //             items.kode,
                                //             items.aktiva,
                                //             items.tgl_voucher,
                                //             items.tahun,
                                //             nilaiAk,
                                //             items.urai,
                                //         ]).draw();
                                //     })
                                // })
                            // $.get('/show/' + id, function (data) {
                            //     $.each(data.data, function (index, items) {
                            //         var thumbnail = $(
                            //             '<div class="pdf-thumbnail col ">' +
                            //                 '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="http://app.perumdamtirtakencana.id/assets/img/lokasi/' + items.dok + '" type="application/pdf" border border-secondary rounded>' +
                            //                 '<p><a href="#" onclick="window.open(\'http://app.perumdamtirtakencana.id/assets/img/lokasi/' + items.dok + '\', \'_blank\'); return false;">' + items.dok + '</p>' +
                            //             '</div>'
                            //         );

                            //     // Append the thumbnail to the fieldset
                            //     $('#filed').append(thumbnail);
                            //     });
                            // });


//                         })
//                     },
//                     error: function (data) {
//                         console.log('Error:', data);
//                     }
//                 });
//             });
//             //Modal EDIT show
//             $('#tbl_a').on('click', '.edit', function() {
//                 var id = $(this).data('id');
//                 $.ajax({
//                     type: "GET",
//                     url: "/tanah.detail/" + id,
//                     success: function (data) {
//                         $.each(data.data, function (index, item) {
//                         $('#lgModal').modal('show');
//                         $('#judul_modalLG').html('EDIT KIB A TANAH '+item.lokasi );
//                         $('#modal_bodyLG').html('');
//                         $('.tombol').attr('id', 'edit_submit');
//                         $('#modal_bodyLG').prepend(
//                             '<form action="" id="form_a" enctype="multipart/form-data">'+
//                                 '<div class="container">'+
//                                         '<div class="row  border border-primary rounded">'+
//                                             '<div class="container"><br>'+
//                                                 '<table class="table table-striped table-bordered rounded">'+
//                                                     '<thead>'+
//                                                         '<tr class="text-center">'+
//                                                             '<th>Alamat</th>'+
//                                                             '<th>Kode</th>'+
//                                                             ' <th>Tahun</th>'+
//                                                             '<th>Nama</th>'+
//                                                             '<th>Penggunaan</th>'+
//                                                           '</tr>'+
//                                                     '</thead>'+
//                                                 ' <tbody>'+
//                                                         '<tr>'+
//                                                             '<td>'+
//                                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                                     '<select class="select2 form-control" name="lokasi" id="lokasi_a">'+
//                                                                         '<option value="'+ item.id_lokasi +'">'+ item.lokasi +'</option>'+
//                                                                     '</select>'+
//                                                                 '</div>'+
//                                                             '</td>'+
//                                                             '<td>'+
//                                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                                     '<input name="kode" value="'+ item.kode_barang +'" id="kode" type="text" class="form-control">'+
//                                                                 '</div>'+
//                                                             '</td>'+
//                                                             '<td>'+
//                                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                                     '<input type="number" name="tahun" value="'+ item.tahun +'" id="tahun" value="2023" class="form-control">'+
//                                                                 '</div><br>'+
//                                                             '</td>'+
//                                                             '<td>'+
//                                                                 '<div class="input-group input-group-sm mb-1">'+

//                                                                     '<select class="select2 form-control" style"width:100%;"  id="nama" name="nama">'+
//                                                                         '<option "'+ item.id_barang +'">'+ item.nama_barang +'</option>'+

//                                                                     '</select>'+
//                                                                 '</div>'+
//                                                             '</td>'+
//                                                             '<td>'+
//                                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                                     '<input type="text" nama="guna" value="'+ item.guna +'" id="guna" class="form-control">'+
//                                                                 '</div>'+
//                                                             '</td>'+
//                                                     ' </tr>'+
//                                                     '<tbody/>'+
//                                                 '</table>'+
//                                             '</div>'+
//                                         '</div><br>'+





//                                         '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                             '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
//                                                 '<div style="font-size: 15px;"><strong>PENUNJUKAN</strong></div>'+
//                                             '</legend>'+
//                                                 '<div class="col">'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">No Surat</span><input nama="no_tunjuk" id="no_tunjuk" value="'+ item.no_tunjuk +'" type="text" placeholder="Penunjukan" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div>'+
//                                                 '<div class="col">'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" placeholder="Penunjukan" value="'+ item.tgl_tunjuk +'" nama="tgl_tunjuk" id="tgl_tunjuk" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div>'+
//                                                 '<div class="col">'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Luas</span><input type="text" nama="luas_tunjuk" placeholder="Penunjukan" value="'+ item.luas_tunjuk +'" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div>'+
//                                          ' </fieldset><br>'+

//                                          '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                             '<legend class="float-none w-auto px-1 border border-secondary rounded">'+
//                                             '<div style="font-size: 15px;"><strong>SURAT SPPT/SPHAT/SPJBT</strong></div>'+
//                                             '</legend>'+
//                                                 '<div class="col">'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">No Surat</span><input type="text" nama="sertifikat" id="sertifikat" value="'+ item.sertifikat +'" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div>'+
//                                                 '<div class="col">'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_sertifikat" id="tgl_sertifikat" value="'+ item.tgl_sertifikat +'" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div>'+
//                                                 '<div class="col">'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_sertifikat" id="luas_sertifikat" value="'+ item.luas_sertifikat +'" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div>'+
//                                          ' </fieldset><br>'+

//                                          '<fieldset class="border border-secondary rounded-3 p-2 row">'+
//                                             '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
//                                             '<div style="font-size: 15px;"><strong>GAMBAR SITUASI</strong></div>'+
//                                             '</legend>'+
//                                                 '<div class="col">'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">No Surat</span><input type="text" name="no_gambar" id="no_gambar" placeholder="GAMBAR SITUASI" value="'+ item.no_gambar +'" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div>'+
//                                                 '<div class="col">'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_gambar" id="tgl_gambar" value="'+ item.tgl_gambar +'" placeholder="GAMBAR SITUASI" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div>'+
//                                                 '<div class="col">'+
//                                                     '<div class="input-group input-group-sm  mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_gambar" id="luas_gambar" placeholder="GAMBAR SITUASI" value="'+ item.luas_gambar +'" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div>'+
//                                          ' </fieldset><br>'+


//                                          '<div class="row  border border-primary rounded">'+

//                                                 '<div class="col"><br>'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         // '<span class="input-group-text col-sm-3">Hak</span>'+
//                                                         '<select name="hak" id="hak" class="select2 form-control">'+
//                                                             '<option value="'+ item.hak +'">'+item.hak+'</option>'+
//                                                             '<option>SHM</option>'+
//                                                             '<option>Tanah Milik Perumdam</option>'+
//                                                             '<option>Tanah Milik Negara</option>'+
//                                                             '<option>Tanah Milik Pemda</option>'+
//                                                             '<option>Hibah</option>'+
//                                                             '<option>SPHAT</option>'+
//                                                             '<option>Hak Pakai</option>'+
//                                                             '<option>HGB</option>'+
//                                                             '<option>SPPT</option>'+
//                                                         '</select>'+
//                                                     '</div>'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Pemilik Asal</span><input name="asal" value="'+ item.pemilik +'" id="asal" type="text" class="form-control">'+
//                                                     '</div>'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Asal</span><input value="'+ item.asal +'" type="number" name="pemilik" id="pemilik" value="2023" class="form-control">'+
//                                                     '</div>'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         // '<span class="input-group-text col-sm-3">Nilai perolehan</span>'+
//                                                         '<select class="select2 form-control" name="nilai_a" id="nilai_a">'+
//                                                             '<option> -PILH NILAI AKTIVA- </option>'+
//                                                         '</select>'+
//                                                     '</div>'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Nilai saat ini</span><input name="nilai_now" id="nilai_now" value="'+ item.nilai_now +'" type="text" class="form-control">'+
//                                                     '</div>'+
//                                                 '</div><br>'+

//                                                 '<div class="col"><br>'+

//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>'+
//                                                     '</div>'+
//                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                         '<span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control">'+item.ket+'</textarea>'+
//                                                     '</div>'+
//                                                 '</div>'+

//                                         '</div><br>'+

//                                  '</div>'+
//                             '</form >');


//                         })
//                     },
//                     error: function (data) {
//                         console.log('Error:', data);
//                     }
//                 });
//             });
//         });
//     });


//         //Tutup Tab Content
//         $(document).on('click', '#a_x', function() {
//             $('#tab_a').parent().remove(); // Hapus tab
//             $('#a_tab').remove(); // Hapus konten tab
//         });

//         // END OF TANAH

//         // PERALATAN DAN MESIN
//     $('#b').on('click', function() {
//         $('#db_body').remove();
//         $('#b').addClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_b" data-bs-toggle="tab" href="#b_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB-B &nbsp;<button style="border:none;background-color: white; type="submit"  id="b_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             //Menampilkan Konten berupa HEAD tabel pada body TAB
//             $(document).ready(function() {
//                 $('#myTabContent').append(

//                     '<br>' +
//                     '<div class="tab-pane show" id="b_tab" role="tabpanel" aria-labelledby="tab_b">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header text-center">DATA PERALATAN DAN MESIN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary rounded-circle  mb-1" id="tambah_b"><i class="fa-solid fa-plus"></i></button></div></div>'+
//                                 '<div class="card-body" >'+

//                                     '<table class="table table-striped table-border" id="tbl_b">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Lokasi</th>'+
//                                                 '<th>Alamat</th>'+
//                                                 '<th>Foto</th>'+
//                                                 '<th>Detail</th>'+
//                                             '</tr>'+
//                                         '</thead>'+
//                                     '<tbody>'+
//                                 '</tbody>'+
//                             '</table>'+
//                         '</div>'+
//                     '</div>'+
//                 '</div>' +
//             '</div>');
//                 refB();
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });
//                     //Klik pada tombol tambah MESIN, maka menampilkan modal TAMBAH DATA MESIN
//                 $('#tambah_b').on('click', function() {
//                     $('.tombol').attr('id', 'proses');
//                     $('#lgModal').modal('show');
//                     $('#judul_modalLG').html('TAMBAH KIB B -  PERALATAN DAN MESIN');
//                     $('#modal_bodyLG').html('');
//                     $('#modal_bodyLG').prepend(
                        // '<form action="" id="form_a" enctype="multipart/form-data">'+
                        //     '<div class="container">'+
                        //             '<div class="row  border border-primary rounded">'+
                        //                 '<div class="container"><br>'+
                        //                     '<table class="table table-striped table-bordered rounded">'+
                        //                         '<thead>'+
                        //                             '<tr class="text-center">'+
                        //                                 '<th>Lokasi</th>'+
                        //                                 '<th>Departemen</th>'+
                        //                                 '<th>Divisi</th>'+
                        //                               '</tr>'+
                        //                         '</thead>'+
                        //                     ' <tbody>'+
                        //                             '<tr>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="lokasi" id="lokasi_b">'+
                        //                                             '<option>- PILIH LOKASI -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="dep" id="dep">'+
                        //                                             '<option>- PILIH DEPARTEMEN -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="div" id="div">'+
                        //                                             '<option>- PILIH DIVISI -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                             ' </tr>'+
                        //                         '</tbody>'+
                        //                     '</table>'+
                        //                 '</div>'+
                        //             '</div><br>'+
                        //             '<div class="row  border border-primary rounded">'+

                        //                     '<div class="col"><br>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             // '<span class="input-group-text col-sm-3">Hak</span>'+
                        //                             '<select name="nama_aset" id="nama_aset" class="select2 form-control">'+
                        //                                 '<option>-NAMA ASET-</option>'+
                        //                             '</select>'+

                        //                         '</div>'+
                        //                         '<p style="color:red;" id="lokasi_error"></p>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Kode Aset</span><input name="kode_aset" id="kode_aset" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="kode_aset_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Register</span><input type="text" name="reg" id="reg" value="" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="reg_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             // '<span class="input-group-text col-sm-3">Nilai perolehan</span>'+
                        //                             '<select class="form-control" name="jenis" id="jenis">'+
                        //                                 '<option> -JENIS ASET- </option>'+
                        //                                 '<option> Bergerak </option>'+
                        //                                 '<option> Tidak Bergerak </option>'+
                        //                             '</select>'+
                        //                         '</div>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Tahun</span><input name="tahun" id="tahun" type="number" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="tahun_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Batas</span><input name="batas" id="batas" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="batas_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<select class=" form-control" name="nilai_a" id="nilai_a">'+
                        //                                 '<option> -NILAI PEROLEHAN- </option>'+
                        //                             '</select>'+
                        //                         '</div>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Nilai Susut</span><input name="susut" id="susut" type="number" class="form-control">'+
                        //                         '</div>'+


                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<select class="form-control" name="bahan" id="bahan_mesin">'+
                        //                                 '<option> -BAHAN- </option>'+
                        //                             '</select>'+
                        //                         '</div>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Guna</span><input name="guna" id="guna" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="guna_error"></p>'+
                        //                     '</div><br>'+

                        //                     '<div class="col"><br>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Ukuran</span><input name="ukuran" id="ukuran" type="number" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="ukuran_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Merk/Type</span><input name="merk" id="merk" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="merk_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">No Pabrik</span><input name="pabrik" id="pabrik" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="pabrik_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">No Rangka</span><input name="rangka" id="rangka" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="rangka_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">No Mesin</span><input name="mesin" id="mesin" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="mesin_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">No Polisi</span><input name="nopol" id="nopol" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="nopol_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">No BPKB</span><input name="bpkb" id="bpkb" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="bpkb_error"></p>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<select class="select2 form-control" name="asal" id="asal">'+
                        //                                 '<option> -ASAL- </option>'+
                        //                                 '<option>Pembelian</option>'+
                        //                                 '<option>Bantuan</option>'+
                        //                                 '<option>Hibah</option>'+
                        //                                 '<option>Penyertaan Modal</option>'+
                        //                                 '<option>Serah Kelola</option>'+
                        //                                ' <option>Ganti Rugi</option>'+
                        //                                 '<option>Surat Penunjukan</option>'+
                        //                                 '<option>SK Walikota</option>'+
                        //                                 '<option>Sewa</option>'+
                        //                             '</select>'+
                        //                         '</div>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>'+
                        //                         '</div>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>'+
                        //                         '</div>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>'+
                        //                         '</div>'+
                        //                         '<p style="color:red;" id="ket_error"></p>'+
                        //                     '</div>'+

                        //             '</div>'+

                        //             '<div class="row border border-primary rounded mt-1">'+
                        //                 '<br><div class="float-end">'+
                        //                     '<button type="button" id="submit_b" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button>'+
                        //                 '</div>'+
                        //             '</div><br>'+


                        //             '<div class="row border border-primary rounded">'+
                        //                 '<div class="container"><br>'+
                        //                     '<table  class="table table-bordered" id="tbl_mesin_input">'+
                        //                         '<thead>'+
                        //                             '<tr class="text-center">'+
                        //                                 '<th>No</th>'+
                        //                                 '<th>Lokasi</th>'+
                        //                                 '<th>Divisi</th>'+
                        //                                 '<th>Barang</th>'+
                        //                                 '<th>Merk</th>'+
                        //                               '</tr>'+
                        //                         '</thead>'+
                        //                         ' <tbody>'+
                        //                         '</tbody>'+
                        //                     '</table>'+
                        //                 '</div>'+
                        //             '</div><br>'+

                        //         '</div>'+
                        //     '</form >');

//                         $('.select2').select2({
//                             dropdownParent: $('#modal_bodyLG')
//                         });
//                         pilih();
//                         refMesinInput();
//                     });
//                     //SUBMIT MESIN
//                     $(document).on('click', '#submit_b', function (event) {
//                         event.preventDefault();
//                         var fileInput = $('#img')[0].files[0];
//                         if (!fileInput) {
//                             alert('Please select an image.');
//                             return;
//                         }
//                         var reader = new FileReader();
//                          reader.onload = function (e) {
//                             var base64Image = e.target.result.split(',')[1]; // Extract base64 data

//                             // Send the base64 encoded image data in the AJAX request
//                             $.ajax({
//                                 data: {
//                                     lokasi: $('#lokasi_b').val(),
//                                     dep: $('#dep').val(),
//                                     div:$('#div').val(),
//                                     nama_aset:$('#nama_aset').val(),
//                                     kode_aset:$('#kode_aset').val(),
//                                     reg:$('#reg').val(),
//                                     jenis:$('#jenis').val(),
//                                     tahun:$('#tahun').val(),
//                                     batas:$('#batas').val(),
//                                     nilai:$('#nilai').val(),
//                                     susut:$('#susut').val(),
//                                     bahan:$('#bahan_mesin').val(),
//                                     guna:$('#guna').val(),
//                                     ukuran:$('#ukuran').val(),
//                                     merk:$('#merk').val(),
//                                     pabrik:$('#pabrik').val(),
//                                     rangka:$('#rangka').val(),
//                                     nopol:$('#nopol').val(),
//                                     mesin:$('#mesin').val(),
//                                     bpkb:$('#bpkb').val(),
//                                     asal:$('#asal').val(),
//                                     ket:$('#ket').val(),
//                                     img: base64Image
//                                 },
//                                 url: "/mesin.save",
//                                 type: "POST",
//                                 dataType: 'json',
//                                 success: function (data) {
//                                     refMesinInput();
//                                     // $('#modal_body').html('');
//                                     // $('#myModal').modal('hide');
//                                     // alert('Data berhasil Disimpan');
//                                     // refLok();
//                                 },
//                                 error: function(xhr) {
//                                     if (xhr.status === 400) {
//                                         // Validation error, handle it
//                                         var errors = xhr.responseJSON.errors;
//                                         $.each(errors, function(field, messages) {
//                                             // Display each error message for the specific field
//                                             $('#'+field+'_error').text(messages[0]); // Assume you have an element with an ID like 'reg_error'
//                                         });
//                                     } else {
//                                         // Handle other errors
//                                         console.error('An error occurred:', xhr.responseText);
//                                     }
//                                 }
//                             });
//                         };

//                         // Read the selected file as a data URL
//                         reader.readAsDataURL(fileInput);
//                     });

//                     $(document).on('click', '#proses', function (event) {
//                         $.ajax({
//                             url: "/mesin.clear",
//                             type: "POST",
//                             dataType: 'json',
//                                 success: function (data) {
//                                 alert('Data berhasil Diproses')
//                                 refMesinInput();
//                             },
//                             error: function (xhr, textStatus, errorThrown) {
//                                 alert('Data gagal Diproses');
//                             },
//                     });

//                     })

//                 //Canvas  Mesin show
//                 $('#tbl_b').on('click', '.tree', function() {
//                 $('#kepala').html('')
//                 var id = $(this).data('id');
//                 $('#card-body').html('');
//                 $('#canvas_body').html('');
//                 $('#canvas_tree').html('');
//                 $.ajax({
//                     type: "GET",
//                     url: "/mesin.dep/"+ id,
//                     success: function (data) {
//                         $.each(data.data, function (index, item) {
//                             //intip mesin
//                             $('#kepala').html('<table class="table table-bordered">'+
//                                                     '<thead>'+
//                                                         '<tr>'+
//                                                             '<th class="text-center">LOKASI</th>'+
//                                                             '<th class="text-center">NILAI</th>'+
//                                                         '</tr>'+
//                                                     '</thead>'+
//                                                     '<tbody>'+
//                                                         '<tr>'+
//                                                             '<td class="text-center">' + item.lokasi + '</td>'+
//                                                             '<td class="text-center"><a href="#" id="nilaiMesin" data-id="'+ item.id_lokasi + '"></a></td>'+
//                                                         '</tr>'+
//                                                     '</tbody>'+
//                                               '</table>'+
//                                         '<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>')
//                                         var lok = item.id_lokasi;

//                                         $.get('/mesin.nilai/' + lok, function(data) {
//                                             var nilaiAk = new Intl.NumberFormat('id-ID', {
//                                                 style: 'currency',
//                                                 currency: 'IDR',
//                                             }).format(data.data);
//                                             $('#nilaiMesin').html(nilaiAk);
//                                         })
//                                         $(document).on('click', '#nilaiMesin', function (event) {
//                                             var lok = $(this).data('id');

//                                             $('#lgModal').modal('show');
//                                             $('#judul_modalLG').html('DETAIL NILAI MESIN '+item.lokasi );
//                                             $('#modal_bodyLG').html('');
//                                             $('#modal_bodyLG').html('<div class="container">'+

//                                                                         '<table class="table table-striped table-border" id="tbl_detailNilai">'+
//                                                                             '<thead>'+
//                                                                                 '<tr>'+
//                                                                                     '<th>NO</th>'+
//                                                                                     '<th>Kode Perkiraan</th>'+
//                                                                                     '<th>Nama Aktiva</th>'+
//                                                                                     '<th>Tanggal</th>'+
//                                                                                     '<th>Tahun</th>'+
//                                                                                     '<th>Nilai</th>'+
//                                                                                     '<th>Uraian</th>'+
//                                                                                 '</tr>'+
//                                                                             '</thead>'+
//                                                                             '<tbody>'+
//                                                                             '</tbody>'+
//                                                                     '</table>'+
//                                                             '</div>');
//                                             var i = 0;
//                                             var table = $("#tbl_detailNilai").DataTable();
//                                             table.clear().draw();
//                                             $.get("/nilaiMesin.detail/"+ lok , function(data) {
//                                                 $('#card-header').html('<strong>Lokasi:'+ lokasi +' </strong>');
//                                                 $.each(data.data, function (index, items) {
//                                                     var nilaiAk = new Intl.NumberFormat('id-ID', {
//                                                         style: 'currency',
//                                                         currency: 'IDR',
//                                                     }).format(items.nilai);
//                                                     table.row.add([
//                                                         ++i,
//                                                         items.kode,
//                                                         items.aktiva,
//                                                         items.tgl_voucher,
//                                                         items.tahun,
//                                                         nilaiAk,
//                                                         items.urai,
//                                                     ]).draw();
//                                                 })
//                                             })

//                                         })

                //NGULIK MESIN
                            // $('#canvas_tree').append(
                            //     '<li><span><strong>' + item.kode_dep +  '</strong></span>'+
                            //             '<ol id="mesin_div'+ item.id_departemen +'"></ol>'+
                            //         '</li>');
                            // var dep = item.id_departemen;
                            // var lok = item.id_lokasi;
                            // $.get("/mesin.div/"+ dep + "/" + lok , function(data) {

                            //     $.each(data.data, function(index, item) {
                            //         var div = item.id_div;

                            //         $("#mesin_div" + item.id_departemen).append('<li><span><a data-id="' + dep + ',' + lok + ',' + div +
                            //         ',' + item.nama_div +'" href="#" style="text-decoration: none;" id="tampil_mesin">'+ item.nama_div +'</a></span></li>')
                            //     });
                            // })
//                         })
//                     },
//                     error: function (data) {
//                         console.log('Error:', data);
//                     }
//                 });

//                 $(document).on('click', '#tampil_mesin', function() {


//                                     $('#card-body').html('');
//                                     $('#card-body').append(

                                    // ' <table class="table table-striped table-border" id="tbl_b_data">'+
                                    //                 '<thead>'+
                                    //                     '<tr>'+
                                    //                         '<th>NO</th>'+
                                    //                         '<th>Nama Aset</th>'+
                                    //                         '<th>Merk</th>'+
                                    //                         '<th>Penggunaan</th>'+
                                    //                         '<th>Tahun</th>'+
                                    //                         '<th>Foto/Detail</th>'+
                                    //                         '<th>Aksi</th>'+
                                    //                     '</tr>'+
                                    //                 '</thead>'+
                                    //                 '<tbody>'+
                                    //             '</tbody>'+
                                    //             '</table>'
//                                     );
                                //     var id = $(this).data('id');
                                //     var delimiter = ",";
                                //     var id_key = id.split(delimiter);
                                //     var dep = id_key[0];
                                //     var lok = id_key[1];
                                //     var div = id_key[2];
                                //     var nama_div = id_key[3];
                                //     var i = 0;
                                //     var table = $("#tbl_b_data").DataTable();
                                //     table.clear().draw();
                                //     $.get("/mesin.show/"+ lok + "/" + dep + "/" + div , function(data) {
                                //         $('#card-header').html('<strong>Divisi: '+ nama_div +'</strong><button class="btn btn-sm btn-primary float-end" id="print_b" data-id="' + lok + "," + dep + "," + div + '"><i class="fa-solid fa-print"></i></button>');

                                //     $.each(data.data, function (index, items) {
                                //         var editButton =
                                //         '<div class="btn-group">'+
                                //             '<button class="btn btn-default border border-secondary btn-sm" type="button"><i class="fa-solid fa-ellipsis-vertical"></i></button>'+
                                //             '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                                //             '<ul class="dropdown-menu">'+

                                //                 '<li><a class="dropdown-item  edit" data-id=" '+ items.id_mesin +' " href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
                                //                 '<li><a class="dropdown-item deleteB" data-id=" '+ items.id_mesin +' " href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
                                //                 '<li><hr class="dropdown-divider"></li>'+

                                //             '</ul>'+
                                //         '</div>';
                                //         var img = '<a href="#" id="detail_mesin_divisi" data-id="'+ items.id_mesin +'"><img src="http://app.perumdamtirtakencana.id/assets/img/mesin/'+items.img+'" height="100px" width="100px"></img></a>';
                                //         table.row.add([
                                //             ++i,
                                //             items.nama_barang,
                                //             items.merk,
                                //             items.guna,
                                //             items.tahun,
                                //             img,
                                //             editButton
                                //         ]).draw();
                                //     })
                                // })
//                                 $(document).on('click', '#print_b', function (event) {
//                                     var id = $(this).data('id');
//                                     var delimiter = ",";
//                                     var id_key = id.split(delimiter);
//                                     var lok = id_key[0];
//                                     var dep = id_key[1];
//                                     var div = id_key[2];
//                                     var url = "/mesin.print/"+ lok +"/"+ dep + "/" + div ;
//                                     var features = 'width=800,height=600';
//                                     window.open(url, '_blank', features);
//                                 })
//                                 //Hapus Data Mesin
//                                 $('#tbl_b_data').on('click', '.deleteB', function() {

//                                     var id = $(this).data('id');
//                                     var del = confirm(id);
//                                     if (del) {
//                                         $.ajax({
//                                             url: "/mesin.hapus/" + id,
//                                             type: "POST",
//                                             dataType: 'json',
//                                                 success: function (data) {
//                                                 alert('Data berhasil Dihapus')
//                                                 refLok();
//                                             },
//                                             error: function (xhr, textStatus, errorThrown) {
//                                                 alert('Data gagal dihapus');
//                                             },
//                                         });
//                                     }
//                                 })
//                                 $('#tbl_b_data').on('click', '.edit', function() {
//                                     $('.tombol').attr('id', 'proses_edit');
//                                     var id = $(this).data('id');
//                                     $.get("/mesin.edit/"+ id , function(data) {
//                                         $.each(data.data, function (index, item) {

//                                             $('#lgModal').modal('show');
//                                             $('#judul_modalLG').html('UPDATE DATA MESIN');
//                                             $('#modal_bodyLG').html('');
//                                             $('#modal_bodyLG').prepend(

//                                                 '<form action="" id="form_a" enctype="multipart/form-data">'+
//                                                 '<input type="text" value="' + item.id_mesin + '" id="id">' +
//                                                 '<div class="container">'+
//                                                         '<div class="row  border border-primary rounded">'+
//                                                             '<div class="container"><br>'+
//                                                                 '<table class="table table-striped table-bordered rounded">'+
//                                                                     '<thead>'+
//                                                                         '<tr class="text-center">'+
//                                                                             '<th>Lokasi</th>'+
//                                                                             '<th>Departemen</th>'+
//                                                                             '<th>Divisi</th>'+
//                                                                         '</tr>'+
//                                                                     '</thead>'+
//                                                                 ' <tbody>'+
//                                                                         '<tr>'+
//                                                                             '<td>'+
//                                                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                                                     '<select class="select2 form-control" name="lokasi" id="lokasi_b">'+
//                                                                                         '<option value="'+ item.id_lokasi +'">'+ item.lokasi +'</option>'+
//                                                                                         '<option>- PILIH LOKASI -</option>'+
//                                                                                     '</select>'+
//                                                                                 '</div>'+
//                                                                             '</td>'+
//                                                                             '<td>'+
//                                                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                                                     '<select class="select2 form-control" name="dep" id="dep">'+
//                                                                                         '<option value="'+ item.id_departemen +'">'+ item.kode_dep +'</option>'+
//                                                                                         '<option>- PILIH DEPARTEMEN -</option>'+
//                                                                                     '</select>'+
//                                                                                 '</div>'+
//                                                                             '</td>'+
//                                                                             '<td>'+
//                                                                                 '<div class="input-group input-group-sm mb-1">'+
//                                                                                     '<select class="select2 form-control" name="div" id="div">'+
//                                                                                         '<option value="'+ item.id_div +'" >'+ item.nama_div +'</option>'+
//                                                                                         '<option>- PILIH DIVISI -</option>'+
//                                                                                     '</select>'+
//                                                                                 '</div>'+
//                                                                             '</td>'+
//                                                                         ' </tr>'+
//                                                                     '</tbody>'+
//                                                                 '</table>'+
//                                                             '</div>'+
//                                                         '</div><br>'+
//                                                         '<div class="row  border border-primary rounded">'+

//                                                                 '<div class="col"><br>'+
//                                                                     '<div class="input-group input-group-sm mb-1">'+

//                                                                         '<select name="nama_aset" id="nama_aset" class="select2 form-control">'+
//                                                                             '<option value="'+ item.idBar +'">'+ item.nama_barang +'</option>'+
//                                                                             '<option>-NAMA ASET-</option>'+
//                                                                         '</select>'+

//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="lokasi_error"></p>'+
//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Kode Aset</span><input name="kode_aset" id="kode_aset" type="text" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="kode_aset_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Register</span><input type="text" name="reg" id="reg" value="" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="reg_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         // '<span class="input-group-text col-sm-3">Nilai perolehan</span>'+
//                                                                         '<select class="form-control" name="jenis" id="jenis" disabled>'+

//                                                                             '<option> -JENIS ASET- </option>'+
//                                                                             '<option> Bergerak </option>'+
//                                                                             '<option> Tidak Bergerak </option>'+
//                                                                         '</select>'+
//                                                                     '</div>'+
//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Tahun</span><input name="tahun" id="tahun" type="number" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="tahun_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Batas</span><input name="batas" id="batas" type="text" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="batas_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<select class=" form-control" name="nilai_a" id="nilai_a">'+
//                                                                             '<option> -NILAI PEROLEHAN- </option>'+
//                                                                         '</select>'+
//                                                                     '</div>'+
//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Nilai Susut</span><input name="susut" id="susut" type="number" class="form-control">'+
//                                                                     '</div>'+


//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<select class="form-control" name="bahan" id="bahan_mesin">'+

//                                                                             '<option> -BAHAN- </option>'+
//                                                                         '</select>'+
//                                                                     '</div>'+
//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Guna</span><input name="guna" id="guna" type="text" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="guna_error"></p>'+
//                                                                 '</div><br>'+

//                                                                 '<div class="col"><br>'+
//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Ukuran</span><input name="ukuran" id="ukuran" type="number" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="ukuran_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Merk/Type</span><input name="merk" id="merk" type="text" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="merk_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">No Pabrik</span><input name="pabrik" id="pabrik" type="text" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="pabrik_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">No Rangka</span><input name="rangka" id="rangka" type="text" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="rangka_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">No Mesin</span><input name="mesin" id="mesin" type="text" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="mesin_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">No Polisi</span><input name="nopol" id="nopol" type="text" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="nopol_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">No BPKB</span><input name="bpkb" id="bpkb" type="text" class="form-control">'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="bpkb_error"></p>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<select class="select2 form-control" name="asal" id="asal">'+
//                                                                         '<option value="'+ item.asal +'">'+ item.asal +'</option>'+
//                                                                             '<option> -ASAL- </option>'+
//                                                                             '<option>Pembelian</option>'+
//                                                                             '<option>Bantuan</option>'+
//                                                                             '<option>Hibah</option>'+
//                                                                             '<option>Penyertaan Modal</option>'+
//                                                                             '<option>Serah Kelola</option>'+
//                                                                             '<option>Ganti Rugi</option>'+
//                                                                             '<option>Surat Penunjukan</option>'+
//                                                                             '<option>SK Walikota</option>'+
//                                                                             '<option>Sewa</option>'+
//                                                                         '</select>'+
//                                                                     '</div>'+

//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>'+
//                                                                     '</div>'+
//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>'+
//                                                                     '</div>'+
//                                                                     '<div class="input-group input-group-sm mb-1">'+
//                                                                         '<span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>'+
//                                                                     '</div>'+
//                                                                     '<p style="color:red;" id="ket_error"></p>'+
//                                                                 '</div>'+
//                                                             '</div>'+
//                                                         '</div>'+
//                                                     '</form >');


//                                                 $('#kode_aset').val(item.kode);
//                                                 $('#reg').val(item.reg);
//                                                 //$('#jenis').val(item.jenis);
//                                                 $('#tahun').val(item.tahun);
//                                                 $('#batas').val(item.batas);
//                                                 $('#nilai').val(item.nilai);
//                                                 $('#susut').val(item.susut);
//                                                 $('#bahan_mesin').val(item.bahan);
//                                                 $('#guna').val(item.guna);
//                                                 $('#ukuran').val(item.ukuran);
//                                                 $('#merk').val(item.merk);
//                                                 $('#pabrik').val(item.pabrik);
//                                                 $('#rangka').val(item.rangka);
//                                                 $('#nopol').val(item.polisi);
//                                                 $('#mesin').val(item.mesin);
//                                                 $('#bpkb').val(item.bpkb);
//                                                 //$('#asal').val(item.asal);
//                                                 $('#ket').val(item.ket);
//                                             })
//                                             $('.select2').select2({
//                                                 dropdownParent: $('#modal_bodyLG')
//                                             });
//                                             pilih();
//                                         })

//                                         $.get('/show/' + id, function (data) {
//                                             $.each(data.data, function (index, items) {
//                                                 var thumbnail = $(
//                                                     '<div class="pdf-thumbnail col ">' +
//                                                         '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="http://app.perumdamtirtakencana.id/assets/img/mesin/' + items.dok + '" type="application/pdf" border border-secondary rounded>' +
//                                                         '<p><a href="#" onclick="window.open(\'http://app.perumdamtirtakencana.id/assets/img/mesin/' + items.dok + '\', \'_blank\'); return false;">' + items.dok + '</p>' +
//                                                     '</div>'
//                                                 );

//                                             // Append the thumbnail to the fieldset
//                                             $('#filed').append(thumbnail);
//                                             });
//                                         });
//                                     })
//                                     $(document).on('click', '#proses_edit', function (event) {
//                                         var id = $('#id').val();
//                                         $.ajax({
//                                             data: {
//                                                 lokasi: $('#lokasi_b').val(),
//                                                 dep: $('#dep').val(),
//                                                 div:$('#div').val(),
//                                                 nama_aset:$('#nama_aset').val(),
//                                                 kode_aset:$('#kode_aset').val(),
//                                                 reg:$('#reg').val(),
//                                                 jenis:$('#jenis').val(),
//                                                 tahun:$('#tahun').val(),
//                                                 batas:$('#batas').val(),
//                                                 nilai:$('#nilai').val(),
//                                                 susut:$('#susut').val(),
//                                                 bahan:$('#bahan_mesin').val(),
//                                                 guna:$('#guna').val(),
//                                                 ukuran:$('#ukuran').val(),
//                                                 merk:$('#merk').val(),
//                                                 pabrik:$('#pabrik').val(),
//                                                 rangka:$('#rangka').val(),
//                                                 nopol:$('#nopol').val(),
//                                                 mesin:$('#mesin').val(),
//                                                 bpkb:$('#bpkb').val(),
//                                                 asal:$('#asal').val(),
//                                                 ket:$('#ket').val(),
//                                             },
//                                             url: "/mesin.update",
//                                             type: "POST",
//                                             dataType: 'json',
//                                             success: function (data) {
//                                                 refMesinInput();
//                                                 // $('#modal_body').html('');
//                                                 // $('#myModal').modal('hide');
//                                                 alert('Data berhasil Disimpan');
//                                                 // refLok();
//                                             },
//                                             error: function(xhr) {
//                                                 if (xhr.status === 400) {
//                                                     // Validation error, handle it
//                                                     var errors = xhr.responseJSON.errors;
//                                                     $.each(errors, function(field, messages) {
//                                                         // Display each error message for the specific field
//                                                         $('#'+field+'_error').text(messages[0]); // Assume you have an element with an ID like 'reg_error'
//                                                     });
//                                                 } else {
//                                                     // Handle other errors
//                                                     console.error('An error occurred:', xhr.responseText);
//                                                 }
//                                             }
//                                         });
//                                     })
//                 })


//                 $(document).on('click', '#detail_mesin_divisi', function(){
//                     var id = $(this).data('id');
//                     $.get("/mesin.detail/"+ id , function(data) {
//                         $.each(data.data, function (index, item) {
//                             var formattedCurrency = new Intl.NumberFormat('en-US', {
//                                 style: 'currency',
//                                 currency: 'IDR' // Change 'USD' to the appropriate currency code
//                             }).format(item.harga);
//                             $('#lgModal').modal('show');
//                             $('#judul_modalLG').html('DETAIL MESIN');
//                             $('#modal_bodyLG').html('');
//                             $('#modal_bodyLG').prepend(
                                // '<div class="container">'+
                                //     '<img src="http://app.perumdamtirtakencana.id/assets/img/mesin/'+item.img+'" height="500px" width="550px" class="rounded mx-auto d-block" alt="..."><br>'+

                                //     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                //         '<legend class="float-none w-auto px-1 border border-secondary rounded">'+
                                //         '<div style="font-size: 15px;">-</div>'+
                                //         '</legend>'+
                                //             '<div class="col">'+
                                //                 '<div class="input-group input-group-sm mb-1">'+
                                //                     '<table class="table table-striped table-bordered">'+
                                //                         '<tbody>'+
                                //                             '<tr>'+
                                //                                 '<th>KODE</th>'+
                                //                                 '<td>' + item.kode+ '</td>'+
                                //                             '</tr>'+
                                //                         '</tbody>'+
                                //                     '</table>'+
                                //                 '</div>'+
                                //             '</div>'+
                                //             '<div class="col">'+
                                //                 '<div class="input-group input-group-sm mb-1">'+
                                //                     '<table class="table table-striped table-bordered">'+
                                //                         '<tbody>'+
                                //                             '<tr>'+
                                //                                 '<th>NAMA BARANG</th>'+
                                //                                 '<td>' + item.nama_barang + '</td>'+
                                //                             '</tr>'+
                                //                         '</tbody>'+
                                //                     '</table>'+
                                //                 '</div>'+
                                //             '</div>'+
                                //             '<div class="col">'+
                                //                 '<div class="input-group input-group-sm mb-1">'+
                                //                     '<table class="table table-striped table-bordered">'+
                                //                         '<tbody>'+
                                //                             '<tr>'+
                                //                                 '<th>PENGGUNAAN</th>'+
                                //                                 '<td>' + item.guna+ '</td>'+
                                //                             '</tr>'+
                                //                         '</tbody>'+
                                //                     '</table>'+
                                //                 '</div>'+
                                //             '</div>'+
                                //      ' </fieldset><br>'+



                                //          '<div class="row">'+
                                //         '<div class="col">'+
                                //             '<div class="container border border-primary rounded"><br>'+
                                //                 '<table class="table table-striped table-bordered">'+
                                //                     '<tbody>'+
                                //                         '<tr>'+
                                //                             '<th>MERK / TYPE</th>'+
                                //                             '<td>' + item.merk+ '</td>'+
                                //                         '</tr>'+
                                //                         '<tr>'+
                                //                             '<th>UKURAN / CC</th>'+
                                //                             '<td>' + item.ukuran+ '</td>'+
                                //                         '</tr>'+
                                //                         '<tr>'+
                                //                             '<th>BAHAN</th>'+
                                //                             '<td>' + item.bahan+ '</td>'+
                                //                         '</tr>'+
                                //                         '<tr>'+
                                //                             '<th>TAHUN</th>'+
                                //                             '<td>' + item.tahun+ '</td>'+
                                //                         '</tr>'+

                                //                     '</tbody>'+
                                //                 '</table>'+
                                //             '</div>'+
                                //         '</div>'+

                                //         '<div class="col">'+
                                //             '<div class="container border border-primary rounded"><br>'+
                                //                 '<table class="table table-striped table-bordered">'+
                                //                     '<tbody>'+
                                //                         '<tr>'+
                                //                             '<th>BPKB</th>'+
                                //                             '<td>' + item.bpkb+ '</td>'+
                                //                         '</tr>'+
                                //                         '<tr>'+
                                //                             '<th>PABRIK</th>'+
                                //                             '<td>' + item.pabrik+ '</td>'+
                                //                         '</tr>'+
                                //                         '<tr>'+
                                //                             '<th>RANGKA</th>'+
                                //                             '<td>' + item.rangka+ '</td>'+
                                //                         '</tr>'+
                                //                         '<tr>'+
                                //                             '<th>MESIN</th>'+
                                //                             '<td>' + item.mesin+ '</td>'+
                                //                         '</tr>'+
                                //                         '<tr>'+
                                //                             '<th>POLISI</th>'+
                                //                             '<td>' + item.polisi+ '</td>'+
                                //                         '</tr>'+
                                //                     '</tbody>'+
                                //                 '</table>'+
                                //             '</div>'+
                                //         '</div>'+

                                //     '</div><br>'+

                                //     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                //         '<legend class="float-none w-auto px-1 border border-secondary rounded">'+
                                //         '<div style="font-size: 15px;">-</div>'+
                                //         '</legend>'+
                                //             '<div class="col">'+
                                //                 '<div class="input-group input-group-sm mb-1">'+
                                //                     '<table class="table table-striped table-bordered">'+
                                //                         '<tbody>'+
                                //                             '<tr>'+
                                //                                 '<th>ASAL USUL</th>'+
                                //                                 '<td>' + item.asal+ '</td>'+
                                //                             '</tr>'+
                                //                         '</tbody>'+
                                //                     '</table>'+
                                //                 '</div>'+
                                //             '</div>'+
                                //             '<div class="col">'+
                                //                 '<div class="input-group input-group-sm mb-1">'+
                                //                     '<table class="table table-striped table-bordered">'+
                                //                         '<tbody>'+
                                //                             '<tr>'+
                                //                                 '<th>NILAI PEROLEHAN</th>'+
                                //                                 '<td>' + formattedCurrency + '</td>'+
                                //                             '</tr>'+
                                //                         '</tbody>'+
                                //                     '</table>'+
                                //                 '</div>'+
                                //             '</div>'+
                                //             '<div class="col">'+
                                //                 '<div class="input-group input-group-sm mb-1">'+
                                //                     '<table class="table table-striped table-bordered">'+
                                //                         '<tbody>'+
                                //                             '<tr>'+
                                //                                 '<th>NILAI PENYUSUTAN</th>'+
                                //                                 '<td>' + item.susut+ '</td>'+
                                //                             '</tr>'+
                                //                         '</tbody>'+
                                //                     '</table>'+
                                //                 '</div>'+
                                //             '</div>'+
                                //             '<div class="col">'+
                                //                 '<div class="input-group input-group-sm mb-1">'+
                                //                     '<table class="table table-striped table-bordered">'+
                                //                         '<tbody>'+
                                //                             '<tr>'+
                                //                                 '<th>KET</th>'+
                                //                                 '<td>' + item.ket   + '</td>'+
                                //                             '</tr>'+
                                //                         '</tbody>'+
                                //                     '</table>'+
                                //                 '</div>'+
                                //             '</div>'+
                                //      ' </fieldset><br>'+

                                //     '<fieldset class="border border-secondary rounded-3 p-2 row" id="filed">'+
                                //             '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                //                 '<div style="font-size: 15px;"><strong>DOKUMEN</strong></div>'+
                                //             '</legend>'+

                                //          '</fieldset><br>'+


                                // '</div>');
//                             })
//                         })

                        // $.get('/show/' + id, function (data) {
                        //     $.each(data.data, function (index, items) {
                        //         var thumbnail = $(
                        //             '<div class="pdf-thumbnail col ">' +
                        //                 '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="http://app.perumdamtirtakencana.id/assets/img/mesin/' + items.dok + '" type="application/pdf" border border-secondary rounded>' +
                        //                 '<p><a href="#" onclick="window.open(\'http://app.perumdamtirtakencana.id/assets/img/mesin/' + items.dok + '\', \'_blank\'); return false;">' + items.dok + '</p>' +
                        //             '</div>'
                        //         );

                        //     // Append the thumbnail to the fieldset
                        //     $('#filed').append(thumbnail);
                        //     });
                        // });
//                     })

//                 });
//             })
//         });

//             //del
//             $(document).on('click', '#b_x', function() {
//                 $('#tab_b').parent().remove();
//                 $('#b_tab').remove();
//             });
//         // END OF PERALATAN DAN MESIN

//     // GEDUNG DAN BANGUNAN
//     $('#c').on('click', function() {
//         $('#db_body').remove();
//         $('#c').addClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_c" data-bs-toggle="tab" href="#c_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB-C &nbsp;<button style="border:none;background-color: white; type="submit"  id="c_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(

//                     '<div class="tab-pane show" id="c_tab" role="tabpanel" aria-labelledby="tab_c">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA GEDUNG DAN BANGUNAN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_c"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_c">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>LOKASI</th>'+
//                                                 '<th>ALAMAT</th>'+
//                                                 '<th>FOTO</th>'+
//                                                 '<th>DETAIL</th>'+
//                                             '</tr>'+
//                                         '</thead>'+
//                                         '<tbody>'+
//                                         '</tbody>'+
//                                     '</table>'+
//                                 '</div>'+
//                             '</div>'+
//                         '</div>' +
//                     '</div>');
//                     refC();
//                     $('#tbl_c').on('click', '.tree', function() {//gedung tree
//                         $('#kepala').html('')
//                         var id = $(this).data('id');
//                         $('#card-body').html('');
//                         $('#canvas_body').html('');
//                         $('#canvas_tree').html('');
//                         $.ajax({
//                             type: "GET",
//                             url: "/gedung.dep/"+ id,
//                             success: function (data) {
//                                 $.each(data.data, function (index, item) {
//                                     $('#kepala').html('<table class="table table-bordered">'+
//                                                     '<thead>'+
//                                                         '<tr>'+
//                                                             '<th class="text-center">LOKASI</th>'+
//                                                             '<th class="text-center">NILAI</th>'+
//                                                         '</tr>'+
//                                                     '</thead>'+
//                                                     '<tbody>'+
//                                                         '<tr>'+
//                                                             '<td class="text-center">' + item.lokasi + '</td>'+
//                                                             '<td class="text-center"><a href="#" id="nilaiGedung" data-id="'+ item.id_lokasi + '"></a></td>'+
//                                                         '</tr>'+
//                                                     '</tbody>'+
//                                               '</table>'+
//                                         '<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>')
//                                         var lok = item.id_lokasi;

//                                         $.get('/gedung.nilai/' + lok, function(data) {
//                                             var nilaiAk = new Intl.NumberFormat('id-ID', {
//                                                 style: 'currency',
//                                                 currency: 'IDR',
//                                             }).format(data.data);
//                                             $('#nilaiGedung').html(nilaiAk);
//                                         })
//                                         $(document).on('click', '#nilaiGedung', function (event) {
//                                             var lok = $(this).data('id');
//                                             $('#lgModal').modal('show');
//                                             $('#judul_modalLG').html('DETAIL NILAI GEDUNG '+item.lokasi );
//                                             $('#modal_bodyLG').html('');
//                                             $('#modal_bodyLG').html('<div class="container">'+

                                                            //             '<table class="table table-striped table-border" id="tbl_detailNilai">'+
                                                            //                 '<thead>'+
                                                            //                     '<tr>'+
                                                            //                         '<th>NO</th>'+
                                                            //                         '<th>Kode Perkiraan</th>'+
                                                            //                         '<th>Nama Aktiva</th>'+
                                                            //                         '<th>Tanggal</th>'+
                                                            //                         '<th>Tahun</th>'+
                                                            //                         '<th>Nilai</th>'+
                                                            //                         '<th>Uraian</th>'+
                                                            //                     '</tr>'+
                                                            //                 '</thead>'+
                                                            //                 '<tbody>'+
                                                            //                 '</tbody>'+
                                                            //         '</table>'+
                                                            // '</div>');
//                                             var i = 0;
//                                             var table = $("#tbl_detailNilai").DataTable();
//                                             table.clear().draw();
//                                             $.get("/nilaiGedung.detail/"+ lok , function(data) {
//                                                 $('#card-header').html('<strong>Lokasi:'+ lokasi +' </strong>');
//                                                 $.each(data.data, function (index, items) {
//                                                     var nilaiAk = new Intl.NumberFormat('id-ID', {
//                                                         style: 'currency',
//                                                         currency: 'IDR',
//                                                     }).format(items.nilai);
//                                                     table.row.add([
//                                                         ++i,
//                                                         items.kode,
//                                                         items.aktiva,
//                                                         items.tgl_voucher,
//                                                         items.tahun,
//                                                         nilaiAk,
//                                                         items.urai,
//                                                     ]).draw();
//                                                 })
//                                             })

//                                         })

//                                     $('#canvas_tree').append(
//                                         '<li><span><strong>' + item.kode_dep +  '</strong></span>'+
//                                                 '<ol id="mesin_div'+ item.id_departemen +'"></ol>'+
//                                             '</li>');
//                                     var dep = item.id_departemen;
//                                     var lok = item.id_lokasi;
//                                     $.get("/gedung.div/"+ dep + "/" + lok , function(data) {

//                                         $.each(data.data, function(index, item) {
//                                             var div = item.id_div;

//                                             $("#mesin_div" + item.id_departemen).append('<li><span><a data-id="' + dep + ',' + lok + ',' + div +
//                                             ',' + item.nama_div +'" href="#" style="text-decoration: none;" id="tampil_gedung">'+ item.nama_div +'</a></span></li>')
//                                         });
//                                     })
//                                 })
//                             },
//                             error: function (data) {
//                                 console.log('Error:', data);
//                             }
//                         });

//                     })

//                     $(document).on('click', '#tampil_gedung', function() {
//                         $('#card-body').html('');
//                         $('#card-body').append(

                        //    ' <table class="table table-striped table-border" id="tbl_c_data">'+
                        //                 '<thead>'+
                        //                     '<tr>'+
                        //                         '<th>NO</th>'+
                        //                         '<th>Nama Aset</th>'+
                        //                         '<th>Penggunaan</th>'+
                        //                         '<th>FOTO/Detail</th>'+
                        //                         '<th>Aksi</th>'+
                        //                     '</tr>'+
                        //                 '</thead>'+
                        //                 '<tbody>'+
                        //                '</tbody>'+
                        //             '</table>'
//                         );
//                         var id = $(this).data('id');
//                         var delimiter = ",";
//                         var id_key = id.split(delimiter);
//                         var dep = id_key[0];
//                         var lok = id_key[1];
//                         var div = id_key[2];
//                         var nama_div = id_key[3];
//                         var i = 0;
//                         var table = $("#tbl_c_data").DataTable();
//                         table.clear().draw();
//                          $.get("/gedung.show/"+ lok + "/" + dep + "/" + div , function(data) {
//                                 $('#card-header').html('<strong>Divisi: '+ nama_div +'</strong><button class="btn btn-sm btn-primary float-end" id="print_c" data-id="' + lok + "," + dep + "," + div + '"><i class="fa-solid fa-print"></i></button>');

//                             $.each(data.data, function (index, items) {
//                                 var editButton =
//                                 '<div class="btn-group">'+
//                                     '<button class="btn btn-default border border-secondary btn-sm" type="button"><i class="fa-solid fa-ellipsis-vertical"></i></button>'+
//                                     '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
//                                     '<ul class="dropdown-menu">'+
//                                         '<li><a class="dropdown-item  detail" data-id="" href="#"><i class="fa-solid fa-circle-info"></i>&nbsp;DETAIL</a></li>'+
//                                         '<li><a class="dropdown-item  edit" data-id="" href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
//                                         '<li><a class="dropdown-item delete" data-id="" href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
//                                         '<li><hr class="dropdown-divider"></li>'+

//                                     '</ul>'+
//                                 '</div>';
//                                 var img = '<a href="#" id="detail_gedung_divisi" data-id="'+ items.id_gedung +'"><img src="http://app.perumdamtirtakencana.id/assets/img/gedung/'+items.img+'" height="100px" width="100px"></img></a>';
//                                 table.row.add([
//                                     ++i,
//                                     items.nama_barang,
//                                     items.guna,
//                                     img,
//                                     editButton
//                                 ]).draw();
//                             })
//                         })
//                         $(document).on('click', '#print_c', function (event) {
//                             var id = $(this).data('id');
//                             var delimiter = ",";
//                             var id_key = id.split(delimiter);
//                             var lok = id_key[0];
//                             var dep = id_key[1];
//                             var div = id_key[2];
//                             var url = "/gedung.print/"+ lok +"/"+ dep + "/" + div ;
//                             var features = 'width=800,height=600';
//                             window.open(url, '_blank', features);
//                         })
//                     })

//                     $(document).on('click', '#detail_gedung_divisi', function(){
//                         var id = $(this).data('id');
//                         $.get("/gedung.detail/"+ id , function(data) {
//                             $.each(data.data, function (index, item) {
//                                 $('#lgModal').modal('show');
//                                 $('#judul_modalLG').html('DETAIL GEDUNG');
//                                 $('#modal_bodyLG').html('');
//                                 $('#modal_bodyLG').prepend(
                                    // '<div class="container">'+
                                    //     '<img src="http://app.perumdamtirtakencana.id/assets/img/gedung/'+item.img+'" height="500px" width="550px" class="rounded mx-auto d-block" alt="..."><br>'+

                                    //     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                    //         '<legend class="float-none w-auto px-1 border border-secondary rounded">'+
                                    //         '<div style="font-size: 15px;">-</div>'+
                                    //         '</legend>'+
                                    //             '<div class="col">'+
                                    //                 '<div class="input-group input-group-sm mb-1">'+
                                    //                     '<table class="table table-striped table-bordered">'+
                                    //                         '<tbody>'+
                                    //                             '<tr>'+
                                    //                                 '<th>KODE</th>'+
                                    //                                 '<td>' + item.kode+ '</td>'+
                                    //                             '</tr>'+
                                    //                         '</tbody>'+
                                    //                     '</table>'+
                                    //                 '</div>'+
                                    //             '</div>'+
                                    //             '<div class="col">'+
                                    //                 '<div class="input-group input-group-sm mb-1">'+
                                    //                     '<table class="table table-striped table-bordered">'+
                                    //                         '<tbody>'+
                                    //                             '<tr>'+
                                    //                                 '<th>NAMA BARANG</th>'+
                                    //                                 '<td>' + item.nama_barang + '</td>'+
                                    //                             '</tr>'+
                                    //                         '</tbody>'+
                                    //                     '</table>'+
                                    //                 '</div>'+
                                    //             '</div>'+
                                    //             '<div class="col">'+
                                    //                 '<div class="input-group input-group-sm mb-1">'+
                                    //                     '<table class="table table-striped table-bordered">'+
                                    //                         '<tbody>'+
                                    //                             '<tr>'+
                                    //                                 '<th>PENGGUNAAN</th>'+
                                    //                                 '<td>' + item.guna+ '</td>'+
                                    //                             '</tr>'+
                                    //                         '</tbody>'+
                                    //                     '</table>'+
                                    //                 '</div>'+
                                    //             '</div>'+
                                    //      ' </fieldset><br>'+



                                    //          '<div class="row">'+
                                    //         '<div class="col">'+
                                    //             '<div class="container border border-primary rounded"><br>'+
                                    //                 '<table class="table table-striped table-bordered">'+
                                    //                     '<tbody>'+
                                    //                         '<tr>'+
                                    //                             '<th>REGISTER</th>'+
                                    //                             '<td>' + item.reg+ '</td>'+
                                    //                         '</tr>'+
                                    //                         '<tr>'+
                                    //                             '<th>KONDISI BANGUNAN</th>'+
                                    //                             '<td>' + item.kondisi+ '</td>'+
                                    //                         '</tr>'+
                                    //                         '<tr>'+
                                    //                             '<th>KONSTRUKSI</th>'+
                                    //                             '<td>' + item.konstruksi+ '</td>'+
                                    //                         '</tr>'+
                                    //                         '<tr>'+
                                    //                             '<th>BAHAN</th>'+
                                    //                             '<td>' + item.materi+ '</td>'+
                                    //                         '</tr>'+
                                    //                         '<tr>'+
                                    //                             '<th>TGL SURAT</th>'+
                                    //                             '<td>' + item.tgl_imb+ '</td>'+
                                    //                         '</tr>'+

                                    //                     '</tbody>'+
                                    //                 '</table>'+
                                    //             '</div>'+
                                    //         '</div>'+

                                    //         '<div class="col">'+
                                    //             '<div class="container border border-primary rounded"><br>'+
                                    //                 '<table class="table table-striped table-bordered">'+
                                    //                     '<tbody>'+
                                    //                         '<tr>'+
                                    //                             '<th>LUAS</th>'+
                                    //                             '<td>' + item.luas+ '</td>'+
                                    //                         '</tr>'+
                                    //                         '<tr>'+
                                    //                             '<th>SATATUS TANAH</th>'+
                                    //                             '<td>' + item.status+ '</td>'+
                                    //                         '</tr>'+
                                    //                         '<tr>'+
                                    //                             '<th>LUAS LANTAI</th>'+
                                    //                             '<td>' + item.luastanah+ '</td>'+
                                    //                         '</tr>'+
                                    //                         '<tr>'+
                                    //                             '<th>NO KODE TANAH</th>'+
                                    //                             '<td>' + item.kode_tanah+ '</td>'+
                                    //                         '</tr>'+
                                    //                         '<tr>'+
                                    //                             '<th>NO SURAT</th>'+
                                    //                             '<td>' + item.no_imb+ '</td>'+
                                    //                         '</tr>'+
                                    //                     '</tbody>'+
                                    //                 '</table>'+
                                    //             '</div>'+
                                    //         '</div>'+

                                    //     '</div><br>'+

                                    //     '<fieldset class="border border-secondary rounded-3 p-2 row">'+
                                    //         '<legend class="float-none w-auto px-1 border border-secondary rounded">'+
                                    //         '<div style="font-size: 15px;">-</div>'+
                                    //         '</legend>'+
                                    //             '<div class="col">'+
                                    //                 '<div class="input-group input-group-sm mb-1">'+
                                    //                     '<table class="table table-striped table-bordered">'+
                                    //                         '<tbody>'+
                                    //                             '<tr>'+
                                    //                                 '<th>ASAL USUL</th>'+
                                    //                                 '<td>' + item.asal+ '</td>'+
                                    //                             '</tr>'+
                                    //                         '</tbody>'+
                                    //                     '</table>'+
                                    //                 '</div>'+
                                    //             '</div>'+
                                    //             '<div class="col">'+
                                    //                 '<div class="input-group input-group-sm mb-1">'+
                                    //                     '<table class="table table-striped table-bordered">'+
                                    //                         '<tbody>'+
                                    //                             '<tr>'+
                                    //                                 '<th>NILAI PEROLEHAN</th>'+
                                    //                                 '<td>' + item.nilai+ '</td>'+
                                    //                             '</tr>'+
                                    //                         '</tbody>'+
                                    //                     '</table>'+
                                    //                 '</div>'+
                                    //             '</div>'+
                                    //             '<div class="col">'+
                                    //                 '<div class="input-group input-group-sm mb-1">'+
                                    //                     '<table class="table table-striped table-bordered">'+
                                    //                         '<tbody>'+
                                    //                             '<tr>'+
                                    //                                 '<th>NILAI PENYUSUTAN</th>'+
                                    //                                 '<td>' + item.susut+ '</td>'+
                                    //                             '</tr>'+
                                    //                         '</tbody>'+
                                    //                     '</table>'+
                                    //                 '</div>'+
                                    //             '</div>'+
                                    //             '<div class="col">'+
                                    //                 '<div class="input-group input-group-sm mb-1">'+
                                    //                     '<table class="table table-striped table-bordered">'+
                                    //                         '<tbody>'+
                                    //                             '<tr>'+
                                    //                                 '<th>KET</th>'+
                                    //                                 '<td>' + item.ket   + '</td>'+
                                    //                             '</tr>'+
                                    //                         '</tbody>'+
                                    //                     '</table>'+
                                    //                 '</div>'+
                                    //             '</div>'+
                                    //      ' </fieldset><br>'+

                                    //     '<fieldset class="border border-secondary rounded-3 p-2 row" id="filed">'+
                                    //             '<legend class="float-none w-auto px-3 border border-secondary rounded">'+
                                    //                 '<div style="font-size: 15px;"><strong>DOKUMEN</strong></div>'+
                                    //             '</legend>'+

                                    //          '</fieldset><br>'+


                                    // '</div>');
//                                 })
//                             })
//                         })
//                 });
//              });

//         $(document).on('click', '#c_x', function() {
//             $('#tab_c').parent().remove(); // Hapus tab
//             $('#c_tab').remove(); // Hapus konten tab-+
//         });
//     // END OF GEDUNG DAN BANGUNAN



//     //JALAN IRIGASI DAN JARINGAN D
//     $('#d').on('click', function() {
//         $('#db_body').remove();
//         $('#d').addClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_d" data-bs-toggle="tab" href="#d_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB-D &nbsp;<button style="border:none;background-color: white; type="submit"  id="d_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="d_tab" role="tabpanel" aria-labelledby="tab_d">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA JALAN , IRIGASI DAN JARINGAN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_ruang"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_d">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Kode Ruangan</th>'+
//                                                 '<th>Nama Ruangan</th>'+
//                                                 '<th>Aksi</th>'+
//                                             '</tr>'+
//                                         '</thead>'+
//                                         '<tbody>'+
//                                         '</tbody>'+
//                                     '</table>'+
//                                 '</div>'+
//                             '</div>'+
//                         '</div>' +
//                     '</div>'
//                 );

//         });
//      });
//         $(document).on('click', '#d_x', function() {
//             $('#tab_d').parent().remove(); // Hapus tab
//             $('#d_tab').remove(); // Hapus konten tab
//         });
//        //END OF JALAN,IRIGASI DAN JARINGAN

//     //ASET TETAP LAINNYA E
//     $('#e').on('click', function() {
//         $('#db_body').remove();
//         $('#e').addClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#f,#kir').removeClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_e" data-bs-toggle="tab" href="#e_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB-E &nbsp;<button style="border:none;background-color: white; type="submit"  id="e_x" class="fa-regular fa-circle-xmark"></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="e_tab" role="tabpanel" aria-labelledby="tab_e">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA ASET TETAP LAINNYA <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_e"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_e">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Nama</th>'+
//                                                 '<th>Nip</th>'+
//                                                 '<th>Jabatan</th>'+
//                                                 '<th>Divisi/Departemen</th>'+
//                                                 '<th>-</th>'+
//                                             '</tr>'+
//                                         '</thead>'+
//                                         '<tbody>'+
//                                         '</tbody>'+
//                                     '</table>'+
//                                 '</div>'+
//                             '</div>'+
//                         '</div>' +
//                     '</div>'
//                 );

//         });
//      });
//         $(document).on('click', '#e_x', function() {
//             $('#tab_e').parent().remove(); // Hapus tab
//             $('#e_tab').remove(); // Hapus konten tab
//         });
//     //END OF SDM

//     //KONSTRUKSI
//     $('#f').on('click', function() {
//         $('#db_body').remove();
//         $('#f').addClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#kir').removeClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_f" data-bs-toggle="tab" href="#f_tab" role="tab" aria-controls="tab2" aria-selected="false">KIB F &nbsp;<button style="border:none;background-color: white; type="submit"  id="f_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="f_tab" role="tabpanel" aria-labelledby="tab_f">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA KONSTRUKSI <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_f"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_f">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Lokasi</th>'+
//                                                 '<th>Alamat</th>'+
//                                                 '<th>Latitude</th>'+
//                                                 '<th>Longitude</th>'+
//                                                 '<th>Gambar</th>'+
//                                                 '<th>-</th>'+
//                                             '</tr>'+
//                                         '</thead>'+
//                                         '<tbody>'+
//                                         '</tbody>'+
//                                     '</table>'+
//                                 '</div>'+
//                             '</div>'+
//                         '</div>' +
//                     '</div>'
//                 );

//         });
//      });
//         $(document).on('click', '#f_x', function() {
//             $('#tab_f').parent().remove(); // Hapus tab
//             $('#f_tab').remove(); // Hapus konten tab
//         });
//     //END OF LOKASI


//     $('#kir').on('click', function() {
//         $('#db_body').remove();
//         $('#kir').addClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f').removeClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_kir" data-bs-toggle="tab" href="#kir_tab" role="tab" aria-controls="tab2" aria-selected="false">K.I.R &nbsp;<button style="border:none;background-color: white; type="submit"  id="kir_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="kir_tab" role="tabpanel" aria-labelledby="tab_kir">'+
//                      '<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA KIR <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_kir"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_kir">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>LOKASI</th>'+
//                                                 '<th>ALAMAT</th>'+
//                                                 '<th>FOTO</th>'+
//                                                 '<th>DETAIL</th>'+
//                                             '</tr>'+
//                                         '</thead>'+
//                                         '<tbody>'+
//                                         '</tbody>'+
//                                     '</table>'+
//                                 '</div>'+
//                             '</div>'+
//                         '</div>' +
//                     '</div>'
//                 );
//                 refKir();
                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         }
                //     });


//                 $(document).on('click', '#tambah_kir', function() {
//                     $('.tombol').attr('id', 'proses_kir');
//                     $('#lgModal').modal('show');
//                     $('#judul_modalLG').html('TAMBAH DATA KIR');
//                     $('#modal_bodyLG').html('');
//                     $('#modal_bodyLG').prepend(
                        // '<form action="" id="form_a" enctype="multipart/form-data">'+
                        //     '<div class="container">'+
                        //     '<div class="row  border border-primary rounded">'+
                        //                 '<div class="container"><br>'+
                        //                     '<table class="table table-striped table-bordered rounded">'+
                        //                         '<thead>'+
                        //                             '<tr class="text-center">'+
                        //                                 '<th>No Voucher</th>'+
                        //                                 '<th>Kode Aktiva</th>'+
                        //                                 '<th>Bulan</th>'+
                        //                                 '<th>Uraian</th>'+
                        //                               '</tr>'+
                        //                         '</thead>'+
                        //                     ' <tbody>'+
                        //                             '<tr>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="voucher_kir" id="voucher_kir" style="width:100%;">'+
                        //                                             '<option>- NO VOUCHER -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="kode_aktiva" id="kode_aktiva" style="width:100%;">'+
                        //                                             '<option>- PILIH KODE AKTIVA -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<input type="text" class="form-control" name="bulan_voc" id="bulan_voc" disabled>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<input type="text" class="form-control" disabled value="text" id="urai_voc">'+
                        //                                     '</div>'+
                        //                                 '</td>'+

                        //                             ' </tr>'+
                        //                         '</tbody>'+
                        //                     '</table>'+
                        //                 '</div>'+
                        //             '</div><br>'+

                        //             '<div class="row  border border-primary rounded">'+
                        //                 '<div class="container"><br>'+
                        //                     '<table class="table table-striped table-bordered rounded">'+
                        //                         '<thead>'+
                        //                             '<tr class="text-center">'+
                        //                                 '<th>Lokasi</th>'+
                        //                                 '<th>Departemen</th>'+
                        //                                 '<th>Divisi</th>'+
                        //                                 '<th>Gedung</th>'+
                        //                                 '<th>Ruangan</th>'+
                        //                               '</tr>'+
                        //                         '</thead>'+
                        //                     ' <tbody>'+
                        //                             '<tr>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="lokasi" id="lokasi_kir" style="width:100%;">'+
                        //                                             '<option>- PILIH LOKASI -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="dep" id="dep">'+
                        //                                             '<option>- PILIH DEPARTEMEN -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="div" id="div">'+
                        //                                             '<option>- PILIH DIVISI -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="gedung" id="gedung">'+
                        //                                             '<option>- PILIH GEDUNG -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                                 '<td>'+
                        //                                     '<div class="input-group input-group-sm mb-1">'+
                        //                                         '<select class="select2 form-control" name="ruang" id="ruang_kir">'+
                        //                                             '<option>- PILIH RUANGAN -</option>'+
                        //                                         '</select>'+
                        //                                     '</div>'+
                        //                                 '</td>'+
                        //                             ' </tr>'+
                        //                         '</tbody>'+
                        //                     '</table>'+
                        //                 '</div>'+
                        //             '</div><br>'+
                        //             '<div class="row  border border-primary rounded">'+

                        //                     '<div class="col"><br>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<select name="nama_aset" id="nama_aset" class="select2 form-control">'+
                        //                                 '<option>-NAMA ASET-</option>'+
                        //                             '</select>'+
                        //                         '</div>'+
                        //                         '<span style="color:red;" id="lokasi_error"></span>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Kode Aset</span><input name="kode_aset" id="kode_aset" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<span style="color:red;" id="kode_aset_error"></span>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Merk/Type</span><input type="text" name="merk" id="merk" value="" class="form-control">'+
                        //                         '</div>'+
                        //                         '<span style="color:red;" id="reg_error"></span>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<select class="select2 form-control" name="bahan" id="bahan_kir">'+
                        //                                 '<option> - BAHAN - </option>'+
                        //                             '</select>'+
                        //                         '</div>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Jumlah</span><input name="jumlah" id="jumlah" type="number" class="form-control">'+
                        //                         '</div>'+
                        //                         '<span style="color:red;" id="jumlah_error"></span>'+
                        //                     '</div><br>'+

                        //                     '<div class="col"><br>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Baik</span><input name="baik" id="baik" type="number" class="form-control">'+
                        //                         '</div>'+
                        //                         '<span style="color:red;" id="baik_error"></span>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Rusak Ringan</span><input name="merk" id="ringan" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<span style="color:red;" id="merk_error"></span>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Rusak Berat</span><input name="berat" id="berat" type="text" class="form-control">'+
                        //                         '</div>'+
                        //                         '<span style="color:red;" id="pabrik_error"></span>'+

                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>'+
                        //                         '</div>'+
                        //                         '<div class="input-group input-group-sm mb-1">'+
                        //                             '<span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>'+
                        //                         '</div>'+
                        //                         '<span style="color:red;" id="ket_error"></span>'+
                        //                     '</div>'+

                        //             '</div>'+

                        //             '<div class="row border border-primary rounded mt-1">'+
                        //                 '<br><div class="float-end">'+
                        //                     '<button type="button" id="submit_kir" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button>'+
                        //                 '</div>'+
                        //             '</div><br>'+


                        //             '<div class="row border border-primary rounded">'+
                        //                 '<div class="container"><br>'+
                        //                     '<table  class="table table-bordered" id="tbl_kir_input">'+
                        //                         '<thead>'+
                        //                             '<tr class="text-center">'+
                        //                                 '<th>No</th>'+
                        //                                 '<th>Lokasi</th>'+
                        //                                 '<th>Divisi</th>'+
                        //                                 '<th>Gedung</th>'+
                        //                                 '<th>Ruang</th>'+
                        //                                 '<th>Merk</th>'+
                        //                                 '<th>Hapus</th>'+
                        //                               '</tr>'+
                        //                         '</thead>'+
                        //                         ' <tbody>'+
                        //                         '</tbody>'+
                        //                     '</table>'+
                        //                 '</div>'+
                        //             '</div><br>'+

                        //         '</div>'+
                        //     '</form >');

//                         $('.select2').select2({
//                             dropdownParent: $('#modal_bodyLG')
//                         });
//                         pilih();
//                         refKirInput();

//                     })

                // $(document).on('click', '#haps', function (event) {
                //     var id = $(this).data('id');
                //     var del = confirm("HAPUS DATA ?");
                //     if (del) {
                //         $.ajax({
                //             url: "/kir.del/" + id,
                //             type: "POST",
                //             dataType: 'json',
                //                 success: function (data) {
                //                 alert('Data berhasil Dihapus')
                //                 refKirInput();
                //             },
                //             error: function (xhr, textStatus, errorThrown) {
                //                 alert('Data gagal dihapus');
                //             },
                //         });
                //     }
                // })

            //     $(document).on('click', '#proses_kir', function (event) {
            //         $.ajax({
            //             url: "/kir.clear",
            //             type: "POST",
            //             dataType: 'json',
            //                 success: function (data) {
            //                 alert('Data berhasil Diproses')
            //                 refKirInput();
            //             },
            //             error: function (xhr, textStatus, errorThrown) {
            //                 alert('Data gagal Diproses');
            //             },
            //     });
            // })
//                 //SUBMIT KIR
                // $(document).on('click', '#submit_kir', function (event) {
                //     event.preventDefault();
                //     var fileInput = $('#img')[0].files[0];
                //     if (!fileInput) {
                //         alert('Please select an image.');
                //         return;
                //     }
                //     var reader = new FileReader();
                //      reader.onload = function (e) {
                //         var base64Image = e.target.result.split(',')[1]; // Extract base64 data

                //         // Send the base64 encoded image data in the AJAX request
                //         $.ajax({
                //             data: {
                //                 lokasi: $('#lokasi_kir').val(),
                //                 dep: $('#dep').val(),
                //                 div:$('#div').val(),
                //                 gedung:$('#gedung').val(),
                //                 nilai_v:$('#nilai_v').val(),
                //                 ruang_kir:$('#ruang_kir').val(),
                //                 nama_aset:$('#nama_aset').val(),
                //                 kode_aset:$('#kode_aset').val(),
                //                 merk:$('#merk').val(),
                //                 bahan:$('#bahan_kir').val(),
                //                 jumlah:$('#jumlah').val(),
                //                 baik:$('#baik').val(),
                //                 ringan:$('#ringan').val(),
                //                 berat:$('#berat').val(),
                //                 ket:$('#ket').val(),
                //                 aktiva:$('#kode_aktiva').val(),
                //                 img: base64Image
                //             },
                //             url: "/kir.save",
                //             type: "POST",
                //             dataType: 'json',
                //             success: function (data) {
                //                 //alert(data);
                //                 refKirInput();
                //                 $('#nama_aset').val('');
                //                 $('#kode_aset').html('');
                //                 $('#merk').html('');
                //                 $('#bahan_kir').val('');
                //                 $('#jumlah').html('');
                //                 $('#baik').html('');
                //                 $('#ringan').html('');
                //                 $('#berat').html('');
                //                 $('#ket').html('');

                //                 // refLok();
                //             },
                //             error: function(xhr) {
                //                 if (xhr.status === 400) {
                //                     // Validation error, handle it
                //                     var errors = xhr.responseJSON.errors;
                //                     $.each(errors, function(field, messages) {
                //                         // Display each error message for the specific field
                //                         $('#'+field+'_error').text(messages[0]); // Assume you have an element with an ID like 'reg_error'
                //                     });
                //                 } else {
                //                     // Handle other errors
                //                     console.error('An error occurred:', xhr.responseText);
                //                 }
                //             }
                //         });
                //     };

                //     // Read the selected file as a data URL
                //     reader.readAsDataURL(fileInput);
                // });

//                 $('#tbl_kir').on('click', '.tree', function() {
//                     $('#kepala').html('') //kir
//                     var id = $(this).data('id');
//                     $('#card-body').html('');
//                     $('#canvas_body').html('');
//                     $('#canvas_tree').html('');
//                     $.ajax({
//                         type: "GET",
//                         url: "/kir.dep/"+ id,
//                         success: function (data) {
//                             $.each(data.data, function (index, item) {
//                                 $('#kepala').html('<table class="table table-bordered">'+
//                                                     '<thead>'+
//                                                         '<tr>'+
//                                                             '<th class="text-center">LOKASI</th>'+
//                                                             '<th class="text-center">NILAI</th>'+
//                                                         '</tr>'+
//                                                     '</thead>'+
//                                                     '<tbody>'+
//                                                         '<tr>'+
//                                                             '<td class="text-center">' + item.lokasi + '</td>'+
//                                                             '<td class="text-center"><a href="#" id="nilaiKir" data-id="'+ item.id_lokasi + '"></a></td>'+
//                                                         '</tr>'+
//                                                     '</tbody>'+
//                                               '</table>'+
//                                         '<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>')
//                                         var loks = item.id_lokasi;

//                                         $.get('/kir.nilai/' + loks, function(data) {
//                                             var nilaiAk = new Intl.NumberFormat('id-ID', {
//                                                 style: 'currency',
//                                                 currency: 'IDR',
//                                             }).format(data.data);
//                                             $('#nilaiKir').html(nilaiAk);
//                                         })
// //                                         $(document).on('click', '#nilaiKir', function (event) {
// //                                             var lok = $(this).data('id');
// //                                             $('#lgModal').modal('show');
// //                                             $('#judul_modalLG').html('DETAIL NILAI KIR '+item.lokasi );
// //                                             $('#modal_bodyLG').html('');
// //                                             $('#modal_bodyLG').html('<div class="container">'+

// //                                                                         '<table class="table table-striped table-border" id="tbl_detailNilai">'+
// //                                                                             '<thead>'+
// //                                                                                 '<tr>'+
// //                                                                                     '<th>NO</th>'+
// //                                                                                     '<th>Kode Perkiraan</th>'+
// //                                                                                     '<th>Nama Aktiva</th>'+
// //                                                                                     '<th>Tanggal</th>'+
// //                                                                                     '<th>Tahun</th>'+
// //                                                                                     '<th>Nilai</th>'+
// //                                                                                     '<th>Uraian</th>'+
// //                                                                                 '</tr>'+
// //                                                                             '</thead>'+
// //                                                                             '<tbody>'+
// //                                                                             '</tbody>'+
// //                                                                     '</table>'+
// //                                                             '</div>');
// //                                             var i = 0;
// //                                             var table = $("#tbl_detailNilai").DataTable();
// //                                             table.clear().draw();
// //                                             $.get("/nilaiKir.detail/"+ lok , function(data) {
// //                                                 $('#card-header').html('<strong>Lokasi:'+ lokasi +' </strong>');
// //                                                 $.each(data.data, function (index, items) {
// //                                                     var nilaiAk = new Intl.NumberFormat('id-ID', {
// //                                                         style: 'currency',
// //                                                         currency: 'IDR',
// //                                                     }).format(items.nilai);
// //                                                     table.row.add([
// //                                                         ++i,
// //                                                         items.kode,
// //                                                         items.aktiva,
// //                                                         items.tgl_voucher,
// //                                                         items.tahun,
// //                                                         nilaiAk,
// //                                                         items.urai,
// //                                                     ]).draw();
// //                                                 })
// //                                             })

// //                                         })

                                // $('#canvas_tree').append(
                                //     '<li><span><strong>' + item.kode_dep +  '</strong></span>'+
                                //             '<ol id="kir_div'+ item.id_departemen +'"></ol>'+
                                //         '</li>');
                                // var dep = item.id_departemen;
                                // var lok = item.id_lokasi;
                                // $.get("/kir.div/"+ dep + "/" + lok , function(data) {

                                //     $.each(data.data, function(index, item) {
                                //         var div = item.id_div;
                                //         $("#kir_div" + item.id_departemen).append('<li ><strong><span style="color:green;">'+ item.nama_div +'</span></strong>'+
                                //                 '<ol id="kir_ged'+ item.id_div +'"></ol>'+
                                //             '</li>')

                                //         $.get("/kir.gedung/"+ lok + "/" + dep + "/" + div, function(data){
                                //             $.each(data.data,function(index,items) {
                                //                $("#kir_ged" + item.id_div).append('<li><a href="#" id="kir_ruang" style="text-decoration: none;" data-id="' + dep + ',' + lok + ',' + div + ',' + items.gedung + ',' + item.nama_div + '"><span">Gedung '+ items.gedung +'</a></span>'+

                                //                 '</li>')
                                //              })
                                //         })
                                //     });
                                // })
                            //})
                            //isi kir
                            // $(document).on('click', '#kir_ruang', function() {

                            //     $('#card-body').html('');
                            //     $('#card-body').append(

                            //     ' <table class="table table-striped table-border" id="tbl_kir_data">'+
                            //                     '<thead>'+
                            //                         '<tr>'+
                            //                             '<th>NO</th>'+
                            //                             '<th>Nama Ruangan</th>'+
                            //                             '<th>KIR</th>'+
                            //                         '</tr>'+
                            //                     '</thead>'+
                            //                     '<tbody>'+
                            //                 '</tbody>'+
                            //                 '</table>'
                            //     );
                            //     var id = $(this).data('id');
                            //     var delimiter = ",";
                            //     var id_key = id.split(delimiter);
                            //     var dep = id_key[0];
                            //     var lok = id_key[1];
                            //     var div = id_key[2];
                            //     var ged = id_key[3];
                            //     var nama_div = id_key[4];
                            //     var i = 0;

                            //     var table = $("#tbl_kir_data").DataTable();
                            //     table.clear().draw();
                            //     $.get("/kir.ruang/"+ lok + "/" + dep + "/" + div + "/" + ged, function(data){
                            //         $('#card-header').html('<strong>Divisi:</strong> '+ nama_div +'<br><strong>Gedung: </strong>' + ged  );
                            //             $.each(data.data, function (index, items) {
                            //             var ruang = items.ruangan
                            //             var editButton =
                            //             '<div class="btn-group">'+
                            //                 '<button class="badge bg-success border border-secondary btn-sm tree" data-id="' + lok + ',' + dep + ',' + div + ',' + ged + ',' + ruang + ',' + nama_div + '" id="kir_detail"><i class="fa-solid fa-eye"></i></button>'+
                            //             '</div>';

                            //             table.row.add([
                            //                 ++i,
                            //                 items.ruangan,
                            //                 editButton
                            //             ]).draw();
                            //         })
                            //     })

                            // })
                            //isi kir
//                             $(document).on('click', '#kir_detail', function() {
//                                         var id = $(this).data('id');
//                                         var delimiter = ",";
//                                         var id_key = id.split(delimiter);
//                                         var lok = id_key[0];
//                                         var dep = id_key[1];
//                                         var div = id_key[2];
//                                         var ged = id_key[3];
//                                         var ruang = id_key[4];
//                                         var nama_div = id_key[5];
//                                         var i = 0;
//                                         $('#lgModal').modal('show');
//                                         $('#modal_bodyLG').html('');
//                                         $('#modal_bodyLG').prepend(
//                                             '<table class="table table-striped table-border" id="tbl_kir_detail">'+
//                                                     '<thead>'+
//                                                         '<tr>'+
//                                                             '<th>NO</th>'+
//                                                             '<th>Nama Aktiva</th>'+
//                                                             '<th>Merk/Type</th>'+
//                                                             '<th>Bahan</th>'+
//                                                             '<th>Jumlah</th>'+
//                                                             '<th>Satuan</th>'+
//                                                             '<th>Baik</th>'+
//                                                             '<th>Rusak Ringan</th>'+
//                                                             '<th>Rusak Berat</th>'+
//                                                             '<th>Foto</th>'+
//                                                         '</tr>'+
//                                                     '</thead>'+
//                                                 '<tbody>'+
//                                             '</tbody>'+
//                                         '</table>');

// // balik kir
//                                     $('#judul_modalLG').html('<strong>Divisi:</strong> '+ nama_div +'<br><strong>Gedung:</strong> '+ ged +'<br><strong>Ruang: </strong>' + ruang +'<button class="btn btn-sm btn-primary float-end" id="print_kir" data-id="' + lok + "," + dep + "," + div + "," + ged + "," + ruang + '"><i class="fa-solid fa-print"></i></button>' );
//                                     var table = $("#tbl_kir_detail").DataTable();
//                                     table.clear().draw();

//                                 $.get("/kir.detail/"+ lok +"/"+ dep +"/"+ div +"/"+ ged +"/"+ ruang, function(data){

//                                     $.each(data.data, function (index, items) {
//                                         var img = '<a href="#" id="detail_gedung_divisi"><img src="http://app.perumdamtirtakencana.id/assets/img/kir/'+items.img+'" height="100px" width="100px"></img></a>';
//                                         table.row.add([
//                                         ++i,
//                                         items.nama_barang,
//                                         items.merk,
//                                         items.bahan,
//                                         items.jumlah,
//                                         items.satuan,
//                                         items.baik,
//                                         items.ringan,
//                                         items.berat,
//                                         img

//                                     ]).draw();

//                                     })
//                                 })
//                             })
                    //     },
                    //     error: function (data) {
                    //         console.log('Error:', data);
                    //     }
                    // });

//                 })
//                 $(document).on('click', '#print_kir', function() {
//                     var id = $(this).data('id');
//                     var delimiter = ",";
//                     var id_key = id.split(delimiter);
//                     var lok = id_key[0];
//                     var dep = id_key[1];
//                     var div = id_key[2];
//                     var ged = id_key[3];
//                     var ruang = id_key[4];
//                     var url = "/kir.print/"+ lok +"/"+ dep +"/"+ div +"/"+ ged +"/"+ ruang;
//                     var features = 'width=800,height=600';
//                     window.open(url, '_blank', features);
//                 })
//             });
//      });
//     $(document).on('click', '#kir_x', function() {
//             $('#tab_kir').parent().remove(); // Hapus tab
//             $('#kir_tab').remove(); // Hapus konten tab
//         });
//     //END OF KIR

//     //NILAI
//     $('#nilai').on('click', function() {
//         $('#db_body').remove();
//         $('#nilai').addClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#a,#b,#c,#d,#e,#f').removeClass('btn btn-primary');
//         $('#barang,#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#a,#b,#c,#d,#e,#f').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_nilai" data-bs-toggle="tab" href="#nilai_tab" role="tab" aria-controls="tab2" aria-selected="false">NILAI ASET &nbsp;<button style="border:none;background-color: white; type="submit"  id="nilai_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//         // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="nilai_tab" role="tabpanel" aria-labelledby="tab_nilai">'+
//                      '<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA NILAI AKTIVA <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_nilai"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_nilai">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>No Voucher</th>'+
//                                                 '<th>Tgl Voucher</th>'+
//                                                 '<th>Aktiva</th>'+
//                                                 '<th>KIB</th>'+
//                                                 '<th>Nilai</th>'+
//                                                 '<th>Uraian</th>'+
//                                                 '<th>Aksi</th>'+
//                                             '</tr>'+
//                                         '</thead>'+
//                                         '<tbody>'+
//                                         '</tbody>'+
//                                     '</table>'+
//                                 '</div>'+
//                             '</div>'+
//                         '</div>' +
//                     '</div>'
//                 );
//                 refNil();
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });
//                 //Klik pada tombol tambah bahan, maka menampilkan modal TAMBAH DATA BAHAN
//                 $('#tambah_nilai').on('click', function() {
//                     $('#myModal').modal('show');
//                     $('#judul_modal').html('TAMBAH NILAI');
//                     $('#modal_body').html('');
//                     $('#modal_body').prepend(
//                         '<form action="" id="form_nilai">'+
//                             '<input type="text" class="form-control" id="no" name="no" placeholder="Nomer Voucher"><br>' +
//                             '<input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tgl Voucher"><br>' +
//                             '<input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun"><br>' +
//                             '<select class="form-control" id="kode_aktiva" name="kode_aktiva">'+
//                             '</select><br>'+
//                             '<input type="number" class="form-control" name="nilai">'+
//                             '<textarea name="urai" class="form-control">Uraian</textarea>' +
//                         '</form >');
//                         $.get('/aktiva', function (data) {
//                             $.each(data.data, function (index, item) {
//                                 $('#kode_aktiva').append('<option value="' + item.id + '">' + item.kode + ' | ' +  item.aktiva + '</option>');
//                             });
//                         });

//                     });
//                 //Memberikan atribut id pada tombol submit modal
//                  $('.tombol').attr('id', 'submit_nilai');
//                 //Klik Untuk menyimpan data sdm ke database
//                   $(document).on('click', '#submit_nilai', function (event) {
//                     event.preventDefault();
//                     $.ajax({
//                         data: $('#form_nilai').serialize(),
//                         url: "/nilai.save",
//                         type: "POST",
//                         dataType: 'json',
//                         success: function (data) {
//                             $('#modal_body').html('');
//                             $('#myModal').modal('hide');
//                             alert('Data berhasil Disimpan')
//                             refNil();
//                         },
//                         error: function (xhr, textStatus, errorThrown) {
//                             alert('Failed to submit the form');
//                         },
//                       });
//                   });
//                     //Modal EDIT show
//                     $('#tbl_nilai').on('click', '.edit', function() {
//                         var id = $(this).data('id');
//                         $.ajax({
//                             type: "GET",
//                             url: "/nilai.edit/"+ id,
//                             success: function (data) {
//                                 $.each(data.data, function (index, item) {
//                                 $('#myModal').modal('show');
//                                 $('#judul_modal').html('UPDATE NILAI');
//                                 $('#modal_body').html('');
//                                 $('.tombol').attr('id', 'edit_submit');
//                                 $('#modal_body').prepend(
//                                     '<form action="" id="edit_nilai_submit">' +
//                                         '<input type="hidden" name="id" value = "' + item.idn + '">' +
//                                         '<input type="text" class="form-control" id="no" name="no" value="' + item.no_voucher + '" placeholder="Nomer Voucher"><br>' +
//                                         '<input type="date" class="form-control" id="tgl" name="tgl" value="' + item.tgl_voucher +  '" placeholder="Tgl Voucher"><br>' +
//                                         '<input type="number" class="form-control" id="tahun" name="tahun" value="' + item.tahun +  '" placeholder="Tahun"><br>' +
//                                         '<select class="form-control" id="kode_aktiva" name="kode_aktiva">'+
//                                         '<option value="' + item.idA + '">' + item.kode + ' | ' +  item.aktiva + '</option>'+
//                                         '</select><br>'+
//                                         '<input type="number" class="form-control" name="nilai" value="' + item.nilai +  '"><br>'+
//                                         '<textarea name="urai" class="form-control">' + item.urai +  '</textarea>' +
//                                     '</form>');
//                                     $.get('/aktiva', function (data) {
//                                         $.each(data.data, function (index, item) {
//                                             $('#kode_aktiva').append('<option value="' + item.id + '">' + item.kode + ' | ' +  item.aktiva + '</option>');
//                                         });
//                                     });

//                                 })

//                             },
//                             error: function (data) {
//                                 console.log('Error:', data);
//                             }
//                         });
//                     });
//                         //Klik Untuk update data NILAI ke database
//                         $(document).on('click', '#edit_submit', function (event) {
//                             event.preventDefault();
//                             $.ajax({
//                                 data: $('#edit_nilai_submit').serialize(),
//                                 url: "/nilai.update",
//                                 type: "POST",
//                                 dataType: 'json',
//                                 success: function (data) {
//                                     alert('Data berhasil diUpdate')
//                                     $('#modal_body').html('');
//                                     $('#myModal').modal('hide');
//                                     refNil();
//                                 },
//                                 error: function (xhr, textStatus, errorThrown) {
//                                     alert('Failed to submit the form');
//                                 },

//                             });
//                         });
//                         //Hapus Data
//                         $('#tbl_nilai').on('click', '.delete', function() {
//                             var id = $(this).data('id');
//                             var del = confirm("Anda yakin menghapus data ini ?");
//                             if (del) {
//                                 $.ajax({
//                                     url: "/nilai.hapus/" + id,
//                                     type: "POST",
//                                     dataType: 'json',
//                                         success: function (data) {
//                                         alert('Data berhasil Dihapus')
//                                         refNil();
//                                     },
//                                     error: function (xhr, textStatus, errorThrown) {
//                                         alert('Data gagal dihapus');
//                                     },
//                                 });
//                             }
//                         })
//                     });
//             });
//     $(document).on('click', '#nilai_x', function() {
//             $('#tab_nilai').parent().remove(); // Hapus tab
//             $('#nilai_tab').remove(); // Hapus konten tab
//         });
//     //END OF DOK
// });
