//DATA TABLE UNTUK TABEL MASTER
$('#tbl').DataTable();
//FUNGSI SELECT2 SELECT-OPTION
$('.select2').select2({
    dropdownParent: $('#modal_bodyLG')
});

//BARANG
$(document).on('click', '#edit', function() {
    var id = $(this).data('id');
    $('#exampleModal').modal('show');
    $('#judul_modal').html('EDIT BARANG');
    $.ajax({
            type: "GET",
            url: "/barang.edit/"+ id,
            success: function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').val(item.nama_barang);
                $('#kode').val(item.kode_barang);
                $('#id').val(item.barId);
                $('#gol option[value="' + item.golongan + '"]').remove();
                $('#gol').prepend('<option value="' + item.golongan + '" selected="selected">' + item.nama + '</option>');
                $('#form_barang').attr('action', '/barang.update');
            });
        }
    });
})
//HAPUS BARANG
$(document).on('click', '#del_barang', function() {
    var id = $(this).data('id');
    var del = confirm('ANDA AKAN MENGHAPUS BARANG ?');
    if (del) {

        alert('HAPUS');
        $.ajax({
            url: "/barang.hapus/" + id,
            type: "POST",
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {
                alert('Data berhasil Dihapus')
                location.reload();
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Data gagal dihapus');
            },
        });
     }
    })
//DEPARTEMEN
$(document).on('click', '#edit_departemen', function() {
    var id = $(this).data('id');
    $('#modal_dep').modal('show');
    $('#judul_modal').html('EDIT DEPARTEMEN');
    $.ajax({
            type: "GET",
            url: "/dep.edit/"+ id,
            success: function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').val(item.nama_dep);
                $('#kode').val(item.kode_dep);
                $('#id').val(id);
                $('#form_departemen').attr('action', '/dep.update');
            });
        }
    });
})
//HAPUS DEPARTEMEN
$(document).on('click', '#del_dep', function() {
    var id = $(this).data('id');
    var del = confirm('ANDA AKAN MENGHAPUS DEPARTEMEN ?');
    if (del) {

        alert('HAPUS');
        $.ajax({
            url: "/dep.hapus/" + id,
            type: "POST",
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {
                alert('Data berhasil Dihapus')
                location.reload();
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Data gagal dihapus');
            },
        });
     }
    })
//DIVISI
$(document).on('click', '#edit_divisi', function() {
    var id = $(this).data('id');
    $('#modal_div').modal('show');
    $('#judul_modal').html('EDIT DIVISI');
    $.ajax({
            type: "GET",
            url: "/div.edit/"+ id,
            success: function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').val(item.nama_div);
                $('#kode').val(item.kode_div);
                $('#id').val(id);
                $('#dep_select option[value="' + item.golongan + '"]').remove();
                $('#dep_select').prepend('<option value="' + item.id_dep + '" selected="selected">' + item.kode_dep + '</option>');
                $('#form_div').attr('action', '/div.update');
            });
        }
    });
})
//HAPUS DIVISI
$(document).on('click', '#del_div', function() {
    var id = $(this).data('id');
    var del = confirm('ANDA AKAN MENGHAPUS DIVISI ?');
    if (del) {

        alert('HAPUS');
        $.ajax({
            url: "/div.hapus/" + id,
            type: "POST",
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {
                alert('Data berhasil Dihapus')
                location.reload();
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Data gagal dihapus');
            },
        });
     }
    })
//RUANG
$(document).on('click', '#edit_ruang', function() {
    var id = $(this).data('id');
    $('#modal_ruang').modal('show');
    $('#judul_modal').html('EDIT RUANG');
    $.ajax({
            type: "GET",
            url: "/ruang.edit/"+ id,
            success: function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').val(item.nama_ruang);
                $('#kode').val(item.kode);
                $('#id').val(id);
                $('#form_ruang').attr('action', '/ruang.update');
            });
        }
    });
})
//HAPUS DIVISI
$(document).on('click', '#del_ruang', function() {
    var id = $(this).data('id');
    var del = confirm('ANDA AKAN MENGHAPUS RUANG ?');
    if (del) {

        alert('HAPUS');
        $.ajax({
            url: "/ruang.hapus/" + id,
            type: "POST",
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {
                alert('Data berhasil Dihapus')
                location.reload();
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Data gagal dihapus');
            },
        });
     }
    })
//SDM
$(document).on('click', '#edit_sdm', function() {
    var id = $(this).data('id');
    $('#modal_sdm').modal('show');
    $('#judul_modal').html('EDIT SDM');
    $.ajax({
            type: "GET",
            url: "/sdm.edit/"+ id,
            success: function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').val(item.nama_sdm);
                $('#nip').val(item.nip);
                $('#jabat option[value="' + item.jabat + '"]').remove();
                $('#jabat').prepend('<option value="' + item.idJabat + '" selected="selected">' + item.jabat + '</option>');
                $('#select_div option[value="' + item.jabat + '"]').remove();
                $('#select_div').prepend('<option value="' + item.idDiv + '" selected="selected">' + item.nama_div + '</option>');
                $('#id').val(id);
                $('#form_sdm').attr('action', '/sdm.update');
            });
        }
    });
})
//HAPUS SDM
$(document).on('click', '#del_sdm', function() {
    var id = $(this).data('id');
    var del = confirm('ANDA AKAN MENGHAPUS SDM ?');
    if (del) {

        alert('HAPUS');
        $.ajax({
            url: "/sdm.hapus/" + id,
            type: "POST",
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {
                alert('Data berhasil Dihapus')
                location.reload();
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Data gagal dihapus');
            },
        });
     }
    })
//LOKASI
$(document).on('click', '#edit_lokasi', function() {
    var id = $(this).data('id');
    $('#modal_lokasi').modal('show');
    $('#judul_modal').html('EDIT LOKASI');
    $.ajax({
            type: "GET",
            url: "/lok.edit/"+ id,
            success: function (data) {
            $.each(data.data, function (index, item) {
                $('#img').remove();
                $('#nama_lokasi').val(item.lokasi);
                $('#alamat').val(item.alamat);
                $('#wil option[value="' + item.idWil + '"]').remove();
                $('#wil').prepend('<option value="' + item.idWil + '" selected="selected">' + item.wilayah + '</option>');
                $('#lat').val(item.lat);
                $('#long').val(item.long);
                $('#id').val(id);
                $('#form_lokasi').attr('action', '/lok.update');
            });
        }
    });
})
//HAPUS LOKASI
$(document).on('click', '#del_lok', function() {
    var id = $(this).data('id');
    var del = confirm('ANDA AKAN MENGHAPUS LOKASI ?');
    if (del) {

        alert('HAPUS');
        $.ajax({
            url: "/lok.hapus/" + id,
            type: "POST",
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {
                alert('Data berhasil Dihapus')
                refDep();
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Data gagal dihapus');
            },
        });
     }
    })
