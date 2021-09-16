<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Admin RuangRote" />
    <meta name="author" content="ESC17" />
    <title>OPD | Ruang Rote</title>
    <link rel="shortcut icon" href="/images/og/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="/admin/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html"><b style="color: #ff6430">ЯRuang</b> Rote | OPD</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"> {{ auth()->user()->username }}</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout <span
                                    data-feather="log-out"></span></button>
                        </form>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}" href="/desa/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link {{ $active == 'profil' ? 'active' : '' }}" href="/desa/profil/{{ auth()->user()->id_desa }}">
                            <div class="sb-nav-link-icon"><i class="far fa-address-card"></i></div>
                            Profil
                        </a>
                        <a class="nav-link {{ $active == 'kegiatan' ? 'active' : '' }}" href="/desa/kegiatan/{{ auth()->user()->id_desa }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Kegiatan
                        </a>
                        <a class="nav-link {{ $active == 'publikasi' ? 'active' : '' }}" href="/desa/publikasi/{{ auth()->user()->id_desa }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Publikasi
                        </a>
                        <a class="nav-link {{ $active == 'pengaduan' ? 'active' : '' }}" href="/desa/pengaduan/{{ auth()->user()->id_desa }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-phone-volume"></i></div>
                            Pengaduan
                        </a>
                        <a class="nav-link {{ $active == 'dokumen' ? 'active' : '' }}" href="/desa/dokumen/{{ auth()->user()->id_desa }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Dokumen
                        </a>
                        <a class="nav-link {{ $active == 'prokum' ? 'active' : '' }}" href="/desa/prokum/{{ auth()->user()->id_desa }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Produk Hukum
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Login sebagai:</div>
                    OPD
                </div>
            </nav>
        </div>
        @yield('content')
    </div>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Hak cipta &copy; Ruang Rote {{ date('Y') }}</div>
                {{-- <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div> --}}
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/admin/assets/demo/chart-area-demo.js"></script>
    <script src="/admin/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="/admin/js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/admin/js/scripts.js"></script>
</body>

</html>
