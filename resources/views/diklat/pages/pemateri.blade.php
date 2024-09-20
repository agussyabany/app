@extends('diklat.layouts.main')

@section('title', 'ASET | Data Pemateri')

@section('content')
<<<<<<< HEAD
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
 
=======

<div class="main-header">
    <div class="container-fluid">

          <!-- Tambahkan link SweetAlert di sini -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>



        <!-- Tombol Tambah Data Pemateri -->
        <button type="button" id="tambahDataPemateri" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-default">
            TAMBAH DATA PEMATERI
        </button>

        <h3>Data Pemateri</h3>

        <!-- Tabel Data Pemateri -->
        <table id="pemateriTable" class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 50%;">Nama Pemateri</th>
                    <th style="width: 50%;">Asal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemateri as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->nama_pemateri }}</td>
                    <td>{{ $p->asal }}</td>
                    <td>
                        <div class="margin">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Aksi</button>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <!-- Tombol Edit -->
                                    <button class="dropdown-item btn btn-light edit_pemateri" 
                                            type="button" 
                                            data-id="{{ $p->id }}" 
                                            data-pemateri="{{ $p->nama_pemateri }}" 
                                            data-asal="{{ $p->asal }}" 
                                            data-toggle="modal" 
                                            data-target="#Modal_pemateri">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <!-- Tombol Hapus -->
                                    <form action="/pemateri/{{ $p->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item btn btn-danger" type="submit">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Notifikasi SweetAlert -->
        @if(session('success'))
            <script>
                swal("BERHASIL", "{{ session('success') }}", "success");
            </script>
        @endif

        <!-- Modal untuk Edit Data Pemateri -->
        <div class="modal fade" id="Modal_pemateri" tabindex="-1" role="dialog" aria-labelledby="Modal_pemateriLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulmodal">Edit Data Pemateri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST" action="">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="inputNamaPemateri">Nama Pemateri</label>
                                <input type="text" class="form-control" id="inputNamaPemateri" name="pemateri" value="">
                            </div>
                            <div class="form-group">
                                <label for="inputAsalPemateri">Asal</label>
                                <input type="text" class="form-control" id="inputAsalPemateri" name="asal" value="">
                            </div>
                            <button type="submit" class="btn btn-outline-light float-right">Save</button>
                            <button type="button" class="btn btn-outline-light float-right" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk Tambah Data Pemateri -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title" id="judulmodal">TAMBAH DATA PEMATERI</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="pemateriForm" method="POST" action="/pemateri.save">
                            @csrf
                            <div class="form-group">
                                <label for="inputNama">PEMATERI</label>
                                <input type="text" class="form-control" id="inputNama" name="nama_pemateri" placeholder="Nama Pemateri" required>
                            </div>
                            <div class="form-group">
                                <label for="inputAsal">ASAL</label>
                                <input type="text" class="form-control" id="inputAsal" name="asal" placeholder="Asal Pemateri" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

>>>>>>> 687e8359e353a48f9554105fd17b64f2bc1eb285
@endsection
