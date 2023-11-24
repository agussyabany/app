$(document).ready(function() {


    $('#barang').addClass('text-start btn btn-primary hoverable');
    $('#divisi').addClass('text-start btn btn-default hoverable');
    $('#departemen').addClass('text-start btn btn-default hoverable');
    $('#ruang').addClass('text-start btn btn-default hoverable');
    $('#sdm').addClass('text-start btn btn-default hoverable');
    $('#lokasi').addClass('text-start btn btn-default hoverable');
    $('#dokumen').addClass('text-start btn btn-default hoverable');
    $('#bahan').addClass('text-start btn btn-default hoverable');




    //BARANG

    //Klik menu BARANG Sidebar
    $('#barang').on('click', function() {
        //membuat tombol menu SideBar menjadi selected
        $('#barang').addClass('btn btn-primary');
        //Dan Tombol lain menjadi notSelected
        $('#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').removeClass('btn btn-primary');
        $('#divisi,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').addClass('btn btn-defult');

        //Menampilkan Header Tab BARANG
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link border" id="tab_barang" data-bs-toggle="tab" href="#barang_tab" role="tab" aria-controls="tab2" aria-selected="false">BARANG &nbsp;<button style="border:none;background-color: white;color: grey;" type="submit"  id="barang_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
           //Menampilkan Konten berupa HEAD tabel pada body TAB
            $(document).ready(function() {
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="barang_tab" role="tabpanel" aria-labelledby="tab_div">' +
                    '<br>' +
                    '<div class="tab-pane show" id="barang_tab" role="tabpanel" aria-labelledby="tab_barang">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA BARANG <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_barang"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body">'+
                                    '<table class="table table-striped" id="tbl_barang">'+
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
                refbrg();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    //Klik pada tombol tambah barang, makam menampilkan modal TAMBAH DATA BARANG
                    $('#tambah_barang').on('click', function() {
                        $('#myModal').modal('show');
                        $('#judul_modal').html('TAMBAH BARANG');
                        $('#modal_body').html('');
                        $('#modal_body').prepend(
                    '<form action="" id="form_barang">'+
                            '<select name="gol"  id="" class="form-control">'+
                                '<option value="">-PILIH GOLONGAN-</option>' +
                                '<option value="1">TANAH</option>'+
                                '<option value="2">PERALATAN DAN MESIN</option>'+
                                '<option value="3">GEDUNG DAN BANGUNAN</option>'+
                                '<option value="4">JALAN,IRIGASI DAN JARINGAN</option>'+
                                '<option value="5">KONSTRUKSI DALAM PENGERJAAN</option>'+
                                '<option value="6">KIR</option>'+
                            '</select><br>'+
                        '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang"><br>' +
                        '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Barang">' +

                    '</form>');
                    //Memberikan atribut id pada tombol submit modal
                    $('.tombol').attr('id', 'submit_barang');
                    //Klik Untuk menyimpan data barang ke database
                 $(document).on('click', '#submit_barang', function (event) {
                    event.preventDefault();
                    $.ajax({
                        data: $('#form_barang').serialize(),
                        url: "/barang.save",
                        type: "POST",
                        dataType: 'json',
                        beforeSend: function () {

                        },
                        success: function (data) {
                            $('#modal_body').html('');
                            $('#myModal').modal('hide');
                            refbrg();
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            alert('Failed to submit the form');
                        },

                    });
                });
            });
            //Jika klik <a class="btn btn-sm btn-warning edit-btn" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>maka menampilkan modal EDIT DATA
            $('#tbl_barang').on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/barang.edit/"+ id,
                    success: function (data) {
                        $.each(data.data, function (index, item) {
                        $('#myModal').modal('show');
                        $('#judul_modal').html('UPDATE BARANG');
                        $('#modal_body').html('');
                        $('.tombol').attr('id', 'edit_submit');
                        $('#modal_body').prepend(
                            '<form action="" id="edit_barang">' +
                                '<input type="hidden" name="id" value = " ' + item.id + ' ">' +
                                '<select name="gol"  id="" class="form-control">' +
                                    '<option value=" ' + item.golongan + ' ">' + item.golongan + '  </option>' +
                                    '<option value="1">TANAH</option>' +
                                    '<option value="2">PERALATAN DAN MESIN</option>' +
                                    '<option value="3">GEDUNG DAN BANGUNAN</option>' +
                                    '<option value="4">JALAN,IRIGASI DAN JARINGAN</option>' +
                                    '<option value="5">KONSTRUKSI DALAM PENGERJAAN</option>' +
                                    '<option value="6">KIR</option>' +
                                '</select><br>' +
                                '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama_barang + ' " placeholder="Nama Barang"><br>' +
                                '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Barang" value = "' + item.kode_barang + '">' +
                            '</form>');
                        })
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
             });
             //Klik Untuk update data barang ke database
             $(document).on('click', '#edit_submit', function (event) {
                event.preventDefault();
                $.ajax({
                    data: $('#edit_barang').serialize(),
                    url: "/barang.update",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function () {

                    },
                    success: function (data) {
                        alert('Data berhasil diUpdate')
                        $('#modal_body').html('');
                        $('#myModal').modal('hide');
                        refbrg();
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert('Failed to submit the form');
                    },

                });
            });
            //Hapus Data
            $('#tbl_barang').on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                var del = confirm("Anda yakin menghapus data ini ?");
                if (del) {
                    $.ajax({
                        url: "/barang.hapus/" + id,
                        type: "POST",
                        dataType: 'json',
                        beforeSend: function () {

                        },
                        success: function (data) {
                            alert('Data berhasil Dihapus')
                            refbrg();
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            alert('Data gagal dihapus');
                        },

                    });
                }

            })



            });
        });


        //Tutup Tab Content
        $(document).on('click', '#barang_x', function() {
            $('#tab_barang').parent().remove(); // Hapus tab
            $('#barang_tab').remove(); // Hapus konten tab
        });

        // END OF BARANG

        // DEPARTEMEN
    $('#departemen').on('click', function() {
        $('#departemen').addClass('btn btn-primary');
        $('#barang,#ruang,#sdm,#lokasi,#dokumen,#bahan,#divisi').removeClass('btn btn-primary');
        $('#barang,#ruang,#sdm,#lokasi,#dokumen,#bahan,#divisi').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_dep" data-bs-toggle="tab" href="#dep_tab" role="tab" aria-controls="tab2" aria-selected="false">DEPARTEMEN &nbsp;<button style="border:none;background-color: white; type="submit"  id="dep_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            //Menampilkan Konten berupa HEAD tabel pada body TAB
            $(document).ready(function() {
                $('#myTabContent').append(

                    '<br>' +
                    '<div class="tab-pane show" id="dep_tab" role="tabpanel" aria-labelledby="tab_dep">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA DEPARTEMEN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_dep"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body" >'+
                                    '<table class="table table-striped" id="tbl_dep">'+
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
                refDep();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        //Klik pada tombol tambah barang, makam menampilkan modal TAMBAH DATA BARANG
                        $('#tambah_dep').on('click', function() {
                            $('#myModal').modal('show');
                            $('#judul_modal').html('TAMBAH DEPARTEMEN');
                            $('#modal_body').html('');
                            $('#modal_body').prepend(
                        '<form action="" id="form_dep">'+

                            '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Departemen"><br>' +
                            '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Departemen">' +

                        '</form>');
                        //Memberikan atribut id pada tombol submit modal
                        $('.tombol').attr('id', 'submit_dep');
                           //Klik Untuk menyimpan data departemen ke database
                        $(document).on('click', '#submit_dep', function (event) {
                            event.preventDefault();
                            $.ajax({
                                data: $('#form_dep').serialize(),
                                url: "/dep.save",
                                type: "POST",
                                dataType: 'json',
                                beforeSend: function () {

                                },
                                success: function (data) {
                                    $('#modal_body').html('');
                                    $('#myModal').modal('hide');
                                    refDep();
                                },
                                error: function (xhr, textStatus, errorThrown) {
                                    alert('Failed to submit the form');
                                },

                            });
                        });

                     });

            //Jika klik <a class="btn btn-sm btn-warning edit-btn" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>maka menampilkan modal EDIT DATA
            $('#tbl_dep').on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/dep.edit/"+ id,
                    success: function (data) {
                        $.each(data.data, function (index, item) {
                        $('#myModal').modal('show');
                        $('#judul_modal').html('UPDATE DEPARTEMEN');
                        $('#modal_body').html('');
                        $('.tombol').attr('id', 'edit_submit');
                        $('#modal_body').prepend(
                            '<form action="" id="edit_dep">' +
                                '<input type="hidden" name="id" value = " ' + item.id + ' ">' +
                                '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama_dep + ' " placeholder="Nama Departemen"><br>' +
                                '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Departemen" value = "' + item.kode_dep + '">' +
                            '</form>');
                        })
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
             });
             //Klik Untuk update data departemen ke database
             $(document).on('click', '#edit_submit', function (event) {
                event.preventDefault();
                $.ajax({
                    data: $('#edit_dep').serialize(),
                    url: "/dep.update",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        alert('Data berhasil diUpdate')
                        $('#modal_body').html('');
                        $('#myModal').modal('hide');
                        refDep();
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert('Failed to submit the form');
                    },

                });
            });
            //Hapus Data
            $('#tbl_dep').on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                var del = confirm("Anda yakin menghapus data ini ?");
                if (del) {
                    $.ajax({
                        url: "/dep.hapus/" + id,
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
            });

        });

            //del
            $(document).on('click', '#dep_x', function() {
                $('#tab_dep').parent().remove();
                $('#dep_tab').remove();
            });
        // END OF DEPARTEMEN

    // DIVISI
    $('#divisi').on('click', function() {
        $('#divisi').addClass('btn btn-primary');
        $('#barang,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').removeClass('btn btn-primary');
        $('#barang,#departemen,#ruang,#sdm,#lokasi,#dokumen,#bahan').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_div" data-bs-toggle="tab" href="#div_tab" role="tab" aria-controls="tab2" aria-selected="false">DIVISI &nbsp;<button style="border:none;background-color: white; type="submit"  id="div_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(

                    '<div class="tab-pane show" id="div_tab" role="tabpanel" aria-labelledby="tab_div">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA DIVISI <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_div"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body">'+
                                    '<table class="table table-striped" id="tbl_div">'+
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
                refDiv();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    //Klik pada tombol tambah divisi, maka menampilkan modal TAMBAH DATA BARANG
                    $('#tambah_div').on('click', function() {
                        $('#myModal').modal('show');
                        $('#judul_modal').html('TAMBAH DIVISI');
                        $('#modal_body').html('');
                        $('#modal_body').prepend(
                            '<form action="" id="form_div">'+
                                '<select name="dep"  id="selectDivisi" class="select2 form-control">' +
                                '</select><br>' +
                                '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Divisi"><br>' +
                                '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Divisi">' +
                            '</form>');
                            //$('.select2').select2();
                            //Load option dari data depatemen
                            $.get('/departemen', function (data) {
                                $.each(data.data, function (index, item) {
                                    $('#selectDivisi').append('<option value="' + item.id + '">' + item.kode_dep + '</option>');
                                });
                            });

                        });


                    //Memberikan atribut id pada tombol submit modal
                    $('.tombol').attr('id', 'submit_div');
                       //Klik Untuk menyimpan data divisi ke database
                    $(document).on('click', '#submit_div', function (event) {
                        event.preventDefault();
                        $.ajax({
                            data: $('#form_div').serialize(),
                            url: "/div.save",
                            type: "POST",
                            dataType: 'json',
                            success: function (data) {
                                $('#modal_body').html('');
                                $('#myModal').modal('hide');
                                refDiv();
                            },
                            error: function (xhr, textStatus, errorThrown) {
                                alert('Failed to submit the form');
                            },

                        });
                    });
                    //Jika klik <a class="btn btn-sm btn-warning edit-btn" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>maka menampilkan modal EDIT DATA
                    $('#tbl_div').on('click', '.edit-div', function() {
                        var id = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            url: "/div.edit/"+ id,
                            success: function (data) {
                                $.each(data.data, function (index, item) {
                                $('#myModal').modal('show');
                                $('#judul_modal').html('UPDATE DIVISI');
                                $('#modal_body').html('');
                                $('.tombol').attr('id', 'edit_submit');
                                $('#modal_body').prepend(
                                    '<form action="" id="edit_div_submit">' +
                                        '<input type="hidden" name="id" value = " ' + item.id + ' ">' +
                                        '<select name="dep"  id="selectDivisi" class="select2 form-control">' +
                                        '<option value=" '+ item.id_dep +'">"'+ item.id_dep +'" </option> ' +
                                        '</select><br>' +
                                        '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama_div + ' " placeholder="Nama Departemen"><br>' +
                                        '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Departemen" value = "' + item.kode_div + '">' +
                                    '</form>');

                                    $.get('/departemen', function (data) {
                                        $.each(data.data, function (index, item) {
                                            $('#selectDivisi').append('<option value="' + item.id + '">' + item.kode_dep + '</option>');
                                        });
                                    });
                                })
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    });
                    //Klik Untuk update data divisi ke database
                    $(document).on('click', '#edit_submit', function (event) {
                        event.preventDefault();
                        $.ajax({
                            data: $('#edit_div_submit').serialize(),
                            url: "/div.update",
                            type: "POST",
                            dataType: 'json',
                            success: function (data) {
                                alert('Data berhasil diUpdate')
                                $('#modal_body').html('');
                                $('#myModal').modal('hide');
                                refDiv();
                            },
                            error: function (xhr, textStatus, errorThrown) {
                                alert('Failed to submit the form');
                            },

                        });
                    });
                    //Hapus Data
                    $('#tbl_div').on('click', '.delete-div', function() {
                        var id = $(this).data('id');
                        var del = confirm("Anda yakin menghapus data ini ?");
                        if (del) {
                            $.ajax({
                                url: "/div.hapus/" + id,
                                type: "POST",
                                dataType: 'json',
                                    success: function (data) {
                                    alert('Data berhasil Dihapus')
                                    refDiv();
                                },
                                error: function (xhr, textStatus, errorThrown) {
                                    alert('Data gagal dihapus');
                                },
                            });
                        }
                        })


            });
     });
        $(document).on('click', '#div_x', function() {
            $('#tab_div').parent().remove(); // Hapus tab
            $('#div_tab').remove(); // Hapus konten tab-+
        });
    // END OF DIVISI



    //RUANGAN
    $('#ruang').on('click', function() {
        $('#ruang').addClass('btn btn-primary');
        $('#divisi,#departemen,#sdm,#lokasi,#dokumen,#bahan,#barang').removeClass('btn btn-primary');
        $('#divisi,#departemen,#sdm,#lokasi,#dokumen,#bahan,#barang').addClass('btn btn-defult');
        $("#myTabs").append(
            '<li class="nav-item" >' +
                '<a class="nav-link" id="tab_ruang" data-bs-toggle="tab" href="#ruang_tab" role="tab" aria-controls="tab2" aria-selected="false">RUANGAN &nbsp;<button style="border:none;background-color: white; type="submit"  id="ruang_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<br>'+
                    '<div class="tab-pane show" id="ruang_tab" role="tabpanel" aria-labelledby="tab_ruang">'+'<div class="container">'+
                        '<div class="card">'+
                            '<div class="card-header">DATA RUANGAN <div class="position-absolute top-0 end-0"><button class="btn  btn-primary" id="tambah_ruang"><i class="fa-solid fa-file-circle-plus"></i></button></div></div>'+
                                '<div class="card-body">'+
                                    '<table class="table table-striped" id="tbl_ruang">'+
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
                refRuang();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                //Klik pada tombol tambah ruang, maka menampilkan modal TAMBAH DATA RUANGAN
                $('#tambah_ruang').on('click', function() {
                    $('#myModal').modal('show');
                    $('#judul_modal').html('TAMBAH RUANGAN');
                    $('#modal_body').html('');
                    $('#modal_body').prepend(
                        '<form action="" id="form_ruang">'+

                            '<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Ruangan"><br>' +
                            '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Ruangan">' +
                        '</form>');
                    });

                //Memberikan atribut id pada tombol submit modal
                $('.tombol').attr('id', 'submit_ruang');

                //Klik Untuk menyimpan data divisi ke database
                $(document).on('click', '#submit_ruang', function (event) {
                 event.preventDefault();
                 $.ajax({
                     data: $('#form_ruang').serialize(),
                     url: "/ruang.save",
                     type: "POST",
                     dataType: 'json',
                     success: function (data) {
                         $('#modal_body').html('');
                         $('#myModal').modal('hide');
                         refRuang();
                     },
                     error: function (xhr, textStatus, errorThrown) {
                         alert('Failed to submit the form');
                     },

                 });
             });
             //Jika klik <a class="btn btn-sm btn-warning edit-btn" data-id="' + item.id + '" href="#"><i class="fa-solid fa-edit"></i></a>maka menampilkan modal EDIT DATA
             $('#tbl_ruang').on('click', '.edit', function() {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/ruang.edit/"+ id,
                    success: function (data) {
                        $.each(data.data, function (index, item) {
                        $('#myModal').modal('show');
                        $('#judul_modal').html('UPDATE RUANGAN');
                        $('#modal_body').html('');
                        $('.tombol').attr('id', 'edit_submit');
                        $('#modal_body').prepend(
                            '<form action="" id="edit_ruang_submit">' +
                                '<input type="hidden" name="id" value = " ' + item.id + ' ">' +

                                '<input type="text" class="form-control" id="nama" name="nama" value=" ' + item.nama_ruang + ' " placeholder="Nama Departemen"><br>' +
                                '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Departemen" value = "' + item.kode + '">' +
                            '</form>');

                        })
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
            //Klik Untuk update data ruangan ke database
            $(document).on('click', '#edit_submit', function (event) {
                event.preventDefault();
                $.ajax({
                    data: $('#edit_ruang_submit').serialize(),
                    url: "/ruang.update",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        alert('Data berhasil diUpdate')
                        $('#modal_body').html('');
                        $('#myModal').modal('hide');
                        refRuang();
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert('Failed to submit the form');
                    },

                });
            });
            //Hapus Data
            $('#tbl_ruang').on('click', '.delete', function() {
                var id = $(this).data('id');
                var del = confirm("Anda yakin menghapus data ini ?");
                if (del) {
                    $.ajax({
                        url: "/ruang.hapus/" + id,
                        type: "POST",
                        dataType: 'json',
                            success: function (data) {
                            alert('Data berhasil Dihapus')
                            refRuang();
                        },
                        error: function (xhr, textStatus, errorThrown) {
                            alert('Data gagal dihapus');
                        },
                    });
                }
            })

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
                '<a class="nav-link" id="tab_sdm" data-bs-toggle="tab" href="#sdm_tab" role="tab" aria-controls="tab2" aria-selected="false">SDM &nbsp;<button style="border:none;background-color: white; type="submit"  id="sdm_x" class="fa-regular fa-circle-xmark"></button></a>' +
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
                '<a class="nav-link" id="tab_lokasi" data-bs-toggle="tab" href="#lokasi_tab" role="tab" aria-controls="tab2" aria-selected="false">LOKASI &nbsp;<button style="border:none;background-color: white; type="submit"  id="lokasi_x" class="fa-regular fa-circle-xmark" ></button></a>' +
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
                '<a class="nav-link" id="tab_dok" data-bs-toggle="tab" href="#dok_tab" role="tab" aria-controls="tab2" aria-selected="false">DOKUMEN &nbsp;<button style="border:none;background-color: white; type="submit"  id="dok_x" class="fa-regular fa-circle-xmark" ></button></a>' +
            '</li>'
            );
            $(document).ready(function() {
                // Menambahkan konten tab setelah dokumen siap
                $('#myTabContent').append(
                    '<div class="tab-pane fade" id="dok_tab" role="tabpanel" aria-labelledby="tab_dok">' +
                        '<div class="container"> <div class="card"><div class="card-header">DATA DOKUMEN</div> </div>' +
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
                '<a class="nav-link" id="tab_bahan" data-bs-toggle="tab" href="#bahan_tab" role="tab" aria-controls="tab2" aria-selected="false">BAHAN &nbsp;<button style="border:none;background-color: white; type="submit"  id="bahan_x" class="fa-regular fa-circle-xmark" ></button></a>' +
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
