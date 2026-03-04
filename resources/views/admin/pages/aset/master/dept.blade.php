@extends('admin.layouts.main')

@section('title')
  ASET | BARANG
@endsection

@section('content')

    <div class="col container" id="barang_tab" role="tabpanel" aria-labelledby="tab_div">
        <br>

                <div class="container card">
                    <div class="card-header">DATA DEPARTEMEN <div class="position-absolute top-0 end-0">
                      <button class="btn  btn-primary"  data-bs-toggle="modal" data-bs-target="#modal_dep"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                    </div>
                            <div class="card-body">
                                <table class="table table-striped" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KODE DEPARTEMEN</th>
                                            <th>DEPARTEMEN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dept as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->kode_dep }}</td>
                                                <td>{{ $item->nama_dep }}</td>
                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <button type="button" data-id="{{ $item->id }}" id="edit_departemen" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></button>
                                                    <a href="#" id="del_dep" data-id="{{ $item->id}}" class="btn btn-outline-danger" data-confirm-delete="true"><i class="fas fa-trash"></i></a>
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
                <div class="modal fade" id="modal_dep" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="judul_modal">TAMBAH DEPARTEMEN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body" id="modal_bodyLG">
                        <form id="form_departemen" action="/dep.save" method="post">
                          @csrf
                          <input type="hidden" id="id" value="" name="id">
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Departemen"><br> <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Departemen">

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
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
