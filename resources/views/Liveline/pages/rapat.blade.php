@extends('Liveline.layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-center"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            
            <li class="breadcrumb-item active"><h1>{{$tglIndo}}</h1><h1 id="digitalClock">PELANGGAN</h1></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <h1 class="text-center">AGENDA RUANG RAPAT</h1>

      <div class="card border border-primary border-radius">
        <div class="card-header">
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-xl"><strong>+</strong></button>
        </div>

    <div class="card-body">
        <table class="table table-bordered" id="tbl">
            <thead>
                <tr>
                    <th style="width: 40px">NO</th>
                    <th class="text-center">AGENDA RAPAT</th>
                    <th class="text-center">PESERTA</th>
                    <th class="text-center">PUKUL</th>
                    <th class="text-center">TEMPAT</th>
                </tr>
            </thead>
                <tbody>
                @foreach($rapat as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $item->agenda}}</td>
                                <td>{{ $item->peserta}}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl)->translatedFormat('l, d F Y H:i') }}</td>
                                <td>{{ $item->tempat}}</td>
                            </tr>
                @endforeach  
                
                </tbody>
            </table>
        </div>
    </div>
      
    <!-- </div>
  </section> -->
  </div>
</div>

    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">DATA RAPAT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
            <form action="/rapat.save" method="POST">
                @csrf
                <textarea name="agenda" id=""  class="form-control" required>-</textarea><br>
                <input type="text" name="peserta" class="form-control" placeholder="PESERTA" required><br>
                
                <div class="row">
                    <div class="col">
                        <input type="datetime-local" id="appointment" name="tgl" class="form-control" required>
                    </div>
                    <div class="col">
                        <SELECT class="form-control" name="tempat" required>
                           <option value="RUANG RAPAT UTAMA">RUANG RAPAT UTAMA</option>
                           <option value="RUANG RAPAT DIREKTUR UTAMA">RUANG RAPAT DIREKTUR UTAMA</option>
                           <option value="RUANG RAPAT DIREKTUR TEKNIK">RUANG RAPAT DIREKTUR TEKNIK</option>
                           <option value="RUANG RAPAT DIREKTUR PELAYANAN">RUANG RAPAT DIREKTUR PELAYANAN</option>
                           <option value="RUANG RAPAT DIREKTUR UMUM">RUANG RAPAT DIREKTUR UMUM</option>
                        </SELECT>
                    </div>
                </div><br>
                

                <div class="card border border-primary"> 
                    <div class="card-body">
                    <table class="table table-bordered" id="tbl">
                        <thead>
                            <tr>
                                <th style="width: 40px">NO</th>
                                <th class="text-center">AGENDA RAPAT</th>
                                <th class="text-center">PESERTA</th>
                                <th class="text-center">PUKUL</th>
                                <th class="text-center">TEMPAT</th>
                                <th class="text-center">act</th>
                            </tr>
                        </thead>
                            <tbody>
                            @foreach($rapat as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->agenda }}</td>
                                <td>{{ $item->peserta }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $item->tempat }}</td>
                                <td class="text-center">
                                    <a href="#" id="edit" class="btn btn-sm btn-outline-warning"><i class="fas fa-edit"></i></a> |
                                    <a href="#" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                
            
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </form>
        </div>
    </div>
@endsection
