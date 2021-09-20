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
                        <a class="animated3 slider btn btn-primary btn-min-block" href="#aduan">LANJUTKAN</a>
                    </div>
                </div>
            </div>
            <!--/ Carousel item end -->

            <div class="item">
                <img class="img-responsive" src="images/galaxy.jpg" alt="slider">
                <div class="slider-content">
                    <div class="col-md-12 text-center">
                        <h1 class="animated2">
                            <span><strong>AKSES</strong> DIMANAPUN KAPANPUN</span>
                        </h1>
                        <p class="animated3">Kemudahan dalam mengakses secara online kapanpun dan dimanapun berada
                        </p>
                        <a class="animated3 slider btn btn-primary btn-min-block" href="/list-desa">DAFTAR DESA</a>
                        <a class="animated3 slider btn btn-white btn-min-block" href="#form-aduan">PENGADUAN</a>
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
<section id="aduan" class="feature-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="feature">
                    <i class="fa fa-bullhorn"></i>
                    <div class="feature-content">
                        <h3>PENGADUAN</h3>
                        <a href="#" data-toggle="modal" data-target="#pengaduan">SELENGKAPNYA >></a><br>
                        <div class="alert alert-secondary" role="alert">
                            <?php
                            $i = 0;
                            ?>
                            @foreach ($pengaduan as $aduan)
                                <div class="row">
                                    <div class="col-sm-8 text-left"><strong><?php echo strtoupper($aduan->subjek); ?> |
                                        </strong>{{ $aduan->nama_desa }}</div>
                                </div>
                                <hr>
                                "{{ $aduan->isi }}"
                                <br><br><span style="float: right"><strong>-{{ $aduan->nama }} </strong>/
                                    <?php echo substr($aduan->created_at, 0, 10); ?></span><br>
                                <hr>
                                <?php
                                $i++;
                                ?>
                                @if ($i == 2)
                                @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12" id="pengumuman">
                <div class="feature">
                    <i class="fa fa-comment"></i>
                    <div class="feature-content">
                        <h3>Pengumuman</h3>
                        <a href="#" data-toggle="modal" data-target="#publikasi">SELENGKAPNYA >></a><br>
                        <div class="alert alert-secondary" role="alert">
                            <?php
                            $i = 0;
                            ?>
                            @foreach ($publikasi as $publik)
                                <div class="row">
                                    <div class="col-sm-8 text-left"><strong><?php echo strtoupper($publik->judul); ?> |
                                        </strong>{{ $publik->nama_desa }}</div>
                                </div>
                                <hr>
                                "{{ $publik->isi }}"
                                <br><br><span style="float: right"><strong>-{{ $publik->instansi }} </strong>/
                                    <?php echo substr($publik->created_at, 0, 10); ?></span><br>
                                <hr>
                                <?php
                                $i++;
                                ?>
                                @if ($i == 2)
                                @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->

    </div><!-- /.container -->
</section>
<!-- End Feature Section -->


<!-- Modal Pengaduan -->
<div class="modal fade" id="pengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengaduan</h5>
            </div>
            <div class="modal-body">
                @foreach ($pengaduan as $aduan)
                    <div class="row">
                        <div class="col-sm-8 text-left"><strong><?php echo strtoupper($aduan->subjek); ?> | </strong>{{ $aduan->nama_desa }}
                        </div>
                    </div>
                    <hr>
                    "{{ $aduan->isi }}"
                    <br><br><span style="float: right"><strong>-{{ $aduan->nama }} </strong>/
                        <?php echo substr($aduan->created_at, 0, 10); ?></span><br>
                    <hr>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pengumuman -->
<div class="modal fade" id="publikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengumuman</h5>
            </div>
            <div class="modal-body">
                @foreach ($publikasi as $publik)
                    <div class="row">
                        <div class="col-sm-8 text-left"><strong><?php echo strtoupper($publik->judul); ?> |
                            </strong>{{ $publik->nama_desa }}
                        </div>
                    </div>
                    <hr>
                    "{{ $publik->isi }}"
                    <br><br><span style="float: right"><strong>-{{ $publik->instansi }} </strong>/
                        <?php echo substr($publik->created_at, 0, 10); ?></span><br>
                    <hr>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<!-- Start Feature Section -->
