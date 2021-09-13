@include('admin.header')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dokumen / {{ $desa->nama_desa }} <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">+</button></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Admin / Dokumen / {{$desa->nama_desa}}</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <?php 
                                    if($jumlah_dok == 0){
                                        ?>
                                        <div class="alert alert-warning"><center>Belum ada dokumen</center></div>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <div class="card mb-4">
                                        <div class="card-header">
                                            <i class="fas fa-table me-1"></i> 
                                        </div>
                                        <div class="card-body">
                                            <table id="datatablesSimple">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center">Tahun</th>
                                                        <th style="text-align: center">RPJM</th>
                                                        <th style="text-align: center">RKP</th>
                                                        <th style="text-align: center">APBD</th>
                                                        <th style="text-align: center">PJ Semester 1</th>
                                                        <th style="text-align: center">PJ Semester 2</th>
                                                        <th style="text-align: center">Kegiatan Prioritas</th>
                                                        <th style="text-align: center">Peraturan</th>
                                                        <th style="text-align: center"></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th style="text-align: center">Tahun</th>
                                                        <th style="text-align: center">RPJM</th>
                                                        <th style="text-align: center">RKP</th>
                                                        <th style="text-align: center">APBD</th>
                                                        <th style="text-align: center">PJ Semester 1</th>
                                                        <th style="text-align: center">PJ Semester 2</th>
                                                        <th style="text-align: center">Kegiatan Prioritas</th>
                                                        <th style="text-align: center">Peraturan</th>
                                                        <th style="text-align: center"><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">+</button></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    @foreach ($dokumen as $d)
                                                    <tr>
                                                        <td>{{$d->tahun}}</td>
                                                        <td>{{$d->rpjm}}</td>
                                                        <td>{{$d->rkp}}</td>
                                                        <td>{{$d->apbd}}</td>
                                                        <td>{{$d->pj_sm1}}</td>
                                                        <td>{{$d->pj_sm2}}</td>
                                                        <td>{{$d->kegiatan_prioritas}}</td>
                                                        <td>{{$d->peraturan}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
<!-- Modal Tambah Profil Desa-->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Desa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/insertDesa" method="POST" enctype="multipart/form-data">
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