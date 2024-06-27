 <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<!-- Header Section -->
		<!-- Preloader -->
		<div id="loading">
			<div id="loading-center">
				<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
				<div class="object" id="object_four"></div>
				<div class="object" id="object_five"></div>
				<div class="object" id="object_six"></div>
				<div class="object" id="object_seven"></div>
				<div class="object" id="object_eight"></div>
				<div class="object" id="object_big"></div>
				</div>
			</div>
		</div>
		<header>
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="logo">
							<a href="index.html"><img src="{{ asset('assets/landingpage/images/wideLogo.png')}}" alt="" width="200px" height="50px" /></a>
						</div>
						{{-- <div class="header-top-right">
							<ul>
								<li>
									<img src="images/header-top-clock.png" alt="" />
									<div class="header-top-contact">
										<h4>Tusday-Monday : 9:00-6:00</h4>
										<h5>Wednesday-Closed</h5>
									</div>
								</li>
								<li>
									<img src="images/header-top-telephone.png" alt="" />
									<div class="header-top-contact">
										<h4>+8801 923 970 212</h4>
										<h5>LabArtisan@gmail.Com</h5>
									</div>
								</li>
								<li>
									<img src="images/header-top-location.png" alt="" />
									<div class="header-top-contact">
										<h4>Sute07 Sahara Center</h4>
										<h5>New Chokoya Road, USA</h5>
									</div>
								</li>
							</ul>
						</div> --}}

					</div>
				</div>
			</div>
			<div class="mainmenu-area" id="sohag">
				<div class="container">
					<div class="row">
						<a href="index.html"></a>
						<div class="nav-menu">
						<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar-one bar-stick"></span>
								<span class="icon-bar-two bar-stick"></span>
								<span class="icon-bar-three bar-stick"></span>
							  </button>
							</div>

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							  <ul class="nav navbar-nav">
                            @guest
                            <li class="dropdown active">
                                <a href="/aset" class="dropdown-toggle"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a>
                              </li>
                              <li class="dropdown">
                                <a href="/struktur"><i class="fa fa-cubes" aria-hidden="true"></i><span>Struktur</span></a>
                              </li>
                            @else
                            <li class="dropdown active">
                                <a href="/aset" class="dropdown-toggle"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a>
                              </li>
                              <li class="dropdown">
                                <a href="/struktur"><i class="fa fa-cubes" aria-hidden="true"></i><span>Struktur</span></a>
                              </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-alt" aria-hidden="true"></i><span>KIB</span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="/tanah">Tanah</a></li>
                                  <li><a href="/gedung">Gedung Dan Bangunan</a></li>
                                  <li><a href="/mesin">Mesin dan Peralatan</a></li>
                                  <li><a href="/kibd">Jalan, Irigasi Dan Jaringan</a></li>
                                  <li><a href="/kibe">Aset Tetap Lainnya</a></li>
                                  <li><a href="/kibf">Konstruksi</a></li>
                                  <li><a href="/kir">KIR</a></li>
                                </ul>
                              </li>



                            @endguest

								{{-- <li class="dropdown active">
								  <a href="/aset" class="dropdown-toggle"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a>
                                </li>
								<li class="dropdown">
								  <a href="/struktur"><i class="fa fa-cubes" aria-hidden="true"></i><span>Struktur</span></a>
                                </li>
								<li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-alt" aria-hidden="true"></i><span>Pages</span></a>
								  <ul class="dropdown-menu">
									<li><a href="pricing_plan_page.html">Pricing Plan</a></li>
									<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>About</span></a>
									  <ul class="dropdown-menu">
										<li><a href="about_page_one.html">About Page One</a></li>
										<li><a href="about_page_two.html">About Page Two</a></li>
										<li><a href="about_page_three.html">About Page Three</a></li>
									  </ul>
									</li>
									<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Project Page</span></a>
									  <ul class="dropdown-menu">
										<li><a href="project_page_one.html">Project Page One</a></li>
										<li><a href="project_page_two.html">Project Page Two</a></li>
										<li><a href="project_single_page.html">Project Single Page</a></li>
									  </ul>
									</li>
									<li><a href="404.html">404 Page</a></li>
								  </ul>
								</li> --}}
								{{-- <li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bolt" aria-hidden="true"></i><span>Services</span></a>
								  <ul class="dropdown-menu">
									<li><a href="service_page_one.html">Services Page One</a></li>
									<li><a href="service_page_two.html">Services Page Two</a></li>
									<li><a href="service_page_three.html">Services Page Three</a></li>
									<li><a href="service_single_page.html">Services Single Page</a></li>
								  </ul>
								</li> --}}
								{{-- <li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i><span>Team</span></a>
								  <ul class="dropdown-menu">
									<li><a href="team_member_page_one.html">Team Page One</a></li>
									<li><a href="team_member_page_two.html">Team Page Two</a></li>
									<li><a href="team_member_page_three.html">Team Page Three</a></li>
									<li><a href="team_member_single_page.html">Team Single Page</a></li>
								  </ul>
								</li> --}}
								{{-- <li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-pencil" aria-hidden="true"></i><span>Blog</span></a>
								  <ul class="dropdown-menu">
									<li><a href="blog_page_one.html">Blog Page One</a></li>
									<li><a href="blog_page_two.html">Blog Page Two</a></li>
									<li><a href="blog_single_page.html">Blog Single Page</a></li>
								  </ul>
								</li> --}}
								{{-- <li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Shop</span></a>
								  <ul class="dropdown-menu">
									<li><a href="shop_page_one.html">Shop Page</a></li>
									<li><a href="shop_single_page.html">Product Details</a></li>
									<li><a href="shop_cart_page.html">Cart Page</a></li>
								  </ul>
								</li> --}}
								{{-- <li><a href="contact_page.html"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Contact</span></a></li> --}}
							  </ul>
							</div><!-- /.navbar-collapse -->
						</nav>
						</div>
						<div class="mainmenu-right">
							<div class="search-box">
								<i class="fa fa-search first_click" aria-hidden="true"></i>
								<i class="fa fa-times second_click" aria-hidden="true"></i>
							</div>
							<div class="chart-icon">
								<i class="fa fa-user" aria-hidden="true">

								</i>
								<ul class="cart-list">

									<li class="cart-select-total">
                                        <h3>Nama</h3>
                                        <span>{{ Auth::user()->name ?? 'User' }}</span>
                                        @guest
                                            <a href="/">Login</a>
                                        @else
                                            <a href="/logout">LOGOUT</a>
                                        @endguest
                                    </li>
								</ul>
							</div>
						</div>
						<div class="search-box-text">
							<form action="search">
								<input type="text" name="search" id="all-search" placeholder="Search Here"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header Section -->
		<!-- Slider Section -->
