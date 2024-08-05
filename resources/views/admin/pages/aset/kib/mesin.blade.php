@php
use App\Models\Aset\NilaiAktiva;
$no = 0;
@endphp
@extends('admin.layouts.main')

@section('title')
  ASET | BARANG
@endsection

@section('content')

    <div class="col container" id="barang_tab" role="tabpanel" aria-labelledby="tab_div">
        <br>

                <div class="container card">
                    <div class="card-header">DATA PERALATAN DAN MESIN <div class="position-absolute top-0 end-0">
                        <button class="btn  btn-primary"  data-bs-toggle="modal" id="add_mesin" data-bs-target="#modal_mesin"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                    </div>
                            <div class="card-body">
                                <table class="table table-striped" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>LOKASI</th>
                                            <th>ALAMAT</th>
                                            <th>NILAI</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mesin as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td ><STRONG><a id="klik_nilai_mesin" style="text-decoration: none;" href="#" data-id="{{ $item->id_lokasi }}" data-bs-toggle="modal" data-bs-target="#modal_mesin_nilai">{{number_format (NilaiAktiva::where('id_lokasi', $item->id_lokasi)->where('cat', 2)->sum('nilai'),0,',','.') }}</a></STRONG></td>


                                                <td>
                                                    <!-- Add action buttons/links here modal_mesin_detail -->
                                                    <div class="btn-group">

                                                      <button id="detail_mesin" data-id="{{ $item->id_lokasi }}" class="btn btn-default border border-secondary btn-sm detail tree" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasExample" href="#data"  type="button">DETAIL</button>

                                                        <button type="button" class="btn btn-sm btn-default border border-secondary  dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"><span class="visually-hidden">Toggle Dropdown</span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item  edit" data-id="" href="#"><i class="fa-solid fa-edit"></i>&nbsp;EDIT</a></li>
                                                            <li><a class="dropdown-item delete" data-id="" href="#"><i class="fa-solid fa-trash"></i>&nbsp;DELETE</a></li>
                                                            <li><a class="dropdown-item nilai" data-id="" href="#"><i class="fa-solid fa-trash"></i>&nbsp;NILAI</a></li>
                                                            <li><hr class="dropdown-divider"></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

    {{-- MODAL TAMBAH --}}
      <div class="modal"  id="modal_mesin">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalLG">TAMBAH DATA MESIN</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
                <form action="" id="form_a" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row  border border-primary rounded">
                            <div class="container"><br>
                                <table class="table table-striped table-bordered rounded">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No Voucher</th>
                                            <th>Kode Aktiva</th>
                                            <th>Bulan</th>
                                            <th>Uraian</th>
                                          </tr>
                                    </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">
                                                    <select class="select2 form-control" name="voucher_kir" id="voucher_mesin" style="width:100%;" required>
                                                        <option>- NO VOUCHER -</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">
                                                    <select class="select2 form-control" name="kode_aktiva" id="kode_aktiva" style="width:100%;" required>
                                                        <option>- PILIH KODE AKTIVA -</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">
                                                    <input type="text" class="form-control" name="bulan_voc" id="bulan_voc" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">
                                                    <input type="text" class="form-control" disabled value="text" id="urai_voc">
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><br>
                            <div class="row  border border-primary rounded">
                                <div class="container"><br>
                                    <table class="table table-striped table-bordered rounded">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Lokasi</th>
                                                <th>Departemen</th>
                                                <th>Divisi</th>
                                              </tr>
                                        </thead>
                                    <tbody>
                                            <tr>
                                                <td>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <select class="select2 form-control" name="lokasi" id="lokasi_kir" style="width:100%;">
                                                            <option>- PILIH LOKASI -</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <select class="select2 form-control" name="dep" id="dep" style="width:100%;">
                                                            <option>- PILIH DEPARTEMEN -</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <select class="select2 form-control" name="div" id="div" style="width:100%;">
                                                            <option>- PILIH DIVISI -</option>
                                                        </select>
                                                    </div>
                                                </td>
                                             </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br>
                            <div class="row  border border-primary rounded">
                                 <div class="col"><br>
                                        <div class="input-group input-group-sm mb-1">
                                            {{-- <span class="input-group-text col-sm-3">Hak</span> --}}
                                            <select name="nama_aset" id="nama" class="select2 form-control" style="width:100%;">
                                                <option>-NAMA ASET-</option>
                                            </select>

                                        </div>
                                        <p style="color:red;" id="lokasi_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Kode Aset</span><input name="kode_aset" id="kode_aset" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="kode_aset_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Register</span><input type="text" name="reg" id="reg" value="" class="form-control">
                                        </div>
                                        <p style="color:red;" id="reg_error"></p>

                                        <div class="input-group input-group-sm mb-1">

                                            <select class="select2 form-control" name="jenis" id="jenis" style="width:100%;">
                                                <option> -JENIS ASET- </option>
                                                <option> Bergerak </option>
                                                <option> Tidak Bergerak </option>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Tahun</span><input name="tahun" id="tahun" type="number" class="form-control">
                                        </div>
                                        <p style="color:red;" id="tahun_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Batas</span><input name="batas" id="batas" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="batas_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <select class=" form-control" name="nilai_a" id="nilai_a">
                                                <option> -NILAI PEROLEHAN- </option>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Nilai Susut</span><input name="susut" id="susut" type="number" class="form-control">
                                        </div>


                                        <div class="input-group input-group-sm mb-1">
                                            <select class="form-control" name="bahan" id="bahan_mesin">
                                                <option> -BAHAN- </option>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Guna</span><input name="guna" id="guna" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="guna_error"></p>
                                    </div><br>

                                    <div class="col"><br>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Ukuran</span><input name="ukuran" id="ukuran" type="number" class="form-control">
                                        </div>
                                        <p style="color:red;" id="ukuran_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Merk/Type</span><input name="merk" id="merk" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="merk_error"></p>
                                        
                                    <div id="kendaraan">
                                        {{-- <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">No Pabrik</span><input name="pabrik" id="pabrik" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="pabrik_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">No Rangka</span><input name="rangka" id="rangka" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="rangka_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">No Mesin</span><input name="mesin" id="mesin" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="mesin_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">No Polisi</span><input name="nopol" id="nopol" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="nopol_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">No BPKB</span><input name="bpkb" id="bpkb" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="bpkb_error"></p> --}}
                                    </div>
                                       
                                        

                                        <div class="input-group input-group-sm mb-1">
                                            <select class="select2 form-control" name="asal" id="asal" style="width:100%;">
                                                <option> -ASAL- </option>
                                                <option>Pembelian</option>
                                                <option>Bantuan</option>
                                                <option>Hibah</option>
                                                <option>Penyertaan Modal</option>
                                                <option>Serah Kelola</option>
                                                <option>Ganti Rugi</option>
                                                <option>Surat Penunjukan</option>
                                                <option>SK Walikota</option>
                                                <option>Sewa</option>
                                            </select>
                                        </div>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>
                                        </div>
                                        <p style="color:red;" id="ket_error"></p>
                                    </div>

                            </div>

                            <div class="row border border-primary rounded mt-1">
                                <br><div class="float-end">
                                    <button type="button" id="submit_b" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button>
                                </div>
                            </div><br>


                            <div class="row border border-primary rounded">
                                <div class="container"><br>
                                    <table  class="table table-bordered" id="tbl_mesin_input">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Lokasi</th>
                                                <th>Divisi</th>
                                                <th>Barang</th>
                                                <th>Merk</th>
                                              </tr>
                                        </thead>
                                         <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br>

                        </div>
                    </form >

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="tombol btn btn-primary" id="">SUBMIT</button>
            </div>
          </div>
        </div>
      </div>


      {{-- MODAL NILAI --}}
      <div class="modal"  id="modal_mesin_nilai">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalLG">DETAIL NILAI PERALATAN DAN MESIN</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
              <table class="table table-striped table-border" id="tbl_detailNilai_mesin">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Perkiraan</th>
                        <th>Nama Aktiva</th>
                        <th>Tanggal</th>
                        <th>Tahun</th>
                        <th>Nilai</th>
                        <th>Uraian</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="tombol btn btn-primary" id="">SUBMIT</button>
            </div>
          </div>
        </div>
      </div>

      {{-- MODAL DETAIL MESIN --}}
      <div class="modal"  id="modal_mesin_detail">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal_detail">DETAIL  PERALATAN DAN MESIN</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
                <div class="container">
                    <img id="gambar_D" src="" height="500px" width="550px" class="rounded mx-auto d-block" alt="..."><br>

                    <fieldset class="border border-secondary rounded-3 p-2 row">
                        <legend class="float-none w-auto px-1 border border-secondary rounded">
                        <div style="font-size: 15px;">-</div>
                        </legend>
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>KODE</th>
                                                <td id="kode_D"> + item.kode+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>NAMA BARANG</th>
                                                <td id="nama_barang_D"> + item.nama_barang + </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>PENGGUNAAN</th>
                                                <td id="guna_D"> + item.guna+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                     </fieldset><br>



                         <div class="row">
                        <div class="col">
                            <div class="container border border-primary rounded"><br>
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>MERK / TYPE</th>
                                            <td id="merk_D"> + item.merk+ </td>
                                        </tr>
                                        <tr>
                                            <th>UKURAN / CC</th>
                                            <td id="ukuran_D"> + item.ukuran+ </td>
                                        </tr>
                                        <tr>
                                            <th>BAHAN</th>
                                            <td id="bahan_D"> + item.bahan+ </td>
                                        </tr>
                                        <tr>
                                            <th>TAHUN</th>
                                            <td id="tahun_D"> + item.tahun+ </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col">
                            <div class="container border border-primary rounded"><br>
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>BPKB</th>
                                            <td id="bpkb_D"> + item.bpkb+ </td>
                                        </tr>
                                        <tr>
                                            <th>PABRIK</th>
                                            <td id="pabrik_D"> + item.pabrik+ </td>
                                        </tr>
                                        <tr>
                                            <th>RANGKA</th>
                                            <td id="rangka_D"> + item.rangka+ </td>
                                        </tr>
                                        <tr>
                                            <th>MESIN</th>
                                            <td id="mesin_D"> + item.mesin+ </td>
                                        </tr>
                                        <tr>
                                            <th>POLISI</th>
                                            <td id="polisi_D"> + item.polisi+ </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div><br>

                    <fieldset class="border border-secondary rounded-3 p-2 row">
                        <legend class="float-none w-auto px-1 border border-secondary rounded">
                        <div style="font-size: 15px;">-</div>
                        </legend>
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>ASAL USUL</th>
                                                <td id="asal_D"> + item.asal+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>NILAI PEROLEHAN</th>
                                                <td id=""> + formattedCurrency + </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>NILAI PENYUSUTAN</th>
                                                <td id="susut_D"> + item.susut+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>KET</th>
                                                <td id="ket_D"> + item.ket   + </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                     ' </fieldset><br>

                    <fieldset class="border border-secondary rounded-3 p-2 row" id="filed">
                            <legend class="float-none w-auto px-3 border border-secondary rounded">
                                <div style="font-size: 15px;"><strong>DOKUMEN</strong></div>
                            </legend>

                         </fieldset><br>


                </div>'

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="tombol btn btn-primary" id="">SUBMIT</button>
            </div>
          </div>
        </div>
      </div>
        {{-- OFFCANVAS TREE --}}


        <div class="offcanvas offcanvas-end" style=" width: 90%;"  tabindex="-1" id="data" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header" id="kepala">DATA PERALATAN DAN MESIN

            </div>
            <div class="offcanvas-body large" id="canvas_body_tampil">
                <div class="row">

                    <div class="col-3 border border-primary rounded" id="canvas_tree">


                    </div>

                    <div class="col border border-primary rounded"><br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header" id="card-header"></div>
                                <div class="card-body" id="card-body">
                                    <table class="table table-striped table-border" id="tbl_b_data">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama Aset</th>
                                                <th>Merk</th>
                                                <th>Penggunaan</th>
                                                <th>Tahun</th>
                                                <th>Foto/Detail</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    </tbody>
                                    </table>


                                </div>
                            </div><br>
                         </div>
                    </div>


                </div>
            </div>
          </div>

@endsection
