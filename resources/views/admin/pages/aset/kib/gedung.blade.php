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
                    
                    <div class="container">
                        <div class="float-end">
                        <button class="btn btn-outline-primary btn-notif"  data-bs-toggle="modal" id="add_gedung" data-bs-target="#modal_gedung">Tambah
                             @if ($notif > 0)
                                <span class="notif-badge"><strong>{{ $notif }}</strong></span>
                            @endif
                        </button>
                    </div>
                        <div class="card">
                   
                    <div class="card-header d-flex justify-content-between">
                            <span>DATA GEDUNG DAN BANGUNAN</span>
                            <span class="text-end">Total Nilai Gedung :<strong>{{ number_format($totalGedung, 0, ".", ".") }}</strong></span>
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
                                        @foreach($gedung as $item)
                                            <tr>
                                                <td>{{ ++$no }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td ><STRONG><a id="klik_nilai_gedung" style="text-decoration: none;" href="#" data-id="{{ $item->id_lokasi }}" data-bs-toggle="modal" data-bs-target="#modal_gedung_nilai">{{number_format (NilaiAktiva::join('aktivas', 'nilai_aktivas.id_aktiva', '=', 'aktivas.id')->where('id_lokasi', $item->id_lokasi)->where('kib', 'KIB C - GEDUNG DAN BANGUNAN')->sum('nilai'),0,',','.') }}</a></STRONG></td>



                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <div class="btn-group">

                                                        <button href="#data" id="detail_gedung" data-id="{{ $item->id_lokasi }}" class="btn btn-default border border-secondary btn-sm detail"  type="button"data-bs-toggle="offcanvas"  aria-controls="offcanvasExample">DETAIL</button>


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
                </div>

    <div class="modal"  id="modal_gedung">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalC">TAMBAH DATA GEDUNG</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
                <form action="" id="form_c" enctype="multipart/form-data">
                    <input type="hidden" id="id_c" name="id" value="">
                    <div class="container">
                        <div class="row  border border-primary rounded">
                    <div class="container"><br>
                        <table class="table table-striped table-bordered rounded">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Lokasi</th>
                                    <th>Departemen</th>
                                    <th>Divisi</th>
                                    <th>Uraian</th>
                                    <th></th>
                                  </tr>
                            </thead>
                        <tbody>

                            @foreach ($baru as $item )
                                 <tr class="row-pilihC">
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$item->lok }}</td>
                                    <td>{{$item->dep }}</td>
                                    <td>{{$item->namDiv }}</td>
                                    <td>{{$item->urai }}</td>
                                    <td><button type="button" data-idlokc="{{ $item->idLok }}" data-idakc="{{ $item->idAk }}" data-iddep="{{$item->idDep}}" data-iddiv="{{$item->idDiv}}" class="btn btn-sm btn-success btn-pilihC" id="">Pilih</button></td>
                                </tr>
                            @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div><br>
                        <div class="row  border border-primary rounded" id="vMesin">
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
                                                        <input type="text" id="idAkC" name="idAk">
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
                                            <select name="id_barang" id="barang_d_edit" class="select2 form-control" style="width:100%;">
                                            </select>

                                        </div>
                                        <p style="color:red;" id="lokasi_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Kode Inventaris</span><input name="kode" id="kode_gedung" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="kode_aset_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">No.Register</span><input type="text" name="reg" id="reg" value="" class="form-control">
                                        </div>
                                        <p style="color:red;" id="reg_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class=" form-control" name="kondisi" id="kondisi_c">
                                                <option> -KONDISI- </option>
                                                <option value="BAIK"> BAIK </option>
                                                <option value="RUSAK RINGAN"> RUSAK RINGAN </option>
                                                <option value="RUSAK BERAT"> RUSAK BERAT </option>
                                            </select>
                                        </div>
                                        <p style="color:red;" id="kondisi_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class=" form-control" name="konstruksi" id="konstruksi_c">
                                                <option> -KONSTRUKSI- </option>
                                                <option value="BERTINGKAT"> BERTINGKAT </option>
                                                <option value="TIDAK BERTINGKAT"> TIDAK BERTINGKAT </option>
                                            </select>
                                        </div>
                                        <p style="color:red;" id="kondisi_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class=" form-control" name="materi" id="materi">
                                                <option> -MATERIAL- </option>
                                                <option value="BETON"> BETON </option>
                                                <option value="TIDAK BETON"> TIDAK BETON </option>
                                            </select>
                                        </div>
                                        <p style="color:red;" id="kondisi_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Luas Lantai</span><input name="luastanah" id="luastanah" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="ukuran_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Tgl Dokumen</span><input name="tgl_imb" id="tgl_imb" type="date" class="form-control">
                                        </div>
                                        <p style="color:red;" id="ukuran_error"></p>

                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">No Dokumen</span><input name="no_imb" id="no_imb" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="guna_error"></p>
                                        

                                       </div><br>

                                    <div class="col"><br>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Luas</span><input name="luas" id="luas" type="text" class="form-control">
                                        </div>
                                        <p style="color:red;" id="luas_error"></p>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class="form-control" name="status" id="status_c">
                                                <option> -Status Tanah- </option>
                                                <option value="Pemprov"> Pemprov </option>
						<option value="Perumdam">Perumdam</option>	
                                           </select>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Kode Tanah</span><input name="kode_tanah" id="kode_tanahC" type="text" class="form-control">
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <select class="select2 form-control" name="asal" id="asal_c" style="width:100%;">
                                                <option> -ASAL- </option>
                                                <option>Perumdam</option>
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
                                            <span class="input-group-text col-sm-3">Harga Rp</span><input name="nilai" id="nilaiC" type="number" class="form-control">
                                        </div>
                                        
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Dokumen</span><input name="dok" id="dok" type="file" class="form-control" multiple>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text col-sm-3">Foto</span><input name="img" id="img" type="file" class="form-control" multiple>
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <span class="input-group-text /mesin.savecol-sm-3">Keterangan</span><textarea name="ket" id="ket" class="form-control"></textarea>
                                        </div>
                                        <p style="color:red;" id="ket_error"></p>
                                    </div>

                            </div>
                            <div id="keranjangC">
                                <div class="row border border-primary rounded mt-1">
                                    <br>
                                    <div class="float-end">
                                        <button  type="button" id="submit_c" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button>
                                       
                                    </div>
                                </div><br>


                                <div class="row border border-primary rounded">
                                    <div class="container"><br>
                                        <table  class="table table-bordered" id="tbl_mesin_input">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Gedung</th>
                                                    <th>Kode</th>
                                                    <th>Luas</th>
                                                    <th>Konstruksi</th>
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
              <div id="createC"><button type="button" class="tombol btn btn-primary" id="checkoutBtnC">SUBMIT</button></div>
              <div id="updateC"> <button  type="button" id="edit_3" class="btn btn-sm btn-primary float-end mt-1 mb-1">SUBMIT</button></div>
             </div>
          </div>
        </div>
      </div>








                {{-- MODAL MASTER --}}
    <div class="modal"  id="modal_gedung_detail">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal">DETAIL GEDUNG</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_body">
                <div class="container">
                    <div class="text-center my-3">
                        <div class="row" id="col-edit-c">
                            <div class="btn">
                                 <input type="hidden" id="testCid">
                            </div>
                           
                            <div class="col">
                                <div class="gambar-wrapper position-relative d-inline-block" style="max-width: 100%; height: auto;">
                                    <img id="gambar_C"
                                        src=""
                                        alt="Foto Lokasi"
                                        class="img-fluid rounded shadow"
                                        style="max-height: 500px; object-fit: contain;">
                                    <div class="edit-icon" id="edit-img-c">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                   

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
                                                <td id="kode_d"> + item.kode+ </td>
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
                                                <td id="nama_barang_d"> + item.nama_barang + </td>
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
                                                <td id="guna_d"> + item.guna+ </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                     ' </fieldset><br>



                         <div class="row">
                        <div class="col">
                            <div class="container border border-primary rounded"><br>
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>REGISTER</th>
                                            <td id="reg_d"> + item.reg+ </td>
                                        </tr>
                                        <tr>
                                            <th>KONDISI BANGUNAN</th>
                                            <td id="kondisi_d"> + item.kondisi+ </td>
                                        </tr>
                                        <tr>
                                            <th>KONSTRUKSI</th>
                                            <td id="konstruksi_d"> + item.konstruksi+ </td>
                                        </tr>
                                        <tr>
                                            <th>BAHAN</th>
                                            <td id="materi_d"> + item.materi+ </td>
                                        </tr>
                                        <tr>
                                            <th>TGL SURAT</th>
                                            <td id="tgl_imb_d"> + item.tgl_imb+ </td>
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
                                            <th>LUAS</th>
                                            <td id="luas_d"> + item.luas+ </td>
                                        </tr>
                                        <tr>
                                            <th>SATATUS TANAH</th>
                                            <td id="status_d"> + item.status+ </td>
                                        </tr>
                                        <tr>
                                            <th>LUAS LANTAI</th>
                                            <td id="luastanah_d"> + item.luastanah+ </td>
                                        </tr>
                                        <tr>
                                            <th>NO KODE TANAH</th>
                                            <td id="kode_tanah_d"> + item.kode_tanah+ </td>
                                        </tr>
                                        <tr>
                                            <th>NO SURAT</th>
                                            <td id="no_imb_d"> + item.no_imb+ </td>
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
                                                <td id="asal_d"> + item.asal+ </td>
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
                            
                            <div class="col">
                                <div class="input-group input-group-sm mb-1">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>KET</th>
                                                <td id="ket_d"> + item.ket   + </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                     </fieldset><br>

                    <fieldset class="border border-secondary rounded-3 p-2 row" id="filedC">
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
      <div class="modal"  id="modal_gedung_nilai">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalLG">DETAIL NILAI GEDUNG</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
              <table class="table table-striped table-border" id="tbl_detailNilai_gedung">
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
                                                <th>Penggunaan</th>
                                                <th>FOTO/Detail</th>
                                                <th>Aksi</th>
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

@endsection