//HAPUS BAHAN
$(document).on('click', '#del_bahan', function() {
    var id = $(this).data('id');
    var del = confirm('ANDA AKAN MENGHAPUS BAHAN ?');
    if (del) {

        alert('HAPUS');
        $.ajax({
            url: "/bahan.hapus/" + id,
            type: "POST",
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {
                alert('Data berhasil Dihapus')
                location.reload();
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Data gagal dihapus');
            },
        });
     }
    })
//BAHAN
$(document).on('click', '#edit_bahan', function() {
    var id = $(this).data('id');
    $('#modal_bahan').modal('show');
    $('#judul_modal').html('EDIT BAHAN');
    $.ajax({
            type: "GET",
            url: "/bahan.edit/"+ id,
            success: function (data) {
            $.each(data.data, function (index, item) {
                $('#nama').val(item.nama);
                $('#id').val(id);
                $('#form_bahan').attr('action', '/bahan.update');
            });
        }
    });
})




// $(document).ready(function() {
//     const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
//     const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
//     // $('#myTabContent').append(' <h3 class="text-center">DASHBOARD SISTEM INFORMASI ASET</h3>')
//     $('#barang').addClass('text-start btn btn-primary hoverable');
//     $('#divisi').addClass('text-start btn btn-default hoverable');
//     $('#departemen').addClass('text-start btn btn-default hoverable');
//     $('#ruang').addClass('text-start btn btn-default hoverable');
//     $('#sdm').addClass('text-start btn btn-default hoverable');
//     $('#lokasi').addClass('text-start btn btn-default hoverable');
//     $('#dokumen').addClass('text-start btn btn-default hoverable');
//     $('#bahan').addClass('text-start btn btn-default hoverable');
//     $('#aktiva').addClass('text-start btn btn-default hoverable');
//     $('#a').addClass('text-start btn btn-default hoverable');
//     $('#b').addClass('text-start btn btn-default hoverable');
//     $('#c').addClass('text-start btn btn-default hoverable');
//     $('#d').addClass('text-start btn btn-default hoverable');
//     $('#e').addClass('text-start btn btn-default hoverable');
//     $('#f').addClass('text-start btn btn-default hoverable');
//     $('#kir').addClass('text-start btn btn-default hoverable');
//     $('#nilai').addClass('text-start btn btn-default hoverable');

//     $("#myTabs").append(
//         '<li class="nav-item" >' +
//             '<a class="nav-link border" id="tab_dashboard" data-bs-toggle="tab" href="#dashboard_tab" role="tab" aria-controls="tab2" aria-selected="false">DASHBOARD &nbsp;<button style="border:none;background-color: white;color: grey;" type="submit"  id="dashboard_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//         '</li>'
//         );

//         $('#myTabContent').append('<div class="conatianer" id="db_body">'+
//                                     '<h1 class="text-center">USER DASHBOARD</h1><br>'+
//                                     '<h3 class="text-center">Selamat Datang di Sistem Informasi Aset Perumdam Tirta Kencana Kota Samarinda</h3><br>'+
//                                   '</div>')
//         $(document).on('click', '#dashboard_x', function() {
//             $('#tab_dashboard').parent().remove(); // Hapus tab
//             $('#db_body').remove(); // Hapus konten tab
//         });

//     //BARANG

//     //Klik menu BARANG Sidebar
//     $('#barang').on('click', function() {
//         $('#db_body').remove();
//         //membuat tombol menu SideBar menjadi selected
//         $('#barang').addClass('btn btn-primary');
//         //Dan Tombol lain menjadi notSelected
//         $('#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         //Menampilkan Header Tab BARANG
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link border" id="tab_barang" data-bs-toggle="tab" href="#barang_tab" role="tab" aria-controls="tab2" aria-selected="false">BARANG &nbsp;<button style="border:none;background-color: white;color: grey;" type="submit"  id="barang_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//            //Menampilkan Konten berupa HEAD tabel pada body TAB
//             $(document).ready(function() {

//                 $('#myTabContent').append(
//                     '<div class="tab-pane fade" id="barang_tab" role="tabpanel" aria-labelledby="tab_div">' +
//                     '<br>' +
//                     '<div class="tab-pane show" id="barang_tab" role="tabpanel" aria-labelledby="tab_barang">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA BARANG <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_barang"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_barang">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Golongan</th>'+
//                                                 '<th>Nama Barang</th>'+
//                                                 '<th>Kode Barang</th>'+
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
//                 refbrg();

//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });

//                     //Klik pada tombol tambah barang, makam menampilkan modal TAMBAH DATA BARANG
//                     $('#tambah_barang').on('click', function() {
//                         $('#myModal').modal('show');
//                         $('#judul_modal').html('TAMBAH BARANG');
//                         $('#modal_body').html('');
//                         $('#modal_body').prepend(
//                     '<form action="" id="form_barang">'+
//                             '<select name="gol"  id="" class="form-control">'+
//                                 '<option value="">-PILIH GOLONGAN-</option>' +
//                                 '<option value="1">TANAH</option>'+
//                                 '<option value="2">PERALATAN DAN MESIN</option>'+
//                                 '<option value="3">GEDUNG DAN BANGUNAN</option>'+
//                                 '<option value="4">JALAN,IRIGASI DAN JARINGAN</option>'+
//                                 '<option value="5">KONSTRUKSI DALAM PENGERJAAN</option>'+
//                                 '<option value="6">KIR</option>'+
//                             '</select><br>'+
//                         '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang"><br>' +
//                         '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Barang">' +

//                     '</form>');
//                     //Memberikan atribut id pada tombol submit modal
//                     $('.tombol').attr('id', 'submit_barang');
//                     //Klik Untuk menyimpan data barang ke database
//                  $(document).on('click', '#submit_barang', function (event) {
//                     event.preventDefault();
//                     $.ajax({
//                         data: $('#form_barang').serialize(),
//                         url: "/barang.save",
//                         type: "POST",
//                         dataType: 'json',
//                         beforeSend: function () {

//                         },
//                         success: function (data) {
//                             $('#modal_body').html('');
//                             $('#myModal').modal('hide');
//                             refbrg();
//                         },
//                         error: function (xhr, textStatus, errorThrown) {
//                             alert('Failed to submit the form');
//                         },

