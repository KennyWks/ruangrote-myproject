@include('user.header')

<!-- Start Home Page Slider -->
<br>
<section id="page-top" style="margin-top: 80px;">
    <!-- Carousel -->
    <div id="main-slide" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#main-slide" data-slide-to="0" class="active"></li>
            <li data-target="#main-slide" data-slide-to="1"></li>
            <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <!--/ Indicators end-->

        <!-- Carousel inner -->
        <div class="carousel-inner">
            <div class="item active">
                <img class="img-responsive" src="images/header-bg-1.jpg" alt="slider">
                <div class="slider-content">
                    <div class="col-md-12 text-center">
                        <h1 class="animated3">
                            <span><strong>Ruang </strong>Rote</span>
                        </h1>
                        <p class="animated2">Sistem pendataan berkas desa berbasis website Rote Ndao</p>
                        <a href="#feature" class="page-scroll btn btn-primary animated1">Lanjutkan</a>
                    </div>
                </div>
            </div>
            <!--/ Carousel item end -->

            <div class="item" style="margin: top 120px;">
                <img class="img-responsive" src="images/header-back.png" alt="slider">

                <div class="slider-content">
                    <div class="col-md-12 text-center">
                        <h1 class="animated1">
                            <span>Welcome to <strong>Ruang Rote</strong></span>
                        </h1>
                        <p class="animated2">Generate a flood of new business with the<br> power of a digital media platform</p>
                        <a href="#feature" class="page-scroll btn btn-primary animated3">Read More</a>
                    </div>
                </div>
            </div>
            <!--/ Carousel item end -->

            <div class="item">
                <img class="img-responsive" src="images//galaxy.jpg" alt="slider">
                <div class="slider-content">
                    <div class="col-md-12 text-center">
                        <h1 class="animated2">
                            <span>The way of <strong>Success</strong></span>
                        </h1>
                        <p class="animated1">At vero eos et accusamus et iusto odio dignissimos<br> ducimus qui blanditiis praesentium voluptatum</p>
                        <a class="animated3 slider btn btn-primary btn-min-block" href="#">Get Now</a><a class="animated3 slider btn btn-default btn-min-block" href="#">Live Demo</a>

                    </div>
                </div>
            </div>
            <!--/ Carousel item end -->
        </div>
        <!-- Carousel inner end-->

        <!-- Controls -->
        <a class="left carousel-control" href="#main-slide" data-slide="prev">
            <span><i class="fa fa-angle-left"></i></span>
        </a>
        <a class="right carousel-control" href="#main-slide" data-slide="next">
            <span><i class="fa fa-angle-right"></i></span>
        </a>
    </div>
    <!-- /carousel -->
</section>
<!-- End Home Page Slider -->



<!-- Start Feature Section -->
<section id="feature" class="feature-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="feature">
                    <i class="fa fa-bullhorn"></i>
                    <div class="feature-content">
                        <h3>PENGADUAN</h3>
                        <div class="alert alert-secondary" role="alert">
                            @foreach ($pengaduan as $aduan)
                            <div class="row">
                                <div class="col-sm-8 text-left"><strong><?php echo strtoupper($aduan->subjek)?></strong></div>
                            </div>
                            <hr>
                            "{{$aduan->isi}}"
                            <br><br><span style="float: right"><strong>-{{$aduan->nama}} </strong>/ <?php echo substr($aduan->created_at, 0, 10)?></span><br>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="feature">
                    <i class="fa fa-comment"></i>
                    <div class="feature-content">
                        <h4>Pengaduan</h4>
                        <h4>*MINIMAL 3 TERATAS*</h4>
                        <div class="alert alert-secondary" role="alert">
                            @foreach ($pengaduan as $aduan)
                            <div class="row">
                                <div class="col-sm-8 text-left"><strong><?php echo strtoupper($aduan->subjek)?></strong></div>
                            </div>
                            <hr>
                            "{{$aduan->isi}}"
                            <br><br><span style="float: right"><strong>-{{$aduan->nama}} </strong>/ <?php echo substr($aduan->created_at, 0, 10)?></span><br>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->

    </div><!-- /.container -->
</section>
<!-- End Feature Section -->



<!-- Start About Us Section -->
<section id="about-us" class="about-us-section-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title text-center">
                    <h3>Pengumuman</h3>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="welcome-section text-center">
                    <h4>Judul Pengumuman</h4>
                    <div class="border"></div>
                    <p>*isi* Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="welcome-section text-center">
                    <h4>Judul Pengumuman</h4>
                    <div class="border"></div>
                    <p>*isi* Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="welcome-section text-center">
                    <h4>Judul Pengumuman</h4>
                    <div class="border"></div>
                    <p>*isi* Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
                </div>
            </div>

        </div><!-- /.row -->

        <!-- /.Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav><!-- /.Tutup Pagination -->


    </div><!-- /.container -->
