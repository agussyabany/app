



    <header class="bg-primary text-white kop" style="background-image: url('{{asset('assets/img/head.jpg')}}');background-size: cover; background-repeat: no-repeat; width:100%;">
    <div class="row">
        <div class="col-2  collapse-horizontal in"   id="collapseWidthExample">
            <div class="text-center float-start">

                <a href=""><img src="{{asset('assets/img/pdam.png')}}" width="35px" width="35px" alt="" class="rounded-circle mt-1 mb-1 ms-1 "></a>
                SISTEM INFORMASI ASET
            </div>
        </div>
        <div class="col">
            <div class="float-start">
                <button class="btn mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                    <i class="fa-solid fa-list"></i>
                </button>
            </div>
            <div class="text-center float-end">
                {{Auth::user()->name}}
                <a href="#" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="<div class='container text-center border rounded'>
                    <p>{{Auth::user()->name}}<br>{{ $jabat }} Divisi {{ $divisi }}<br>{{Auth::user()->nip}}<br><a href='{{route('logout')}}' class='btn btn-danger btn-sm'>LOGOUT</a></p>
            </div>" data-bs-html="true" data-bs-title="USER ACCOUNT"><img src="https://app.perumdamtirtakencana.id/assets/img/user/{{ Auth::user()->img }}" width="40px" width="40px" alt="" class="rounded-circle mt-1 me-1 border border-default" ></a>
            </div>

        </div>
    </div>
    </header>
    <div class="row">
        <div class="col-0.5"></div>
        {{-- main-nav --}}
    <nav class="col-2 nav" id="collapseWidthExample">
        <div class=" collapse-horizontal in"  id="collapseWidthExample"   style="background-image: url('{{asset('assets/img/side3.jpg')}}');background-size: cover; background-repeat: no-repeat;font-family: 'Bahnschrift-SemiLight', sans-serif; width:100%; height:100%">
            <div class="container">
                <ul class="nav flex-column" id="menuTabs">
                    <li class="nav-item">
                        <a type="button"  class="hoverable text-center btn" style="width: 100%" data-tab-target="tab1" href="/aset"><STRONG>DASHBOARD</STRONG></a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-center disabled"><strong>DATA MASTER</strong></span>
                    </li>
                    <li class="nav-item pb-1">
                        <a type="button" id="barang" class="hoverable text-start btn" style="width: 100%" data-tab-target="tab1" href="/barangs"><i class="fa-solid fa-boxes-stacked"></i>&nbsp;Barang</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="hoverable text-start btn" id="departemen" style="width: 100%" data-tab-target="tab2" href="/depts"><i class="fa-solid fa-user-tie"></i>&nbsp;Departemen</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="hoverable text-start btn" id="divisi" style="width: 100%" href="/divs"><i class="fa-solid fa-users"></i>&nbsp;Divisi</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="hoverable text-start btn" id="ruang" style="width: 100%" href="/ruangs"><i class="fa-solid fa-door-open"></i>&nbsp;Ruangan</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="hoverable text-start btn" id="sdm" style="width: 100%" href="/sumber"><i class="fa-solid fa-people-arrows"></i>&nbsp;SDM Pendukung</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="hoverable text-start btn" id="lokasi" style="width: 100%" href="/lokasis"><i class="fa-solid fa-location-dot"></i>&nbsp;Lokasi</a>
                    </li>
                    
                    <li class="nav-item">
                        <a type="button" class="hoverable text-start btn" id="bahan" style="width: 100%" href="/bahans"><i class="fa-solid fa-atom"></i>&nbsp;Bahan</a>
                    </li>
                    <li class="nav-item">
                      <a type="button" class="hoverable text-start btn" id="aktiva" style="width: 100%" href="/aktivas"><i class="fa-solid fa-barcode"></i>&nbsp;Kode Aktiva</a>
                  </li>


                      <li class="nav-item">
                          <span class="nav-link text-center disabled"><strong>K . I . B</strong></span>
                      </li>
                      <li class="nav-item">
                          <a type="button" href="/tanah"  class="hoverable text-start btn" id="tanah" style="width: 100%"><i class="fa-regular fa-map"></i>&nbsp;TANAH</a>
                      </li>
                      <li class="nav-item">
                          <a type="button"  class="hoverable text-start btn" id="mesin" style="width: 100%" href="/mesin"><i class="fa-solid fa-gears"></i>&nbsp;PERALATAN DAN MESIN</a>
                      </li>
                      <li class="nav-item">
                          <a type="button"  class="hoverable text-start btn" id="gedung" style="width: 100%" href="/gedung"><i class="fa-solid fa-building"></i>&nbsp;GEDUNG DAN BANGUNAN</a>
                      </li>
                      <li class="nav-item">
                          <a type="button" href="/kibd"  class="hoverable text-start btn" id="jalan" style="width: 100%"><i class="fa-solid fa-road"></i>&nbsp;JALAN , IRIGASI DAN JARINGAN</a>
                      </li>
                      <li class="nav-item">
                          <a type="button" href="/kibe"  class="hoverable text-start btn" id="tetap" style="width: 100%"><i class="fa-solid fa-marker"></i>&nbsp;ASET TETAP LAINNYA</a>
                      </li>
                      <li class="nav-item">
                          <a type="button" href="/kibf"  class="hoverable text-start btn" id="konstruksi" style="width: 100%"><i class="fa-solid fa-trowel-bricks"></i>&nbsp;KONSTRUKSI</a>
                      </li>
                      <li class="nav-item">
                          <a type="button"  class="hoverable text-start btn" id="kir" style="width: 100%" href="/kir"><i class="fa-solid fa-list"></i>&nbsp;K.I.R</a>
                      </li>


                      <li class="nav-item">
                          <span class="nav-link text-center disabled"><strong>NILAI ASET</strong></span>
                      </li>

                      <li class="nav-item">
                          <a type="button"  class="hoverable text-start btn" id="nilai" style="width: 100%" href="/nilai"><i class="fa-solid fa-heart"></i>&nbsp;NILAI ASET</a>
                      </li>

                      <li class="nav-item">
                        <span class="nav-link text-center disabled"><strong>-----ARSIP-----</strong></span>
                    </li>

                    <li class="nav-item">
                        <a type="button" class="hoverable text-start btn" href="/arsip" id="dokumen"  style="width: 100%"><i class="fa-regular fa-folder-open"></i>&nbsp;Arsip</a>
                    </li>

                      <li class="nav-item">
                        <span class="nav-link text-center disabled"><strong>SETTING</strong></span>
                    </li>

                    <li class="nav-item">
                        <a type="button"  class="hoverable text-start btn" id="nilai" style="width: 100%" href="/logout"><i class="fa-solid fa-sign-out"></i>&nbsp;LOGOUT</a>
                    </li>


                    </ul>
                </div>

      </div>
  </nav>








