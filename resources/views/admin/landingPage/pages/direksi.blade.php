@php
use App\Models\Aset\Divisi;
@endphp

@extends('admin.landingPage.layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')
<div class="section portfolio-page-one">
    <div class="section-heading">
                <h2 class="section-title">{{ $judul }}</h2>
                <p class="section-content"></p>
            </div>
    <div class="container">
        <div class="row">
            <div class="portfolio-item">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="single-portfolio">
                            <div class="single-portfolio-inner">
                                <!-- <img src="images/portfolio-one.png" alt="" /> -->
                                <div class="round-overlay"></div>
                                <a class="fancybox" href="images/portfolio-one-big.jpg">
                                    <div class="light-box-icon">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- del -->
                <div class="col-sm-4">
                    <div class="row">
                        <div class="single-portfolio">
                            <div class="single-portfolio-inner">
                                <img src="http://127.0.0.1:8000/assets/landingpage/images/{{ $ruang }}" alt="" />
                                <div class="round-overlay"></div>
                                <a class="kir" data-toggle="modal" id="" data-target="#modalKIBA" href="#">
                                    <div class="light-box-icon">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><br>
                    <div class="single-team-member">
                        <div class="member-info text-center">
                            <h3>{{ $nRuang }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="row">
                        <div class="single-portfolio">
                            <div class="single-portfolio-inner">
                                <!-- <img src="images/portfolio-three.png" alt="" /> -->
                                <div class="round-overlay"></div>
                                <a class="fancybox" href="images/portfolio-three-big.jpg">
                                    <div class="light-box-icon">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- portofolio1 -->
        </div>
        <div class="row">
            <div class="portfolio-item">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="single-portfolio">
                            <div class="single-portfolio-inner">
                                <img src="http://127.0.0.1:8000/assets/landingpage/images/{{ $loby }}" alt="" />
                                <div class="round-overlay"></div>
                                <a class="kir" data-toggle="modal" id="" data-target="#modalKIBA" href="#">
                                    <div class="light-box-icon">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><br>
                    <div class="single-team-member">
                        <div class="member-info text-center">
                            <h3>{{ $nLoby }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="single-portfolio">
                            <div class="single-portfolio-inner">
                                <img src="http://127.0.0.1:8000/assets/landingpage/images/{{ $sekre }}" alt="" />
                                <div class="round-overlay"></div>
                                <a class="kir" data-toggle="modal" id="" data-target="#modalKIBA" href="#">
                                    <div class="light-box-icon">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><br>
                    <div class="single-team-member">
                        <div class="member-info text-center">
                            <h3>{{ $nSekre }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="single-portfolio">
                            <div class="single-portfolio-inner">
                                <img src="http://127.0.0.1:8000/assets/landingpage/images/{{ $rapat }}" alt="" />
                                <div class="round-overlay"></div>
                                <a class="kir" data-toggle="modal" id="" data-target="#modalKIBA" href="#">
                                    <div class="light-box-icon">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><br>
                    <div class="single-team-member">
                        <div class="member-info text-center">
                            <h3>{{ $nRapat }}</h3>
                        </div>
                    </div>
                </div>


            </div>
            <!-- portofolio1 -->
        </div>
    </div>
</div>

<section class="offer-section section">
    <div class="container">
        <div class="row">
            <div class="section-heading">
                <h2 class="section-title">DEPARTEMEN</h2>
            </div>
        </div>
        <div class="row">
            <div class="ofer-items">


                @foreach ( $dept as $item )



                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-offer-item row">
                        <div class="offer-icon">
                            <div class="offer-icon-animate">
                                <img src="http://127.0.0.1:8000/assets/landingpage/images/icon/{{ $item->img }}" width="50px" height="50px" alt="" />
                            </div>
                        </div>
                        <div class="">
                            <h2><a href="" class="kirDEP" data-toggle="modal" id="" data-target="#modalDEP"  style="text-decoration:none"></a>{{ $item->kode_dep }}</h2>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown active">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Divisi</span></a>
                                    <ul class="dropdown-menu">
                                        @foreach(Divisi::select('nama_div')
                                            ->where('id_dep', $item->id)
                                            ->get() as $divisi)
                                                <li><a href="#" class="kirDIV" data-toggle="modal" id="" data-target="#modalDIV"  style="text-decoration:none">{{ $divisi->nama_div }}</a></li>

                                        @endforeach
                                    </ul>



                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

       @endforeach




                <!-- del -->

            </div>
        </div>
    </div>
</section>


@endsection
