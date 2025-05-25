@php
use App\Models\Aset\NilaiAktiva;
$no = 0;
@endphp

@extends('admin.layouts.main')

@section('title')
  ASET | BARANG
@endsection

@section('content')

    <div class="col container">
        <br>

                <div class="container card">
                    <div class="card-header">DATA TANAH <div class="position-absolute top-0 end-0">
                      <button class="btn  btn-primary"  data-bs-toggle="modal" id="add" data-bs-target="#modal_tanah"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                    </div>
                            <div class="card-body">
                                <table class="table table-striped" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>LOKASI</th>
                                            <th>ALAMAT</th>
                                            <th>PENGGUNAAN</th>
                                            <th>NILAI</th>
                                            <th>GAMBAR</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tanah as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->guna }}</td>
                                                <td ><STRONG><a id="klik_nilai" style="text-decoration: none;" href="#" data-id="{{ $item->idLok }}" data-bs-toggle="modal" data-bs-target="#modal_tanah_nilai">{{number_format (NilaiAktiva::where('id_lokasi', $item->idLok)->where('cat', 1)->sum('nilai'),0,',','.') }}</a></STRONG></td>
                                                <td><img height="80px" width="80px" src="http://app.perumdamtirtakencana.id/assets/img/lokasi/{{$item->img }}" alt=""></td>
                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <div class="btn-group">
                                                        <button id="detail_tanah" data-id="{{ $item->id_tanah }}" class="btn btn-default border border-secondary btn-sm detail" data-bs-toggle="modal" data-bs-target="#modal_tanah_detail"  type="button">DETAIL</button>

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









      {{-- MODAL KIB --}}
      <div class="modal"  id="modal_tanah">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalLG">TAMBAH TANAH</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">

              <form action="/tanah.save" id="form_a" method="POST" enctype="multipart/form-data">
                @csrf
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
                                            <select class="select2 form-control" name="voucher_kir" id="voucher_tanah" style="width:100%;" required>
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
                                            <th>Alamat</th>
                                            <th>Kode</th>
                                            <th>Tahun</th>
                                            <th>Nama</th>
                                            <th>Penggunaan</th>
                                          </tr>
                                    </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">
                                                    <select class="select2 form-control" name="lokasi" id="lokasi_kir" style="width:100%;" required>
                                                        <option>- PILIH LOKASI -</option>


                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">
                                                    <input name="kode" id="kode" type="text" class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">
                                                    <input type="number" name="tahun" id="tahun" value="2023" class="form-control" required>
                                                </div><br>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">

                                                    <select class="select2 form-control" style="width:100%;"  id="nama" name="nama" style="width:100%;" required>
                                                        <option> -NAMA BARANG- </option>

                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm mb-1">
                                                    <input type="text" nama="guna" id="guna" class="form-control" required>
                                                </div>
                                            </td>
                                    </tr>
                                    <tbody/>
                                </table>
                            </div>
                        </div><br>





                        <fieldset class="border border-secondary rounded-3 p-2 row">
                            <legend class="float-none w-auto px-3 border border-secondary rounded">
                                <div style="font-size: 15px;"><strong>PENUNJUKAN</strong></div>
                            </legend>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">No Surat</span>
                                        <input name="no_tunjuk" id="no_tunjuk" type="text" placeholder="Penunjukan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" placeholder="Penunjukan" name="tgl_tunjuk" id="tgl_tunjuk" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_tunjuk" placeholder="Penunjukan" class="form-control" required>
                                    </div>
                                </div>
                         </fieldset><br>

                         <fieldset class="border border-secondary rounded-3 p-2 row">
                            <legend class="float-none w-auto px-1 border border-secondary rounded">
                            <div style="font-size: 15px;"><strong>SURAT SPPT/SPHAT/SPJBT</strong></div>
                            </legend>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">No Surat</span><input type="text" name="sertifikat" id="sertifikat" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_sertifikat" id="tgl_sertifikat" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_sertifikat" id="luas_sertifikat" placeholder="SURAT SPPT/SPHAT/SPJBT" class="form-control" required>
                                    </div>
                                </div>
                         </fieldset><br>

                         <fieldset class="border border-secondary rounded-3 p-2 row">
                            <legend class="float-none w-auto px-3 border border-secondary rounded">
                            <div style="font-size: 15px;"><strong>GAMBAR SITUASI</strong></div>
                            </legend>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">No Surat</span><input type="text" name="no_gambar" id="no_gambar" placeholder="GAMBAR SITUASI" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Tgl Surat</span><input type="date" name="tgl_gambar" id="tgl_gambar" placeholder="GAMBAR SITUASI" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-sm  mb-1">
                                        <span class="input-group-text col-sm-3">Luas</span><input type="text" name="luas_gambar" id="luas_gambar" placeholder="GAMBAR SITUASI" class="form-control" required>
                                    </div>
                                </div>
                         </fieldset><br>


                         <div class="row  border border-primary rounded">

                                <div class="col"><br>
                                    <div class="input-group input-group-sm mb-1">

                                        <select name="hak" id="hak" class="select2 form-control" style="width:100%;" required>
                                            <option>-HAK-</option>
                                            <option>SHM</option>
                                            <option>Tanah Milik Perumdam</option>
                                            <option>Tanah Milik Negara</option>
                                            <option>Tanah Milik Pemda</option>
                                            <option>Hibah</option>
                                            <option>SPHAT</option>
                                            <option>Hak Pakai</option>
                                            <option>HGB</option>
                                            <option>SPPT</option>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Pemilik Asal</span><input name="asal" id="asal" type="text" class="form-control" required>
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Asal</span><input type="number" name="pemilik" id="pemilik" value="2023" class="form-control" required>
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Nilai perolehan</span>
                                        <select class="select2 form-control" name="nilai_a" id="nilai_a" style="width:100%;" required>
                                            <option> -PILH NILAI AKTIVA- </option>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Nilai saat ini</span><input name="nilai_now" id="nilai_now" type="text" class="form-control" required>
                                    </div>
                                </div><br>

                                <div class="col"><br>

                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Dokumen</span><input name="dok[]" id="dok" type="file" class="form-control" multiple required>
                                    </div>
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text col-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control" required></textarea>
                                    </div>
                                </div>

                        </div><br>

                 </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" id="simpan" class="tombol btn btn-primary" id="">SUBMIT</button>
            </form >
            </div>
          </div>
        </div>
      </div>


      {{-- MODAL DETAIL --}}
      <div class="modal"  id="modal_tanah_detail">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalLG_detail">DETAIL TANAH</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
              <div class="container">
                <img id="gambar_D" src="#" height="500px" width="500px" class="rounded mx-auto d-block" alt="..."><br>

                <div class="row">
                    <div class="col">
                        <div class="container border border-primary rounded"><br>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Letak</th>
                                        <td id="alamat_D"> </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <td id="nama_barang_D"> </td>
                                    </tr>
                                    <tr>
                                        <th>Penggunaan</th>
                                        <td id="guna_D">  </td>
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
                                        <th>Asal Usul</th>
                                        <td id="asal_D"> item.asal+ </td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Pengadan</th>
                                        <td id="tahun_D"> item.tahun+ </td>
                                    </tr>
                                    <tr>
                                        <th>-</th>
                                        <td id="guna_Dt"> item.guna+ </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div><br>

                <fieldset class="border border-secondary rounded-3 p-2 row">
                        <legend class="float-none w-auto px-3 border border-secondary rounded">
                            <div style="font-size: 15px;"><strong>PENUNJUKAN</strong></div>
                        </legend>
                            <div class="col">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td id="no_tunjuk_D"> item.no_tunjuk+ </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="col">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td id="tgl_tunjuk_D"> item.tgl_tunjuk+ </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Luas</th>
                                            <td id="luas_tunjuk_D"> item.luas_tunjuk+ </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                     ' </fieldset><br>

                     <fieldset class="border border-secondary rounded-3 p-2 row">
                        <legend class="float-none w-auto px-3 border border-secondary rounded">
                            <div style="font-size: 15px;"><strong>SPPT/SPHAT/SPJBT</strong></div>
                        </legend>
                            <div class="col">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td id="sertifikat_D"> item.sertifikat+ </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="col">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td id="tgl_sertifikat_D"> item.tgl_sertifikat+ </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Luas</th>
                                            <td id="luas_sertifikat_D"> item.luas_sertifikat+ </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                     ' </fieldset><br>

                     <fieldset class="border border-secondary rounded-3 p-2 row">
                        <legend class="float-none w-auto px-3 border border-secondary rounded">
                            <div style="font-size: 15px;"><strong>GAMBAR SITUASI</strong></div>
                        </legend>
                            <div class="col">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Nomor Surat</th>
                                        <td id="no_gambar_D"> item.no_gambar+ </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="col">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td id="tgl_gambar_D"> item.tgl_gambar+ </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Luas</th>
                                            <td id="luas_gambar_D"> item.luas_gambar+ </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                     ' </fieldset><br>

                     <div class="row">
                    <div class="col">
                        <div class="container border border-primary rounded"><br>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Hak</th>
                                        <td id="hak_D"> item.hak+ </td>
                                    </tr>
                                    <tr>
                                        <th>Asal Usul</th>
                                        <td id="asal_D"> item.asal+ </td>
                                    </tr>
                                    <tr>
                                        <th>Pemilik Asal</th>
                                        <td id="pemilik_D"> item.pemilik+ </td>
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
                                        <th>Nilai</th>
                                        <td><a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><h5 id="sumNilai"></h5></a></td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td id="ket_D"> item.ket+ </td>
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
{{-- MODAL NILAI --}}
<div class="modal"  id="modal_tanah_nilai">
    <div class="modal-dialog  modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul_modalLG_detail">DETAIL NILAI</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal_bodyLG">

            <table class="table table-striped table-border" id="tbl_detailNilai">
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


                                </div>
                            </div><br>
                         </div>
                    </div>
                </div>
            </div>
          </div>

@endsection
