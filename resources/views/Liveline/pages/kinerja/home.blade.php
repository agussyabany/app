@extends('Liveline.layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="content-wrapper">
  
  <div class="container">

    <div class="row">
      <div class="col-12">
        <!-- jQuery Knob -->
        <div class="card">
          <div class="card-header">
            <h6 class="text-center">
              PERUMDAM TIRTA KENCANA KOTA SAMARINDA
            </h6>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col">
                <input type="text" class="knob" value="30" data-width="90" data-height="90" data-fgColor="#3c8dbc">

                <div class="knob-label text-center">NRW</div>
              </div>
              <!-- ./col -->
              <div class="col">
                <input type="text" class="knob" value="70" data-width="90" data-height="90" data-fgColor="#f56954">
                  <div class="knob-label text-center">CAKUPAN</div>
              </div>
              <!-- ./col -->
              <div class="col">
                <input type="text" class="knob" value="-80" data-min="-150" data-max="150" data-width="90"
                       data-height="90" data-fgColor="#00a65a">

                <div class="knob-label text-center">LABA</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="text-center">KATEGORI</th>
          <th class="text-center">KINERJA</th>
         
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">Sehat</td>
          <td class="text-center">Baik</td>
        </tr>
        
      </tbody>
    </table>


    <a href="/keuangan"><div class="info-box  bg-primary">
      <span class="info-box-icon"><i class="fas fa-money-bill"></i></span>

      <div class="info-box-content">
        <span class=""><h3>KEUANGAN</h3></span>
        <span class="info-box-number"></span>
      </div>

      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
      <!-- /.info-box-content -->
    </div></a>
    <a href="/operasional"><div class="info-box bg-success">
      <span class="info-box-icon"><i class="fas fa-cogs"></i></span>

      <div class="info-box-content">
        <span class=""><h3>OPERASIONAL</h3></span>
        <span class=""></span>
      </div>
      <!-- /.info-box-content -->
      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
    </div></a>
    <a href="/pelayanan"><div class="info-box bg-info">
      <span class="info-box-icon"><i class="fas fa-handshake"></i></span>

      <div class="info-box-content">
        <span class=""><h3>PELAYANAN</h3></span>
        <span class=""></span>
      </div>
      <!-- /.info-box-content -->
      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
    </div></a>
    <a href="/sdmkin"><div class="info-box  bg-warning">
      <span class="info-box-icon"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class=""><h3>SDM</h3></span>
        <span class=""></span>
      </div>
      <!-- /.info-box-content -->
      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
  </div></a>

  <a href="#"><div class="info-box  bg-danger">
      <span class="info-box-icon"><i class="fas fa-edit"></i></span>

      <div class="info-box-content">
        <span class=""><h3>ADMINISTRASI</h3></span>
        <span class=""></span>
      </div>
      <!-- /.info-box-content -->
      <div class="info-box-text  mr-3 ml-2 mt-3"><h3 class="text-center"></h3></div>
  </div></a>
  
  <br>
  </div>
</div>
@endsection
