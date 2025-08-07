$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    var fileUrl = BASE_URL;
    

    $(document).on('click', '.edit-icon', function (e) {
        e.preventDefault();
        alert('Edit Gambar');
   });

    //TANAH
    $(document).on('click', '#detail_tanah', function() {
        var id = $(this).data('id');
        //$('#exampleModal').modal('show');
       
        $.ajax({
                type: "GET",
                url: "/tanah.detail/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#judul_modalLG_detail').html(item.lokasi);
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
                    $('#gambar_D').attr('src', 'https://app.perumdamtirtakencana.id/assets/img/lokasi/' + item.img);

                });

                $.get('/show/' + id, function (data) {
                    $('#filed').empty();
                     // misalnya: http://127.0.0.1:8000

                    $.each(data.data, function (index, items) {
                        var fullPath = fileUrl + '/assets/img/lokasi/' + items.dok;

                        var thumbnail = $(
                            '<div class="pdf-thumbnail col">' +
                                '<embed width="150px" height="200px" src="' + fullPath + '" type="application/pdf">' +
                                '<p><a href="#" onclick="window.open(\'' + fullPath + '\', \'_blank\'); return false;">' + items.dok + '</a></p>' +
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
        $('#judul_modalLG').html('TAMBAH DATA TANAH');
        $('#form_a')[0].reset();
        $('#form_a').attr('action', '/tanah.save');

        $.get('/barang.tanah', function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
            });
        });
        selectOptAll();
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
    //Edit tanah
    $(document).on('click', '.updateA', function() {
        var id = $(this).data('id');
        $('#modal_tanah').modal('show');
        $('#form_a').attr('action', '/tanah.update/' + id);
        $.ajax({
                type: "GET",
                url: "/tanah.detail/"+id,
                success: function (data) {
                $.each(data.data, function (index, item) {

                $('#judul_modalLG').html('UPDATE DATA TANAH ' + item.lokasi);
                  
                  $('#lokasi_kir').empty;
                  $('#lokasi_kir').append('<option value="' + item.id_lokasi + '" selected>' + item.lokasi + '</option>');

                  $('#nama').empty();
                  $('#nama').append('<option value="' + item.id_barang + '" selected>' + item.nama_barang + '</option>');
                  selectOptAll();

                  $('#tahun').val(item.tahun);
                  $('#guna').val(item.guna);
                  $('#no_tunjuk').val(item.no_tunjuk);
                  $('#tgl_tunjuk').val(item.tgl_tunjuk);//
                  $('#luas_tunjuk').val(item.luas_tunjuk);
                  $('#sertifikat').val(item.sertifikat);
                  $('#tgl_sertifikat').val(item.tgl_sertifikat);//
                  $('#luas_sertifikat').val(item.luas_sertifikat);
                  $('#no_gambar').val(item.no_gambar);
                  $('#tgl_gambar').val(item.tgl_gambar);//
                  $('#luas_gambar').val(item.luas_gambar);

                  $('#hak').append('<option value="' + item.hak + '" selected>' + item.hak + '</option>');

                  $('#asal').append('<option value="' + item.asal + '" selected>' + item.asal + '</option>');

                  $('#pemilik').val(item.pemilik);
                  $('#ket').val(item.ket);

                  $('#dok').attr('disabled', true);
                });
            }
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
    //INPUT DATA MESIN
    $(document).on('click', '#add_mesin', function() {
        fetchKeranjang();
        $('#submitEdit_b').attr('id','checkoutBtn');
        $('#vMesin').show();
        $('#keranjang').show();
        $('#create').show();
        $('#update').hide();
        selectOptAll();
        $.get('/barang.mesin', function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
            });
        });

        $('body').on('change','#nama' , function (event) {
            event.preventDefault();
            var id = $(this).val();
            $.get('/mesin.barang/'+id, function (data) {
            $.each(data.data, function (index, item) {
                $('#kode_aset').val(item.kode_barang);
            });
        });
    })

        $.get('/bahan', function (data) {
            $.each(data.data, function (index, item) {
                $('#bahan_mesin').append('<option value="' + item.nama + '">' + item.nama + '</option>');
            });
        });

        $.get('/vMesin', function (data) {
            $.each(data.data, function (index, item) {
                $('#voucher_mesin').append('<option value="' + item.no_voucher + '">' + item.no_voucher + '</option>');
            });
        });

        $('#kode_aktiva').empty().append('<option value="">Select an aktiva</option>');
            $.get('/mesin.aktiva/' , function (data) {
                $.each(data.data, function (index, item) {
                    $('#kode_aktiva').prepend('<option value="' + item.id + '">'+  item.kode +' | ' + item.aktiva + '</option>');
              }
              )})

        $('body').on('change','#kode_aktiva' , function (event) {
            var kodeAktiva = $('#kode_aktiva').find('option:selected').text();
            let kendaraanAktiva = [
                                    "31.08.10 | Kendaraan Penumpang",
                                    "31.08.20 | Kendaraan Angkut Barang",
                                    "31.08.30 | Kendaraan Tangki Air",
                                    "31.08.40 | Kendaraan Roda Dua"
                                 ];
            
            $('#kendaraan').empty();
            if (kendaraanAktiva.includes(kodeAktiva)) {
                $('#jenisB').val(2);
                $('#kendaraan').append('<div class="input-group input-group-sm mb-1">'+
                                            '<span class="input-group-text col-sm-3">No Pabrik</span><input name="pabrik" id="pabrik" type="text" class="form-control">'+
                                       ' </div>'+
                                        '<p style="color:red;" id="pabrik_error"></p>'+

                                        '<div class="input-group input-group-sm mb-1">'+
                                            '<span class="input-group-text col-sm-3">No Rangka</span><input name="rangka" id="rangka" type="text" class="form-control">'+
                                        '</div>'+
                                        '<p style="color:red;" id="rangka_error"></p>'+

                                        '<div class="input-group input-group-sm mb-1">'+
                                            '<span class="input-group-text col-sm-3">No Mesin</span><input name="mesin" id="mesin" type="text" class="form-control">'+
                                        '</div>'+
                                        '<p style="color:red;" id="mesin_error"></p>'+

                                        '<div class="input-group input-group-sm mb-1">'+
                                            '<span class="input-group-text col-sm-3">No Polisi</span><input name="nopol" id="nopol" type="text" class="form-control">'+
                                        '</div>'+
                                        '<p style="color:red;" id="nopol_error"></p>'+

                                        '<div class="input-group input-group-sm mb-1">'+
                                            '<span class="input-group-text col-sm-3">No BPKB</span><input name="bpkb" id="bpkb" type="text" class="form-control">'+
                                        '</div>'+
                                        '<p style="color:red;" id="bpkb_error"></p>')
                                    }else{
                                        $('#kendaraan').empty();
                                        $('#jenisB').val(1);
                                    }
                                })
                            })

//Save Mesin
$('#submit_b').click(function (e) {
        e.preventDefault();

        let formData = new FormData($('#form_b')[0]);

        // Tambahkan flag draft
        formData.append('is_final', 0);

        $.ajax({
            url: 'mesin.save',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    $('#form_b')
                    .find('input, textarea')
                    .not('#jenisB') // sesuaikan
                    .val('');
                    fetchKeranjang(); // refresh keranjang
                } else {
                    alert('Gagal menambahkan ke keranjang');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
            }
        });
    });
    // Load data keranjang
    function fetchKeranjang() {
    $.ajax({
        url: 'mesin.input',
        method: 'GET',
        success: function (res) {
            let rows = '';
            $.each(res.data, function (i, item) {
                rows += `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${item.nama_barang}</td>
                        <td>${item.kode}</td>
                        <td>${item.merk}</td>
                        <td>${item.guna}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm  btn-outline-danger btn-hapus" data-id="${item.idb}">
                               <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;
            });
            $('#tbl_mesin_input tbody').html(rows);
        }
    });
}fetchKeranjang(); // load saat pertama kali modal dibuka
//Hapus keranjang
$(document).on('click', '.btn-hapus', function () {
    const id = $(this).data('id');
    if (confirm('Yakin ingin menghapus item ini dari keranjang?')) {
        $.ajax({
            url:'mesin.hapus/'+id,
            method: 'POST',
            success: function (res) {
                if (res.success) {
                    fetchKeranjang();
                } else {
                    alert('Gagal menghapus item');
                }
            }
        });
    }
});
//CHECKOUT MESIN
$('#checkoutBtn').click(function () {
        if (confirm("Yakin ingin menyimpan semua data secara permanen?")) {
            $.ajax({
                url: '/mesin.clear',
                type: 'POST',
                success: function (res) {
                    if (res.success) {
                        alert('Data berhasil difinalisasi!');
                        fetchKeranjang();
                    } else {
                        alert('Gagal checkout');
                    }
                }
            });
        }
    });



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
    var fullPath = fileUrl + '/assets/img/mesin/gbr/';
    var fullPathD = fileUrl + '/assets/img/mesin/dok/';
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
                                            '<button class="btn btn-default border border-secondary btn-sm text-success" type="button" data-bs-toggle="modal" data-bs-target="#modal_mesin_detail" id="detail_mesin_divisi" data-id="'+ items.id_mesin +'"><i class="fas fa-eye"></i></button>'+
                                            '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                                            '<ul class="dropdown-menu">'+

                                                '<li><a class="dropdown-item  editB text-primary" data-id=" '+ items.id_mesin +' " href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
                                                '<li><a class="dropdown-item btn-hapus text-danger" data-id=" '+ items.id_mesin +' " href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
                                                '<li><hr class="dropdown-divider"></li>'+

                                            '</ul>'+
                                        '</div>';
                                        var img = '<a href="#" ><img src="' + fullPath + items.img +'" height="100px" width="100px"></img></a>';
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
                            //Print Mesin
                            $(document).on('click', '#print_b', function() {
                            // Ambil data-id
                            var data = $(this).data('id').split(",");
                            var lok = data[0];
                            var dep = data[1];
                            var div = data[2];

                            // Buat URL print
                            var url = '/mesin.print/' + lok + '/' + dep + '/' + div;

                            // Buka di tab baru
                            window.open(url, '_blank');
                        });
$(document).on('click', '#detail_mesin_divisi', function(){
    var id = $(this).data('id');
        $('#judul_modal_detail').html();
        
        $.ajax({
                type: "GET",
                url: "/mesin.detail/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    var jenis = item.jenis;
                    if (jenis == 1) {
                        $('#kendaraan_b').hide();
                    } else {
                        $('#kendaraan_b').show();
                    } 

                    $('#kode_D').html(item.kode);
                    $('#reg_D').html(item.reg);
                    $('#nama_barang_D').html(item.nama_barang);
                    $('#guna_D').html(item.guna);
                    $('#fungsi_D').html(item.fungsi);
                    $('#asal_D').html(item.asal);
                    $('#tahun_D').html(item.tahun);
                    $('#kondisi_D').html(item.kodisi);
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
                    $('#status_D').html(item.asal);
                    $('#nilai_d').html(item.harga.toLocaleString('id-ID'));
                    $('#ket_D').html(item.ket);
                    $('#gambar_D').attr('src', fullPath + item.img );

                    $('#filed').empty();
                    $.each(data.data, function (index, items) {
                         var thumbnail = $(
                            '<div class="pdf-thumbnail col">' +
                                '<embed width="150px" height="200px" src="' + fullPathD + items.dok + '" type="application/pdf">' +
                                '<p><a href="#" onclick="window.open(\'' + fullPathD + items.dok + '\', \'_blank\'); return false;">' + items.dok + '</a></p>' +
                            '</div>'
                        );

                    // Append the thumbnail to the fieldset
                    $('#filed').append(thumbnail);
                    });

                });
                       
                
                    
                
            }
        });
    })

//EDIT MESIN
$(document).on('click', '.editB', function () {
    let modal = new bootstrap.Modal(document.getElementById('modal_mesin'));
    modal.show();
    $('#checkoutBtn').attr('id', 'submitEdit_b');
    
    $('#vMesin').hide();
    $('#keranjang').hide();
    $('#create').hide();
    $('#update').show();
    var id = $(this).data('id');
        $.ajax({
                type: "GET",
                url: "/mesin.edit/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#judul_modalB').html('EDIT MESIN ' + item.lokasi + ' ' + 'Departemen : ' + item.kode_dep + 'Divisi : ' + item.nama_div);
                    $('#id_b').val(id);
                    
                    $('#lokasi_kir').empty;
                    $('#lokasi_kir').append('<option value="' + item.id_lokasi + '" selected>' + item.lokasi + '</option>');

                    $('#dep').empty;
                    $('#dep').append('<option value="' + item.id_departemen + '" selected>' + item.kode_dep + '</option>');

                    $('#div').empty;
                    $('#div').append('<option value="' + item.id_div + '" selected>' + item.nama_div + '</option>');

                    selectOptAll();

                    $('#nama_edit_b').empty;
                    $('#nama_edit_b').append('<option value="' + item.idBar + '" selected>' + item.nama_barang + '</option>');
                    $.get('/barang.mesin', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#nama_edit_b').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
                            });
                        });
                        
                    $('#jenisB').val(item.jenis);
                    $('#id_voucher2').val(item.id_voucher2);
                    $('#nama').val(item.nama_barang);
                    $('#kode_aset').val(item.kode);
                    $('#reg').val(item.reg);
                    $('#merk').val(item.merk);
                    $('#ukuran').val(item.ukuran);
                    $('#fungsi').val(item.fungsi);
                    $('#guna').val(item.guna);
                    $('#bahan_mesin').append('<option value="' + item.bahan + '" selected>' + item.bahan + '</option>');
                    $('#tahun_b_edit').val(item.tahun);
                    $('#kondisi_b').append('<option value="' + item.kodisi + '" selected>' + item.kodisi + '</option>');
                    $('#asal').append('<option value="' + item.asal + '" selected>' + item.asal + '</option>');
                    $('#nilaiB').val(item.harga);
                    $('#ket').val(item.ket);
                });
            }
        });
    });

    $(document).on('click', '#edit_2', function () {
       
         let formData = new FormData($('#form_b')[0]);

        $.ajax({
            url: 'mesin.update',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    alert('Data Berhasil di Update');
                } else {
                    alert('Gagal update');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
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
    var fullPathImgC = fileUrl + '/assets/img/gedung/img/';
    var fullPathDocC = fileUrl + '/assets/img/gedung/dok/';
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
                $('#card-header').html('<strong>Divisi: '+ nama_div +'</strong><button class="btn btn-sm btn-primary float-end" id="print_c" data-id="' + lok + "," + dep + "," + div + '"><i class="fa-solid fa-print"></i></button>');

                $.each(data.data, function (index, items) {
                     var editButton =
                                        '<div class="btn-group">'+
                                            '<button class="btn btn-default border border-secondary btn-sm text-success" data-bs-toggle="modal" data-bs-target="#modal_gedung_detail" id="detail_gedung_divisi" data-id="'+ items.id_gedung +'" type="button"><i class="fa fa-eye"></i></button>'+
                                            '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                                            '<ul class="dropdown-menu">'+

                                                '<li><a class="dropdown-item  editC text-primary" data-id=" '+ items.id_gedung +' " href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
                                                '<li><a class="dropdown-item btn-hapusC text-danger" data-id=" '+ items.id_gedung +' " href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
                                                '<li><hr class="dropdown-divider"></li>'+

                                            '</ul>'+
                                        '</div>';
                                        var img = '<a href="#" ><img src="' + fullPathImgC + items.img +'" height="100px" width="100px"></img></a>';
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
                            //Print Mesin
                            $(document).on('click', '#print_c', function() {
                            // Ambil data-id
                            var data = $(this).data('id').split(",");
                            var lok = data[0];
                            var dep = data[1];
                            var div = data[2];

                            // Buat URL print
                            var url = '/gedung.print/' + lok + '/' + dep + '/' + div;

                            // Buka di tab baru
                            window.open(url, '_blank');
                        });

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
                        $('#gambar_d').attr('src',fullPathImgC + item.img);
                        $('#filedC').empty();
    
                        var thumbnail = $(
                                    '<div class="pdf-thumbnail col ">' +
                                    '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="' + fullPathDocC + item.dok + '" type="application/pdf" border border-secondary rounded>' +
                                        '<p><a href="#" onclick="window.open(\'' + fullPathDocC + item.dok + '\', \'_blank\'); return false;">' + item.dok + '</p>' +
                                    '</div>');
                                    $('#filedC').append(thumbnail);
                    });
                }
});
})


//Input Gedung
$(document).on('click', '#add_gedung', function() {
    $('#vMesin').show();
    $('#keranjangC').show();
    $('#createC').show();
    $('#updateC').hide();
    $('#kode_aktiva_c').empty().append('<option value="">Select an aktiva</option>');
            $.get('/gedung.aktiva/' , function (data) {
                $.each(data.data, function (index, item) {
                    $('#kode_aktiva_c').prepend('<option value="' + item.id + '">'+  item.kode +' | ' + item.aktiva + '</option>');
              }
              )})
    selectOptAll();

        $.get('/barang.gedung', function (data) {
            $.each(data.data, function (index, item) {
                $('#id_barang').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
            });
        });

        $('body').on('change','#id_barang' , function (event) {
            event.preventDefault();
            var id = $(this).val();
            $.get('/gedung.barang/'+id, function (data) {
            $.each(data.data, function (index, item) {
                $('#kode').val(item.kode_barang);
            });
        });
    })

        $.get('/bahan', function (data) {
            $.each(data.data, function (index, item) {
                $('#bahan_mesin').append('<option value="' + item.nama + '">' + item.nama + '</option>');
            });
        });

        $.get('/vMesin', function (data) {
            $.each(data.data, function (index, item) {
                $('#voucher_mesin').append('<option value="' + item.no_voucher + '">' + item.no_voucher + '</option>');
            });
        });

        
})
//Save Gedung
$('#submit_c').click(function (e) {
        e.preventDefault();

        let formData = new FormData($('#form_c')[0]);

        // Tambahkan flag draft
        formData.append('is_final', 0);

        $.ajax({
            url: 'gedung.save',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    $('#form_c')
                    .find('input, textarea')
                    //.not('#') // sesuaikan
                    .val('');
                    fetchKeranjangC(); // refresh keranjang
                } else {
                    alert('Gagal menambahkan ke keranjang');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
            }
        });
    });
    // Load data keranjang
    function fetchKeranjangC() {
    $.ajax({
        url: 'gedung.input',
        method: 'GET',
        success: function (res) {
            let rows = '';
            $.each(res.data, function (i, item) {
                rows += `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${item.nama_barang}</td>
                        <td>${item.kode_barang}</td>
                        <td>${item.luas}</td>
                        <td>${item.konstruksi}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm  btn-outline-danger btn-hapusC" data-id="${item.idb}">
                               <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;
            });
            $('#tbl_mesin_input tbody').html(rows);
        }
    });
}fetchKeranjangC(); // load saat pertama kali modal dibuka
//Hapus keranjang Gedung
$(document).on('click', '.btn-hapusC', function () {
    const id = $(this).data('id');
    if (confirm('Yakin ingin menghapus item ini?')) {
        $.ajax({
            url:'gedung.hapus/'+id,
            method: 'POST',
            success: function (res) {
                if (res.success) {
                    fetchKeranjangC();
                } else {
                    alert('Gagal menghapus item');
                }
            }
        });
    }
});
//CHECKOUT GEDUNG
$('#checkoutBtnC').click(function () {
        if (confirm("Yakin ingin menyimpan semua data secara permanen?")) {
            $.ajax({
                url: '/gedung.clear',
                type: 'POST',
                success: function (res) {
                    if (res.success) {
                        alert('Data berhasil difinalisasi!');
                        fetchKeranjangC();
                    } else {
                        alert('Gagal checkout');
                    }
                }
            });
        }
    });
//EDIT GEDUNG
$(document).on('click', '.editC', function () {
    let modal = new bootstrap.Modal(document.getElementById('modal_gedung'));
    modal.show();
    var id = $(this).data('id');
    $('#vMesin').hide();
    $('#keranjangC').hide();
    $('#createC').hide();
    $('#updateC').show();
   
        $.ajax({
                type: "GET",
                url: "/gedung.edit/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#judul_modalC').html('EDIT GEDUNG ' + item.lokasi + ' ' + 'Departemen : ' + item.kode_dep + 'Divisi : ' + item.nama_div);
                    $('#id_c').val(id);
                    
                    $('#lokasi_kir').empty;
                    $('#lokasi_kir').append('<option value="' + item.id_lokasi + '" selected>' + item.lokasi + '</option>');

                    $('#dep').empty;
                    $('#dep').append('<option value="' + item.id_departemen + '" selected>' + item.kode_dep + '</option>');

                    $('#div').empty;
                    $('#div').append('<option value="' + item.id_div + '" selected>' + item.nama_div + '</option>');

                    selectOptAll();

                    $('#barang_d_edit').empty;
                    $('#barang_d_edit').append('<option value="' + item.idBar + '" selected>' + item.nama_barang + '</option>');
                    $.get('/barang.gedung    ', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#barang_d_edit').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
                            });
                        });
                        
                    $('#kode').val(item.kode);
                    $('#reg').val(item.reg);

                    $('#kondisi_c').append('<option value="' + item.kondisi + '" selected>' + item.kondisi + '</option>');

                    $('#konstruksi_c').append('<option value="' + item.konstruksi + '" selected>' + item.konstruksi + '</option>');

                    $('#materi').append('<option value="' + item.materi + '" selected>' + item.materi + '</option>');

                    $('#luastanah').val(item.luastanah);
                    $('#tgl_imb').val(item.tgl_imb);
                    $('#no_imb').val(item.no_imb);
                    $('#luas').val(item.luas);

                    $('#asal_c').append('<option value="' + item.asal + '" selected>' + item.asal + '</option>');

                    $('#nilaiC').val(item.nilai);

                    $('#status_c').append('<option value="' + item.status + '" selected>' + item.status + '</option>');

                    $('#kode_tanahC').val(item.kode_tanah);
                    $('#ket').val(item.ket);
                });
            }
        });
    });
    //Execute Upate
    $(document).on('click', '#edit_3', function () {
       
         let formData = new FormData($('#form_c')[0]);

        $.ajax({
            url: 'gedung.update',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    alert('Data Berhasil di Update');
                } else {
                    alert('Gagal update');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
            }
        });
    })



    //JALAN
    $(document).on('click', '#klik_nilai_d', function() {
        var id = $(this).data('id');

        var i = 0;
        var table = $("#tbl_detailNilai_d").DataTable();
        table.clear().draw();
            $.get("/nilaiD/"+ id , function(data) {
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
    //Data D
    var fullPathImgD = fileUrl + '/assets/img/jalan/img/';
    var fullPathDocD = fileUrl + '/assets/img/jalan/dok/';
    $(document).on('click', '#detail_d', function() {
        var id = $(this).data('id');
        $('#canvas_tree').empty();
        $('#card-header').empty();
         $.ajax({
                type: "GET",
                url: "/d.dep/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#kepala').html('DATA JALAN,IRIGASI DAN JARINGAN <strong>' + item.lokasi + '<strong>');
                    $('#canvas_tree').append(
                        '<li><span><strong>' + item.kode_dep +  '</strong></span>'+
                                '<ol id="d_div'+ item.id_dep +'"></ol>'+
                            '</li>');
                    var dep = item.id_dep;
                    var lok = item.id_lokasi;
                    $.get("/d.div/"+ dep + "/" + lok , function(data) {

                        $.each(data.data, function(index, item) {
                            var div = item.id_div;

                            $("#d_div" + item.id_dep).append('<li><span><a data-id="' + dep + ',' + lok + ',' + div +
                            ',' + item.nama_div +'" href="#" style="text-decoration: none;" id="tampil_d">'+ item.nama_div +'</a></span></li>')
                        });
                    })
                });
            }
        });
    })

    $(document).on('click', '#tampil_d', function() {
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
            $.get("/d.show/"+ lok + "/" + dep + "/" + div , function(data) {
                $('#card-header').html('<strong>Divisi: '+ nama_div +'</strong><button class="btn btn-sm btn-primary float-end" id="print_d" data-id="' + lok + "," + dep + "," + div + '"><i class="fa-solid fa-print"></i></button>');

                $.each(data.data, function (index, items) {
                     var editButton =
                                        '<div class="btn-group">'+
                                            '<a class="btn btn-default border border-secondary btn-sm text-success" type="button" data-bs-toggle="modal" data-bs-target="#modal_d_detail" id="detail_d_divisi" data-id="'+ items.id_d +'"><i class="fa fa-eye"></i></a>'+


                                            '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                                            '<ul class="dropdown-menu">'+

                                                '<li><a class="dropdown-item  editD text-primary" data-id=" '+ items.id_d +' " href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
                                                '<li><a class="dropdown-item deleteB text-danger" data-id=" '+ items.id_d +' " href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
                                                '<li><hr class="dropdown-divider"></li>'+

                                            '</ul>'+
                                        '</div>';
                                        var img = '<a href="#" data-bs-toggle="modal" data-bs-target="#modal_d_detail" id="detail_d_divisi" data-id="'+ items.id_gedung +'"><img src="https://app.perumdamtirtakencana.id/assets/img/gedung/'+items.img+'" height="100px" width="100px"></img></a>';
                                        table.row.add([
                                            ++i,
                                            items.nama_barang,
                                            items.kode,
                                            items.reg,
                                            editButton
                                        ]).draw();
                                    })
                                })
                            })

                            //Print Jalan
                            $(document).on('click', '#print_d', function() {
                            // Ambil data-id
                            var data = $(this).data('id').split(",");
                            var lok = data[0];
                            var dep = data[1];
                            var div = data[2];

                            // Buat URL print
                            var url = '/jalan.print/' + lok + '/' + dep + '/' + div;

                            // Buka di tab baru
                            window.open(url, '_blank');
                        });
                            //MODAL DETAIL KIB D
                            $(document).on('click', '#detail_d_divisi', function(){
                                var id = $(this).data('id');
                                //$('#exampleModal').modal('show');
                                $('#judul_modal_detail').html(id);
                                $.ajax({
                                    type: "GET",
                                    url: "/d.detail/"+ id,
                                    success: function (data) {
                                    $.each(data.data, function (index, item) {
                                        $('#kode_d').html(item.kode);
                                        $('#nama_barang_d').html(item.nama_barang);
                                        $('#guna_d').html(item.guna);
                                        $('#reg_d').html(item.reg);
                                        $('#kondisi_d').html(item.kondisi);
                                        $('#konstruksi_d').html(item.struktur);
                                        $('#materi_d').html(item.materi);
                                        $('#tgl_imb_d').html(item.tgl_dok);
                                        $('#luas_d').html(item.luas);
                                        $('#status_d').html(item.status);
                                        $('#luastanah_d').html(item.luas_lantai);
                                        $('#kode_tanah_d').html(item.kode_tanah);
                                        $('#no_imb_d').html(item.no_dok);
                                        $('#asal_d').html(item.asal);
                                        $('#nilai_d').html(item.harga);
                                        //$('#susut_d').html(item.susut);
                                        $('#ket_d').html(item.ket);
                                        //$('#gambar_d').attr('src','http://app.perumdamtirtakencana.id/assets/img/gedung/' + item.img);
                });

                    // $.get('/show/' + id, function (data) {
                    // $('#filed').empty();
                    // $.each(data.data, function (index, items) {
                    // var thumbnail = $(
                    //             '<div class="pdf-thumbnail col ">' +
                    //             '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="http://app.perumdamtirtakencana.id/assets/img/gedung/' + items.dok + '" type="application/pdf" border border-secondary rounded>' +
                    //                 '<p><a href="#" onclick="window.open(\'http://app.perumdamtirtakencana.id/assets/img/gedung/' + items.dok + '\', \'_blank\'); return false;">' + items.dok + '</p>' +
                    //             '</div>');
                    //             $('#filed').append(thumbnail);
                    //     });
                    // });
                   }
                });
            })
//Input Jalan Irigasi Dan Jaringan
$(document).on('click', '#add_d', function() {
    $('#vMesin').show();
    $('#keranjangD').show();
    $('#createD').show();
    $('#updateD').hide();
    // $('#kode_aktiva_d').empty().append('<option value="">Select an aktiva</option>');
    //         $.get('/gedung.aktiva/' , function (data) {
    //             $.each(data.data, function (index, item) {
    //                 $('#kode_aktiva_c').prepend('<option value="' + item.id + '">'+  item.kode +' | ' + item.aktiva + '</option>');
    //           }
    //           )})
    selectOptAll();

        $.get('/barang.d', function (data) {
            $.each(data.data, function (index, item) {
                $('#id_barang').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
            });
        });

        $('body').on('change','#id_barang' , function (event) {
            event.preventDefault();
            var id = $(this).val();
            $.get('/gedung.barang/'+id, function (data) {
            $.each(data.data, function (index, item) {
                $('#kode').val(item.kode_barang);
            });
        });
    })
})
//Save Jalan Irigasi Dan Jaringan
$('#submit_d').click(function (e) {
        e.preventDefault();
        let formData = new FormData($('#form_d')[0]);
        // Tambahkan flag draft
        formData.append('is_final', 0);

        $.ajax({
            url: 'jalan.save',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    $('#form_d')
                    .find('input, textarea')
                    //.not('#') // sesuaikan
                    .val('');
                    fetchKeranjangD(); // refresh keranjang
                } else {
                    alert('Gagal menambahkan ke keranjang');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
            }
        });
    });
 // Load data keranjang JALAN
    function fetchKeranjangD() {
    $.ajax({
        url: 'jalan.input',
        method: 'GET',
        success: function (res) {
            let rows = '';
            $.each(res.data, function (i, item) {
                rows += `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${item.nama_barang}</td>
                        <td>${item.kode_barang}</td>
                        <td>${item.luas}</td>
                        <td>${item.struktur}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm  btn-outline-danger btn-hapusD" data-id="${item.idb}">
                               <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;
            });
            $('#tbl_d_input tbody').html(rows);
        }
    });
}fetchKeranjangD(); // load saat pertama kali modal dibuka
//Del Keranjang JALAN
$(document).on('click', '.btn-hapusD', function () {
    const id = $(this).data('id');
    if (confirm('Yakin ingin menghapus item ini?')) {
        $.ajax({
            url:'jalan.hapus/'+id,
            method: 'POST',
            success: function (res) {
                if (res.success) {
                    fetchKeranjangD();
                } else {
                    alert('Gagal menghapus item');
                }
            }
        });
    }
});
//CHECKOUT JALAN
$('#checkoutBtnD').click(function () {
        if (confirm("Yakin ingin menyimpan semua data secara permanen?")) {
            $.ajax({
                url: '/jalan.clear',
                type: 'POST',
                success: function (res) {
                    if (res.success) {
                        alert('Data berhasil difinalisasi!');
                        fetchKeranjangD();
                    } else {
                        alert('Gagal checkout');
                    }
                }
            });
        }
    });
//Edit Jalan
$(document).on('click', '.editD', function () {
    let modal = new bootstrap.Modal(document.getElementById('modal_D'));
    modal.show();
    var id = $(this).data('id');
    $('#vMesin').hide();
    $('#keranjangD').hide();
    $('#createD').hide();
    $('#updateD').show();
   
        $.ajax({
                type: "GET",
                url: "/jalan.edit/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#judul_modalD_crud').html('EDIT JALAN ' + item.lokasi + ' ' + 'Departemen : ' + item.kode_dep + 'Divisi : ' + item.nama_div);
                    $('#id_d').val(id);
                    
                    $('#lokasi_kir').empty;
                    $('#lokasi_kir').append('<option value="' + item.id_lokasi + '" selected>' + item.lokasi + '</option>');

                    $('#dep').empty;
                    $('#dep').append('<option value="' + item.idDep + '" selected>' + item.kode_dep + '</option>');

                    $('#div').empty;
                    $('#div').append('<option value="' + item.id_div + '" selected>' + item.nama_div + '</option>');

                    selectOptAll();

                    $('#id_barang').empty;
                    $('#id_barang').append('<option value="' + item.idBar + '" selected>' + item.nama_barang + '</option>');
                    $.get('/barang.d', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#id_barang').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
                            });
                        });
                        
                    $('#kode').val(item.kode);
                    $('#reg').val(item.reg);

                    $('#kondisi_d_edit').append('<option value="' + item.kondisi + '" selected>' + item.kondisi + '</option>');

                    $('#konstruksi_d_edit').append('<option value="' + item.struktur + '" selected>' + item.struktur + '</option>');

                    $('#materi_d_edit').append('<option value="' + item.materi + '" selected>' + item.materi + '</option>');

                    $('#luas_lantai').val(item.luas_lantai);
                    let tgl = item.tgl_dok.trim(); // hapus spasi ekstra
                    $('#tgl_dok_edit').val(tgl);
                    console.log(item.tgl_dok);
                    $('#no_dok').val(item.no_dok);
                    $('#luas').val(item.luas);

                    $('#asal_d_edit').append('<option value="' + item.asal + '" selected>' + item.asal + '</option>');

                    $('#nilaiD').val(item.nilai);

                    $('#status_d_edit').append('<option value="' + item.status + '" selected>' + item.status + '</option>');

                    $('#kode_tanahD').val(item.kode_tanah);
                    $('#ket').val(item.ket);
                });
            }
        });
    });
   //Execute Update jalan
    $(document).on('click', '#edit_4', function () {
       
         let formData = new FormData($('#form_d')[0]);

        $.ajax({
            url: 'jalan.update',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    alert('Data Berhasil di Update');
                } else {
                    alert('Gagal update');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
            }
        });
    })
//ASET TETAP LAINNYA
            $(document).on('click', '#klik_nilai_e', function() {
                var id = $(this).data('id');

                var i = 0;
                var table = $("#tbl_detailNilai_e").DataTable();
                table.clear().draw();
                    $.get("/nilaiE/"+ id , function(data) {
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
    //Data E
    $(document).on('click', '#detail_e', function() {
        var id = $(this).data('id');
        $('#canvas_tree').empty();
        $('#card-header').empty();
         $.ajax({
                type: "GET",
                url: "/e.dep/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#kepala').html('DATA ASET TETAP LAINNYA <strong>' + item.lokasi + '<strong>');
                    $('#canvas_tree').append(
                        '<li><span><strong>' + item.kode_dep +  '</strong></span>'+
                                '<ol id="e_div'+ item.id_dep +'"></ol>'+
                            '</li>');
                    var dep = item.id_dep;
                    var lok = item.id_lokasi;
                    $.get("/e.div/"+ dep + "/" + lok , function(data) {

                        $.each(data.data, function(index, item) {
                            var div = item.id_div;

                            $("#e_div" + item.id_dep).append('<li><span><a data-id="' + dep + ',' + lok + ',' + div +
                            ',' + item.nama_div +'" href="#" style="text-decoration: none;" id="tampil_e">'+ item.nama_div +'</a></span></li>')
                        });
                    })
                });
            }
        });
    })

    var fullPathImgE = fileUrl + '/assets/img/aset_tetap/img/';
    var fullPathDocE = fileUrl + '/assets/img/aset_tetap/dok/';

    $(document).on('click', '#tampil_e', function() {
        var id = $(this).data('id');
        var delimiter = ",";
        var id_key = id.split(delimiter);
        var dep = id_key[0];
        var lok = id_key[1];
        var div = id_key[2];
        var nama_div = id_key[3];
        var i = 0;
        var table = $("#tbl_e_data").DataTable();
            table.clear().draw();
            $.get("/e.show/"+ lok + "/" + dep + "/" + div , function(data) {
                $('#card-header').html('<strong>Divisi: '+ nama_div +'</strong><button class="btn btn-sm btn-primary float-end" id="print_e" data-id="' + lok + "," + dep + "," + div + '"><i class="fa-solid fa-print"></i></button>');

                $.each(data.data, function (index, items) {
                     var editButton =
                                        '<div class="btn-group">'+
                                            '<a class="btn btn-default border border-secondary btn-sm text-success" type="button"  data-bs-toggle="modal" data-bs-target="#modal_e_detail" id="detail_e_divisi" data-id="'+ items.id_e +','+items.nama_div +'"><i class="fa fa-eye"></i></a>'+


                                            '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                                            '<ul class="dropdown-menu">'+

                                                '<li><a class="dropdown-item  editE text-primary" data-id=" '+ items.id_e +' " href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
                                                '<li><a class="dropdown-item btn-hapusE text-danger" data-id=" '+ items.id_e +' " href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
                                                '<li><hr class="dropdown-divider"></li>'+

                                            '</ul>'+
                                        '</div>';
                                        var img = '<a href="#" ><img src="'+ fullPathImgE + items.img+'" height="100px" width="100px"></img></a>';
                                        table.row.add([
                                            ++i,
                                            items.nama_barang,
                                            items.kode,
                                            items.reg,
                                            img,
                                            editButton
                                        ]).draw();
                                    })
                                })
                            })
                            //Print Aset
                            $(document).on('click', '#print_e', function() {
                            // Ambil data-id
                            var data = $(this).data('id').split(",");
                            var lok = data[0];
                            var dep = data[1];
                            var div = data[2];

                            // Buat URL print
                            var url = '/aset.print/' + lok + '/' + dep + '/' + div;

                            // Buka di tab baru
                            window.open(url, '_blank');
                        });
                            $(document).on('click', '#detail_e_divisi', function(){
                               var dataId = $(this).data('id');
                                var delimiter = ",";
                                var id_key = dataId.split(delimiter);
                                var id = id_key[0];
                                var nama_div = id_key[1];
                               
                                $.ajax({
                                    type: "GET",
                                    url: "/e.detail/"+ id,
                                    success: function (data) {
                                    $.each(data.data, function (index, item) {
                                        $('#judul_modal_detail').html('ASET TETAP LAINYA - Divisi: ' + nama_div);
                                        $('#kode_e').html(item.kode);
                                        $('#nama_barang_e').html(item.nama_barang);
                                        $('#guna_e').html(item.guna);
                                        $('#reg_e').html(item.reg);
                                        $('#kondisi_e').html(item.kondisi);
                                        $('#konstruksi_e').html(item.struktur);
                                        $('#materi_e').html(item.nama);
                                        $('#tahun_e').html(item.tahun);
                                        $('#jumlah_e').html(item.jumlah);
                                        $('#asal_e').html(item.asal);
                                        
                                        $('#ket_e').html(item.ket);
                                        $('#gambar_e').attr('src',fullPathImgE + item.img);

                                        $('#filed').empty();
                    
                    // var thumbnail = $(
                    //             '<div class="pdf-thumbnail col ">' +
                    //             '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="http://app.perumdamtirtakencana.id/assets/img/gedung/' + items.dok + '" type="application/pdf" border border-secondary rounded>' +
                    //                 '<p><a href="#" onclick="window.open(\'' + fullPathImgE  + items.dok + '\', \'_blank\'); return false;">' + items.dok + '</p>' +
                    //             '</div>');
                    //             $('#filed').append(thumbnail);
                });

                   
                    
                       
                   
                   }
                });
            })
//Input Aset tetap lainya
$(document).on('click', '#add_e', function() {
    $('#vMesin').show();
    $('#keranjangE').show();
    $('#createE').show();
    $('#updateE').hide();
    // $('#kode_aktiva_d').empty().append('<option value="">Select an aktiva</option>');
    //         $.get('/gedung.aktiva/' , function (data) {
    //             $.each(data.data, function (index, item) {
    //                 $('#kode_aktiva_c').prepend('<option value="' + item.id + '">'+  item.kode +' | ' + item.aktiva + '</option>');
    //           }
    //           )})
    selectOptAll();

        $.get('/barang.e', function (data) {
            $.each(data.data, function (index, item) {
                $('#id_barang').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
            });
        });

        $('body').on('change','#id_barang' , function (event) {
            event.preventDefault();
            var id = $(this).val();
            $.get('/aset.barang/'+id, function (data) {
            $.each(data.data, function (index, item) {
                $('#kode').val(item.kode_barang);
            });
        });
    })

    $.get('/bahan', function (data) {
            $.each(data.data, function (index, item) {
                $('#bahan_e_edit').append('<option value="' + item.id + '">' + item.nama + '</option>');
            });
        });
})
//Save Aset Tetap Lainnya
$('#submit_e').click(function (e) {
        e.preventDefault();

        let formData = new FormData($('#form_e')[0]);

        // Tambahkan flag draft
        formData.append('is_final', 0);

        $.ajax({
            url: 'aset.save',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    $('#form_e')
                    .find('input, textarea')
                    //.not('#') // sesuaikan
                    .val('');
                    fetchKeranjangE(); // refresh keranjang
                } else {
                    alert('Gagal menambahkan ke keranjang');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
            }
        });
    });

// Load data keranjang Aset Tetap Lainnya
    function fetchKeranjangE() {
    $.ajax({
        url: 'aset.input',
        method: 'GET',
        success: function (res) {
            let rows = '';
            $.each(res.data, function (i, item) {
                rows += `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${item.nama_barang}</td>
                        <td>${item.kode}</td>
                        <td>${item.jumlah}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm  btn-outline-danger btn-hapusE" data-id="${item.ide}">
                               <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;
            });
            $('#tbl_e_input tbody').html(rows);
        }
    });
}fetchKeranjangE(); // load saat pertama kali modal dibuka
//Del Keranjang Aset Tetap Lainnya
$(document).on('click', '.btn-hapusE', function () {
    const id = $(this).data('id');
    if (confirm('Yakin ingin menghapus item ini?')) {
        $.ajax({
            url:'aset.hapus/'+id,
            method: 'POST',
            success: function (res) {
                if (res.success) {
                    $('#tampil_e').trigger('click');
                    fetchKeranjangE();
                } else {
                    alert('Gagal menghapus item');
                }
            }
        });
    }
});
//CHECKOUT JALAN
$('#checkoutBtnE').click(function () {
        if (confirm("Yakin ingin menyimpan semua data secara permanen?")) {
            $.ajax({
                url: '/aset.clear',
                type: 'POST',
                success: function (res) {
                    if (res.success) {
                        alert('Data berhasil difinalisasi!');
                        fetchKeranjangE();
                    } else {
                        alert('Gagal checkout');
                    }
                }
            });
        }
    });
