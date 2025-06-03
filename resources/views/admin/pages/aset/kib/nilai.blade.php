@extends('admin.layouts.main')

@section('title')
  ASET | BARANG
@endsection

@section('content')

    <div class="col container" id="barang_tab" role="tabpanel" aria-labelledby="tab_div">
        <br>

                <div class="container card">
                    <div class="card-header">DATA NILAI <div class="position-absolute top-0 end-0">
                        <button class="btn  btn-primary" id="tambah_barang" data-bs-toggle="modal" data-bs-target="#tambahNilai"><i class="fa-solid fa-file-circle-plus"></i></button>
                </div>
                    </div>
                            <div class="card-body">
                                {{-- <table class="table table-striped" id="tbl">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NO VOUCHER</th>
                                            <th>TGL VOUCHER</th>
                                            <th>AKTIVA</th>
                                            <th>TAHUN</th>
                                            <th>NILAI</th>
                                            <th>URAI</th>
                                            <th>GOLONGAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($nilai as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->no_voucher }}</td>
                                                <td>{{ $item->tgl_voucher }}</td>
                                                <td>{{ $item->aktiva }}</td>
                                                <td>{{ $item->tahun }}</td>
                                                <td>{{ $item->nilai }}</td>
                                                <td>{{ $item->urai }}</td>
                                                <td>{{ $item->kib }}</td>

                                                <td>
                                                    <!-- Add action buttons/links here -->
                                                    <div class="btn-group">
                                                        <button class="btn btn-default border border-secondary btn-sm detail" data-id="' + item.id_tanah + '"type="button">DETAIL</button>
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
                                </table> --}}

                                <table class="table table-striped" id="tbl_sside">
                                  <thead>
                                      <tr>
                                          <th>NO</th>
                                          <th>NO VOUCHER</th>
                                          <th>TGL VOUCHER</th>
                                          <th>AKTIVA</th>
                                          <th>TAHUN</th>
                                          <th>NILAI</th>
                                          <th>URAI</th>
                                          <th>GOLONGAN</th>
                                          <th>AKSI</th>
                                      </tr>
                                  </thead>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>








                {{-- MODAL MASTER --}}
    <div class="modal"  id="tambahNilai">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul_modal">Tambah Nilai</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_body">
              <form action="nilai.save" id="form_div" method="post">
                @csrf
                <div class="row">

                  <div class="col">
                    <input type="text" class="form-control" name="no_voucher" id="no_voucher" placeholder="Nomer Voucher" required>
                  </div>

                  <div class="col">
                    <input type="date" class="form-control"  name="tgl_voucher" id="tgl_voucher" required>
                  </div>
                  <div class="col">
                    <select   class="select2 form-control" style="width:100%;" name="id_aktiva" id="id_aktiva" required>
                      <option value="">-AKTIVA-</option>
                      @foreach ($aktiva as $item )
                       <option value="{{$item->id}}">{{$item->kode}}|{{$item->aktiva}}</option>
                        
                      @endforeach
                    </select>
                  </div>
                </div><br>
                
                <div class="row">
                  <div class="col">
                    <select    class="select2 form-control" style="width:100%;" name="id_lokasi" id="id_lokasi" required>
                      <option value="">-LOKASI-</option>
                      @foreach ($lok as $item )
                        <option value="{{$item->id}}">{{$item->lokasi}}</option>
                        
                      @endforeach
                    </select>
                  </div>
                  <div class="col">
                     <select   class="select2 form-control" style="width:100%;" name="dep" id="dep" required>
                      <option value="">-DEPARTEMEN-</option>
                     @foreach ($dep as $item)
                       <option value="{{$item->id}}">{{$item->kode_dep}}</option>
                     @endforeach
                    </select>
                  </div>
                  <div class="col">
                    <select class="select2 form-control" style="width:100%;" name="div" id="div" required>
                      <option value="">-DIVISI-</option>
                      @foreach ($div as $item )
                        <option value="{{$item->id}}">{{$item->nama_div}}</option>
                        
                      @endforeach
                    </select>
                  </div>
                </div><br>
                <div class="row">
                  <div class="col">
                    <select class="select2 form-control" style="width:100%;" name="cat" id="cat" required>
                      <option value="">-GOLONGAN-</option>
                     @foreach ($golongan as $item)
                       <option value="{{$item->id}}">{{$item->nama}}</option>
                     @endforeach
                    </select>
                  </div>

                  <div class="col">
                    <select class="select2 form-control" style="width:100%;" name="tahun" id="tahun" required>
                      <option value="">-TAHUN-</option>
                     @foreach ($tahunRange as $tahun)
                       <option value="{{$tahun}}">{{$tahun}}</option>
                     @endforeach
                    </select>
                  </div>

                  <div class="col">
                    <input type="text" class="form-control" name="nilai" id="nominal">
                  </div>

                </div><br>
                <textarea name="urai" id="urai" cols="30" rows="10" class="form-control bordered border-info" placeholder="URAIAN" required></textarea>

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
