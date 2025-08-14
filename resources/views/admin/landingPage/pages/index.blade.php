@extends('admin.landingPage.layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')

<section class="slider">
    <div class="dark slider-style-two" id="camera_wrap_4">
        <div data-src="{{ asset('assets/landingpage/images/_MG_5019.JPG')}}">
            <div class="text-div fadeFromTop">
                <!-- <div class="slider-overlay"></div> -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12 pull-right">
                            <div class="slider-text row slider-text-one">
                                <h3 class="animated CustomfadeInRight">Selamat Datang Di</h3>
                                <h2 class="animated CustomfadeInRight delay1">Sistem Informasi Manajemen Aset</h2>
                                <h4 class="animated CustomfadeInRight delay2">PERUMDAM TIRTA KENCANA SAMARINDA</h4>
                                <!-- <a href="#" class="button animated CustomfadeInRight delay3">Purchase Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-src="{{ asset('assets/landingpage/images/_MG_5059.JPG')}}">
            <div class="text-div fadeFromTop">
                <!-- <div class="slider-overlay"></div> -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-xs-12 pull-right">
                            <div class="slider-text row">
                                <h3 class="animated CustomfadeInRight">Sebuah Sistem Informasi berbasis web</h3>
                                <h2 class="animated CustomfadeInRight delay1">Yang Mengelola </h2>
                                <h4 class="animated CustomfadeInRight delay2">Seleuruh Aset milik </h4>
                                <h3 class="animated CustomfadeInRight delay3">Perumdam Tirta Kencana Kota Samarinda</h3>
                                <!-- <a href="#" class="button animated CustomfadeInRight delay4">Purchase Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-src="{{ asset('assets/landingpage/images/_MG_4797.JPG')}}">
            <div class="text-div fadeFromTop">
                <!-- <div class="slider-overlay"></div> -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12 pull-right">
                            <div class="slider-text row slider-text-two">

                                <h2 class="animated fadeInRight delay1">Yang Meliputi </h2>
                                <p class="animated CustomfadeInRight delay2"><i class="fa fa-check"></i>TANAH</p>
                                <p class="animated CustomfadeInRight delay2"><i class="fa fa-check"></i> MESIN DAN PERALATAN</p>
                                <p class="animated CustomfadeInRight delay2"><i class="fa fa-check"></i> BANGUNAN</p>
                                <p class="animated CustomfadeInRight delay2"><i class="fa fa-check"></i> DAN ASET LAINNYA</p>
                                <!-- <a href="#" class="button animated CustomfadeInRight delay3">Purchase Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- #camera_wrap_3 -->
</section>