//Edit Aset Tetap Lainnya
$(document).on('click', '.editE', function () {
    let modal = new bootstrap.Modal(document.getElementById('modal_E'));
    modal.show();
    var id = $(this).data('id');
    $('#vMesin').hide();
    $('#keranjangE').hide();
    $('#createE').hide();
    $('#updateE').show();
   
        $.ajax({
                type: "GET",
                url: "/aset.edit/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#judul_modalE_crud').html('EDIT ASET TETAP LAINYA - ' + item.lokasi + ' - ' + 'Departemen : ' + item.kode_dep + 'Divisi : ' + item.nama_div);
                    $('#id_e').val(id);
                    
                    $('#lokasi_kir').empty;
                    $('#lokasi_kir').append('<option value="' + item.id_lokasi + '" selected>' + item.lokasi + '</option>');

                    $('#dep').empty;
                    $('#dep').append('<option value="' + item.idDep + '" selected>' + item.kode_dep + '</option>');

                    $('#div').empty;
                    $('#div').append('<option value="' + item.id_div + '" selected>' + item.nama_div + '</option>');

                    selectOptAll();

                    $('#id_barang').empty;
                    $('#id_barang').append('<option value="' + item.idBar + '" selected>' + item.nama_barang + '</option>');
                    $.get('/barang.d', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#id_barang').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
                            });
                        });
                        
                    $('#kode').val(item.kode);
                    $('#reg').val(item.reg);

                    $('#kondisi_e_edit').append('<option value="' + item.kondisi + '" selected>' + item.kondisi + '</option>');

                    $('#bahan_e_edit').append('<option value="' + item.idBah + '" selected>' + item.nama + '</option>');

                    $('#asal_e_edit').append('<option value="' + item.asal + '" selected>' + item.asal + '</option>');

                    $('#tahun').val(item.tahun);
                    $('#jumlah').val(item.jumlah);
                    $('#ket').val(item.ket);
                });
            }
        });
    });

    //Execute Update Aset Tetap Lainnya
    $(document).on('click', '#edit_5', function () {
       
         let formData = new FormData($('#form_e')[0]);

        $.ajax({
            url: 'aset.update',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    alert('Data Berhasil di Update');
                } else {
                    alert('Gagal update');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
            }
        });
    })
    

        //Data F
        $(document).on('click', '#detail_f', function() {
            var id = $(this).data('id');
            $('#canvas_tree').empty();
            $('#card-header').empty();
             $.ajax({
                    type: "GET",
                    url: "/f.dep/"+ id,
                    success: function (data) {
                    $.each(data.data, function (index, item) {
                        $('#kepala').html('DATA KONSTRUKSI DALAM PENGERJAAN <strong>' + item.lokasi + '<strong>');
                        $('#canvas_tree').append(
                            '<li><span><strong>' + item.kode_dep +  '</strong></span>'+
                                    '<ol id="f_div'+ item.id_dep +'"></ol>'+
                                '</li>');
                        var dep = item.id_dep;
                        var lok = item.id_lokasi;
                        $.get("/f.div/"+ dep + "/" + lok , function(data) {

                            $.each(data.data, function(index, item) {
                                var div = item.id_div;

                                $("#f_div" + item.id_dep).append('<li><span><a data-id="' + dep + ',' + lok + ',' + div +
                                ',' + item.nama_div +'" href="#" style="text-decoration: none;" id="tampil_f">'+ item.nama_div +'</a></span></li>')
                            });
                        })
                    });
                }
            });
        })
        var fullPathImgF = fileUrl + '/assets/img/konstruksi/img/';
        var fullPathDocF = fileUrl + '/assets/img/konstruksi/dok/';
        $(document).on('click', '#tampil_f', function() {
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
                $.get("/f.show/"+ lok + "/" + dep + "/" + div , function(data) {
                    $('#card-header').html('<strong>Divisi: '+ nama_div +'</strong><button class="btn btn-sm btn-primary float-end" id="print_f" data-id="' + lok + "," + dep + "," + div + '"><i class="fa-solid fa-print"></i></button>');

                    $.each(data.data, function (index, items) {
                         var editButton =
                                            '<div class="btn-group">'+
                                                '<a class="btn btn-default border border-secondary btn-sm text-success" type="button" data-bs-toggle="modal" data-bs-target="#modal_f_detail" id="detail_f_divisi" data-id="'+ items.id_f +'"><i class="fas fa-eye"></i></a>'+


                                                '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                                                '<ul class="dropdown-menu">'+

                                                    '<li><a class="dropdown-item  editF text-primary" data-id=" '+ items.id_f +' " href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>'+
                                                    '<li><a class="dropdown-item btn-hapusF text-danger" data-id=" '+items.id_f+' " href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>'+
                                                    '<li><hr class="dropdown-divider"></li>'+

                                                '</ul>'+
                                            '</div>';
                                            var img = '<a href="#" data-bs-toggle="modal" data-bs-target="#modal_d_detail" id="detail_f_divisi" data-id="'+ items.id_gedung +'"><img src="https://app.perumdamtirtakencana.id/assets/img/gedung/'+items.img+'" height="100px" width="100px"></img></a>';
                                            table.row.add([
                                                ++i,
                                                items.nama_barang,
                                                items.tahun,
                                                items.nilai,
                                                editButton
                                            ]).draw();
                                        })
                                    })
                                })

                            //Print Mesin
                            $(document).on('click', '#print_f', function() {
                            // Ambil data-id
                            var data = $(this).data('id').split(",");
                            var lok = data[0];
                            var dep = data[1];
                            var div = data[2];

                            // Buat URL print
                            var url = '/konstruksi.print/' + lok + '/' + dep + '/' + div;

                            // Buka di tab baru
                            window.open(url, '_blank');
                        });