//                     });
//                 });
//             });
//            //Modal EDIT show
//             $('#tbl_barang').on('click', '.edit-btn', function() {
//                 var id = $(this).data('id');
//                 $.ajax({
//                     type: "GET",
//                     url: "/barang.edit/"+ id,
//                     success: function (data) {
//                         $.each(data.data, function (index, item) {
//                         $('#myModal').modal('show');
//                         $('#judul_modal').html('UPDATE BARANG');
//                         $('#modal_body').html('');
//                         $('.tombol').attr('id', 'edit_submit');
//                         $('#modal_body').prepend(
//                             '<form action="" id="edit_barang">' +
//                                 '<input type="hidden" name="id" value = " ' + item.id + ' ">' +
//                                 '<select name="gol"  id="" class="form-control">' +
//                                     '<option value=" ' + item.golongan + ' ">' + item.golongan + '  </option>' +
//                                     '<option value="1">TANAH</option>' +
//                                     '<option value="2">PERALATAN DAN MESIN</option>' +
//                                     '<option value="3">GEDUNG DAN BANGUNAN</option>' +
//                                     '<option value="4">JALAN,IRIGASI DAN JARINGAN</option>' +
//                                     '<option value="5">KONSTRUKSI DALAM PENGERJAAN</option>' +
//                                     '<option value="6">KIR</option>' +
//                                 '</select><br>' +
//                                 '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama_barang + ' " placeholder="Nama Barang"><br>' +
//                                 '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Barang" value = "' + item.kode_barang + '">' +
//                             '</form>');
//                         })
//                     },
//                     error: function (data) {
//                         console.log('Error:', data);
//                     }
//                 });
//              });
//              //Klik Untuk update data barang ke database
//              $(document).on('click', '#edit_submit', function (event) {
//                 event.preventDefault();
//                 $.ajax({
//                     data: $('#edit_barang').serialize(),
//                     url: "/barang.update",
//                     type: "POST",
//                     dataType: 'json',
//                     beforeSend: function () {

//                     },
//                     success: function (data) {
//                         alert('Data berhasil diUpdate')
//                         $('#modal_body').html('');
//                         $('#myModal').modal('hide');
//                         refbrg();
//                     },
//                     error: function (xhr, textStatus, errorThrown) {
//                         alert('Failed to submit the form');
//                     },

//                 });
//             });
//             //Hapus Data
//             $('#tbl_barang').on('click', '.delete-btn', function() {
//                 var id = $(this).data('id');
//                 var del = confirm("Anda yakin menghapus data ini ?");
//                 if (del) {
//                     $.ajax({
//                         url: "/barang.hapus/" + id,
//                         type: "POST",
//                         dataType: 'json',
//                         beforeSend: function () {

//                         },
//                         success: function (data) {
//                             alert('Data berhasil Dihapus')
//                             refbrg();
//                         },
//                         error: function (xhr, textStatus, errorThrown) {
//                             alert('Data gagal dihapus');
//                         },
//                     });
//                 }
//             })
//         });
//     });


//         //Tutup Tab Content
//         $(document).on('click', '#barang_x', function() {
//             $('#tab_barang').parent().remove(); // Hapus tab
//             $('#barang_tab').remove(); // Hapus konten tab
//         });

//         // END OF BARANG

//         // DEPARTEMEN
//     $('#departemen').on('click', function() {
//         $('#db_body').remove();
//         $('#departemen').addClass('btn btn-primary');
//         $('#barang,#ruang,#sdm,#lokasi,#dokumen,#bahan,#divisi,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#barang,#ruang,#sdm,#lokasi,#dokumen,#bahan,#divisi,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_dep" data-bs-toggle="tab" href="#dep_tab" role="tab" aria-controls="tab2" aria-selected="false">DEPARTEMEN &nbsp;<button style="border:none;background-color: white; type="submit"  id="dep_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             //Menampilkan Konten berupa HEAD tabel pada body TAB
//             $(document).ready(function() {

//                 $('#myTabContent').append(

//                     '<br>' +
//                     '<div class="tab-pane show" id="dep_tab" role="tabpanel" aria-labelledby="tab_dep">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA DEPARTEMEN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_dep"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body" >'+
//                                     '<table class="table table-striped" id="tbl_dep">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Kode Departeman</th>'+
//                                                 '<th>Nama Departemen</th>'+
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
//                 refDep();

//                     $.ajaxSetup({
//                         headers: {
//                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                             }
//                         });

//                         //Klik pada tombol tambah barang, makam menampilkan modal TAMBAH DATA BARANG
//                         $('#tambah_dep').on('click', function() {
//                             $('#myModal').modal('show');
//                             $('#judul_modal').html('TAMBAH DEPARTEMEN');
//                             $('#modal_body').html('');
//                             $('#modal_body').prepend(
//                         '<form action="" id="form_dep">'+

//                             '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Departemen"><br>' +
//                             '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Departemen">' +

//                         '</form>');
//                         //Memberikan atribut id pada tombol submit modal
//                         $('.tombol').attr('id', 'submit_dep');
//                            //Klik Untuk menyimpan data departemen ke database
//                         $(document).on('click', '#submit_dep', function (event) {
//                             event.preventDefault();
//                             $.ajax({
//                                 data: $('#form_dep').serialize(),
//                                 url: "/dep.save",
//                                 type: "POST",
//                                 dataType: 'json',
//                                 beforeSend: function () {

//                                 },
//                                 success: function (data) {
//                                     $('#modal_body').html('');
//                                     $('#myModal').modal('hide');
//                                     refDep();
//                                 },
//                                 error: function (xhr, textStatus, errorThrown) {
//                                     alert('Failed to submit the form');
//                                 },

//                             });
//                         });

//                      });

//            //Modal EDIT show
//             $('#tbl_dep').on('click', '.edit-btn', function() {
//                 var id = $(this).data('id');
//                 $.ajax({
//                     type: "GET",
//                     url: "/dep.edit/"+ id,
//                     success: function (data) {
//                         $.each(data.data, function (index, item) {
//                         $('#myModal').modal('show');
//                         $('#judul_modal').html('UPDATE DEPARTEMEN');
//                         $('#modal_body').html('');
//                         $('.tombol').attr('id', 'edit_submit');
//                         $('#modal_body').prepend(
//                             '<form action="" id="edit_dep">' +
//                                 '<input type="hidden" name="id" value = " ' + item.id + ' ">' +
//                                 '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama_dep + ' " placeholder="Nama Departemen"><br>' +
//                                 '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Departemen" value = "' + item.kode_dep + '">' +
//                             '</form>');
//                         })
//                     },
//                     error: function (data) {
//                         console.log('Error:', data);
//                     }
//                 });
//              });
//              //Klik Untuk update data departemen ke database
//              $(document).on('click', '#edit_submit', function (event) {
//                 event.preventDefault();
//                 $.ajax({
//                     data: $('#edit_dep').serialize(),
//                     url: "/dep.update",
//                     type: "POST",
//                     dataType: 'json',
//                     success: function (data) {
//                         alert('Data berhasil diUpdate')
//                         $('#modal_body').html('');
//                         $('#myModal').modal('hide');
//                         refDep();
//                     },
//                     error: function (xhr, textStatus, errorThrown) {
//                         alert('Failed to submit the form');
//                     },

