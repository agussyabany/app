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
                    <div class="card-header">DATA KIR<div class="position-absolute top-0 end-0">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_tambah" id="tambah_kir"><i class="fa-solid fa-file-circle-plus"></i></button>
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
                                        @foreach($kir as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td ><STRONG><a id="klik_nilai_kir" style="text-decoration: none;" href="#" data-id="{{ $item->id_lokasi }}" data-bs-toggle="modal" data-bs-target="#modal_kir_nilai">{{number_format (NilaiAktiva::where('id_lokasi', $item->id_lokasi)->where('cat', 7)->sum('nilai'),0,',','.') }}</a></STRONG></td>



                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <div class="btn-group">


                                                        <button class="btn btn-default border border-secondary btn-sm detail" data-id="{{ $item->id_lokasi }}" type="button" data-bs-toggle="offcanvas"  aria-controls="offcanvasExample" href="#data" id="data_kir">DETAIL</button>



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







                {{-- MODAL ADD --}}
                <div class="modal"  id="modal_tambah">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header" >
                          <h5 class="modal-title" id="judul_modal">TAMBAH DATA KIR</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modal_bodyLG">
                            <input type="hidden" value="" id="jenis_input">
                            <form action="" id="form_a" enctype="multipart/form-data">
                                <div class="container">
                                <div id="head-off">
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
                                                                    <select class="select2 form-control" name="voucher_kir" id="voucher_kir" style="width:100%;">
                                                                        <option>- NO VOUCHER -</option>
                                                                    </select>
                                                                    <span style="color:red;" id="voucher_kir_error"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group input-group-sm mb-1">
                                                                    <select class="select2 form-control" name="kode_aktiva" id="kode_aktiva" style="width:100%;">
                                                                        <option>- PILIH KODE AKTIVA -</option>
                                                                    </select>
                                                                    <span style="color:red;" id="kode_aktiva_error"></span>
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
                                                            <th>Gedung</th>
                                                            <th>Ruangan</th>
                                                          </tr>
                                                    </thead>
                                                <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="input-group input-group-sm mb-1">
                                                                    <select class="select2 form-control" name="lokasi" id="lokasi_kir" style="width:100%;" >
                                                                        <option>- PILIH LOKASI -</option>
                                                                    </select>
                                                                    <span style="color:red;" id="lokasi_error"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group input-group-sm mb-1">
                                                                    <select class="select2 form-control" name="dep" id="dep" style="width:100%;" >
                                                                        <option>- PILIH DEPARTEMEN -</option>
                                                                    </select>
                                                                    <span style="color:red;" id="dep_error"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group input-group-sm mb-1">
                                                                    <select class="select2 form-control" name="div" id="div" style="width:100%;" >
                                                                        <option>- PILIH DIVISI -</option>
                                                                    </select>
                                                                    <span style="color:red;" id="div_error"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group input-group-sm mb-1">
                                                                    <select class="select2 form-control" name="gedung" id="gedung_kir" style="width:100%;" >
                                                                        <option>- PILIH GEDUNG -</option>
                                                                    </select>
                                                                    <span style="color:red;" id="gedung_kir_error"></span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="input-group input-group-sm mb-1">
                                                                    <select class="select2 form-control" name="ruang" id="ruang_kir" style="width:100%;" >
                                                                        <option>- PILIH RUANGAN -</option>
                                                                    </select>
                                                                    <span style="color:red;" id="ruang_kir_error"></span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><br>
                                    </div>
                                        {{-- MULTI HEAD --}}
                                        <div class="row  border border-primary rounded">

                                                <div class="col"><br>

                                                    <div class="input-group input-group-sm mb-1">
                                                        <select name="nama_aset" id="nama_aset" class="select2 form-control" style="width:100%;" >
                                                            <option>-NAMA ASET-</option>
                                                        </select>
                                                    </div>
                                                    <span style="color:red;" id="lokasi_error"></span>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-text col-sm-3">Kode Aset</span><input name="kode_aset" id="kode_aset" type="text" class="form-control" >
                                                    </div>
                                                    <span style="color:red;" id="kode_aset_error"></span>

                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-text col-sm-3">Merk/Type</span><input type="text" name="merk" id="merk" value="" class="form-control" >
                                                    </div>
                                                    <span style="color:red;" id="reg_error"></span>

                                                    <div class="input-group input-group-sm mb-1">
                                                        <select class="select2 form-control" name="bahan" id="bahan_kir" style="width:100%;" >
                                                            <option> - BAHAN - </option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-text col-sm-3">Jumlah</span><input name="jumlah" id="jumlah" type="number" class="form-control" >
                                                    </div>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <select class="select2 form-control" name="satuan" id="satuan" style="width:100%;" >
                                                            <option> - SATUAN - </option>
                                                            <option>Unit</option>
                                                            <option>Buah</option>\
                                                            <option>Meter</option>
                                                            <option>Set</option>
                                                            <option>Lansam</option>
                                                        </select>
                                                    </div>
                                                    <span style="color:red;" id="jumlah_error"></span>
                                                </div><br>

                                                <div class="col"><br>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-text col-sm-3">Baik</span><input name="baik" id="baik" type="number" class="form-control" >
                                                    </div>
                                                    <span style="color:red;" id="baik_error"></span>

                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-text col-sm-3">Rusak Ringan</span><input name="merk" id="ringan" type="text" class="form-control" >
                                                    </div>
                                                    <span style="color:red;" id="merk_error"></span>

                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-text col-sm-3">Rusak Berat</span><input name="berat" id="berat" type="text" class="form-control" >
                                                    </div>
                                                    <span style="color:red;" id="pabrik_error"></span>

                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>
                                                    </div>
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>
                                                    </div>
                                                    <span style="color:red;" id="ket_error"></span>
                                                </div>

                                        </div>

                                        <div class="row border border-primary rounded mt-1">
                                            <br><div class="float-end">
                                                <button type="button" id="submit_kir" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button>
                                            </div>
                                        </div><br>


                                        <div class="row border border-primary rounded">
                                            <div class="container" id="tabel_tambah"><br>
                                                <table  class="table table-bordered" id="tbl_kir_input">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th>No</th>
                                                            <th>Lokasi</th>
                                                            <th>Divisi</th>
                                                            <th>Gedung</th>
                                                            <th>Ruang</th>
                                                            <th>Merk</th>
                                                            <th>Hapus</th>
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
                          <button type="button" id="proses_kir" class="tombol btn btn-primary" id="proses">SUBMIT</button>
                        </div>
                      </div>
                    </div>
                  </div>
                {{-- MODAL MASTER --}}
    <div class="modal"  id="modal_kir_detail">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="judul_modal">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyKir">
                <div id="edit_tabel" class="container"></div><br>
                <table class="table table-striped table-border" id="tbl_kir_detail">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Aktiva</th>
                            <th>Merk/Type</th>
                            <th>Bahan</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Baik</th>
                            <th>Rusak Ringan</th>
                            <th>Rusak Berat</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
            </tbody>
        </table>

            </div>
            <div class="modal-footer" id="button_print">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
          </div>
        </div>
      </div>
      {{-- MODAL KIB --}}
      <div class="modal"  id="modal_kir_nilai">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalLG">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
              <table class="table table-striped table-border" id="tbl_detailNilai_kir">
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
                                    <table class="table table-striped table-border" id="tbl_kir_data">
                                        <thead>
                                        <tr>
                                        <th>NO</th>
                                        <th>Nama Ruangan</th>
                                        <th>KIR</th>
                                        <th>TAMBAH KIR</th>
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
