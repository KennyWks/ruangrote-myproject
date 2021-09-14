<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ruang Rote</title>

    <!-- Bootstrap Core CSS -->
    <link href="/asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">


    <!-- Animate CSS -->
    <link href="/css/animate.css" rel="stylesheet">

    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.theme.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">

    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/color/light-red.css">



    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>


    <!-- Modernizer js -->
    <script src="/js/modernizr.custom.js"></script>


</head>

<body class="index">




    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: black;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Ruang Rote</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/">Beranda</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/#aduan">Pengumuman</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/#ruangasa">Ruang ASA</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/#profil">Profil Desa</a>
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<!--HEADER-->

<div class="row" style="margin-top: 90px;">

    <div class="col-md-12">
        <div class="welcome-section text-center">

            <h4>Profil Desa | <strong>{{$desa->nama_desa}}</strong></h4>
            <div class="border"></div>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4" style="border-right: 1px solid #9e9e9e">
                        <center><h3>Struktur Desa</h3></center>
                        <a href=""><img src="/upload/foto_struktur/{{$desa->foto_struktur}}" alt="" width="100%"></a>
                    </div>
                    <div class="col-sm-6">
                        <center><h3>Profil</h3></center><br>
                        <div class="plan-list text-left">
                            <ul>
                                <li>Nama Desa: {{$desa->nama_desa}}</li>
                                <li>Kecamatan: {{$desa->kecamatan}}</li>
                                <li>Kabupaten/Kota: {{$desa->kota_kab}}</li>
                                <li>Provinsi: {{$desa->provinsi}}</li>
                                <li>Kontak: {{$desa->kontak}}</li>
                                <li>Alamat: {{$desa->alamat}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2" style="border-left: 1px solid #9e9e9e">
                        <center><h3>Produk Hukum</h3></center><br>
                        <div class="plan-list text-left">
                            <ul>
                                <li><a href="">PERDA 8 Tentang Pemilihan Kepala Desa</a></li>
                                <li><a href="">PERDA 9 Tentang BPD</a></li>
                                <li><a href="">PERDA 10 Tentang Perangkat Desa</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<hr>
<!-- Start Feature Section -->
<section id="service" class="services-section" style="margin-top: -100px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Kegiatan</h3><br>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($kegiatan_limit as $lim)
            <div class="col-sm-4">
                <div class="card mb-3">
                <img src="https://4.bp.blogspot.com/-QKzmcsjmudA/UorK1m96q3I/AAAAAAAAAdc/lwqGQx4n8N4/s1600/IMG_0204.JPG" class="card-img-top" width="100%" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><strong>{{$lim->judul}}</strong></h4>
                        <p class="card-text">{{$lim->keterangan}}</p>
                        <p class="card-text" style="float: right"><small class="text-muted"><i class="fa fa-user"></i> ({{$desa->username}}) | <i class="fa fa-calendar"></i> <?= substr($lim->created_at, 0, 10)?></small></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- /.row -->
        <center><button class="btn btn-primary" data-toggle="modal" data-target="#kegiatan">Selengkapnya</button></center>

                
        <!-- Modal -->
        <div class="modal fade" id="kegiatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kegiatan</h5>
            </div>
            <div class="modal-body">
            @foreach ($kegiatan as $k)
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                    <center><img src="https://4.bp.blogspot.com/-QKzmcsjmudA/UorK1m96q3I/AAAAAAAAAdc/lwqGQx4n8N4/s1600/IMG_0204.JPG" class="card-img-top" width="50%"></center>
                        <div class="card-body">
                            <hr>
                            <h4 class="card-title"><strong>{{$k->judul}}</strong></h4>
                            <p class="card-text">{{$k->keterangan}}</p>
                            <p class="card-text" style="float: right"><small class="text-muted"><i class="fa fa-user"></i> ({{$desa->username}}) | <i class="fa fa-calendar"></i> <?= substr($k->created_at, 0, 10)?></small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
        </div>
    </div><!-- /.container -->
</section>
<!-- End Feature Section -->



<!-- Start Feature Section -->
<section id="service" class="services-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Dokumen Virtual Desa</h3><br>
                </div>
            </div>
        </div>



        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Pencarian">


        <table id="myTable" class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">Tahun</th>
                    <th scope="col">RPJM</th>
                    <th scope="col">RKP</th>
                    <th scope="col">APBD</th>
                    <th scope="col">Pertanggung Jawaban</th>
                    <th>Kegiatan Prioritas</th>
                    <th>Peraturan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokumen as $dok)
                <tr>
                    <th scope="row">{{$dok->tahun}}</th>
                    <td><a href="">{{$dok->rpjm}}</a></td>
                    <td><a href="">{{$dok->rkp}}</a></td>
                    <td><a href="">{{$dok->apbd}}</a></td>
                    <td><a href="">{{$dok->pj_sm1}}</a><br>
                        <a href="">{{$dok->pj_sm2}}</a></td>
                    <td><a href="">{{$dok->kegiatan_prioritas}}</a></td>
                    <td><a href="">{{$dok->peraturan}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div><!-- /.container -->
</section>
<!-- End Feature Section -->


<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>


@include('user.footer')