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
            
            <li class="breadcrumb-item active"><h3>PELANGGAN</h3></li>
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
      <div class="col text-center border border-primary"><br>
        <h5>SAMBUNGAN LANGGANAN BARU</h5>
        <div class="card-footer">
          <div class="row">
            <div class="col-sm-4 col-8">
              <div class="description-block border-right border-left">
               
                <h3 class="text-success"><strong>35,210.43</strong></h3>
                <span class="description-text">TAHUN 2024</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-8">
              <div class="description-block border-right">
               
                <h3 class="text-warning"><strong>10,390.90</strong></h3>
                <span class="description-text">AGUSTUS 2024</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 col-8">
              <div class="description-block border-right">
                
                <h3 class="text-primary"><strong>24,813.53</strong></h3>
                <span class="description-text">HARI INI 16 - 8 - 2024</span>
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
              <div class="card-header">SL Berdasar Golongan Tahun 2024</div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-header">SL Perbulan Tahun 2024</div>
              <div class="card-body">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- TABEL -->
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Jumlah Sambungan Langganan Berdasarkan Golongan</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>GOLONGAN</th>
                  <th>TAHUN 2024</th>
                  <th>AGUSTUS 2024</th>
                  <th>HARI INI</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td><span class="badge badge-warning">SOSIAL</SPAN></td>
                  <td>1234</td>
                  <td>34345</td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">34</div>
                  </td>
                </tr>
                <tr>
                  <td><span class="badge badge-danger">DASAR I</SPAN></td>
                  <td>5678</td>
                  <td>123124</td>
                  <td>
                    <div class="sparkbar" data-color="#f39c12" data-height="20">24</div>
                  </td>
                </tr>
                <tr>
                  <td><span class="badge badge-success">DASAR II</span></td>
                  <td>901112</td>
                  <td>34112</td>
                  <td>
                    <div class="sparkbar" data-color="#f56954" data-height="20">67</div>
                  </td>
                </tr>
                <tr>
                  <td><span class="badge badge-primary">DASAR III</span></td>
                  <td>34134</td>
                  <td>124241</td>
                  <td>
                    <div class="sparkbar" data-color="#00c0ef" data-height="20">123</div>
                  </td>
                </tr>
                <tr>
                  <td><span class="badge badge-secondary">DASAR IV</span></td>
                  <td>1232</td>
                  <td>124124</td>
                  <td>
                    <div class="sparkbar" data-color="#f39c12" data-height="20">67</div>
                  </td>
                </tr>
                <tr>
                  <td><span class="badge badge-info">PENUH I</span></td>
                  <td>123124</td>
                  <td>564567</td>
                  <td>
                    <div class="sparkbar" data-color="#f56954" data-height="20">12</div>
                  </td>
                </tr>
                <tr>
                  <td><span class="badge badge-warning">PENUH II</span></td>
                  <td>23121</td>
                  <td>464567</td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">89</div>
                  </td>
                </tr>
                <tr>
                  <td><span class="badge badge-danger">PENUH III</span></td>
                  <td>34341</td>
                  <td>4575</td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">345</div>
                  </td>
                </tr>
                <tr>
                  <td><span class="badge badge-success">PENUH IV</span></td>
                  <td>435345</td>
                  <td>456456</td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">77</div>
                  </td>
                </tr>
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
      
      <div class="col text-center border border-primary"><br>
        <h5>JUMLAH PELANGGAN</h5>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              

              <div class="info-box-content">
                <span class="info-box-text">WILAYAH</span>
                <span class="info-box-number">13.000</span>
              </div>
              <span class="info-box-icon bg-info elevation-1">I</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              

              <div class="info-box-content">
                <span class="info-box-text">WILAYAH</span>
                <span class="info-box-number">50.000</span>
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
                <span class="info-box-number">30.000</span>
              </div>
              <span class="info-box-icon bg-success elevation-1">III</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              

              <div class="info-box-content">
                <span class="info-box-text">WILAYAH</span>
                <span class="info-box-number">70.000</span>
              </div>
              <span class="info-box-icon bg-warning elevation-1">IV</span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>TOTAL JUMLAH PELANGGAN</h3>

              <h3>170.000<h3>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- STACKED BAR CHART -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">PENAMBAHAN PELANGGAN PERTAHUN</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="stackedBarChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="row"> 
          <div class="col text-center"><br>
            <h5>SATATUS PELANGGAN</h5>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-4 col-8">
                  <div class="description-block border-right border-left">
                    <span class="description-text">AKTIV</span>
                    <h3 class="text-success"><strong>35,210.43</strong></h3>
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-8">
                  <div class="description-block border-right">
                    <span class="description-text">TIDAK AKTIV</span>
                    <h3 class="text-warning"><strong>10,390.90</strong></h3>
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-8">
                  <div class="description-block border-right">
                    <span class="description-text">PUTUS SEGEL</span>
                    <h3 class="text-danger"><strong>24,813.53</strong></h3>
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
              </div>
              <!-- /.row -->
            </div>
      </div>
    </div>
      <!-- /.row -->
    </div><!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
