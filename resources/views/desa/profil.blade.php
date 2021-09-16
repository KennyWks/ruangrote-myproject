@extends('desa.layouts.main')
@section('content')
    <div id="layoutSidenav_content">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Desa</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">OPD / Profil</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i> Data Desa
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="text-center">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Nama Desa</th>
                                    <th style="text-align: center">Kecamatan</th>
                                    <th style="text-align: center">Kota/Kab</th>
                                    <th style="text-align: center">Kontak</th>
                                    <th style="text-align: center">Alamat</th>
                                    <th style="text-align: center">Foto Struktur</th>
                                    <th style="text-align: center">Edit</th>
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
                                    <th style="text-align: center">Edit</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($desa as $r)
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>{{ $r->nama_desa }}</td>
                                        <td>{{ $r->kecamatan }}</td>
                                        <td>{{ $r->kota_kab }}</td>
                                        <td>{{ $r->kontak }}</td>
                                        <td>{{ $r->alamat }}</td>
                                        <td style="text-align: center"><a href="{{ $r->foto_struktur }}"
                                                target="_blank"><img src="{{ $r->foto_struktur }}" width="100px"></a></td>
                                        <td style="text-align: center">
                                            <button class="btn btn-success"
                                                onclick="getProfilDesa(`{{ $r->id_desa }}`, `{{ csrf_token() }}`)"
                                                data-bs-toggle="modal" data-bs-target="#edit"><i
                                                    class="far fa-edit"></i></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal Edit Profil Desa-->
                        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="profilTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="profilTitle">Ubah Profil</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/desa/updateDesa" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id_desa" id="id_desa">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="nama_desa" class="form-label">Nama Desa</label>
                                                        <input type="text" class="form-control" name="nama_desa"
                                                            id="nama_desa">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                                        <input type="text" class="form-control" name="kecamatan"
                                                            id="kecamatan">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="kota_kab" class="form-label">Kota/Kabupaten</label>
                                                        <input type="text" class="form-control" name="kotakab"
                                                            id="kota_kab">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="kontak" class="form-label">Kontak</label>
                                                    <div class="mb-3 input-group">
                                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                                        <input type="text" class="form-control" name="kontak" id="kontak">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="10" rows="3"
                                                    class="form-control"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <div>
                                                    <label for="formFile" class="form-label">Gambar Struktur
                                                        Desa</label>
                                                    <div>
                                                        <img src="" class="mb-1 foto_struktur1" alt="foto struktur"
                                                            width="100" height="100">
                                                    </div>
                                                    <input class="form-control" type="file" name="gambar">
                                                    <input class="foto_struktur2" type="hidden" name="foto_struktur2">
                                                    <input type="checkbox" name="gambar_valid"> Ganti gambar struktur desa.
                                                </div>
                                                <div id="textWarn" class="form-text">(*File berekstensi: .jpg, .jpeg,
                                                    .png)</div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Ubah Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