//                 });
//             });
//             //Hapus Data
            // $('#tbl_dep').on('click', '.delete-btn', function() {
            //     var id = $(this).data('id');
            //     var del = confirm("Anda yakin menghapus data ini ?");
            //     if (del) {
            //         $.ajax({
            //             url: "/dep.hapus/" + id,
            //             type: "POST",
            //             dataType: 'json',
            //             beforeSend: function () {

            //             },
            //             success: function (data) {
            //                 alert('Data berhasil Dihapus')
            //                 refDep();
            //             },
            //             error: function (xhr, textStatus, errorThrown) {
            //                 alert('Data gagal dihapus');
            //             },
            //         });
            //      }
            //     })
        //     });

        // });

//             //del
//             $(document).on('click', '#dep_x', function() {
//                 $('#tab_dep').parent().remove();
//                 $('#dep_tab').remove();
//             });
//         // END OF DEPARTEMEN

//     // DIVISI
//     $('#divisi').on('click', function() {
//         $('#db_body').remove();
//         $('#divisi').addClass('btn btn-primary');
//         $('#barang,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#barang,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_div" data-bs-toggle="tab" href="#div_tab" role="tab" aria-controls="tab2" aria-selected="false">DIVISI &nbsp;<button style="border:none;background-color: white; type="submit"  id="div_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(

//                     '<div class="tab-pane show" id="div_tab" role="tabpanel" aria-labelledby="tab_div">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA DIVISI <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_div"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_div">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Kode Divisi</th>'+
//                                                 '<th>Nama Divisi</th>'+
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
//                 refDiv();
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });

//                     //Klik pada tombol tambah divisi, maka menampilkan modal TAMBAH DATA BARANG
//                     $('#tambah_div').on('click', function() {
//                         $('#myModal').modal('show');
//                         $('#judul_modal').html('TAMBAH DIVISI');
//                         $('#modal_body').html('');
//                         $('#modal_body').prepend(
//                             '<form action="" id="form_div">'+
//                                 '<select name="dep"  id="selectDivisi" class="select2 form-control">' +
//                                 '</select><br>' +
//                                 '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Divisi"><br>' +
//                                 '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Divisi">' +
//                             '</form>');
//                             //$('.select2').select2();
//                             //Load option dari data depatemen
//                             $.get('/departemen', function (data) {
//                                 $.each(data.data, function (index, item) {
//                                     $('#selectDivisi').append('<option value="' + item.id + '">' + item.kode_dep + '</option>');
//                                 });
//                             });

//                         });


//                     //Memberikan atribut id pada tombol submit modal
//                     $('.tombol').attr('id', 'submit_div');
//                        //Klik Untuk menyimpan data divisi ke database
//                     $(document).on('click', '#submit_div', function (event) {
//                         event.preventDefault();
//                         $.ajax({
//                             data: $('#form_div').serialize(),
//                             url: "/div.save",
//                             type: "POST",
//                             dataType: 'json',
//                             success: function (data) {
//                                 $('#modal_body').html('');
//                                 $('#myModal').modal('hide');
//                                 refDiv();
//                             },
//                             error: function (xhr, textStatus, errorThrown) {
//                                 alert('Failed to submit the form');
//                             },

//                         });
//                     });
//                    //Modal EDIT show
//                     $('#tbl_div').on('click', '.edit-div', function() {
//                         var id = $(this).data('id');
//                         $.ajax({
//                             type: "GET",
//                             url: "/div.edit/"+ id,
//                             success: function (data) {
//                                 $.each(data.data, function (index, item) {
//                                 $('#myModal').modal('show');
//                                 $('#judul_modal').html('UPDATE DIVISI');
//                                 $('#modal_body').html('');
//                                 $('.tombol').attr('id', 'edit_submit');
//                                 $('#modal_body').prepend(
//                                     '<form action="" id="edit_div_submit">' +
//                                         '<input type="hidden" name="id" value = " ' + item.id + ' ">' +
//                                         '<select name="dep"  id="selectDivisi" class="select2 form-control">' +
//                                         '<option value=" '+ item.id_dep +'">"'+ item.id_dep +'" </option> ' +
//                                         '</select><br>' +
//                                         '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama_div + ' " placeholder="Nama Departemen"><br>' +
//                                         '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Departemen" value = "' + item.kode_div + '">' +
//                                     '</form>');

//                                     $.get('/departemen', function (data) {
//                                         $.each(data.data, function (index, item) {
//                                             $('#selectDivisi').append('<option value="' + item.id + '">' + item.kode_dep + '</option>');
//                                         });
//                                     });
//                                 })
//                             },
//                             error: function (data) {
//                                 console.log('Error:', data);
//                             }
//                         });
//                     });
//                     //Klik Untuk update data divisi ke database
//                     $(document).on('click', '#edit_submit', function (event) {
//                         event.preventDefault();
//                         $.ajax({
//                             data: $('#edit_div_submit').serialize(),
//                             url: "/div.update",
//                             type: "POST",
//                             dataType: 'json',
//                             success: function (data) {
//                                 alert('Data berhasil diUpdate')
//                                 $('#modal_body').html('');
//                                 $('#myModal').modal('hide');
//                                 refDiv();
//                             },
//                             error: function (xhr, textStatus, errorThrown) {
//                                 alert('Failed to submit the form');
//                             },

//                         });
//                     });
//                     //Hapus Data
//                     $('#tbl_div').on('click', '.delete-div', function() {
//                         var id = $(this).data('id');
//                         var del = confirm("Anda yakin menghapus data ini ?");
//                         if (del) {
//                             $.ajax({
//                                 url: "/div.hapus/" + id,
//                                 type: "POST",
//                                 dataType: 'json',
//                                     success: function (data) {
//                                     alert('Data berhasil Dihapus')
//                                     refDiv();
//                                 },
//                                 error: function (xhr, textStatus, errorThrown) {
//                                     alert('Data gagal dihapus');
//                                 },
//                             });
//                         }
//                     })


//             });
//      });
//         $(document).on('click', '#div_x', function() {
//             $('#tab_div').parent().remove(); // Hapus tab
//             $('#div_tab').remove(); // Hapus konten tab-+
//         });
//     // END OF DIVISI