<section class="feature-section section">
    <div class="container " style="margin-left: 24%;">
        <div class="row">

            <div class="col-md-2 col-sm-6">
                <div class="single-feature text-center">
                    <img src="{{ asset('assets/landingpage/pic/tanah.png')}}" width="100px" height="100px" alt=""/>
                    <h3>TANAH</h3><br>
                    <h2 class="counter">{{ $tanah }}</h2><br>
                    <h4>Total Nilai Perolehan<br>Rp 14.904.112.922</h4>
                </div>
            </div>

            <div class="col-md-2 col-sm-6">
                <div class="text-center single-feature">
                    <img src="{{ asset('assets/landingpage/pic/mesin.png')}}" width="100px" height="100px" alt=""/>
                    <h3>PERALATAN DAN MESIN</h3>
                    <h2 class="counter">{{ $mesin }}</h2><br>
                    <h4>Total Nilai Perolehan<br>Rp  219.019.734.637 </h4>
                </div>
            </div>

            <div class="col-md-2 col-sm-6">
                <div class="text-center single-feature">
                    <img src="{{ asset('assets/landingpage/pic/gedung.png')}}" width="100px" height="100px" alt="" />
                    <h3>GEDUNG DAN BANGUNAN</h3>
                    <h2 class="counter">{{ $gedung }}</h2><br>
                    <h4>Total Nilai Perolehan<br>Rp  37.049.269.638</h4>
                </div>
            </div>

            <div class="col-md-2 col-sm-6">
                <div class="text-center single-feature">
                    <img src="{{ asset('assets/landingpage/pic/jaring.png')}}" width="100px" height="100px" alt="" />
                    <h3>IRIGASI DAN JARINGAN</h3>
                    <h2 class="counter"></h2><br>
                    <h4>Total Nilai Perolehan<br>Rp  657.756.918.610 </h4>
                </div>
            </div>

            <div class="col-md-2 col-sm-6">
                <div class="text-center single-feature">
                    <img src="{{ asset('assets/landingpage/pic/kir.png')}}" width="100px" height="100px" alt="" />
                    <h3 class="text-center">INVENTARIS/PERANGAKAT KANTOR</h3>
                    <h2 class="counter">{{ $kir }}</h2><br>
                    <h4>Total Nilai Perolehan<br>Rp  22.508.069.841</h4>
                </div>
            </div>
        </div><br><br><br><br><br>
        <div class="row">
            <div class="col-md-2 col-sm-6">
                    <div class="text-center">
                        <!-- <img src="" width="50px" height="50px" alt="" />
                        <h3>INI</h3>
                        <h3 class="counter">12345</h3><br>
                        <h4>Total Nilai Perolehan<br>Rp.123.456.789</h4> -->
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="text-center single-feature">
                        <img src="{{ asset('assets/landingpage/pic/lainnya.png')}}" width="100px" height="100px" alt="" />
                        <h3>ASET TETAP LAINNYA</h3>
                        <h2 class="counter"></h2><br>
                        <h4>Total Nilai Perolehan<br></h4>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="text-center single-feature">
                        <!-- <img src=""width="100px" height="100px" alt="" />
                        <h3>KONSTRUKSI DALAM PENGERJAAN</h3>
                        <h2 class="counter"></h2><br>
                        <h4>Total Nilai Perolehan<br>Rp </h4> -->
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="text-center single-feature">
                            <img src="{{ asset('assets/landingpage/pic/konstruksi.png')}}"width="100px" height="100px" alt="" />
                            <h3>KONSTRUKSI DALAM PENGERJAAN</h3>
                            <h2 class="counter"></h2><br>
                            <h4>Total Nilai Perolehan<br>Rp </h4>
                        </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="text-center single-feature">
                            <!-- <img src=""width="100px" height="100px" alt="" />
                            <h3>KONSTRUKSI DALAM PENGERJAAN</h3>
                            <h2 class="counter"></h2><br>
                            <h4>Total Nilai Perolehan<br>Rp </h4> -->
                        </div>
                </div>

        </div>



