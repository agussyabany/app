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
                    <div class="card-header">DATA KONSTRUKSI DALAM PENGERJAAN<div class="position-absolute top-0 end-0">
                        <button class="btn  btn-primary" data-bs-toggle="modal" id="add_f" data-bs-target="#modal_F">TAMBAH</i></button>
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
                                        @foreach($kibF as $item)
                                            <tr>
                                                <td>{{ ++$no }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <!-- <td ><STRONG><a id="klik_nilai_d" style="text-decoration: none;" href="#" data-id="{{ $item->id_lokasi }}" data-bs-toggle="modal" data-bs-target="#modal_d_nilai">{{number_format (NilaiAktiva::join('aktivas', 'nilai_aktivas.id_aktiva', '=', 'aktivas.id')->where('id_lokasi', $item->id_lokasi)->where('kib', 'KIB F - KONTRUKSI DALAM PENGERJAAN')->sum('nilai'),0,',','.') }}</a></STRONG></td>  -->
                                                <td>{{number_format($item->nilai,0,',','.') }}</td>



                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <div class="btn-group">

                                                        <button href="#data" id="detail_f" data-id="{{ $item->id_lokasi }}" class="btn btn-default border border-secondary btn-sm detail"  type="button"data-bs-toggle="offcanvas"  aria-controls="offcanvasExample">DETAIL</button>
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








                {{-- MODAL MASTER --}}
    <div class="modal"  id="modal_f_detail">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal">DETAIL KONSTRUKSI DALAM PENGERJAAN</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_body">
                <div class="container">
                    <img id="gambar_f" src="" height="500px" width="550px" class="rounded mx-auto d-block" alt="..."><br>

                    <fieldset class="border border-secondary rounded-3 p-2 row">
                        <legend class="float-none w-auto px-1 border border-secondary rounded">
                        <div style="font-size: 15px;">-</div>
                        </legend>
                            {{-- <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>KODE</th>
                                                <td id="kode_d"> + item.kode+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>NAMA BARANG</th>
                                                <td id="nama_barang_f"> + item.nama_barang + </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>PENGGUNAAN</th>
                                                <td id="guna_d"> + item.guna+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                     ' </fieldset><br>



                         <div class="row">
                        <div class="col">
                            <div class="container border border-primary rounded"><br>
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>TAHUN</th>
                                            <td id="tahun_f"> + item.reg+ </td>
                                        </tr>
                                        <tr>
                                            <th>KONSTRUKSI</th>
                                            <td id="konstruksi_f"> + item.konstruksi+ </td>
                                        </tr>

                                        <tr>
                                            <th>BAHAN</th>
                                            <td id="materi_f"> + item.materi+ </td>
                                        </tr>
                                        <tr>
                                            <th>LUAS</th>
                                            <td id="luas_f"> + item.tgl_imb+ </td>
                                        </tr>
                                        {{-- <tr>
                                            <th>KONDISI BANGUNAN</th>
                                            <td id="kondisi_d"> + item.kondisi+ </td>
                                        </tr> --}}



                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col">
                            <div class="container border border-primary rounded"><br>
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>LETAK</th>
                                            <td id="letak_f"> + item.luas+ </td>
                                        </tr>
                                        <tr>
                                            <th>SATATUS TANAH</th>
                                            <td id="status_f"> + item.status+ </td>
                                        </tr>
                                        <tr>
                                            <th>ASAL</th>
                                            <td id="asal_f"> + item.luastanah+ </td>
                                        </tr>
                                        <tr>
                                            <th>STATUS ASET</th>
                                            <td id="status_aset_f"> + item.kode_tanah+ </td>
                                        </tr>
                                        <tr>
                                            <th>NILAI</th>
                                            <td id="nilai_f"> + item.no_imb+ </td>
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
                                                <th>URAIAN</th>
                                                <td id="urai_f"> + item.asal+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>NILAI PEROLEHAN</th>
                                                <td id="nilai_d"> + item.nilai+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            {{-- <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>NILAI PENYUSUTAN</th>
                                                <td id="susut_d"> + item.susut+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>KET</th>
                                                <td id="ket_f"> + item.ket   + </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                     </fieldset><br>

                    <fieldset class="border border-secondary rounded-3 p-2 row" id="filedF">
                            <legend class="float-none w-auto px-3 border border-secondary rounded">
                                <div style="font-size: 15px;"><strong>DOKUMEN</strong></div>
                            </legend>
                    </fieldset><br>


                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="tombol btn btn-primary" id="">SUBMIT</button>
            </div>
          </div>
        </div>
      </div>
      {{-- MODAL KIB --}}
      <div class="modal"  id="modal_d_nilai">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalLG">DETAIL NILAI D</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
              <table class="table table-striped table-border" id="tbl_detailNilai_d">
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
        {{-- OFFCANVAS TREE --}}


        <div class="offcanvas offcanvas-end" style=" width: 90%;"  tabindex="-1" id="data" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header" id="kepala">

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
                                    <table class="table table-striped table-border" id="tbl_c_data">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama Aset</th>
                                                <th>Tahun</th>
                                                <th>Nilai</th>
                                                <th><i class="fa fa-cog"></i></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                       </tbody>
                                    </table>'
                        </div>


                                </div>
                            </div><br>
                         </div>
                    </div>
                </div>
            </div>
          </div>

{{-- Tambah Data Konstruksi --}}
    <div class="modal"  id="modal_F">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalF_crud">TAMBAH DATA KONSTRUKSI DALAM PENGERJAAN</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
                <form action="" id="form_f" enctype="multipart/form-data">
                    <input type="hidden" id="id_f" name="id" value="">
                    <div class="container">
                        {{-- <div class="row  border border-primary rounded" id="vMesin">
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
                                                    <select class="select2 form-control" name="voucher_mesin" id="voucher_mesin" style="width:100%;" required disabled>
                                                        <option>- NO VOUCHER -</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">
                                                    <select class="select2 form-control" name="kode_aktiva" id="kode_aktiva_c" style="width:100%;" required>
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
                        </div><br> --}}
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
                                                        <select class="select2 form-control" name="id_lokasi" id="lokasi_kir" style="width:100%;">
                                                            <option>- PILIH LOKASI -</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <select class="select2 form-control" name="id_departemen" id="dep" style="width:100%;">
                                                            <option>- PILIH DEPARTEMEN -</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <select class="select2 form-control" name="id_div" id="div" style="width:100%;">
                                                            <option>- PILIH DIVISI -</option>
                                                        </select>
                                                    </div>
                                                </td>
                                             </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br>
                            {{-- main componenet --}}
                            <div class="row  border border-primary rounded">
                                 <div class="col"><br>

                                    <input type="hidden" value="1" name="jenis" id="jenisB">
                                    <input type="hidden" value="" id="id_voucher2" name="id_voucher2">
                                        <div class="input-group input-group-sm mb-1">
                                            {{-- <span class="input-group-text col-sm-3">Hak</span> --}}
                                            <select name="id_barang" id="id_barang" class="select2 form-control" style="width:100%;">
                                            </select>

                                        </div>
                                        <p style="color:red;" id="lokasi_error"></p>
                                        

                                        <p style="color:red;" id="reg_error"></p>
                                        
                                        <div class="input-group input-group-sm mb-1">
                                            <select class=" form-control" name="struktur" id="struktur_f_edit">
                                                <option> -KONSTRUKSI- </option>
                                                <option value="BERTINGKAT"> BERTINGKAT </option>
                                                <option value="TIDAK BERTINGKAT"> TIDAK BERTINGKAT </option>
                                            </select>
                                        </div>
                                        <p style="color:red;" id="kondisi_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class=" form-control" name="materi" id="materi_f_edit">
                                                <option> -MATERIAL- </option>
                                                <option value="BETON"> BETON </option>
                                                <option value="TIDAK BETON"> TIDAK BETON </option>
                                            </select>
                                        </div>
                                        <p style="color:red;" id="kondisi_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Luas</span><input name="luas" id="luas_f_edit" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="ukuran_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Tahun</span><input name="tahun" id="tahun_f_edit" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="ukuran_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Type</span><input name="type" id="type_f_edit" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="guna_error"></p>
                                        

                                       </div><br>

                                    <div class="col"><br>
                                        {{-- <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Luas</span><input name="luas" id="luas" type="text" class="form-control">
                                        </div> --}}
                                        <p style="color:red;" id="luas_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class="form-control" name="status_tanah" id="status_tanah_f_edit">
                                                <option> -Status Tanah- </option>
                                                <option value="Pemprov"> Pemprov </option>
                                            </select>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class="form-control" name="status_aset" id="status_aset_f_edit">
                                                <option> -Status Aset- </option>
                                                <option value="Pemprov"> Hak Milik </option>
                                                <option value="Pemprov"> Hak Kelola </option>
                                            </select>
                                        </div>
                                        
                                        <div class="input-group input-group-sm mb-1">
                                            <select class="select2 form-control" name="asal" id="asal_f_edit" style="width:100%;">
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
                                            <span class="input-group-text col-sm-3">Nilai</span><input name="nilai" id="nilaiF" type="number" class="form-control">
                                        </div>
                                        
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text /mesin.savecol-sm-3">Uraian</span><textarea name="urai" id="urai_edit" class="form-control"></textarea>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text /mesin.savecol-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>
                                        </div>
                                        <p style="color:red;" id="ket_error"></p>
                                    </div>

                            </div>
                            <div id="keranjangF">
                                <div class="row border border-primary rounded mt-1">
                                    <br>
                                    <div class="float-end">
                                        <button  type="button" id="submit_f" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button>
                                       
                                    </div>
                                </div><br>


                                <div class="row border border-primary rounded">
                                    <div class="container"><br>
                                        <table  class="table table-bordered" id="tbl_f_input">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Nama Aset</th>
                                                    <th>Type</th>
                                                    <th>Struktur</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><br>
                            </div>
                            

                        </div>
                    </form >

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <div id="createF"><button type="button" class="tombol btn btn-primary" id="checkoutBtnF">SUBMIT</button></div>
              <div id="updateF"> <button  type="button" id="edit_6" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button></div>
             </div>
          </div>
        </div>
      </div>

@endsection