//     //RUANGAN
//     $('#ruang').on('click', function() {
//         $('#db_body').remove();
//         $('#ruang').addClass('btn btn-primary');
//         $('#divisi,#departemen,#sdm,#lokasi,#dokumen,#bahan,#barang,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#divisi,#departemen,#sdm,#lokasi,#dokumen,#bahan,#barang,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_ruang" data-bs-toggle="tab" href="#ruang_tab" role="tab" aria-controls="tab2" aria-selected="false">RUANGAN &nbsp;<button style="border:none;background-color: white; type="submit"  id="ruang_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="ruang_tab" role="tabpanel" aria-labelledby="tab_ruang">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA RUANGAN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_ruang"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_ruang">'+
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
//                 refRuang();
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });
//                 //Klik pada tombol tambah ruang, maka menampilkan modal TAMBAH DATA RUANGAN
//                 $('#tambah_ruang').on('click', function() {
//                     $('#myModal').modal('show');
//                     $('#judul_modal').html('TAMBAH RUANGAN');
//                     $('#modal_body').html('');
//                     $('#modal_body').prepend(
//                         '<form action="" id="form_ruang">'+

//                             '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Ruangan"><br>' +
//                             '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Ruangan">' +
//                         '</form>');
//                     });

//                 //Memberikan atribut id pada tombol submit modal
//                 $('.tombol').attr('id', 'submit_ruang');

//                 //Klik Untuk menyimpan data divisi ke database
//                 $(document).on('click', '#submit_ruang', function (event) {
//                  event.preventDefault();
//                  $.ajax({
//                      data: $('#form_ruang').serialize(),
//                      url: "/ruang.save",
//                      type: "POST",
//                      dataType: 'json',
//                      success: function (data) {
//                          $('#modal_body').html('');
//                          $('#myModal').modal('hide');
//                          refRuang();
//                      },
//                      error: function (xhr, textStatus, errorThrown) {
//                          alert('Failed to submit the form');
//                      },

//                  });
//              });
//             //Modal EDIT show
//              $('#tbl_ruang').on('click', '.edit', function() {
//                 var id = $(this).data('id');
//                 $.ajax({
//                     type: "GET",
//                     url: "/ruang.edit/"+ id,
//                     success: function (data) {
//                         $.each(data.data, function (index, item) {
//                         $('#myModal').modal('show');
//                         $('#judul_modal').html('UPDATE RUANGAN');
//                         $('#modal_body').html('');
//                         $('.tombol').attr('id', 'edit_submit');
//                         $('#modal_body').prepend(
//                             '<form action="" id="edit_ruang_submit">' +
//                                 '<input type="hidden" name="id" value = " ' + item.id + ' ">' +

//                                 '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama_ruang + ' " placeholder="Nama Departemen"><br>' +
//                                 '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Departemen" value = "' + item.kode + '">' +
//                             '</form>');

//                         })
//                     },
//                     error: function (data) {
//                         console.log('Error:', data);
//                     }
//                 });
//             });
//             //Klik Untuk update data ruangan ke database
//             $(document).on('click', '#edit_submit', function (event) {
//                 event.preventDefault();
//                 $.ajax({
//                     data: $('#edit_ruang_submit').serialize(),
//                     url: "/ruang.update",
//                     type: "POST",
//                     dataType: 'json',
//                     success: function (data) {
//                         alert('Data berhasil diUpdate')
//                         $('#modal_body').html('');
//                         $('#myModal').modal('hide');
//                         refRuang();
//                     },
//                     error: function (xhr, textStatus, errorThrown) {
//                         alert('Failed to submit the form');
//                     },

//                 });
//             });
//             //Hapus Data
//             $('#tbl_ruang').on('click', '.delete', function() {
//                 var id = $(this).data('id');
//                 var del = confirm("Anda yakin menghapus data ini ?");
//                 if (del) {
//                     $.ajax({
//                         url: "/ruang.hapus/" + id,
//                         type: "POST",
//                         dataType: 'json',
//                             success: function (data) {
//                             alert('Data berhasil Dihapus')
//                             refRuang();
//                         },
//                         error: function (xhr, textStatus, errorThrown) {
//                             alert('Data gagal dihapus');
//                         },
//                     });
//                 }
//             })
//         });
//      });
//         $(document).on('click', '#ruang_x', function() {
//             $('#tab_ruang').parent().remove(); // Hapus tab
//             $('#ruang_tab').remove(); // Hapus konten tab
//         });
//        //END OF RUANGAN

//     //SDM
//     $('#sdm').on('click', function() {
//         $('#db_body').remove();
//         $('#sdm').addClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#bahan,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_sdm" data-bs-toggle="tab" href="#sdm_tab" role="tab" aria-controls="tab2" aria-selected="false">SDM &nbsp;<button style="border:none;background-color: white; type="submit"  id="sdm_x" class="fa-regular fa-circle-xmark"></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="sdm_tab" role="tabpanel" aria-labelledby="tab_sdm">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA SDM PENDUKUNG <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_sdm"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_sdm">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Nama</th>'+
//                                                 '<th>Nip</th>'+
//                                                 '<th>Jabatan</th>'+
//                                                 '<th>Divisi/Departemen</th>'+
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
//                 refSdm();

//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });
//                 //Klik pada tombol tambah ruang, maka menampilkan modal TAMBAH DATA SDM
//                 $('#tambah_sdm').on('click', function() {
//                     $('#myModal').modal('show');
//                     $('#judul_modal').html('TAMBAH SDM');
//                     $('#modal_body').html('');
//                     $('#modal_body').prepend(
//                         '<form action="" id="form_sdm">'+
//                             '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama SDM"><br>' +
//                             '<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP"><br>' +
//                             '<select name="jabat" class="form-control" id="jabat">' +
//                                 '<option value="0">MANAJER</option>'+
//                                 '<option value="1">ASISTEN MANAJER</option>'+
//                             '<select>'+
//                             '<br>' +
//                             '<select name="div" class="form-control" id="div">' +
//                             '<select>'+
//                         '</form>');
//                         $.get('/divisi', function (data) {
//                             $.each(data.data, function (index, item) {
//                                 $('#div').append('<option value="' + item.id + '">' + item.nama_div + '</option>');
//                             });
//                         });

//                     });

//                  //Memberikan atribut id pada tombol submit modal
//                  $('.tombol').attr('id', 'submit_sdm');

