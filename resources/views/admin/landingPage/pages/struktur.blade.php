@extends('admin.landingPage.layouts.main')

@section('title')
  ASET | DASHBAORAD
@endsection

@section('content')

        <section class="section team-section team-section-two team-member-page">
            <div class="section-heading">
                <h2 class="section-title">DIREKSI PERUMDAM TIRTA KENCANA KOTA SAMARINDA </h2>
                <p class="section-content"></p>
            </div>
        <div class="container">
        <div class="row">
            <div class="all-team-members row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="img/dirtek.jpg" width="100px" height="500px" alt="" />
                            <div class="round-overlay">	</div>
                            <div class="member-social-link col-md-10 text-end">
                                <a href="#" class="" aria-hidden="true"><h5 class="text-end">--</h5></a>
                            </div>
                        </div>
                        <!-- <div class="">
                            <span class="plus-stick"></span>
                            <span class="minus-stick"></span>
                        </div> -->
                    </div>
                    <div class="single-team-member">
                        <div class="member-info text-center">
                                <h3><a href="index.php?dash=dirtek">Direktur Bidang Teknik</a></h3>
                        </div>

                    </div>

                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="{{ asset('assets/landingpage/images/dirut.jpeg')}}" width="100px" height="500px" alt="" />
                            <div class="round-overlay">	</div>
                            <div class="member-social-link col-md-10 text-end">
                                <a href="#" class="" aria-hidden="true"><h5 class="text-end">NOR WAHID HASYIM,ST., MM</h5></a>
                            </div>
                        </div>
                        <!-- <div class="">
                            <span class="plus-stick"></span>
                            <span class="minus-stick"></span>
                        </div> -->
                    </div>
                    <div class="single-team-member">
                        <div class="member-info text-center">
                                <h3><a href="direksi/dirut">Direktur Utama</a></h3>
                        </div>

                    </div>

                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-team-member">
                        <div class="member-image">
                            <img src="{{ asset('assets/landingpage/images/dirum.jpeg')}}" width="100px" height="500px" alt="" />
                            <div class="round-overlay">	</div>
                            <div class="member-social-link col-md-10 text-end">
                                <a href="#" class="" aria-hidden="true"><h5 class="text-end">YUSFIAN NOOR,SE</h5></a>
                            </div>
                        </div>
                        <!-- <div class="">
                            <span class="plus-stick"></span>
                            <span class="minus-stick"></span>
                        </div> -->
                    </div>
                    <div class="single-team-member">
                        <div class="member-info text-center">
                                <h3><a href="direksi/dirum">Direktur Bidang Administrasi Dan Keuangan</a></h3>
                        </div>

                    </div>

                </div>
            </div>
         </div>
        </div>
    </section>



@endsection
