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
      <!-- Info boxes -->
      <div class="row"> 
      <div class="col text-center border border-primary rounded"><br>
        <h3>SAMBUNGAN LANGGANAN BARU</h3>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-4 col-8">
              <div class="description-block border-right border-left">
               
                <h3 class="text-success"><strong>{{ number_format($totals['tahun'], 0) }}</strong></h3>
                <span class="description-text">TAHUN 2024</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-8">
              <div class="description-block border-right">
               
                <h3 class="text-warning"><strong>{{ number_format($totals['bulan'], 0) }}</strong></h3>
                <span class="description-text">NOVEMBER 2024</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-8">
              <div class="description-block border-right">
                
                <h3 class="text-primary"><strong>{{ number_format($totals['harian'], 0) }}</strong></h3>
                <span class="description-text">HARI INI {{$today}}</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            
          </div>
          <!-- /.row -->
        </div>
        <!-- GARIK -->
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header"><h3>BERDASAR GOLONGAN TAHUN 2024</h3></div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-header"><h3>BERDASAR WILAYAH TAHUN 2024</h3></div>
              <div class="card-body">
                <canvas id="barChartUnit" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
          
        </div>

        <!-- TABEL -->
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header border-transparent">
                <p class=" text-center"><h3>JUMLAH BERDASARKAN GOLONGAN TAHUN 2024</h3></p>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0" id="data-table">
                    <thead>
                    <tr>
                      <th>GOLONGAN</th>
                      <th>JUMLAH</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
              </div>
              <!-- /.card-footer -->
            </div>

          </div>
          <div class="col">
            <div class="card">
              <div class="card-header"><h3>JUMLAH BERDASARKAN WILAYAH TAHUN 2024</h3></div>
              <div class="card-body">
                <table class="table m-0" id="unitTable">
                  <thead>
                  <tr>
                    <th>WILAYAH</th>
                    <th>JUMLAH</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div><br>
            </div>
            <div class="card">
              <div class="card-body">
                <img src="{{ asset('assets/img/pdam.png') }}" height="150px" width="600px">
              </div>
            </div>
          </div>
        </div>
        
      </div>
      
      <div class="col text-center border border-primary"><br>
        <h3>JUMLAH PELANGGAN</h3>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              

              <div class="info-box-content">
                <span class="info-box-text">WILAYAH</span>
                <h4 id="unitI" class="info-box-number">-</h4>
              </div>
              <span  class="info-box-icon bg-info elevation-1">I</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              

              <div class="info-box-content">
                <span class="info-box-text">WILAYAH</span>
                <h4 id="unitII" class="info-box-number">-</h4>
              </div>
              <span class="info-box-icon bg-danger elevation-1">II</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              

              <div class="info-box-content">
                <span class="info-box-text">WILAYAH</span>
                <h4 id="unitIII" class="info-box-number">-</h4>
              </div>
              <span  class="info-box-icon bg-success elevation-1">III</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              

              <div class="info-box-content">
                <span class="info-box-text">WILAYAH</span>
                <h4 id="unitIV" class="info-box-number">-</h4>
              </div>
              <span class="info-box-icon bg-warning elevation-1">IV</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        

        <!-- STACKED BAR CHART -->
        <div class="card">
          <div class="card-header">
            
          </div>

          <div class="card-body">
            <div class="chart">
              <canvas id="DonutPlgn" style="min-height: 550px; height:  550px; max-height:  550px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="row"> 
          <div class="col text-center"><br>
            <h3>STATUS PELANGGAN</h3>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-4 col-8">
                  <div class="description-block border-right border-left">
                    <span class="description-text">AKTIF</span>
                    <h3 class="text-success"><strong>{{ number_format($totals['tahun'] + 177303 - (4145 + 1417), 0) }}</strong></h3>
                    <!-- JUMLAH SAMBUNGAN AKHIR TAHUN + JUMLAH PELANGGAN  -->
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-8">
                  <div class="description-block border-right">
                    <span class="description-text">TIDAK AKTIF</span>
                    <h3 class="text-warning"><strong>4.145</strong></h3>
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-8">
                  <div class="description-block border-right">
                    <span class="description-text">PUTUS SEMENTARA</span>
                    <h3 class="text-danger"><strong>1.417</strong></h3>
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
              </div>
              <!-- /.row -->
            </div>
      </div>
    </div><br><br>

    <div class="">
      <!-- small box -->
      <div class="small-box bg-secondary">
        <div class="inner">
          <h3>TOTAL JUMLAH PELANGGAN</h3>

          <h3>{{ number_format($totals['tahun'] + 177303, 0) }}<h3>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer"></a>
      </div>
    </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">PENDAPATAN {{ $minSatu}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 id="pBody"></h3>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
  function refreshPage() {
        location.reload(); // Menyegarkan halaman
    }

     // Setel interval untuk menyegarkan halaman setiap 5 menit (300000 milidetik)
     setTimeout(refreshPage, 300000);
</script>

@endsection