//                  //Klik Untuk menyimpan data sdm ke database
//                  $(document).on('click', '#submit_sdm', function (event) {
//                   event.preventDefault();
//                   $.ajax({
//                       data: $('#form_sdm').serialize(),
//                       url: "/sdm.save",
//                       type: "POST",
//                       dataType: 'json',
//                       success: function (data) {
//                           $('#modal_body').html('');
//                           $('#myModal').modal('hide');
//                           alert('Data berhasil Disimpan')
//                           refSdm();
//                       },
//                       error: function (xhr, textStatus, errorThrown) {
//                           alert('Failed to submit the form');
//                       },
//                     });
//                 });
//                //Modal EDIT show
//              $('#tbl_sdm').on('click', '.edit', function() {
//                 var id = $(this).data('id');
//                 $.ajax({
//                     type: "GET",
//                     url: "sdm.edit/"+ id,
//                     success: function (data) {
//                         $.each(data.data, function (index, item) {
//                         $('#myModal').modal('show');
//                         $('#judul_modal').html('UPDATE SDM');
//                         $('#modal_body').html('');
//                         $('.tombol').attr('id', 'edit_submit');
//                         $('#modal_body').prepend(
//                             '<form action="" id="edit_sdm_submit">' +
//                                 '<input type="hidden" name="id" value = " ' + item.id + ' ">' +

//                                 '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama_sdm + ' " placeholder="Nama Departemen"><br>' +
//                                 '<input type="text" class="form-control" id="nip" name="nip" placeholder="Kode Departemen" value = "' + item.nip + '">' +
//                                 '<br>' +
//                                 '<select name="jabat" class="form-control" id="jabat">' +
//                                 '<option value=" '+ item.id_jabat + '">'+ item.id_jabat + '</option>'+
//                                 '<option value="0">MANAJER</option>'+
//                                 '<option value="1">ASISTEN MANAJER</option>'+
//                             '<select>'+
//                             '<br>' +
//                             '<select name="div" class="form-control" id="div">' +
//                             '<option value=" '+ item.id_div + '">'+ item.id_div + '</option>'+
//                             '<select>'+
//                             '</form>');
//                             $.get('/divisi', function (data) {
//                                 $.each(data.data, function (index, item) {
//                                     $('#div').append('<option value="' + item.id + '">' + item.nama_div + '</option>');
//                                 });
//                             });

//                         })
//                     },
//                     error: function (data) {
//                         console.log('Error:', data);
//                     }
//                 });
//             });
//             //Klik Untuk update data SDM ke database
//             $(document).on('click', '#edit_submit', function (event) {
//                 event.preventDefault();
//                 $.ajax({
//                     data: $('#edit_sdm_submit').serialize(),
//                     url: "/sdm.update",
//                     type: "POST",
//                     dataType: 'json',
//                     success: function (data) {
//                         alert('Data berhasil diUpdate')
//                         $('#modal_body').html('');
//                         $('#myModal').modal('hide');
//                         refSdm();
//                     },
//                     error: function (xhr, textStatus, errorThrown) {
//                         alert('Failed to submit the form');
//                     },

//                 });
//             });
//             //Hapus Data
//             $('#tbl_sdm').on('click', '.delete', function() {
//                 var id = $(this).data('id');
//                 var del = confirm("Anda yakin menghapus data ini ?");
//                 if (del) {
//                     $.ajax({
//                         url: "/sdm.hapus/" + id,
//                         type: "POST",
//                         dataType: 'json',
//                             success: function (data) {
//                             alert('Data berhasil Dihapus')
//                             refSdm();
//                         },
//                         error: function (xhr, textStatus, errorThrown) {
//                             alert('Data gagal dihapus');
//                         },
//                     });
//                 }
//             })
//         });
//      });
//         $(document).on('click', '#sdm_x', function() {
//             $('#tab_sdm').parent().remove(); // Hapus tab
//             $('#sdm_tab').remove(); // Hapus konten tab
//         });
//     //END OF SDM

//     //LOKASI
//     $('#lokasi').on('click', function() {
//         $('#db_body').remove();
//         $('#lokasi').addClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#dokumen,#bahan,#sdm,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#dokumen,#bahan,#sdm,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_lok" data-bs-toggle="tab" href="#lok_tab" role="tab" aria-controls="tab2" aria-selected="false">LOKASI &nbsp;<button style="border:none;background-color: white; type="submit"  id="lokasi_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="lok_tab" role="tabpanel" aria-labelledby="tab_lok">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA LOKASI <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_lok"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_lok">'+
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
//                 refLok();
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });
//                 //Klik pada tombol tambah ruang, maka menampilkan modal TAMBAH DATA SDM
//                 $('#tambah_lok').on('click', function() {
//                     $('#myModal').modal('show');
//                     $('#judul_modal').html('TAMBAH LOKASI');
//                     $('#modal_body').html('');
//                     $('#modal_body').prepend(
//                         '<form action="" id="form_lok">'+
//                             '<input type="text" class="form-control" id="nama_lokasi" name="lokasi" placeholder="Nama Lokasi"><br>' +
//                             '<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><br>' +
//                             '<input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude"><br>' +
//                             '<input type="text" class="form-control" id="long" name="long" placeholder="Longitude"><br>' +
//                             '<input type="file" class="form-control" id="img" name="img" "><br>' +
//                         '</form>');
//                     });
//                  //Memberikan atribut id pada tombol submit modal
//                  $('.tombol').attr('id', 'submit_lok');

//                  $(document).on('click', '#submit_lok', function (event) {
//                     event.preventDefault();
//                     var fileInput = $('#img')[0].files[0];
//                     if (!fileInput) {
//                         alert('Please select an image.');
//                         return;
//                     }
//                     var reader = new FileReader();
//                      reader.onload = function (e) {
//                         var base64Image = e.target.result.split(',')[1]; // Extract base64 data

//                         // Send the base64 encoded image data in the AJAX request
//                         $.ajax({
//                             data: {
//                                 nama_lokasi: $('#nama_lokasi').val(),
//                                 alamat: $('#alamat').val(),
//                                 lat:$('#lat').val(),
//                                 long:$('#long').val(),
//                                 img: base64Image
//                             },
//                             url: "/lok.save",
//                             type: "POST",
//                             dataType: 'json',
//                             success: function (data) {
//                                 $('#modal_body').html('');
//                                 $('#myModal').modal('hide');
//                                 alert('Data berhasil Disimpan');
//                                 refLok();
//                             },
//                             error: function (xhr, textStatus, errorThrown) {
//                                 alert('Failed to submit the form');
//                             },
//                         });
//                     };

