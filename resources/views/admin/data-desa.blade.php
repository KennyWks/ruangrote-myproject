@include('admin.header')
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
                <li class="breadcrumb-item active">Super Admin / Data Desa</li>
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
                                <th style="text-align: center"><button class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#modal" onclick="addDesa()">+</button>
                                </th>
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
                                <th style="text-align: center"><button class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#modal" onclick="addDesa()">+</button></th>
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
                                            target="_blank"><img src="{{ $r->foto_struktur }}" width="100px"></a>
                                    </td>
                                    <td style="text-align: right">
                                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="color: black"><i class="fas fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item"
                                                            onclick="editProfilDesa(`{{ $r->id_desa }}`, `{{ csrf_token() }}`)"
                                                            data-bs-toggle="modal" data-bs-target="#modal">Ubah</a></li>
                                                    <li>
                                                        <form action="/admin/deleteDesa" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $r->id_desa }}"
                                                                name="id_desa">
                                                            <input type="submit" class="dropdown-item"
                                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                                                value="Hapus">
                                                        </form>
                                                    </li>
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

    <!-- Modal Profil Desa-->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close" onclick="setEmptyFormDesa()" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id_desa" name="id_desa">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nama_desa" class="form-label">Nama Desa</label>
                                    <input required autofocus type="text" class="form-control @error('nama_desa') is-invalid @enderror"
                                        value="{{ old('nama_desa') }}" name="nama_desa" id="nama_desa">
                                    @error('nama_desa')
                                        <div id="nama_desa" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input required type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                        value="{{ old('kecamatan') }}" name="kecamatan" id="kecamatan">
                                    @error('kecamatan')
                                        <div id="kecamatan" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="kota_kab" class="form-label">Kota/Kabupaten</label>
                                    <input required type="text" class="form-control @error('kota_kab') is-invalid @enderror"
                                        value="{{ old('kota_kab') }}" name="kota_kab" id="kota_kab">
                                    @error('kota_kab')
                                        <div id="kota_kab" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="kontak" class="form-label">Kontak</label>
                                <div class="mb-3 input-group">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                    <input required type="number" class="form-control @error('kontak') is-invalid @enderror"
                                        value="{{ old('kontak') }}" name="kontak" id="kontak">
                                    @error('kontak')
                                        <div id="kontak" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea required name="alamat" cols="10" rows="3"
                                class="form-control alamat @error('alamat') is-invalid @enderror"
                                value="{{ old('alamat') }}">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div id="alamat" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div>
                                <label for="formFile" class="form-label">Gambar Struktur
                                    Desa</label>
                                <div>
                                    <img src="" class="mb-1" id="foto_struktur" alt="foto struktur"
                                        width="100" height="100">
                                </div>
                                <input class="form-control" id="formFileLg" type="file" name="foto_struktur">
                            </div>
                            <div id="emailHelp" class="form-text">(*File berekstensi: .jpg, .jpeg, .png)</div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="setEmptyFormDesa()"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')
