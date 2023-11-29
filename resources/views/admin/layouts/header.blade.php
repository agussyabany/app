


<div class="container-fluid">

  <div class="row">
    <header class="bg-primary text-white">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
            <i class="fa-solid fa-list"></i>
          </button>
      <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light">
              {{-- <a class="navbar-brand" href="#">Sistem Informasi Aset</a> --}}
              
              <button class="navbar-toggler" type="button" >
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">

              </div>
              
          </nav>
      </div>
    </header>
    
    <nav class="col-md-3 col-lg-2">
        <div class="collapse collapse-horizontal"  id="collapseWidthExample"   style="background-image: url('{{asset('assets/img/side3.jpg')}}');background-size: cover; background-repeat: no-repeat;font-family: 'Bahnschrift-SemiLight', sans-serif; width:100%">
          <ul class="nav flex-column" id="menuTabs">
              <li class="nav-item">
                  <span class="nav-link text-center disabled"><strong>DATA MASTER</strong></span>
              </li>
              <li class="nav-item pb-1">
                  <a type="button" id="barang" class="hoverable" style="width: 100%" data-tab-target="tab1" href="#"><i class="fa-solid fa-boxes-stacked"></i>&nbsp;Barang</a>
              </li>
              <li class="nav-item">
                  <button type="button" class="hoverable" id="departemen" style="width: 100%" data-tab-target="tab2" href="#"><i class="fa-solid fa-user-tie"></i>&nbsp;Departemen</button>
              </li>
              <li class="nav-item">
                  <button type="button" class="hoverable" id="divisi" style="width: 100%"><i class="fa-solid fa-users"></i>&nbsp;Divisi</button>
              </li>
              <li class="nav-item">
                  <button type="button" class="hoverable" id="ruang" style="width: 100%"><i class="fa-solid fa-door-open"></i>&nbsp;Ruangan</button>
              </li>
              <li class="nav-item">
                  <button type="button" class="hoverable" id="sdm" style="width: 100%"><i class="fa-solid fa-people-arrows"></i>&nbsp;SDM Pendukung</button>
              </li>
              <li class="nav-item">
                  <button type="button" class="hoverable" id="lokasi" style="width: 100%"><i class="fa-solid fa-location-dot"></i>&nbsp;Lokasi</button>
              </li>
              <li class="nav-item">
                  <button type="button" class="hoverable" id="dokumen" style="width: 100%"><i class="fa-regular fa-folder-open"></i>&nbsp;Dokumen</button>
              </li>
              <li class="nav-item">
                  <button type="button" class="hoverable" id="bahan" style="width: 100%"><i class="fa-solid fa-atom"></i>&nbsp;Bahan</button>
              </li>


                <li class="nav-item">
                    <span class="nav-link text-center disabled"><strong>K . I . B</strong></span>
                </li>
                <li class="nav-item">
                    <a type="button"  class="hoverable" id="a" style="width: 100%"><i class="fa-regular fa-map"></i>&nbsp;TANAH</a>
                </li>
                <li class="nav-item">
                    <a type="button"  class="hoverable" id="b" style="width: 100%"><i class="fa-solid fa-gears"></i>&nbsp;PERALATAN DAN MESIN</a>
                </li>
                <li class="nav-item">
                    <a type="button"  class="hoverable" id="c" style="width: 100%"><i class="fa-solid fa-building"></i>&nbsp;GEDUNG DAN BANGUNAN</a>
                </li>
                <li class="nav-item">
                    <a type="button"  class="hoverable" id="d" style="width: 100%"><i class="fa-solid fa-road"></i>&nbsp;JALAN , IRIGASI DAN JARINGAN</a>
                </li>
                <li class="nav-item">
                    <a type="button"  class="hoverable" id="e" style="width: 100%"><i class="fa-solid fa-marker"></i>&nbsp;ASET TETAP LAINNYA</a>
                </li>
                <li class="nav-item">
                    <a type="button"  class="hoverable" id="f" style="width: 100%"><i class="fa-solid fa-trowel-bricks"></i>&nbsp;KONSTRUKSI</a>
                </li>
                <li class="nav-item">
                    <a type="button"  class="hoverable" id="kir" style="width: 100%"><i class="fa-solid fa-list"></i>&nbsp;K.I.R</a>
                </li>

                <li class="nav-item">
                    <span class="nav-link text-center disabled"><strong>PENGATURAN</strong></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">LOGOUT</a>
                </li>


          </ul>
      </div>
  </nav>
 