//                     // Read the selected file as a data URL
//                     reader.readAsDataURL(fileInput);
//                 });
//                 //Modal EDIT show
//              $('#tbl_lok').on('click', '.edit', function() {
//                 var id = $(this).data('id');
//                 $.ajax({
//                     type: "GET",
//                     url: "lok.edit/"+ id,
//                     success: function (data) {
//                         $.each(data.data, function (index, item) {
//                         $('#myModal').modal('show');
//                         $('#judul_modal').html('UPDATE LOKASI');
//                         $('#modal_body').html('');
//                         $('.tombol').attr('id', 'edit_submit');
//                         $('#modal_body').prepend(
//                             '<form action="" id="edit_lok_submit">' +
//                                 '<input type="hidden" class="form-control" id="id" name="id" value="'+item.id+'" placeholder="Nama Lokasi"><br>' +
//                                 '<input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" value="'+item.lokasi+'" placeholder="Nama Lokasi"><br>' +
//                                 '<input type="text" class="form-control" id="alamat" name="alamat" value="'+item.alamat+'" placeholder="Alamat"><br>' +
//                                 '<input type="text" class="form-control" id="lat" name="lat" value="'+item.lat+'" placeholder="Latitude"><br>' +
//                                 '<input type="text" class="form-control" id="long" name="long" value="'+item.long+'" placeholder="Longitude"><br>' +
//                                 '<div class="text-center"><img  src="http://app.perumdamtirtakencana.id/assets/img/lokasi/'+item.img+'" height="300px" width="300px"</img><br></div>' +
//                             '</form>');
//                         })
//                     },
//                     error: function (data) {
//                         console.log('Error:', data);
//                     }
//                 });
//             });
//             //Klik Untuk update data LOKASI ke database
//             $(document).on('click', '#edit_submit', function (event) {
//                 event.preventDefault();
//                 $.ajax({
//                     data: $('#edit_lok_submit').serialize(),
//                     url: "/lok.update",
//                     type: "POST",
//                     dataType: 'json',
//                     success: function (data) {
//                         alert('Data berhasil diupdate')
//                         $('#modal_body').html('');
//                         $('#myModal').modal('hide');
//                         refLok  ();
//                     },
//                     error: function (xhr, textStatus, errorThrown) {
//                         alert('Failed to submit the form');
//                     },

//                 });
//             });
//             //Hapus Data
//             $('#tbl_lok').on('click', '.delete', function() {
//                 var id = $(this).data('id');
//                 var del = confirm("Anda yakin menghapus data ini ?");
//                 if (del) {
//                     $.ajax({
//                         url: "/lok.hapus/" + id,
//                         type: "POST",
//                         dataType: 'json',
//                             success: function (data) {
//                             alert('Data berhasil Dihapus')
//                             refLok();
//                         },
//                         error: function (xhr, textStatus, errorThrown) {
//                             alert('Data gagal dihapus');
//                         },
//                     });
//                 }
//             })
//         });
//      });
//         $(document).on('click', '#lokasi_x', function() {
//             $('#tab_lok').parent().remove(); // Hapus tab
//             $('#lok_tab').remove(); // Hapus konten tab
//         });
//     //END OF LOKASI

//     //DOKUMEN
//     $('#dokumen').on('click', function() {
//         $('#db_body').remove();
//         $('#dokumen').addClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#lokasi,#bahan,#sdm,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#lokasi,#bahan,#sdm,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_dok" data-bs-toggle="tab" href="#dok_tab" role="tab" aria-controls="tab2" aria-selected="false">DOKUMEN &nbsp;<button style="border:none;background-color: white; type="submit"  id="dok_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<div class="tab-pane fade" id="dok_tab" role="tabpanel" aria-labelledby="tab_dok">' +
//                         '<div class="container"> <div class="card"><div class="card-header">DATA DOKUMEN</div> </div>' +
//                     '</div>'
//                 );
//             });
//      });
//     $(document).on('click', '#dok_x', function() {
//             $('#tab_dok').parent().remove(); // Hapus tab
//             $('#dok_tab').remove(); // Hapus konten tab
//         });
//     //END OF DOK


//     //BAHAN
//     $('#bahan').on('click', function() {
//         $('#db_body').remove();
//         $('#bahan').addClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#sdm,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#sdm,#aktiva,#nilai,#a,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_bahan" data-bs-toggle="tab" href="#bahan_tab" role="tab" aria-controls="tab2" aria-selected="false">BAHAN &nbsp;<button style="border:none;background-color: white; type="submit"  id="bahan_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="bahan_tab" role="tabpanel" aria-labelledby="tab_bahan">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA BAHAN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_bahan"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_bahan">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Nama Bahan</th>'+
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
//                 refBah();
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });
//                 //Klik pada tombol tambah bahan, maka menampilkan modal TAMBAH DATA BAHAN
//                 $('#tambah_bahan').on('click', function() {
//                     $('#myModal').modal('show');
//                     $('#judul_modal').html('TAMBAH BAHAN');
//                     $('#modal_body').html('');
//                     $('#modal_body').prepend(
//                         '<form action="" id="form_bahan">'+
//                             '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Bahan"><br>' +
//                         '</form>');
//                     });
//                     //Memberikan atribut id pada tombol submit modal
//                 $('.tombol').attr('id', 'submit_bahan');

//                 //Klik Untuk menyimpan data bahan ke database
//                 $(document).on('click', '#submit_bahan', function (event) {
//                  event.preventDefault();
//                  $.ajax({
//                      data: $('#form_bahan').serialize(),
//                      url: "/bahan.save",
//                      type: "POST",
//                      dataType: 'json',
//                      success: function (data) {
//                          $('#modal_body').html('');
//                          $('#myModal').modal('hide');
//                          refBah();
//                      },
//                      error: function (xhr, textStatus, errorThrown) {
//                          alert('Failed to submit the form');
//                      },

//                  });
//              });
//             //Modal EDIT show
//              $('#tbl_bahan').on('click', '.edit', function() {
//                 var id = $(this).data('id');
//                 $.ajax({
//                     type: "GET",
//                     url: "/bahan.edit/"+ id,
//                     success: function (data) {
//                         $.each(data.data, function (index, item) {
//                         $('#myModal').modal('show');
//                         $('#judul_modal').html('UPDATE BAHAN');
//                         $('#modal_body').html('');
//                         $('.tombol').attr('id', 'edit_submit');
//                         $('#modal_body').prepend(
//                             '<form action="" id="edit_bahan_submit">' +
//                                 '<input type="hidden" name="id" value = " ' + item.id + ' ">' +
//                                 '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama + ' " placeholder="Nama Departemen"><br>' +
//                             '</form>');

//                         })
//                     },
//                     error: function (data) {
//                         console.log('Error:', data);
//                     }
//                 });
//             });
//              //Klik Untuk update data bahan ke database
//              $(document).on('click', '#edit_submit', function (event) {
//                 event.preventDefault();
//                 $.ajax({
//                     data: $('#edit_bahan_submit').serialize(),
//                     url: "/bahan.update",
//                     type: "POST",
//                     dataType: 'json',
//                     success: function (data) {
//                         alert('Data berhasil diUpdate')
//                         $('#modal_body').html('');
//                         $('#myModal').modal('hide');
//                         refBah();
//                     },
//                     error: function (xhr, textStatus, errorThrown) {
//                         alert('Failed to submit the form');
//                     },