</section>
<section class="counter-section parallax" data-dir="down" id="counter-section">
    <div class="parallax-window">
        <div class="overlay">
            <div class="container">
                <div class="row text-center">

                        <div class="single-counter-box">
                            <h1>TOTAL NILAI  ASET</h1>
                            {{-- <span><h1>Rp 951.238.105.647</h1></span><span class="plus"></span> --}}
                            <span><h1>{{ number_format($total, 0, ".", ".") }}</h1></span><span class="plus"></span>
                            <h3></h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-section section">
    <div class="container">
    <div class="row">
            <div class="section-heading">
                <h2 class="section-title">DAFTAR NILAI ASET TETAP</h2>
                <p class="section-content"></p>
            </div>
        </div>
        <div class="row">
        <table class="table border border-primary rounded table-sm table-bordered table-responsive">
                <thead>
                <tr class="table-active">
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" rowspan="2">Nama Barang</th>
                    <th class="text-center">s/d</th>
                    <th class="text-center">Tambahan</th>
                    <th class="text-center">Harga Perolehan s/d Juni 2025</th>

                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th class="text-center">31/05/25</th>
                        <th class="text-center">30/06/25</th>
                        <th class="text-center"></th>
                    </tr>



                    <tr>
                        <td class="text-center">1</th>
                        <td >TANAH DAN PENYEMPURNAAN TANAH (31.01)</th>
                        <td >{{ number_format($a, 2, ".", ".") }}</td>
                        <td >{{ number_format($aJuni, 0, ".", ".") }}</td>
                        <td >{{ number_format($aJuni + $a, 0, ".", ".") }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</th>
                        <td >INSTALASI PENGOLAHAN AIR</th>
                        <td >{{ number_format($b, 2, ".", ".") }}</td>
                        <td >{{ number_format($bJuni, 2, ".", ".") }}</td>
                        <td >{{ number_format($bJuni + $b, 2, ".", ".") }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">3</th>
                        <td >INSTALASI SUMBER AIR</th>
                        <td >{{ number_format($c, 2, ".", ".") }}</td>
                        <td >{{ number_format($cJuni, 2, ".", ".") }}</td>
                        <td >{{ number_format($cJuni + $c, 2, ".", ".") }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">4</th>
                        <td >INSTALASI POMPA</th>
                            <td >{{ number_format($d, 2, ".", ".") }}</td>
                            <td >{{ number_format($dJuni, 2, ".", ".") }}</td>
                            <td >{{ number_format($dJuni + $d, 2, ".", ".") }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">5</th>
                        <td >BANGUNAN GEDUNG</th>
                            <td >{{ number_format($e, 2, ".", ".") }}</td>
                            <td >{{ number_format($eJuni, 2, ".", ".") }}</td>
                            <td >{{ number_format($eJuni + $e, 2, ".", ".") }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">6</th>
                        <td >TRANSMISI DAN DISTIRBUSI</th>
                            <td >{{ number_format($f, 2, ".", ".") }}</td>
                            <td >{{ number_format($fJuni, 2, ".", ".") }}</td>
                            <td >{{ number_format($fJuni + $f, 2, ".", ".") }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">7</th>
                        <td >PERALATAN DAN PERLENGKAPAN</th>
                            <td >{{ number_format($g, 2, ".", ".") }}</td>
                            <td >{{ number_format($gJuni, 2, ".", ".") }}</td>
                            <td >{{ number_format($gJuni + $g, 2, ".", ".") }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">8</th>
                        <td >INVENTARIS DAN PERABOT KANTOR</th>
                        <<td >{{ number_format($h, 2, ".", ".") }}</td>
                        <td >{{ number_format($hJuni, 2, ".", ".") }}</td>
                        <td >{{ number_format($hJuni + $h, 2, ".", ".") }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">9</th>
                        <td >KENDARAAN DAN ANGKUTAN</th>
                            <td >{{ number_format($i, 2, ".", ".") }}</td>
                            <td >{{ number_format($iJuni, 2, ".", ".") }}</td>
                            <td >{{ number_format($iJuni + $i, 2, ".", ".") }}</td>
                    </tr>

                    <tr class="table-active">
                        <th colspan="2" class="text-center">TOTAL</th>
                        <th>{{ number_format($total2025, 2, ".", ".") }}</th>
                        <th>{{ number_format($juni2025, 2, ".", ".") }}</th>
                        <th>{{ number_format($total2025 + $juni2025, 2, ".", ".") }}</th>
                    </tr>
                 </tbody>
            </table>
        </div>

    </div>
</section>
<!-- Feature Section -->
<!-- project Section -->
<section class="project-section section">
    <div class="container">
        <div class="row">
            <div class="section-heading">
                <h2 class="section-title">DATA GRAFIS</h2>
                <p class="section-content"></p>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-6 col-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> PERTUMBUHAN NILAI ASET 1980 s/d 2023</h3>

                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="">
                                <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                                </div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        </div>
                </div>

                <div class="col-lg-6 col-9">
                <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">JUMLAH ASET</h3>

                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="">
                                <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                                </div>
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                        </div>
                </div>

        </div>

    </div>
</section>

<section class="feature-section section">
    <div class="row">
        {{-- <button class="btn btn-default border border-secondary btn-sm detail" data-id="" type="button" data-bs-toggle="offcanvas"  aria-controls="offcanvasExample" href="#data" id="data_kir">DETAIL</button> --}}
            <div class="section-heading">
                <h2 class="section-title">DATA SEBARAN</h2>
                <p class="section-content"></p>
           </div>
    </div>
                <div class="container"><div id="map" style="width:100%;height:800px;"></div></div>
            </div>
</section>

        <div class="modal"  id="modalLok">
            <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="judul_modalLG">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_bodyLG">

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="tombol btn btn-primary" id="">SUBMIT</button>
                </div>
            </div>
            </div>
        </div>

        <div class="offcanvas offcanvas-start" style=" width: 90%;"  tabindex="-1" id="data" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header" id="kepala">

            </div>
            <div class="offcanvas-body large" id="canvas_body_tampil">
                <div class="row">
                    <div class="col-3 border border-primary rounded" id="canvas_tree">


                    </div>
                    <div class="col border border-primary rounded"><br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header" id="card-header"></div>
                                <div class="card-body" id="card-body">


                                </div>
                            </div><br>
                         </div>
                    </div>
                </div>
            </div>
          </div>

@endsection
