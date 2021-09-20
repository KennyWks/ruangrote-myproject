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
                <h1 class="mt-4">Data Publikasi</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">OPD / Publikasi</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i> Publikasi Desa <button class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#modal" onclick="addPublikasi()"><i
                                class="fas fa-plus-square"></i></button>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="text-center">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Judul</th>
                                    <th style="text-align: center">Isi</th>
                                    <th style="text-align: center">Instansi</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Judul</th>
                                    <th style="text-align: center">Isi</th>
                                    <th style="text-align: center">Instansi</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($publikasi as $r)
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>{{ $r->judul }}</td>
                                        <td>{{ $r->isi }}</td>
                                        <td>{{ $r->instansi }}</td>
                                        <td style="text-align: center">
                                            <div>
                                                <button class="btn btn-success"
                                                    onclick="getPublikasiDesa(`{{ $r->id_publikasi }}`, `{{ csrf_token() }}`)"
                                                    data-bs-toggle="modal" data-bs-target="#modal"><i
                                                        class="far fa-edit"></i></i></button>
                                            </div>
                                            <div>
                                                <form action="/desa/publikasi/delete" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $r->id_publikasi }}">
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="far fa-trash-alt" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"></i>
                                                    </button>

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal Publikasi -->
                        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="profilTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="publikasiTitle">Publikasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" id="id">
                                            <input type="hidden" name="id_desa" value="{{ auth()->user()->id_desa }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3">
                                                        <label for="judul" class="form-label">Judul</label>
                                                        <input type="text"
                                                            class="form-control @error('judul') is-invalid @enderror"
                                                            value="{{ old('judul') }}" name="judul" id="judul">
                                                        @error('judul')
                                                            <div id="judul" class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3">
                                                        <label for="instansi" class="form-label">Instansi</label>
                                                        <input type="text"
                                                            class="form-control @error('instansi') is-invalid @enderror"
                                                            value="{{ old('instansi') }}" name="instansi" id="instansi">
                                                        @error('instansi')
                                                            <div id="instansi" class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="isi" class="form-label">Isi</label>
                                                <textarea name="isi" id="isi" cols="10" rows="3"
                                                    class="form-control @error('isi') is-invalid @enderror"
                                                    value="{{ old('isi') }}"></textarea>
                                                @error('isi')
                                                    <div id="isi" class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Data</button>
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
