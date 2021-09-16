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
                <h1 class="mt-4">Data Produk Hukum</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">OPD / Produk Hukum</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i> Produk Hukum <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal" onclick="addProkum()"><i class="fas fa-plus-square"></i></button>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="text-center">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Produk Hukum</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Produk Hukum</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($prokum as $r)
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><a download="hosting"
                                                href="{{ $r->produk_hukum }}">{{ explode('/', $r->produk_hukum)[3] }}</a>
                                        </td>
                                        <td style="text-align: center">
                                            <div>
                                                <button class="btn btn-success"
                                                    onclick="getProkum(`{{ $r->id_prokum }}`, `{{ csrf_token() }}`)"
                                                    data-bs-toggle="modal" data-bs-target="#modal"><i
                                                        class="far fa-edit"></i></i></button></button>
                                            </div>
                                            <div>
                                                <form action="/desa/prokum/delete" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $r->id_prokum }}">
                                                    <button class="btn btn-danger" type="submit"><i
                                                            class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal Pengaduan -->
                        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle">Upload Produk Hukum</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" id="id_prokum">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3">
                                                        <div>
                                                            <label for="formFile" class="form-label-file">File Produk
                                                                Hukum</label>
                                                            <input
                                                                class="form-control @error('produk_hukum') is-invalid @enderror"
                                                                id="formFile" type="file" name="produk_hukum">
                                                            @error('produk_hukum')
                                                                <div id="produk_hukum" class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success">Ubah Data</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
