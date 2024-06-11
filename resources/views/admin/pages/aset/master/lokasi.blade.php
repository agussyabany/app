@extends('admin.layouts.main')

@section('title')
  ASET | BARANG
@endsection

@section('content')

    <div class="col container" id="barang_tab" role="tabpanel" aria-labelledby="tab_div">
        <br>

                <div class="container card">
                    <div class="card-header">DATA LOKASI <div class="position-absolute top-0 end-0">
                      <button class="btn  btn-primary"  data-bs-toggle="modal" data-bs-target="#modal_lokasi"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                    </div>
                            <div class="card-body">
                                <table class="table table-striped" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>LOKASI</th>
                                            <th>ALAMAT</th>
                                            <th>WILAYAH</th>
                                            <th>LATITUDE</th>
                                            <th>LONGITUDE</th>
                                            <th>GAMBAR</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lokasi as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->wilayah }}</td>
                                                <td>{{ $item->lat }}</td>
                                                <td>{{ $item->long }}</td>
                                                <td><img height="80px" width="80px" src="http://app.perumdamtirtakencana.id/assets/img/lokasi/{{$item->img }}" alt=""></td>
                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <!-- Add action buttons/links here -->
                                                    <button type="button" class="btn btn-outline-primary btn-sm" id="edit_lokasi" data-id="{{ $item->idLok }}"><i class="fas fa-edit"></i></button>
                                                    <form action="" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form>
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
    <div class="modal"  id="modal_lokasi">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal">TAMBAH LOKASI</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_bodyLG">
            <form action="/lok.save" id="form_lokasi" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id">
                <input type="text" class="form-control" id="nama_lokasi" name="lokasi" placeholder="Nama Lokasi"><br>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"><br>
                <select class="select2 form-control" name="wil" id="wil" style="width:100%;">
                    <option>- WILAYAH -</option>
                    <option value="1">UNIT PELAYANAN WILAYAH I</option>
                    <option value="2">UNIT PELAYANAN WILAYAH II</option>
                    <option value="3">UNIT PELAYANAN WILAYAH III</option>
                    <option value="4">UNIT PELAYANAN WILAYAH IV</option>
                </select><br><br>
                <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude"><br>
                <input type="text" class="form-control" id="long" name="long" placeholder="Longitude"><br>
                <input type="file" class="form-control" id="img" name="img"><br>


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