//MODAL DETAIL KIB F

$(document).on('click', '#detail_f_divisi', function(){
    var id = $(this).data('id');
    $('#judul_modal_detail').html(id);
    $.ajax({
        type: "GET",
        url: "/f.detail/"+ id,
        success: function (data) {
        $.each(data.data, function (index, item) {
            $('#tahun_f').html(item.tahun);
            $('#nama_barang_f').html(item.nama_barang);
            $('#konstruksi_f').html(item.type);
            $('#materi_f').html(item.materi);
            $('#luas_f').html(item.luas);
            $('#letak_f').html(item.letak);
            $('#status_f').html(item.status_tanah);
            $('#asal_f').html(item.asal);
            $('#status_aset_f').html(item.status_aset);
            $('#nilai_f').html(item.nilai);
            $('#urai_f').html(item.urai);
            $('#ket_f').html(item.ket);
            $('#gambar_f').attr('src',fullPathImgF + item.img);
             $('#filedF').empty();
            var thumbnail = $('<div class="pdf-thumbnail col ">' +
                                    '<embed width="150px" height="200px ; overflow: hidden;" name="plugin" src="' + fullPathDocF + item.dok + '" type="application/pdf" border border-secondary rounded>' +
                                        '<p><a href="#" onclick="window.open(\'' + fullPathDocF + item.dok + '\', \'_blank\'); return false;">' + item.dok + '</p>' +
                                    '</div>');
            $('#filedF').append(thumbnail);
            
});


}
});
})

