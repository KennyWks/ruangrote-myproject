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
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
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
                <h4>LIST DESA</h4>
                <div class="border"></div>
                <br><br>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div style="margin-bottom: 20px;">
                                <input type="text" class="form-control" id="myInput" onkeyup="myFunction()"
                                    placeholder="Pencarian Nama...">
                            </div>

                            <table id="myTable" class="table table-responsive">
                                <tr>
                                    <th>No</th>
                                    <th>Nama OPD</th>
                                    <th>Nama Kecamatan</th>
                                    <th></th>
                                </tr>
                                <?php $i = 1; ?>
                                @foreach ($list as $d)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $d->nama_desa }}</td>
                                        <td>{{ $d->kecamatan }}</td>
                                        <td><a href="/profil/{{ $d->id_desa }}" class="btn btn-primary"><i
                                                    class="fa fa-link"></i></a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
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
