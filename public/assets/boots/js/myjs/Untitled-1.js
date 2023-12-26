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
                                                      '</tr>'+
                                                '</thead>'+
                                            ' <tbody>'+
                                                    '<tr>'+
                                                        '<td>'+
                                                            '<div class="input-group input-group-sm mb-1">'+
                                                                '<select class="select2 form-control" name="lokasi" id="lokasi_b">'+
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
                                                    ' </tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div><br>'+
                                    '<div class="row  border border-primary rounded">'+

                                            '<div class="col"><br>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    // '<span class="input-group-text col-sm-3">Hak</span>'+
                                                    '<select name="nama_aset" id="nama_aset" class="select2 form-control">'+
                                                        '<option>-NAMA ASET-</option>'+
                                                    '</select>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Kode Aset</span><input name="kode_aset" id="kode_aset" type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Register</span><input type="text" name="reg" id="reg" value="" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    // '<span class="input-group-text col-sm-3">Nilai perolehan</span>'+
                                                    '<select class="form-control" name="jenis" id="jenis">'+
                                                        '<option> -JENIS ASET- </option>'+
                                                        '<option> Bergerak </option>'+
                                                        '<option> Tidak Bergerak </option>'+
                                                    '</select>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Tahun</span><input name="tahun" id="tahun" type="number" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Batas</span><input name="batas" id="batas" type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<select class=" form-control" name="nilai_a" id="nilai_a">'+
                                                        '<option> -NILAI PEROLEHAN- </option>'+
                                                    '</select>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Nilai Susut</span><input name="susut" id="susut" type="number" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<select class="form-control" name="bahan" id="bahan_mesin">'+
                                                        '<option> -BAHAN- </option>'+
                                                    '</select>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Guna</span><input name="guna" id="guna" type="text" class="form-control">'+
                                                '</div>'+
                                            '</div><br>'+

                                            '<div class="col"><br>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Ukuran</span><input name="ukuran" id="ukuran" type="number" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Merk/Type</span><input name="merk" id="merk" type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No Pabrik</span><input name="pabrik" id="pabrik" type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No Rangka</span><input name="rangka" id="rangka" type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No Mesin</span><input name="mesin" id="mesin" type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No Polisi</span><input name="nopol" id="nopol" type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">No BPKB</span><input name="bpkb" id="bpkb" type="text" class="form-control">'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<select class="select2 form-control" name="asal" id="asal">'+
                                                        '<option> -ASAL- </option>'+
                                                        '<option>Pembelian</option>'+
                                                        '<option>Bantuan</option>'+
                                                        '<option>Hibah</option>'+
                                                        '<option>Penyertaan Modal</option>'+
                                                        '<option>Serah Kelola</option>'+
                                                       ' <option>Ganti Rugi</option>'+
                                                        '<option>Surat Penunjukan</option>'+
                                                        '<option>SK Walikota</option>'+
                                                        '<option>Sewa</option>'+
                                                    '</select>'+
                                                '</div>'+

                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>'+
                                                '</div>'+
                                                '<div class="input-group input-group-sm mb-1">'+
                                                    '<span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>'+
                                                '</div>'+
                                            '</div>'+

                                    '</div>'+

                                    '<div class="row border border-primary rounded mt-1">'+
                                        '<br><div class="float-end">'+
                                            '<button type="button" id="submit_b" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button>'+
                                        '</div>'+
                                    '</div><br>'+


                                    '<div class="row border border-primary rounded">'+
                                        '<div class="container"><br>'+
                                            '<table  class="table table-bordered">'+
                                                '<thead>'+
                                                    '<tr class="text-center">'+
                                                        '<th>No</th>'+
                                                        '<th>Lokasi</th>'+
                                                        '<th>Divisi</th>'+
                                                        '<th>Barang</th>'+
                                                        '<th>Merk</th>'+
                                                      '</tr>'+
                                                '</thead>'+
                                                ' <tbody>'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div><br>'+
                                
                                '</div>'+
                            '</form >'