//Input Konstruksi
$(document).on('click', '#add_f', function() {
    $('#vMesin').show();
    $('#keranjangF').show();
    $('#createF').show();
    $('#updateF').hide();
    selectOptAll();

        $.get('/barang.f', function (data) {
            $.each(data.data, function (index, item) {
                $('#id_barang').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
            });
        });
})
//Save Konstruksi
$('#submit_f').click(function (e) {
        e.preventDefault();

        let formData = new FormData($('#form_f')[0]);

        // Tambahkan flag draft
        formData.append('is_final', 0);

        $.ajax({
            url: 'konstruksi.save',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    $('#form_f')
                    .find('input, textarea')
                    //.not('#') // sesuaikan
                    .val('');
                    fetchKeranjangF(); // refresh keranjang
                } else {
                    alert('Gagal menambahkan ke keranjang');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
            }
        });
    });

// Load data keranjang KOnstruksi
    function fetchKeranjangF() {
    $.ajax({
        url: 'konstruksi.input',
        method: 'GET',
        success: function (res) {
            let rows = '';
            $.each(res.data, function (i, item) {
                rows += `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${item.nama_barang}</td>
                        <td>${item.type}</td>
                        <td>${item.struktur}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm  btn-outline-danger btn-hapusF" data-id="${item.idf}">
                               <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;
            });
            $('#tbl_f_input tbody').html(rows);
        }
    });
}fetchKeranjangF(); // load saat pertama kali modal dibuka
//Del Keranjang Konstruksi
$(document).on('click', '.btn-hapusF', function () {
    const id = $(this).data('id');
    if (confirm('Yakin ingin menghapus item ini?')) {
        $.ajax({
            url:'konstruksi.hapus/'+id,
            method: 'POST',
            success: function (res) {
                if (res.success) {
                    $('#tampil_f').trigger('click');
                    fetchKeranjangF();
                } else {
                    alert('Gagal menghapus item');
                }
            }
        });
    }
});
//CHECKOUT KONSTRUKSI
$('#checkoutBtnF').click(function () {
        if (confirm("Yakin ingin menyimpan semua data secara permanen?")) {
            $.ajax({
                url: '/konstruksi.clear',
                type: 'POST',
                success: function (res) {
                    if (res.success) {
                        alert('Data berhasil difinalisasi!');
                        fetchKeranjangF();
                    } else {
                        alert('Gagal checkout');
                    }
                }
            });
        }
    });
//EDIT KONSTRUKSI
$(document).on('click', '.editF', function () {
    let modal = new bootstrap.Modal(document.getElementById('modal_F'));
    modal.show();
    $('#judul_modalF_crud').html('EDIT KONSTRUKSI DALAM PENGERJAAN');
    var id = $(this).data('id');
    $('#vMesin').hide();
    $('#keranjangF').hide();
    $('#createF').hide();
    $('#updateF').show();
   
        $.ajax({
                type: "GET",
                url: "/konstruksi.edit/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    $('#id_f').val(id);
                    
                    $('#lokasi_kir').empty;
                    $('#lokasi_kir').append('<option value="' + item.id_lokasi + '" selected>' + item.lokasi + '</option>');

                    $('#dep').empty;
                    $('#dep').append('<option value="'+ item.idDep +'" selected>' + item.kode_dep + '</option>');

                    $('#div').empty;
                    $('#div').append('<option value="' + item.id_div + '" selected>' + item.nama_div + '</option>');

                    selectOptAll();

                    $('#id_barang').empty;
                    $('#id_barang').append('<option value="' + item.idBar + '" selected>' + item.nama_barang + '</option>');
                    $.get('/barang.f', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#id_barang').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
                            });
                        });
                        
                    $('#kode').val(item.kode);
                    $('#reg').val(item.reg);


                    $('#struktur_f_edit').append('<option value="' + item.struktur + '" selected>' + item.struktur + '</option>');

                    $('#materi_f_edit').append('<option value="' + item.materi + '" selected>' + item.materi + '</option>');

                    
                    $('#luas_f_edit').val(item.luas);
                    $('#tahun_f_edit').val(item.tahun);
                    $('#type_f_edit').val(item.type);

                    $('#asal_f_edit').append('<option value="' + item.asal + '" selected>' + item.asal + '</option>');

                    $('#nilaiC').val(item.nilai);

                    $('#status_tanah_f_edit').append('<option value="' + item.status_tanah + '" selected>' + item.status_tanah + '</option>');

                    $('#status_aset_f_edit').append('<option value="' + item.status_aset + '" selected>' + item.status_aset + '</option>');
                     $('#urai_edit').val(item.nilai);
                    $('#nilaiF').val(item.nilai);
                    $('#ket').val(item.ket);
                });
            }
        });
    });

//Execute Update Konstruksi Dalam Pengerjaan
    $(document).on('click', '#edit_6', function () {
     let formData = new FormData($('#form_f')[0]);
         $.ajax({
            url: 'konstruksi.update',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                if (res.success) {
                    alert('Data Berhasil diUpdate');
                } else {
                    alert('Gagal update');
                }
            },
            error: function (xhr) {
                alert('Error server saat menambahkan ke keranjang');
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
                                   $("#kir_ged" + item.id_div).append('<li><a href="#" id="kir_ruang" style="text-decoration: none;" data-id="' + dep + ',' + lok + ',' + div + ',' + items.gedung + ',' + item.nama_div + '"><span">'+ items.gedung +'</a></span>'+

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
                    '<a href="#" class="badge bg-success border border-secondary btn-sm tree" data-id="' + lok + ',' + dep + ',' + div + ',' + ged + ',' + ruang + ',' + nama_div + '" id="kir_detail" data-bs-toggle="modal" data-bs-target="#modal_kir_detail"><i class="fa-solid fa-eye"></i></a>'+
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
        $('#edit_tabel').empty();

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
$('#button_print').html('<button type="button" class="tombol btn btn-primary" id="print_kir" data-id="' + lok + "," + dep + "," + div + "," + ged + "," + ruang + '"><i class="fa fa-print"></i></button> <button type="button" class="tombol btn btn-warning" id="print_kir_arsip" data-id="' + lok + "," + dep + "," + div + "," + ged + "," + ruang + '"><i class="fa fa-print"></i></button>')

$('#judul_modal').html('<strong>Divisi:</strong> '+ nama_div +'<br><strong>Gedung:</strong> '+ ged +'<br><strong>Ruang: </strong>' + ruang +'<button class="btn btn-sm btn-primary float-end" id="print_kir" data-id="' + lok + "," + dep + "," + div + "," + ged + "," + ruang + '"><i class="fa-solid fa-print"></i></button>' );

        var table = $("#tbl_kir_detail").DataTable();
        table.clear().draw();

        $.get("/kir.detail/"+ lok +"/"+ dep +"/"+ div +"/"+ ged +"/"+ ruang, function(data){
            $.each(data.data, function (index, items) {
                        var img = '<a href="#" id="img" data-id="' + items.idKir + '"><img src="https://app.perumdamtirtakencana.id/assets/img/kir/'+items.img+'" height="100px" width="100px"></img></a>';
                        var editButton = '<button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>'+
                        '<ul class="dropdown-menu">'+
                            '<li><a class="dropdown-item edit" id="edit_kir" data-id="' + items.idKir + '" href="#"><i class="fa-solid fa-edit"></i>&nbsp;UPDATE</a></li>'+
                            '<li><a class="dropdown-item delete" data-id="" href="#"><i class="fa fa-retweet"></i>&nbsp;MUTASI</a></li>'+
                            '<li><hr class="dropdown-divider"></li>'+
                        '</ul>';

                        table.row.add([
                        ++i,
                        items.nama_barang,
                        items.merk,
                        items.nama,
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

        $(document).on('click', '#print_kir', function() {
            var id = $(this).data('id');
            var delimiter = ",";
            var id_key = id.split(delimiter);
            var lok = id_key[0];
            var dep = id_key[1];
            var div = id_key[2];
            var ged = id_key[3];
            var ruang = id_key[4];
            var prnt = 'kir';
            var url = "/kir.print/"+ lok +"/"+ dep +"/"+ div +"/"+ ged +"/"+ ruang + "/" + prnt;
            var features = 'width=800,height=600';
            window.open(url, '_blank', features);
        })

        $(document).on('click', '#print_kir_arsip', function() {
            var id = $(this).data('id');
            var delimiter = ",";
            var id_key = id.split(delimiter);
            var lok = id_key[0];
            var dep = id_key[1];
            var div = id_key[2];
            var ged = id_key[3];
            var ruang = id_key[4];
            var prnt = 'arsip';
            var url = "/kir.print/"+ lok +"/"+ dep +"/"+ div +"/"+ ged +"/"+ ruang + "/" + prnt;
            var features = 'width=800,height=600';
            window.open(url, '_blank', features);
        })
    //EDIT GAMBAR KIR
    $(document).on('click','#img', function(){
        $('#edit_tabel').empty();
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "/kir.edit/"+ id,
            success: function (data) {
            $.each(data.data, function (index, item) {
                $('#edit_tabel').append( '<fieldset class="border border-warning rounded-3 p-2 row" id="filed">'+
                ' <legend class="float-none w-auto px-3 border border-danger rounded">'+
                     '<div style="font-size: 15px;"><strong>EDIT GAMBAR</strong></div>'+
                ' </legend>'+
                '<div class="row">'+

                 '<div class="col rounded">'+
                    '<img  src="https://app.perumdamtirtakencana.id/assets/img/kir/'+item.img+'" height="250px" width="250px"></img>'+
                 '</div>'+

                   '<div class="col">'+
                     '<input type="file" id="imgInput" class="form-control"><br>'+
                     '<a href=# class="btn btn-outline-primary" data-id="'+ id +'" id="updateImg"><i class="fa fa-save" ></i></a>'+
                   '</div>'+
                   '<div class="col">'+
                     '<img id="preview" src="" height="250px" width="250px"></img>'+
                  '</div>'+

                 '</div>'+
              '</fieldset><br></br>')

              $('#imgInput').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
                
            });
        }
    });
})

// Update image on clicking the save button
$(document).on('click', '#updateImg', function(e) {
    e.preventDefault();
    var id = $(this).data('id'); // Get the ID of the item being updated
    var formData = new FormData();
    var fileInput = $('#imgInput')[0].files[0]; // Get the file from the input

    // Check if a file is selected
    if (!fileInput) {
        alert("Please select an image to upload.");
        return;
    }

    formData.append('img', fileInput); // Append the image to formData
    formData.append('_method', 'POST'); // Laravel usually expects a PUT or PATCH request for updates

    $.ajax({
        url: '/kir.imgUpd/' + id, // Replace with your update route
        type: 'POST', // Laravel accepts POST with _method as PUT
        data: formData,
        processData: false, // Important to prevent jQuery from processing the data
        contentType: false, // Important to prevent jQuery from setting content type header
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is sent
        },
        success: function(response) {
            alert("Image updated successfully!");
            $.get("/kir.edit/"+ id, function (data) {
                $.each(data.data, function (index, item) {

                    var lok = item.id_lokasi;
                    var dep = item.id_departemen;
                    var div = item.id_div;
                    var ged = item.gedung;
                    var ruang = item.ruangan;
                    var i = 0;
                    
                    var table = $("#tbl_kir_detail").DataTable();
                    table.clear().draw();
                    $.get("/kir.detail/"+ lok +"/"+ dep +"/"+ div +"/"+ ged +"/"+ ruang, function(data){
                        $.each(data.data, function (index, items) {
                            var img = '<a href="#" id="img" data-id="' + items.idKir + '"><img src="https://app.perumdamtirtakencana.id/assets/img/kir/'+items.img+'" height="100px" width="100px"></img></a>';
                            var editButton = '<a href="#" type="submit" id="edit_kir" data-id="' + items.idKir + '" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>';

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
                        });
                    });

                })
            })
        },
        error: function(xhr, status, error) {
            alert("Error updating image: " + error);
        }
    });
});
    //EDIT KIR
    $(document).on('click', '#edit_kir', function() {
        $('#edit_tabel').empty();
        var id = $(this).data('id');
        $('#edit_tabel').append( '<fieldset class="border border-danger rounded-3 p-2 row" id="filed">'+
                                   ' <legend class="float-none w-auto px-3 border border-danger rounded">'+
                                        '<div style="font-size: 15px;"><strong>EDIT DATA TERPILIH</strong></div>'+
                                   ' </legend>'+
                                '<table class="table table-striped table-responsive table-border" id="tbl_kir_edit">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th class="text-center">NO</th>'+
                                        '<th class="text-center">Nama Aktiva</th>'+
                                        '<th class="text-center">Merk/Type</th>'+
                                        '<th class="text-center">Bahan</th>'+
                                        '<th class="text-center">Jumlah</th>'+
                                        '<th class="text-center">Satuan</th>'+
                                        '<th class="text-center">Baik</th>'+
                                        '<th>Rusak Ringan</th>'+
                                        '<th class="text-center">Rusak Berat</th>'+
                                        '<th></th>'+
                                        
                                    '</tr>'+
                                '</thead>'+
                            '<tbody>'+
                                '<tr>'+
                                    '<input type="hidden" id="id_kir" value=" '+ id +' ">'+
                                    '<td class="text-center">' + id + '</td>'+
                                    '<td class="text-center">'+
                                        '<select class="select2" id="edit_barang" style="width:100%;">'+

                                        '</select>'+
                                    '</td>'+
                                    '<td class="text-center"><input type="text" class="form-control" id="merk_edit"></td>'+
                                    '<td>'+
                                        '<select class="select2 form-control" id="edit_bahan" style="width:100%;" >'+

                                        '</select>'+
                                    '</td>'+
                                    '<td class="text-center"><input type="text" class="form-control" style="width:35px;" id="jumlah_edit"></td>'+
                                    '<td class="text-center"><select class="select2" id="satuan_edit">'+
                                            '<option>PCS</option>'+
                                            '<option>UNIT</option>'+
                                            '<option>SET</option>'+
                                        '</select>'+
                                    '</td>'+
                                    '<td class="text-center"><input type="text" class="form-control" style="width:35px;" id="baik_edit"></td>'+
                                    '<td class="text-center"><input type="text" class="form-control" style="width:35px;" id="ringan_edit"></td>'+
                                    '<td class="text-center"><input type="text" class="form-control" style="width:35px;" id="berat_edit"></td>'+
                                    '<td class="text-center"><a href="#" id="submit_update" class="btn btn-sm btn-outline-success"><i class="fa fa-save"></i></td>'+
                                    '<td class="text-center"><a href="#" id="close" class="btn btn-sm btn-outline-secondary">X</a></td>'+
                                '</tr>'+
                            '</tbody>'+
                            '</fieldset><br></br>'
                        )
                        $('.select2').select2({
                            dropdownParent: $('#modal_bodyKir')
                        });
                        //selectOptKir();
                        $.get('/barang.kir', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#edit_barang').append('<option value="' + item.id + '">' + item.nama_barang + '</option>');
                            });
                        });

                        $.get('/bahan', function (data) {
                            $.each(data.data, function (index, item) {
                                $('#edit_bahan').append('<option value="' + item.nama + '">' + item.nama + '</option>');
                            });
                        });

                        $.ajax({
                            type: "GET",
                            url: "/kir.edit/"+ id,
                            success: function (data) {
                            $.each(data.data, function (index, item) {

                                $('#id_kir').val()
                                $('#edit_barang option[value="' + item.idBar + '"]').remove();
                                $('#edit_barang').prepend('<option value="' + item.idBar + '" selected="selected">' + item.nama_barang + '</option>');
                                $('#merk_edit').val(item.merk);

                                $('#edit_bahan option[value="' + item.bahan + '"]').remove();
                                $('#edit_bahan').prepend('<option value="' + item.bahan + '" selected="selected">' + item.bahan + '</option>');

                                $('#jumlah_edit').val(item.jumlah);
                                $('#satuan_edit option[value="' + item.satuan + '"]').remove();
                                $('#satuan_edit').prepend('<option value="' + item.satuan + '" selected="selected">' + item.satuan + '</option>');
                                $('#baik_edit').val(item.baik);
                                $('#ringan_edit').val(item.ringan);
                                $('#berat_edit').val(item.berat);
                            });
                        }
                    });
                })
                $(document).on('click','#close',function() {
                    $('#edit_tabel').empty();

                })
                    //SUBMIT EDIT KIR
                    $(document).on('click','#submit_update',function() {
                        $.ajax({
                            data: {
                                id_kir:$('#id_kir').val(),
                                barang:$('#edit_barang').val(),
                                merk:$('#merk_edit').val(),
                                bahan:$('#edit_bahan').val(),
                                jumlah:$('#jumlah_edit').val(),
                                satuan:$('#satuan_edit').val(),
                                baik:$('#baik_edit').val(),
                                ringan:$('#ringan_edit').val(),
                                berat:$('#berat_edit').val(),
                            },
                            url: "/kir.update",
                            type: "POST",
                            dataType: 'json',
                            success: function (data) {

                                var id = $('#id_kir').val()
                                $.get("/kir.edit/"+ id, function (data) {
                                    $.each(data.data, function (index, item) {

                                        var lok = item.id_lokasi;
                                        var dep = item.id_departemen;
                                        var div = item.id_div;
                                        var ged = item.gedung;
                                        var ruang = item.ruangan;
                                        var i = 0;


                                        var table = $("#tbl_kir_detail").DataTable();
                                        table.clear().draw();
                                        $.get("/kir.detail/"+ lok +"/"+ dep +"/"+ div +"/"+ ged +"/"+ ruang, function(data){
                                            $.each(data.data, function (index, items) {
                                                var img = '<a href="#" id="detail_gedung_divisi"><img src="https://app.perumdamtirtakencana.id/assets/img/kir/'+items.img+'" height="100px" width="100px"></img></a>';
                                                var editButton = '<a href="#" type="submit" id="edit_kir" data-id="' + items.idKir + '" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>';

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
                                            });
                                        });

                                    })
                                    alert('berhasil update' + id);
                                })

                            },
                            error: function(xhr) {
                                alert('gagal update')
                            }
                        });

                    })





//Tambah Kir

$(document).on('click', '#tambah_kir', function() {

    $('.select2').select2({
        dropdownParent: $('#modal_bodyLG')
    });
    $('#jenis_input').val(1);
    selectOptKir();
    selectOptAll();
    refKirInput();
    $('body').on('change', '#nama_aset', function (event) {
        event.preventDefault();
        var id = $(this).val();
        // $('#kode_aktiva').empty().append('<option value="">Select an aktiva</option>');
        $.get('/kode.kir/' + id , function (data) {
            $.each(data.data, function (index, item) {
                $('#kode_aset').val(item.kode_barang);
          }
          )})
    });

    function calculateTotal() {
        var baik = parseInt($('#baik').val()) || 0;
        var ringan = parseInt($('#ringan').val()) || 0;
        var berat = parseInt($('#berat').val()) || 0;
        var jumlah = baik + ringan + berat;
        $('#jumlah').val(jumlah);
    }

    $('body').on('change', '#baik, #ringan, #berat', function () {
        calculateTotal();
    });

    // Initial calculation to set the total correctly on page load
    $(document).ready(function () {
        calculateTotal();
    });

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
                    satuan:$('#satuan').val(),
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
                    klir();
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
        function calculateTotal() {
            var baik = parseInt($('#baik').val()) || 0;
            var ringan = parseInt($('#ringan').val()) || 0;
            var berat = parseInt($('#berat').val()) || 0;
            var jumlah = baik + ringan + berat;
            $('#jumlah').val(jumlah);
        }
    
        $('body').on('change', '#baik, #ringan, #berat', function () {
            calculateTotal();
        });
    
        // Initial calculation to set the total correctly on page load
        $(document).ready(function () {
            calculateTotal();
        }); 
$('#judul_modal').empty();
$('#head-off').empty();
$('#head-off').append('<div class="row  border border-primary rounded">'+
                            '<div class="container"><br>'+
                            ' <table class="table table-striped table-bordered rounded">'+
                                    '<thead>'+
                                        '<tr class="text-center">'+
                                            '<th>DIVISI</th>'+
                                            '<th>GEDUNG</th>'+
                                            '<th>RUANGAN</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                '<tbody>'+
                                        '<tr>'+
                                            '<td class="text-center">'+ nama_div + '</td>'+
                                            '<td class="text-center">'+ ged +'</div>'+
                                            '<td class="text-center">'+ ruang +'</td>'+
                                        '</tr>'+
                                    '</tbody>'+
                                '</table>'+
                            '</div>'+
                      '</div><br>'+
                      '<input type="hidden" value="'+ lok +'" id="lokasi_kir">'+
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

    $('body').on('change', '#nama_aset', function (event) {
        event.preventDefault();
        var id = $(this).val();
        // $('#kode_aktiva').empty().append('<option value="">Select an aktiva</option>');
        $.get('/kode.kir/' + id , function (data) {
            $.each(data.data, function (index, item) {
                $('#kode_aset').val(item.kode_barang);
          }
          )})
    });
    

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
//ARSIP DETAIL
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
            var bulanNames = ['JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'];
            var bulan = bulanNames[bulans - 1];
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
//------NILAI-----//
//DATA TABEL NILAI
$('#tbl_sside').DataTable({
        processing: true,
        serverSide: true,
        ajax: "nilai/data",
        columns: [
            
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'no_voucher', name: 'no_voucher' },
            { data: 'tgl_voucher', name: 'tgl_voucher' },
            { data: 'aktiva', name: 'aktiva' },
            { data: 'tahun', name: 'tahun' },
            { data: 'nilai', name: 'nilai' },
            { data: 'urai', name: 'urai' },
            { data: 'kib', name: 'kib' },
            { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
        ]
    });

//EDIT NILAI
    $(document).on('click', '.editNilai', function() {


        var id = $(this).data('id');
        $('#tambahNilai').modal('show');
        $('#judul_modal').html('Edit Nilai');
        $('#form_nilai').attr('action', 'nilai.update');
        $.ajax({
                type: "GET",
                url: "/nilai.edit/"+ id,
                success: function (data) {
                $.each(data.data, function (index, item) {
                    console.log(item.lokasi);
                    $('#id_nilai').val(item.id);
                    $('#no_voucher').val(item.no_voucher);
                    $('#id_lokasi').val(item.id_lokasi).trigger('change');
                    $('#id_aktiva').val(item.id_aktiva).trigger('change');
                    $('#dep').val(item.dep).trigger('change');
                    $('#div').val(item.div).trigger('change');
                    $('#cat').val(item.cat).trigger('change');
                    $('#tahun').val(item.tahun).trigger('change');
                    $('#tgl_voucher').val(item.tgl_voucher);
                    $('#nominal').val(item.nilai);
                    $('#urai').val(item.urai);

                    
                });
            }
        });
    });
    //Tambah Nilai
    $(document).on('click', '#tambah_nilai', function() {

        $('#form_nilai')[0].reset(); // Reset input biasa (text, textarea, date)
        $('#form_nilai').attr('action', 'nilai.save'); // Ganti action ke nilai.save
        $('#judul_modal').html('Tambah Nilai'); // Ganti judul modal

        // Reset select2
        $('#id_lokasi, #id_aktiva, #dep, #div, #cat, #tahun').val('').trigger('change');

        $('#tambahNilai').modal('show');

    })
})
