@extends('diklat.layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="main-header">
  <div class="container-fluid">
  <button type="button" id="tambahDataPelatihan" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalDataDiklat">
TAMBAH DATA PELATIHAN
</button>
  <h3 class="text-center">DATA PELATIHAN</h3>
  <table class="table table-striped " id="myTable">
    <thead>
      <tr>
        <th>NO</th>
        <th>JUDUL PELATIHAN</th>
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>


    
      <tr>
        <td>2</td>
        <td>1967.1987.2.131</td>
        <td> <p class="mb-1">Pilih Aksi:</p>
            <div class="margin">
            <div class="btn-group">
            <button type="button" class="btn btn-default">Action</button>
            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
            <button id="edit_datadiklat"class="dropdown-item btn btn-light" type="button"><i class="fas fa-edit" ></i>Edit</button>
            <button class="dropdown-item btn btn-success" type="button"><i class="fas fa-trash"></i>Hapus</button>
            </div>
            </div></td>
      </tr>
      <tr>
      
        <td>1</td>
        <td>1967.1987.2.131</td>
        <td> <p class="mb-1">Pilih Aksi:</p>
            <div class="margin">
            <div class="btn-group">
            <button type="button" class="btn btn-default">Action</button>
            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
            <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
            <button id="edit_datadiklat"class="dropdown-item btn btn-light" type="button"><i class="fas fa-edit" ></i>Edit</button>
            <button class="dropdown-item btn btn-success" type="button"><i class="fas fa-trash"></i>Hapus</button>
            </div>
            </div></td>
      </tr>
     
      <!-- Tambahkan baris lainnya sesuai kebutuhan -->
    </tbody>
  </table>
  
        <div class="modal fade" id="modalDataDiklat">
      <div class="modal-dialog">
      <div class="modal-content bg-default">
      <div class="modal-header">
      <h4 class="modal-title" id="judulModalDataDiklat" >TAMBAH DATA PENELITIAN</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
    <div class="card-body">
        <div class="form-group">
            <label for="judulPenelitian">JUDUL PENELITIAN</label>
            <input type="text" class="form-control" id="judulPenelitian" placeholder="Judul Penelitian">
        </div>
        <div class="form-group">
            <label for="waktuPenelitian1">WAKTU PELAKSAAN PELATIHAN </label>
            <input type="text" class="form-control" id="waktuPenelitian1" placeholder="Waktu Pelaksanaan">
        </div>
        <div class="form-group">
            <label for="waktuPenelitian2">FASILITATOR</label>
            <input type="text" class="form-control" id="fasilitator" placeholder="Fasilitator">
        </div>
        <div class="form-group">
            <label for="waktuPenelitian2">lOKASI PELAKSAAN</label>
            <input type="text" class="form-control" id="lokasipelaksaan" placeholder="Lokasi Pelaksanaa">
        </div>
    </div>
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
