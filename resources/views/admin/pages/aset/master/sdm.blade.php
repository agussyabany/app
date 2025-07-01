@extends('admin.layouts.main')

@section('title')
  ASET | BARANG
@endsection

@section('content')

    <div class="col container" id="barang_tab" role="tabpanel" aria-labelledby="tab_div">
        <br>

                <div class="container card">
                    <div class="card-header">DATA SDM PENDUKUNG<div class="position-absolute top-0 end-0">
                      <button class="btn  btn-primary" id="add_sdm"  data-bs-toggle="modal" data-bs-target="#modal_sdm"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                    </div>
                            <div class="card-body">
                                <table class="table table-striped" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>NIPP</th>
                                            <th>JABATAN</th>
                                            <th>DIVISI</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sdm as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->nama_sdm }}</td>
                                                <td>{{ $item->nip }}</td>
                                                <td>{{ $item->jabat }}</td>
                                                <td>{{ $item->nama_div }}</td>
                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <button type="button" class="btn btn-outline-primary btn-sm" id="edit_sdm" data-id="{{ $item->idSdm }}"><i class="fas fa-edit"></i></button>

                                                        <a href="#" id="del_sdm" data-id="{{ $item->idSdm }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>

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
    <div class="modal"  id="modal_sdm">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal">TAMBAH SDM</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
              <form action="/sdm.save" id="form_sdm" method="post">
                @csrf
                <input type="hidden" id="id" name="id" value="">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama SDM"><br>
                <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP"><br>
                <input type="hidden" id="jabatVal" name="jabat">
                <select  class="select2 form-control" id="jabatOpt" style="width:100%;">
                  <option value="1">MANAJER</option>
                  <option value="2">ASISTEN MANAJER</option>
                <select>
                <br><br>
                <input type="hidden" name="div" id="divVal">
                <select  class="select2 form-control" id="select_div" style="width:100%;">
                  @foreach ($div as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_div }}</option>
                    @endforeach
                <select>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="tombol btn btn-primary" id="">SUBMIT</button>
            </form>
            </div>
          </div>
        </div>
      </div>


      {{-- MODAL KIB --}}
      <div class="modal"  id="lgModal">
        <div class="modal-dialog  modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modalLG">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">

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
