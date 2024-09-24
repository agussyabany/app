@extends('diklat.layouts.main')

@section('title', 'ASET | Data Divisi')

@section('content')

<div class="main-header">
    <div class="container-fluid">

                <!-- Tambahkan link SweetAlert di sini -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

        <!-- Tombol Tambah Data Divisi -->
        <button type="button" id="tambahDataDivisi" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-default">
            TAMBAH DATA BAGIAN
        </button>

        <h3>Data Bagian</h3>

        <!-- Tabel Data Divisi -->
        <table id="divisiTable" class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width: 50%;">Bagian</th>
                    <th style="width: 50%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bagian as $key => $d)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $d->bagian }}</td>
                    <td>
                        <div class="margin">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Aksi</button>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <!-- Tombol Edit -->
                                    <button class="dropdown-item btn btn-light edit_bagian" 
                                            type="button" 
                                            data-id="{{ $d->id }}" 
                                            data-bagian="{{ $d->bagian }}" 
                                            data-toggle="modal" 
                                            data-target="#Modal_bagian">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <!-- Tombol Hapus -->
                                    <form action="/bagian/{{ $d->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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

        <!-- Modal untuk Edit Data Bagian -->
        <div class="modal fade" id="Modal_bagian" tabindex="-1" role="dialog" aria-labelledby="Modal_bagianLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judulmodal">Edit Data Bagian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST" action="">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputNamaBagian">Nama Bagian</label>
                                <input type="text" class="form-control" id="inputNamaBagian" name="bagian" value="">
                            </div>
                            <button type="submit" class="btn btn-success float-right">Save</button>
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk Tambah Data Bagian -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content bg-default">
                    <div class="modal-header">
                        <h4 class="modal-title" id="judulmodalbagian">TAMBAH DATA BAGIAN</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="divisiForm" method="POST" action="/bagian.save">
                            @csrf
                            <div class="form-group">
                                <label for="inputNama">BAGIAN</label>
                                <input type="text" class="form-control" id="inputNama" name="nama_bagian" placeholder="Nama Bagian" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success float-right">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
