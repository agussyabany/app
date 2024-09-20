@extends('diklat.layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="main-header">
  <div class="container-fluid">
  <button type="button" id="tambahDataPemateri" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-primary">
TAMBAH DATA PEMATER
</button>
  <h3 class="text-center">Data Pemateri</h3>
  
  <table class="table table-striped" id="myTable">
    <thead>
      <tr>
        <th>NO</th>
        <th>NAMA PEMATERI</th>
        <th>JABATAN</th>
        <th>AKSI</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Dra. Hj UMMI NISA</td>
        <td>Asisten Manajer Pengawas Administrasi dan Keuangan</td>
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
      <tr>
        <td>1</td>
        <td>Dra. Hj UMMI NISA</td>
        <td>Asisten Manajer Pengawas Administrasi dan Keuangan</td>
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
      </tr>
      <td>
    
      <!-- Tambahkan baris lainnya sesuai kebutuhan -->
    </tbody>
  </table>
  
  
        <div class="modal fade" id="modalPemateri">
      <div class="modal-dialog">
      <div class="modal-content bg-primary">
      <div class="modal-header">
      <h4 class="modal-title" id="judulModalPemateri">TAMBAH DATA PEMATERI</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
            <class="card-body">
            <div class="form-group">
            <label for="exampleSelect" style="width: 500%;"> NAMA PEMATERI</label>
            <input type="email" class="form-control" id="exampleInputnama" placeholder="Nama Pegawai " fdprocessedid="b2vh2j">
            </div>

            <div class="form-group">
            </div>
            <div class="form-group" style="margin-top: 15px;">
    <label for="asal" style="width: 100%;">ASAL</label>
    <textarea class="form-control" id="asal" placeholder="Jelaskan" style="width: 100%;" rows="3"></textarea>
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