//                 });
//             });
//              //Hapus Data
//              $('#tbl_bahan').on('click', '.delete', function() {
//                 var id = $(this).data('id');
//                 var del = confirm("Anda yakin menghapus data ini ?");
//                 if (del) {
//                     $.ajax({
//                         url: "/bahan.hapus/" + id,
//                         type: "POST",
//                         dataType: 'json',
//                             success: function (data) {
//                             alert('Data berhasil Dihapus')
//                             refBah();
//                         },
//                         error: function (xhr, textStatus, errorThrown) {
//                             alert('Data gagal dihapus');
//                         },
//                     });
//                 }
//             })
//             });
//      });
//         $(document).on('click', '#bahan_x', function() {
//             $('#tab_bahan').parent().remove(); // Hapus tab
//             $('#bahan_tab').remove(); // Hapus konten tab
//         });
//     //END OF BAHAN

//     $('#aktiva').on('click', function() {
//         $('#db_body').remove();
//         $('#aktiva').addClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#bahan,#sdm,#nilai,#a,#b,#c,#d,#e,#f,#kir').removeClass('btn btn-primary');
//         $('#divisi,#departemen,#ruang,#barang,#lokasi,#dokumen,#bahan,#sdm,#nilai,#a,#b,#c,#d,#e,#f,#kir').addClass('btn btn-defult');
//         $("#myTabs").append(
//             '<li class="nav-item" >' +
//                 '<a class="nav-link" id="tab_aktiva" data-bs-toggle="tab" href="#aktiva_tab" role="tab" aria-controls="tab2" aria-selected="false">KODE AKTIVA &nbsp;<button style="border:none;background-color: white; type="submit"  id="aktiva_x" class="fa-regular fa-circle-xmark" ></button></a>' +
//             '</li>'
//             );
//             $(document).ready(function() {
//                 // Menambahkan konten tab setelah dokumen siap
//                 $('#myTabContent').append(
//                     '<br>'+
//                     '<div class="tab-pane show" id="aktiva_tab" role="tabpanel" aria-labelledby="tab_aktiva">'+'<div class="container">'+
//                         '<div class="card">'+
//                             '<div class="card-header">DATA AKTIVA <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_aktiva"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
//                                 '<div class="card-body">'+
//                                     '<table class="table table-striped" id="tbl_aktiva">'+
//                                         '<thead>'+
//                                             '<tr>'+
//                                                 '<th>NO</th>'+
//                                                 '<th>Kode</th>'+
//                                                 '<th>Nama Aktiva</th>'+
//                                                 '<th>Sub Aktiva</th>'+
//                                                 '<th>KIB</th>'+
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
//                 refAkt();
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });
//                 //Klik pada tombol tambah bahan, maka menampilkan modal TAMBAH DATA BAHAN
//                 $('#tambah_bahan').on('click', function() {
//                     $('#myModal').modal('show');
//                     $('#judul_modal').html('TAMBAH BAHAN');
//                     $('#modal_body').html('');
//                     $('#modal_body').prepend(
//                         '<form action="" id="form_bahan">'+
//                             '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Bahan"><br>' +
//                         '</form>');
//                     });
//                     //Memberikan atribut id pada tombol submit modal
//                 $('.tombol').attr('id', 'submit_bahan');

//                 //Klik Untuk menyimpan data bahan ke database
//             //     $(document).on('click', '#submit_bahan', function (event) {
//             //      event.preventDefault();
//             //      $.ajax({
//             //          data: $('#form_bahan').serialize(),
//             //          url: "/bahan.save",
//             //          type: "POST",
//             //          dataType: 'json',
//             //          success: function (data) {
//             //              $('#modal_body').html('');
//             //              $('#myModal').modal('hide');
//             //              refBah();
//             //          },
//             //          error: function (xhr, textStatus, errorThrown) {
//             //              alert('Failed to submit the form');
//             //          },

//             //      });
//             //  });
//             //Modal EDIT show
//             //  $('#tbl_bahan').on('click', '.edit', function() {
//             //     var id = $(this).data('id');
//             //     $.ajax({
//             //         type: "GET",
//             //         url: "/bahan.edit/"+ id,
//             //         success: function (data) {
//             //             $.each(data.data, function (index, item) {
//             //             $('#myModal').modal('show');
//             //             $('#judul_modal').html('UPDATE BAHAN');
//             //             $('#modal_body').html('');
//             //             $('.tombol').attr('id', 'edit_submit');
//             //             $('#modal_body').prepend(
//             //                 '<form action="" id="edit_bahan_submit">' +
//             //                     '<input type="hidden" name="id" value = " ' + item.id + ' ">' +
//             //                     '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama + ' " placeholder="Nama Departemen"><br>' +
//             //                 '</form>');

//             //             })
//             //         },
//             //         error: function (data) {
//             //             console.log('Error:', data);
//             //         }
//             //     });
//             // });
//              //Klik Untuk update data bahan ke database
//             //  $(document).on('click', '#edit_submit', function (event) {
//             //     event.preventDefault();
//             //     $.ajax({
//             //         data: $('#edit_bahan_submit').serialize(),
//             //         url: "/bahan.update",
//             //         type: "POST",
//             //         dataType: 'json',
//             //         success: function (data) {
//             //             alert('Data berhasil diUpdate')
//             //             $('#modal_body').html('');
//             //             $('#myModal').modal('hide');
//             //             refBah();
//             //         },
//             //         error: function (xhr, textStatus, errorThrown) {
//             //             alert('Failed to submit the form');
//             //         },

//             //     });
//             // });
//              //Hapus Data
//             //  $('#tbl_bahan').on('click', '.delete', function() {
//             //     var id = $(this).data('id');
//             //     var del = confirm("Anda yakin menghapus data ini ?");
//             //     if (del) {
//             //         $.ajax({
//             //             url: "/bahan.hapus/" + id,
//             //             type: "POST",
//             //             dataType: 'json',
//             //                 success: function (data) {
//             //                 alert('Data berhasil Dihapus')
//             //                 refBah();
//             //             },
//             //             error: function (xhr, textStatus, errorThrown) {
//             //                 alert('Data gagal dihapus');
//             //             },
//             //         });
//             //     }
//             // })
//             });
//      });
//         $(document).on('click', '#aktiva_x', function() {
//             $('#tab_aktiva').parent().remove(); // Hapus tab
//             $('#aktiva_tab').remove(); // Hapus konten tab
//         });



// });
