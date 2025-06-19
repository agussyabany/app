$('#modal_bodyLG').prepend(
    '<form action="" id="form_a" enctype="multipart/form-data">'+
        '<div class="container">'+
                '<div class="row  border border-primary rounded">'+
                    '<div class="container"><br>'+
                        '<table class="table table-striped table-bordered rounded">'+
                            '<thead>'+
                                '<tr class="text-center">'+
                                    '<th>Lokasi</th>'+
                                    '<th>Departemen</th>'+
                                    '<th>Divisi</th>'+
                                    '<th>Gedung</th>'+
                                    '<th>Ruangan</th>'+
                                  '</tr>'+
                            '</thead>'+
                        ' <tbody>'+
                                '<tr>'+
                                    '<td>'+
                                        '<div class="input-group input-group-sm mb-1">'+
                                            '<select class="select2 form-control" name="lokasi" id="lokasi_kir">'+
                                                '<option>- PILIH LOKASI -</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+
                                        '<div class="input-group input-group-sm mb-1">'+
                                            '<select class="select2 form-control" name="dep" id="dep">'+
                                                '<option>- PILIH DEPARTEMEN -</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+
                                        '<div class="input-group input-group-sm mb-1">'+
                                            '<select class="select2 form-control" name="div" id="div">'+
                                                '<option>- PILIH DIVISI -</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+
                                        '<div class="input-group input-group-sm mb-1">'+
                                            '<select class="select2 form-control" name="gedung" id="gedung">'+
                                                '<option>- PILIH GEDUNG -</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+
                                        '<div class="input-group input-group-sm mb-1">'+
                                            '<select class="select2 form-control" name="ruang" id="ruang_kir">'+
                                                '<option>- PILIH RUANGAN -</option>'+
                                            '</select>'+
                                        '</div>'+
                                    '</td>'+
                                ' </tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                '</div><br>'+
                '<div class="row  border border-primary rounded">'+

                        '<div class="col"><br>'+
                            '<div class="input-group input-group-sm mb-1">'+
                                '<select name="nama_aset" id="nama_aset" class="select2 form-control">'+
                                    '<option>-NAMA ASET-</option>'+
                                '</select>'+

                            '</div>'+
                            '<span style="color:red;" id="lokasi_error"></span>'+
                            '<div class="input-group input-group-sm mb-1">'+
                                '<span class="input-group-text col-sm-3">Kode Aset</span><input name="kode_aset" id="kode_aset" type="text" class="form-control">'+
                            '</div>'+
                            '<span style="color:red;" id="kode_aset_error"></span>'+

                            '<div class="input-group input-group-sm mb-1">'+
                                '<span class="input-group-text col-sm-3">Merk/Type</span><input type="text" name="merk" id="merk" value="" class="form-control">'+
                            '</div>'+
                            '<span style="color:red;" id="reg_error"></span>'+

                            '<div class="input-group input-group-sm mb-1">'+
                                '<select class="select2 form-control" name="bahan" id="bahan_kir">'+
                                    '<option> - BAHAN - </option>'+
                                '</select>'+
                            '</div>'+
                            '<div class="input-group input-group-sm mb-1">'+
                                '<span class="input-group-text col-sm-3">Jumlah</span><input name="jumlah" id="jumlah" type="number" class="form-control">'+
                            '</div>'+
                            '<span style="color:red;" id="jumlah_error"></span>'+
                        '</div><br>'+

                        '<div class="col"><br>'+
                            '<div class="input-group input-group-sm mb-1">'+
                                '<span class="input-group-text col-sm-3">Baik</span><input name="baik" id="baik" type="number" class="form-control">'+
                            '</div>'+
                            '<span style="color:red;" id="baik_error"></span>'+

                            '<div class="input-group input-group-sm mb-1">'+
                                '<span class="input-group-text col-sm-3">Rusak Ringan</span><input name="ringan" id="ringan" type="text" class="form-control">'+
                            '</div>'+
                            '<span style="color:red;" id="merk_error"></span>'+

                            '<div class="input-group input-group-sm mb-1">'+
                                '<span class="input-group-text col-sm-3">Rusak Berat</span><input name="berat" id="berat" type="text" class="form-control">'+
                            '</div>'+
                            '<span style="color:red;" id="pabrik_error"></span>'+

                            '<div class="input-group input-group-sm mb-1">'+
                                '<span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>'+
                            '</div>'+
                            '<div class="input-group input-group-sm mb-1">'+
                                '<span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>'+
                            '</div>'+
                            '<span style="color:red;" id="ket_error"></span>'+
                        '</div>'+

                '</div>'+

                '<div class="row border border-primary rounded mt-1">'+
                    '<br><div class="float-end">'+
                        '<button type="button" id="submit_kir" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button>'+
                    '</div>'+
                '</div><br>'+


                '<div class="row border border-primary rounded">'+
                    '<div class="container"><br>'+
                        '<table  class="table table-bordered" id="tbl_mesin_input">'+
                            '<thead>'+
                                '<tr class="text-center">'+
                                    '<th>No</th>'+
                                    '<th>Lokasi</th>'+
                                    '<th>Divisi</th>'+
                                    '<th>Ruang</th>'+
                                    '<th>Barang</th>'+
                                  '</tr>'+
                            '</thead>'+
                            ' <tbody>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                '</div><br>'+

            '</div>'+
        '</form >');
