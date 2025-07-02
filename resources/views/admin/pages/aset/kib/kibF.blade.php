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
                        <button class="btn  btn-primary" id="tambah_barang"><i class="fa-solid fa-file-circle-plus"></i></button>
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
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                {{-- <td ><STRONG><a id="klik_nilai_d" style="text-decoration: none;" href="#" data-id="{{ $item->id_lokasi }}" data-bs-toggle="modal" data-bs-target="#modal_d_nilai">{{number_format (NilaiAktiva::where('id_lokasi', $item->id_lokasi)->where('cat', 4)->sum('nilai'),0,',','.') }}</a></STRONG></td> --}}
                                                <td>{{number_format($item->nilai,0,',','.') }}</td>



                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <div class="btn-group">

                                                        <button href="#data" id="detail_f" data-id="{{ $item->id_lokasi }}" class="btn btn-default border border-secondary btn-sm detail"  type="button"data-bs-toggle="offcanvas"  aria-controls="offcanvasExample">DETAIL</button>


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
                    {{-- <img id="gambar_d" src="" height="500px" width="550px" class="rounded mx-auto d-block" alt="..."><br> --}}

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

@endsection
