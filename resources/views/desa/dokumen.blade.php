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
                <h1 class="mt-4">Data Dokumen</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">OPD / Dokumen</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i> Dokumen <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal" onclick="addDokumen()"><i class="fas fa-plus-square"></i></button>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="text-center">
                            <thead>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Tahun</th>
                                    <th style="text-align: center">RPJM</th>
                                    <th style="text-align: center">RKP</th>
                                    <th style="text-align: center">APBD</th>
                                    <th style="text-align: center">PJ Semester 1</th>
                                    <th style="text-align: center">PJ Semester 2</th>
                                    <th style="text-align: center">Kegiatan Prioritas</th>
                                    <th style="text-align: center">Peraturan</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Tahun</th>
                                    <th style="text-align: center">RPJM</th>
                                    <th style="text-align: center">RKP</th>
                                    <th style="text-align: center">APBD</th>
                                    <th style="text-align: center">PJ Semester 1</th>
                                    <th style="text-align: center">PJ Semester 2</th>
                                    <th style="text-align: center">Kegiatan Prioritas</th>
                                    <th style="text-align: center">Peraturan</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($dokumen as $r)
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>{{ $r->tahun }}</td>
                                        <td><a download="hosting"
                                                href="{{ $r->rpjm }}">{{ explode('/', $r->rpjm)[3] }}</a></td>
                                        <td><a download="hosting"
                                                href="{{ $r->rkp }}">{{ explode('/', $r->rkp)[3] }}</a></td>
                                        <td><a download="hosting"
                                                href="{{ $r->apbd }}">{{ explode('/', $r->apbd)[3] }}</a></td>
                                        <td><a download="hosting"
                                                href="{{ $r->pj_sm1 }}">{{ explode('/', $r->pj_sm1)[3] }}</a></td>
                                        <td><a download="hosting"
                                                href="{{ $r->pj_sm2 }}">{{ explode('/', $r->pj_sm2)[3] }}</a></td>
                                        <td><a download="hosting"
                                                href="{{ $r->kegiatan_prioritas }}">{{ explode('/', $r->kegiatan_prioritas)[3] }}</a>
                                        </td>
                                        <td><a download="hosting"
                                                href="{{ $r->peraturan }}">{{ explode('/', $r->peraturan)[3] }}</a>
                                        </td>
                                        <td style="text-align: center">
                                            <div>
                                                <button class="btn btn-success"
                                                    onclick="getDokumen(`{{ $r->id_dokumen }}`, `{{ csrf_token() }}`)"
                                                    data-bs-toggle="modal" data-bs-target="#modal"><i
                                                        class="far fa-edit"></i></i></button></button>
                                            </div>
                                            <div>
                                                <form action="/desa/dokumen/delete" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $r->id_dokumen }}">
                                                    <button onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" type="submit"><i
                                                            class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Modal Dokumen --}}
                        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="profilTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="dokumenTitle">Kegiatan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" id="id_dokumen">
                                            <input type="hidden" name="id_desa" value="{{ auth()->user()->id_desa }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm">
                                                    <div class="mb-3">
                                                        <label for="tahun" class="form-label">Tahun</label>
                                                        <input type="number"
                                                            class="form-control @error('tahun') is-invalid @enderror"
                                                            value="{{ old('tahun') }}" name="tahun" id="tahun">
                                                        @error('tahun')
                                                            <div id="tahun" class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div>
                                                    <label for="formFile" class="form-label-rpjm">RPJM</label>
                                                    <input class="form-control @error('rpjm') is-invalid @enderror"
                                                        value="{{ old('rpjm') }}" id="rpjm" type="file" name="rpjm">
                                                    <div class="file_valid">
                                                        <input type="checkbox" name="file_valid"> Ganti File
                                                    </div>
                                                    @error('rpjm')
                                                        <div id="rpjm" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div>
                                                    <label for="formFile" class="form-label-rkp">RKP</label>
                                                    <input class="form-control @error('rkp') is-invalid @enderror"
                                                        value="{{ old('rkp') }}" id="rkp" type="file" name="rkp">
                                                    <div class="file_valid">
                                                        <input type="checkbox" name="file_valid"> Ganti File
                                                    </div>
                                                    @error('rkp')
                                                        <div id="rkp" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div>
                                                    <label for="formFile" class="form-label-apbd">APBD</label>
                                                    <input class="form-control @error('apbd') is-invalid @enderror"
                                                        value="{{ old('apbd') }}" id="apbd" type="file" name="apbd">
                                                    <div class="file_valid">
                                                        <input type="checkbox" name="file_valid"> Ganti File
                                                    </div>
                                                    @error('apbd')
                                                        <div id="apbd" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div>
                                                    <label for="formFile" class="form-label-pj_sm1">PJ Semester 1</label>
                                                    <input class="form-control @error('pj_sm1') is-invalid @enderror"
                                                        value="{{ old('pj_sm1') }}" id="pj_sm1" type="file"
                                                        name="pj_sm1">
                                                    <div class="file_valid">
                                                        <input type="checkbox" name="file_valid"> Ganti File
                                                    </div>
                                                    @error('pj_sm1')
                                                        <div id="pj_sm1" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div>
                                                    <label for="formFile" class="form-label-pj_sm2">PJ Semester 2</label>
                                                    <input class="form-control @error('pj_sm2') is-invalid @enderror"
                                                        value="{{ old('pj_sm2') }}" id="pj_sm2" type="file"
                                                        name="pj_sm2">
                                                    <div class="file_valid">
                                                        <input type="checkbox" name="file_valid"> Ganti File
                                                    </div>
                                                    @error('pj_sm2')
                                                        <div id="pj_sm2" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div>
                                                    <label for="formFile" class="form-label-kegiatan_prioritas">Kegiatan
                                                        Prioritas</label>
                                                    <input
                                                        class="form-control @error('kegiatan_prioritas') is-invalid @enderror"
                                                        value="{{ old('kegiatan_prioritas') }}" id="kegiatan_prioritas"
                                                        type="file" name="kegiatan_prioritas">
                                                    <div class="file_valid">
                                                        <input type="checkbox" name="file_valid"> Ganti File
                                                    </div>
                                                    @error('kegiatan_prioritas')
                                                        <div id="kegiatan_prioritas" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div>
                                                    <label for="formFile" class="form-label-peraturan">Peraturan</label>
                                                    <input class="form-control @error('peraturan') is-invalid @enderror"
                                                        value="{{ old('peraturan') }}" id="peraturan" type="file"
                                                        name="peraturan">
                                                    <div class="file_valid">
                                                        <input type="checkbox" name="file_valid"> Ganti File
                                                    </div>
                                                    @error('peraturan')
                                                        <div id="peraturan" class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
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
                        {{-- Modal Dokumen --}}
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
