@include('admin.header')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Desa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin / Data-Desa</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i> Data Desa
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Nama Desa</th>
                                            <th style="text-align: center">Kecamatan</th>
                                            <th style="text-align: center">Kota/Kab</th>
                                            <th style="text-align: center">Kontak</th>
                                            <th style="text-align: center">Alamat</th>
                                            <th style="text-align: center">Foto Struktur</th>
                                            <th style="text-align: center">Akun</th>
                                            <th style="text-align: center"><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">+</button></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Nama Desa</th>
                                            <th style="text-align: center">Kecamatan</th>
                                            <th style="text-align: center">Kota/Kab</th>
                                            <th style="text-align: center">Kontak</th>
                                            <th style="text-align: center">Alamat</th>
                                            <th style="text-align: center">Foto Struktur</th>
                                            <th style="text-align: center">Akun</th>
                                            <th style="text-align: center"><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">+</button></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $no = 1;?>
                                    @foreach($desa as $r)
                                        <tr>
                                            <td><?= $no++?></td>
                                            <td>{{$r->nama_desa}}</td>
                                            <td>{{$r->kecamatan}}</td>
                                            <td>{{$r->kota_kab}}</td>
                                            <td>{{$r->kontak}}</td>
                                            <td>{{$r->alamat}}</td>
                                            <td>{{$r->foto_struktur}}</td>
                                            <td style="text-align: center"><button class="btn btn-warning"><i class="fas fa-key"></i></button></td>
                                            <td style="text-align: right">
                                                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black"><i class="fas fa-ellipsis-v"></i></a>
                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                            <li><a class="dropdown-item" href="#!">Detail</a></li>
                                                            <li><a class="dropdown-item" href="#!">Edit</a></li>
                                                            <li><a class="dropdown-item" href="#!" style="color: RED">Hapus</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/insertDesa" method="POST">
        @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Desa</label>
                        <input type="text" class="form-control" name="nama_desa">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="kecamatan">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Kota/Kabupaten</label>
                        <input type="text" class="form-control" name="kotakab">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="basic-url" class="form-label">Kontak</label>
                    <div class="mb-3 input-group">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                        <input type="text" class="form-control" name="kontak">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                <textarea name="alamat" id="" cols="10" rows="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <div>
                    <label for="formFile" class="form-label">Gambar Struktur Desa</label>
                    <input class="form-control" id="formFileLg" type="file" name="gambar">
                </div>
                <div id="emailHelp" class="form-text">(* File berekstensi: .jpg, .jpeg, .png)</div>
            </div>
            <hr>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-success">Tambah Data +</button>
        </form>
      </div>
    </div>
  </div>
</div>

@include('admin.footer')