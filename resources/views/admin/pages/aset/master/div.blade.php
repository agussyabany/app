@extends('admin.layouts.main')

@section('title')
  ASET | BARANG
@endsection

@section('content')

    <div class="col container" id="barang_tab" role="tabpanel" aria-labelledby="tab_div">
        <br>

                <div class="container card">
                    <div class="card-header">DATA DIVISI <div class="position-absolute top-0 end-0">
                      <button class="btn  btn-primary"  data-bs-toggle="modal" data-bs-target="#modal_div"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                    </div>
                            <div class="card-body">
                                <table class="table table-striped" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KODE DIVISI</th>
                                            <th>DIVSI</th>
                                            <th>DEPERATEMEN</th>
                                            <th>AKSI</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($div as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->kode_div }}</td>
                                                <td>{{ $item->nama_div }}</td>
                                                <td>{{ $item->kode_dep }}</td>
                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <button type="button" class="btn btn-outline-primary btn-sm" id="edit_divisi" data-id="{{ $item->idDiv }}"><i class="fas fa-edit"></i></button>
                                                    <a href="/div.hapus/{{ $item->idDiv }}" class="btn btn-outline-danger" data-confirm-delete="true"><i class="fas fa-trash"></i></a>
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
    <div class="modal"  id="modal_div">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal">TAMBAH DIVISI</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
              <form action="/div.save" id="form_div" method="post">
                @csrf
                <input type="hidden" id="id" name="id" value="">
                <select name="dep"  id="dep_select" class="select2 form-control" style="width:100%;">
                  <option value="">-DEPARTEMEN-</option>
                  @foreach ($dep as $items)
                      <option value="{{ $items->id }}">{{ $items->kode_dep }}</option>
                  @endforeach
                </select><br><br>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Divisi"><br>
                <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Divisi">
              
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
