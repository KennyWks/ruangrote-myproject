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
                <h1 class="mt-4">Data Pengaduan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">OPD / Pengaduan</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i> Pengaduan
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="text-center">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Nama</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Kategori</th>
                                    <th style="text-align: center">Tag</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Nama</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Kategori</th>
                                    <th style="text-align: center">Tag</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pengaduan as $r)
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>{{ $r->nama }}</td>
                                        <td>{{ $r->email }}</td>
                                        <td>{{ $r->kategori }}</td>
                                        <td>{{ $r->tag }}</td>
                                        <td style="text-align: center">
                                            <div>
                                                <button class="btn btn-primary"
                                                    onclick="getPengaduan(`{{ $r->id_anduan }}`, `{{ csrf_token() }}`)"
                                                    data-bs-toggle="modal" data-bs-target="#modal">Lihat Anduan</button>
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
                                        <h5 class="modal-title" id="modalTitle">Detail Pengaduan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm">
                                                <div class="mb-3">
                                                    <label for="subjek" class="form-label">Subjek</label>
                                                    <input type="text" readonly class="form-control" name="subjek"
                                                        id="subjek">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="isi" class="form-label">Isi</label>
                                            <textarea name="isi" readonly id="isi" cols="10" rows="3"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
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
