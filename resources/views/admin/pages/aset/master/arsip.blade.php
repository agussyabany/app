@extends('admin.layouts.main')

@section('title')
  ASET | ARSIP
@endsection

@section('content')

    <div class="col container" id="barang_tab" role="tabpanel" aria-labelledby="tab_div">
        <br>

                <div class="container card">
                    <div class="card-header">DATA ARSIP <div class="position-absolute top-0 end-0">
                      <button class="btn  btn-primary"  data-bs-toggle="modal" data-bs-target="#modal_aktiva"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                    </div>
                            <div class="card-body">
                                <table class="table table-striped" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA GEDUNG</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($arsip as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><a data-bs-toggle="offcanvas"  aria-controls="offcanvasExample" href="#data" style="text-decoration: none;" id="data_arsip" data-id="{{ $item->gedung}}"><strong>Gedung {{ $item->gedung }}</strong></a></td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>








                {{-- MODAL MASTER --}}
    <div class="modal"  id="modal_aktiva">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal">TAMBAH AKTIVA</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="tombol btn btn-primary" id="">SUBMIT</button>
            </div>
          </div>
        </div>
      </div>
      {{-- MODAL KIB --}}
      <div class="modal"  id="modal_isi">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalLG">DETAIL ARSIP</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
                <table class="table table-striped" id="tbl_isi_arsip">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>REGISTER</th>
                            <th>KONDISI</th>
                            <th>REKANAN</th>
                            <th>JUDUL</th>
                            <th>NILAI</th>
                            <th>RETENSI</th>
                            <th>KETERANGAN</th>

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
                          <table class="table table-striped border" id="tbl">
                            <thead>
                                <tr>
                                    <th>NAMA GEDUNG</th>
                                    <th>NO FILLING</th>
                                    <th>NO RAK</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td id="td_gedung"></td>
                                <td id="td_fil"> </td>
                                <td id="td_rak"></td>
                              </tr>
                            </tbody>
                         </table>
                            <div class="card">
                                <div class="card-header" id="card-header"></div>
                                <div class="card-body" id="card-body">
                                  <table class="table table-striped" id="tbl_detail_arsip">
                                    <thead>
                                        <tr>
                                            <th>NO BARIS</th>
                                            <th>NAMA DOKUMEN</th>
                                            <th>BULAN</th>
                                            <th>KODE DOKUMEN</th>
                                            <th>TAHUN</th>
                                            <th>TAMBAH DOKUMEN</th>

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
