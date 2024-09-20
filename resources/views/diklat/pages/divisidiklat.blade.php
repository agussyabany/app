@extends('diklat.layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="main-header">
  <div class="container-fluid">
  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-primary">
TAMBAH DIVISI DIKLAT
</button>
  <h3 class="text-center">DIVISI DIKLAT</h3>
  
  <table class="table table-striped " id="myTable">
    <thead>
      <tr>
        <th>NO</th>
        <th>NAMA DIVISI</th>
        <th>aksi</th>
      
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>1967.1987.2.131</td>
        <td>
        <p class="mb-1">Pilih Aksi:</p>
            <div class="margin">
            <div class="btn-group">
            <button type="button" class="btn btn-default">Action</button>
            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
            <button id="edit_pegawai"class="dropdown-item btn btn-light" type="button"><i class="fas fa-edit" ></i>Edit</button>
            <button class="dropdown-item btn btn-success" type="button"><i class="fas fa-trash"></i>Hapus</button>
            </div>
            </div>
        </td>
      </tr>
      <tr>
      
        <td>1</td>
        <td>1967.1987.2.131</td>
        <td>
        <p class="mb-1">Pilih Aksi:</p>
            <div class="margin">
            <div class="btn-group">
            <button type="button" class="btn btn-default">Action</button>
            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
            <button id="edit_pegawai"class="dropdown-item btn btn-light" type="button"><i class="fas fa-edit" ></i>Edit</button>
            <button class="dropdown-item btn btn-success" type="button"><i class="fas fa-trash"></i>Hapus</button>
            </div>
            </div>
        </td>
      </tr>
     
      <!-- Tambahkan baris lainnya sesuai kebutuhan -->
    </tbody>
  </table>
  
        <div class="modal fade" id="modal-primary">
      <div class="modal-dialog">
      <div class="modal-content bg-default">
      <div class="modal-header">
      <h4 class="modal-title" id="judulmodaldivisidiklat">TAMBAH DATA PEGAWAI</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
            <div>
            <label for="selectdivisi"> DIVISI</label>
                <!-- <select id="exampleSelect" style="width: 100%;"> -->
                <select class="form-select select2" id="selectdivisi" name="divisi">
                <option value=" disabled selected">Pilih Divisi</option>
                
                @foreach($divisi as $d)
                    <option value="{{ $d->id }}">{{ $d->nama_div }}</option>
                @endforeach
                </select>
            </div>

<div class="card-footer">
<button type="submit" class="btn btn-primary float-right" fdprocessedid="3jkx3">Submit</button>
</div>
</form>
      
 
</div>

</div>
</div>
  </div>
 
</div>
@endsection