</section>
<!-- End About Us Section -->



<!-- Start Feature Section -->
<section id="service" class="services-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Ruang ASA</h3> <br>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-2">
                    <div class="media">
                        <div class="pull-left">
                            <i class="fa fa-magic"></i>
                            <div class="border"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Web Design</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-2">
                    <div class="media">
                        <div class="pull-left">
                            <i class="fa fa-css3"></i>
                            <div class="border"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">HTML5 & CSS3</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-2">
                    <div class="media">
                        <div class="pull-left">
                            <i class="fa fa-wordpress"></i>
                            <div class="border"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Wordpress Theme</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-2">
                    <div class="media">
                        <div class="pull-left">
                            <i class="fa fa-plug"></i>
                            <div class="border"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Wordpress Plugin</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-2">
                    <div class="media">
                        <div class="pull-left">
                            <i class="fa fa-joomla"></i>
                            <div class="border"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Joomla Template</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-2">
                    <div class="media">
                        <div class="pull-left">
                            <i class="fa fa-cube"></i>
                            <div class="border"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Joomla Extension</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->

        </div><!-- /.row -->

    </div><!-- /.container -->
</section>
<!-- End Feature Section -->




<!-- Start Pricing Table Section -->
<div id="pricing" class="pricing-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Profil Desa</h3>
                        <p class="white-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <form>
            <div class="form-row align-items-center">
                <div class="col-sm-3 my-1">
                    <label class="sr-only" for="inlineFormInputName">Name</label>
                    <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="pricing">

                <div class="col-md-12">
                    <div class="pricing-table">
                        <div class="plan-name">
                            <h3>Nama Desa 1</h3>
                        </div>
                        <div class="plan-list text-left">
                            <ul>
                                <li>Nama Desa:</li>
                                <li>Kecamatan:</li>
                                <li>Kabupaten/Kota:</li>
                                <li>Provinsi:</li>
                                <li>Kontak:</li>
                                <li>Alamat:</li>
                            </ul>
                        </div>
                        <div class="plan-signup">
                            <a href="" class="btn-system btn-small">Informasi Lain</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="pricing-table">
                        <div class="plan-name">
                            <h3>Nama Desa</h3>
                        </div>
                        <div class="plan-list text-left">
                            <ul>
                                <li>Nama Desa:</li>
                                <li>Kecamatan:</li>
                                <li>Kabupaten/Kota:</li>
                                <li>Provinsi:</li>
                                <li>Kontak:</li>
                                <li>Alamat:</li>
                            </ul>
                        </div>
                        <div class="plan-signup">
                            <a href="#" class="btn-system btn-small">Informasi Lain</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="pricing-table">
                        <div class="plan-name">
                            <h3>Nama Desa</h3>
                        </div>
                        <div class="plan-list text-left">
                            <ul>
                                <li>Nama Desa:</li>
                                <li>Kecamatan:</li>
                                <li>Kabupaten/Kota:</li>
                                <li>Provinsi:</li>
                                <li>Kontak:</li>
                                <li>Alamat:</li>
                            </ul>
                        </div>
                        <div class="plan-signup">
                            <a href="#" class="btn-system btn-small">Informasi Lain</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="pricing-table">
                        <div class="plan-name">
                            <h3>Nama Desa</h3>
                        </div>
                        <div class="plan-list text-left">
                            <ul>
                                <li>Nama Desa:</li>
                                <li>Kecamatan:</li>
                                <li>Kabupaten/Kota:</li>
                                <li>Provinsi:</li>
                                <li>Kontak:</li>
                                <li>Alamat:</li>
                            </ul>
                        </div>
                        <div class="plan-signup">
                            <a href="#" class="btn-system btn-small">Informasi Lain</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="pricing-table">
                        <div class="plan-name">
                            <h3>Nama Desa</h3>
                        </div>
                        <div class="plan-list text-left">
                            <ul>
                                <li>Nama Desa:</li>
                                <li>Kecamatan:</li>
                                <li>Kabupaten/Kota:</li>
                                <li>Provinsi:</li>
                                <li>Kontak:</li>
                                <li>Alamat:</li>
                            </ul>
                        </div>
                        <div class="plan-signup">
                            <a href="#" class="btn-system btn-small">Informasi Lain</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="pricing-table">
                        <div class="plan-name">
                            <h3>Nama Desa</h3>
                        </div>
                        <div class="plan-list text-left">
                            <ul>
                                <li>Nama Desa:</li>
                                <li>Kecamatan:</li>
                                <li>Kabupaten/Kota:</li>
                                <li>Provinsi:</li>
                                <li>Kontak:</li>
                                <li>Alamat:</li>
                            </ul>
                        </div>
                        <div class="plan-signup">
                            <a href="#" class="btn-system btn-small">Informasi Lain</a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
<!-- End Pricing Table Section -->




@include('user.footer')