<section id="ruangasa" class="services-section" style="margin-top: -200px">
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
                            <a href="http://siskeudes.online" target="_blank"><img src="/images/siskeudes.png" alt=""
                                    width="70px"></a>
                            <div class="border"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">SIKEUDES (Sistem Keuangan Desa)</h4>
                            <p>Siskeudes memudahkan dalam menginput data secara online dimanapun berada</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-2">
                    <div class="media">
                        <div class="pull-left">
                            <a href="https://spanint.kemenkeu.go.id/" target="_blank"><img src="/images/omspan.png"
                                    alt="" width="70px"></a>
                            <div class="border"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">OM SPAN</h4>
                            <p>Online Monitoring Sistem Perbendaharaan dan Anggaran Negara</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="feature-2">
                    <div class="media">
                        <div class="pull-left">
                            <a
                                href="https://www.sipades.konsolidasi.info/26AsetDesaBinaPemdeskemendagriKm19_5u6D1r3kt0r4tF4s1lIt4s1K3U4ngAnd4nAS3tD3s4.php"><img
                                    src="/images/sipades.png" target="_blank" alt="" width="70px"></a>
                            <div class="border"></div>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">SIPADES (Sistem Pengelolaan Aset Desa)</h4>
                            <p>Aplikasi berbasis komputer untuk memudahkan paratur pemerintah desa</p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->

        </div><!-- /.row -->

    </div><!-- /.container -->
</section>
<!-- End Feature Section -->




<!-- Start Profil Desa Section -->
<div class="pricing-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Profil Desa</h3>
                        <a href="/list-desa">Lihat Daftar Desa >></a>
                        <p class="white-text"></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row" id="profil">
            <div class="pricing">
                @foreach ($desa as $d)
                    <div class="col-md-12">
                        <div class="pricing-table">
                            <div class="plan-name">
                                <h3>{{ $d->nama_desa }}</h3>
                            </div>
                            <div class="plan-list text-left">
                                <ul>
                                    <li>Kecamatan: {{ $d->kecamatan }}</li>
                                    <li>Kabupaten/Kota: {{ $d->kota_kab }}</li>
                                    <li>Provinsi: {{ $d->provinsi }}</li>
                                    <li>Kontak: {{ $d->kontak }}</li>
                                    <li>Alamat: {{ $d->alamat }}</li>
                                </ul>
                            </div>
                            <div class="plan-signup">
                                <a href="/profil/{{ $d->id_desa }}" class="btn-system btn-small">Profil Lengkap</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="container" id="form-aduan">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title text-center">
                <h3>Pengaduan</h3>
                <p class="white-text"></p>
            </div>
        </div>
    </div>
    <div class="row" <div class="col-lg-12">
        <form name="aduan" id="contactForm" action="/insertAduan" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <p class="help-block text-danger">Pilih OPD:</p>
                        <select name="instansi" id="" class="form-control @error('instansi') is-invalid @enderror"
                            value="{{ old('instansi') }}">
                            <option value="" disabled selected>--Pilih OPD--</option>
                            @foreach ($desa as $d)
                                <option value="{{ $d->id_desa }}">{{ $d->nama_desa }}</option>
                            @endforeach
                        </select>
                        @error('instansi')
                            <div id="instansi" class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <p class="help-block text-danger">Kategori</p>
                        <select name="kategori" id="" class="form-control @error('kategori') is-invalid @enderror"
                            value="{{ old('kategori') }}">
                            <option value="" disabled selected>--Pilih Kategori--</option>
                            <option value="Saran">Saran</option>
                            <option value="Kritik">Kritik</option>
                        </select>
                        @error('kategori')
                            <div id="kategori" class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <p class="help-block text-danger">Tag</p>
                        <select name="tag" id="" class="form-control @error('tag') is-invalid @enderror"
                            value="{{ old('tag') }}">
                            <option value="" disabled selected>--Pilih Tag--</option>
                            <option value="Pembangunan">Pembangunan</option>
                            <option value="Pelayanan">Pelayanan</option>
                        </select>
                        @error('tag')
                            <div id="tag" class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <p class="help-block text-danger">Nama Lengkap:</p>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama') }}" name="nama">
                        @error('nama')
                            <div id="nama" class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <p class="help-block text-danger">Email:</p>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" name="email">
                        @error('email')
                            <div id="email" class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <p class="help-block text-danger">Subjek:</p>
                        <input type="text" class="form-control @error('subjek') is-invalid @enderror"
                            value="{{ old('subjek') }}" name="subjek">
                        @error('subjek')
                            <div id="subjek" class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <p class="help-block text-danger">Isi Aduan:</p>
                        <textarea name="isi" id="" class="form-control @error('isi') is-invalid @enderror"
                            value="{{ old('isi') }}" cols="30" rows="5"></textarea>
                        @error('isi')
                            <div id="isi" class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="submit" onclick="submit()" value="Kirim Aduan" style="float: right" name="lapor"
                        class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<br><br>
</div>
<!-- End Pricing Table Section -->
@include('user.footer')
