@extends('diklat.layouts.main')

@section('title')
  ASET | DASHBOARD
@endsection

@section('content')
<div class="main-header">
  <div class="container-fluid">
    <button type="button" id="tambahDataPegawai" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalPegawai">
      TAMBAH DATA PEGAWAI
    </button>
    <h3 class="text">Data Pegawai</h3>
    <table class="table table-striped" id="myTable">
      <thead>
        <tr>
          <th>No</th>
          <th>FOTO</th>
          <th>NAMA PEGAWAI</th>
          <th>NIP</th>
          <th>DIVISI</th>
          <th>JABATAN</th>
          <th>AKSI</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pegawai as $p)
        <tr>
          <td>{{ $no++ }}</td>
          <td> @if($p->img)
            <img src="{{ asset($p->img) }}" alt="Foto Pegawai" width="50">
            @else
                <span>Tidak ada foto</span>
            @endif
          </td>
          <td>{{ $p->nama_pegawai }}</td>
          <td>{{ $p->nip }}</td>
          <td>{{ $p->jabatan }}</td>
          <td>{{ $p->bagian }}</td>
          <td>
            <p class="mb-1">Pilih Aksi:</p>
            <div class="margin">
              <div class="btn-group">
                <button type="button" class="btn btn-default">Action</button>
                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                  <!-- Tombol Edit dengan data-* untuk mengirim data ke modal -->
                  <a  id="edit_pegawai" class="dropdown-item btn btn-light edit_pegawai" 
                     data-id="{{ $p->id }}" >
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <!-- Tombol Hapus (belum diimplementasikan) -->
                  <form action="{{ route('pegawai.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="dropdown-item btn btn-light delete_pegawai" data-id="{{ $p->id }}" type="submit">
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
   <!-- Modal Tambah/Edit Pegawai -->
<div class="modal fade" id="modalPegawai" tabindex="-1" role="dialog" aria-labelledby="judulModalPegawai" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="judulModalPegawai">Tambah/Edit Data Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="card-body">
          <form id="formPegawai" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="idPegawai" name="id">

            <!-- Nama Pegawai -->
            <div class="form-group">
              <label for="namaPegawai">NAMA PEGAWAI</label>
              <input type="text" class="form-control" id="namaPegawai" name="nama_pegawai" placeholder="Nama Pegawai">
            </div>

            <!-- NIP -->
            <div class="form-group">
              <label for="nipPegawai">NIP</label>
              <input type="text" class="form-control" id="nipPegawai" name="nip" placeholder="Masukkan NIP">
            </div>

            <!-- Jabatan -->
            <div class="form-group">
              <label for="jabatanPegawai">JABATAN</label>
              <select class="form-select select2-class" id="jabatanPegawai" name="jabatan">
                <option value="" disabled selected>Pilih Jabatan</option>
                @foreach($jabatan as $j)
                  <option value="{{ $j->jabat }}">{{ $j->jabat }}</option>
                @endforeach
              </select>
            </div>

            <!-- Divisi/Departemen -->
            <div class="form-group">
              <label for="bagianPegawai">DIVISI/DEPARTEMEN</label>
              <select class="form-select select2-class" id="bagianPegawai" name="bagian">
                <option value="" disabled selected>Pilih divisi/departemen</option>
                @foreach($departemen as $d)
                  <option value="{{ $d->kode_dep }}">{{ $d->kode_dep }}</option>
                @endforeach
              </select>
            </div>

            <!-- Gambar -->
            <div class="form-group">
              <label for="img">Upload Gambar</label>
              <input type="file" class="form-control-file" id="img" name="upload">
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-success float-right">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

    
@endsection
