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
                    <div class="card-header">DATA ASET TETAP LAINYA<div class="position-absolute top-0 end-0">
                        <button class="btn  btn-primary" data-bs-toggle="modal" id="add_e" data-bs-target="#modal_E"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                    </div>
                            <div class="card-body">
                                <table class="table table-striped" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>LOKASI</th>
                                            <th>ALAMAT</th>
                                            
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kibE as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                



                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <div class="btn-group">

                                                        <button href="#data" id="detail_e" data-id="{{ $item->id_lokasi }}" class="btn btn-default border border-secondary btn-sm detail"  type="button"data-bs-toggle="offcanvas"  aria-controls="offcanvasExample">DETAIL</button>


                                                        
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
    <div class="modal"  id="modal_e_detail">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal_detail">DETAIL ASET TETAP LAINNYA</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_body">
                <div class="container">
                    <img id="gambar_e" src="" height="500px" width="550px" class="rounded mx-auto d-block" alt="..."><br>

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
                                                <td id="kode_e"> + item.kode+ </td>
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
                                                <td id="nama_barang_e"> + item.nama_barang + </td>
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
                                            <th>REGISTER</th>
                                            <td id="reg_e"> + item.reg+ </td>
                                        </tr>
                                        <tr>
                                            <th>KONDISI</th>
                                            <td id="kondisi_e"> + item.kondisi+ </td>
                                        </tr>
                                        {{-- <tr>
                                            <th>KONSTRUKSI</th>
                                            <td id="konstruksi_d"> + item.konstruksi+ </td>
                                        </tr> --}}
                                        <tr>
                                            <th>BAHAN</th>
                                            <td id="materi_e"> + item.materi+ </td>
                                        </tr>
                                        <tr>
                                            <th>TAHUN</th>
                                            <td id="tahun_e"> + item.tgl_imb+ </td>
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
                                            <th>JUMLAH</th>
                                            <td id="jumlah_e"> + item.luas+ </td>
                                        </tr>
                                        <tr>
                                            <th>ASAL</th>
                                            <td id="asal_e"> + item.status+ </td>
                                        </tr>
                                        <tr>
                                            <th>KET</th>
                                            <td id="ket_e"> + item.luastanah+ </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div><br>

                    

                    <fieldset class="border border-secondary rounded-3 p-2 row" id="filed">
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
              <h5 class="modal-title" id="judul_modalLG">DETAIL NILAI E</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
              <table class="table table-striped table-border" id="tbl_detailNilai_e">
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
                                    <table class="table table-striped table-border" id="tbl_e_data">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Nama Aset</th>
                                                <th>Kode</th>
                                                <th>Registrasi</th>
                                                <th></th>
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
{{-- Tambah Data Aset Tetap Lainya --}}
    <div class="modal"  id="modal_E">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalE_crud">TAMBAH DATA ASET TETAP LAINNYA</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
                <form action="" id="form_e" enctype="multipart/form-data">
                    <input type="hidden" id="id_e" name="id" value="">
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
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Kode Barang</span><input name="kode" id="kode" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="kode_aset_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Register</span><input type="text" name="reg" id="reg" value="" class="form-control">
                                        </div>
                                        <p style="color:red;" id="reg_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class=" form-control" name="kondisi" id="kondisi_e_edit">
                                                <option> -KONDISI- </option>
                                                <option value="BAIK"> BAIK </option>
                                                <option value="RUSAK RINGAN"> RUSAK RINGAN </option>
                                                <option value="RUSAK BERAT"> RUSAK BERAT </option>
                                            </select>
                                        </div>
                                        <p style="color:red;" id="kondisi_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class=" form-control" name="id_bahan" id="bahan_e_edit">
                                                <option> -BAHAN- </option>
                                               
                                            </select>
                                        </div>
                                        <p style="color:red;" id="kondisi_error"></p>
                                        
                                        <p style="color:red;" id="kondisi_error"></p>
                                        
                                        

                                       </div><br>

                                    <div class="col"><br>
                                      <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Tahun Pengadaan</span><input name="tahun" id="tahun" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="ukuran_error"></p>

                                        

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Jumlah</span><input name="jumlah" id="jumlah" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="guna_error"></p>  
                                        
                                        
                                        <div class="input-group input-group-sm mb-1">
                                            <select class="select2 form-control" name="asal" id="asal_e_edit" style="width:100%;">
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
                                            <span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>
                                        </div>
                                        <p style="color:red;" id="ket_error"></p>
                                    </div>

                            </div>
                            <div id="keranjangE">
                                <div class="row border border-primary rounded mt-1">
                                    <br>
                                    <div class="float-end">
                                        <button  type="button" id="submit_e" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button>
                                       
                                    </div>
                                </div><br>


                                <div class="row border border-primary rounded">
                                    <div class="container"><br>
                                        <table  class="table table-bordered" id="tbl_e_input">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Nama Aset</th>
                                                    <th>Kode</th>
                                                    <th>Jumlah</th>
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
              <div id="createE"><button type="button" class="tombol btn btn-primary" id="checkoutBtnE">SUBMIT</button></div>
              <div id="updateE"> <button  type="button" id="edit_5" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button></div>
             </div>
          </div>
        </div>
      </div>

@endsection
