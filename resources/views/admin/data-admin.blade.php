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
            <h1 class="mt-4">Data Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Super Admin / Data Admin</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i> Data Admin
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Username</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Nama Lengkap</th>
                                <th style="text-align: center">Nomor Telepon</th>
                                <th style="text-align: center">Role</th>
                                <th style="text-align: center">Desa</th>
                                <th style="text-align: center">Aktif</th>
                                <th style="text-align: center"><button class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#modal" onclick="addAkun()">+</button>
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">Username</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Nama Lengkap</th>
                                <th style="text-align: center">Nomor Telepon</th>
                                <th style="text-align: center">Role</th>
                                <th style="text-align: center">Desa</th>
                                <th style="text-align: center">Aktif</th>
                                <th style="text-align: center"><button class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#modal" onclick="addAkun()">+</button>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($admin as $r)
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>{{ $r->username }}</td>
                                    <td>{{ $r->email }}</td>
                                    <td>{{ $r->namaLengkap }}</td>
                                    <td>{{ $r->nomorTelepon }}</td>
                                    <td>{{ $r->roleId == 2 ? 'Super Admin' : 'Admin' }}</td>
                                    <td>{{ $r->nama_desa }}</td>
                                    <td>{{ $r->aktif == 1 ? 'Ya' : 'Tidak' }}</td>

                                    <td style="text-align: right">
                                        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                    style="color: black"><i class="fas fa-ellipsis-v"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item"
                                                            onclick="editAkunAdmin(`{{ $r->id_admin }}`, `{{ csrf_token() }}`)"
                                                            data-bs-toggle="modal" data-bs-target="#modal">Ubah</a></li>
                                                    <li>
                                                        <form action="/admin/deleteAdmin" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $r->id_admin }}"
                                                                name="id_admin">
                                                            <input type="submit" class="dropdown-item"
                                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                                                                value="Hapus">
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="/admin/setAktif" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $r->id_admin }}"
                                                                name="id_admin">
                                                            <input type="hidden" value="{{ $r->aktif }}"
                                                                name="aktif">
                                                            <input type="submit" class="dropdown-item"
                                                                value="@if($r->aktif == 0) Aktifkan @else Non-Aktif @endif">
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
                    <button type="button" class="btn-close" onclick="setEmptyFormAdmin()" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="hidden" id="id_admin" name="id_admin">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') }}" name="username" id="username">
                                    @error('username')
                                        <div id="username" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}" name="password" id="password">
                                    @error('password')
                                        <div id="password" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" name="email" id="email">
                                    @error('email')
                                        <div id="email" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                                <div class="mb-3 input-group">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                    <input type="number"
                                        class="form-control @error('nomorTelepon') is-invalid @enderror"
                                        value="{{ old('nomorTelepon') }}" name="nomorTelepon" id="nomorTelepon">
                                    @error('nomorTelepon')
                                        <div id="nomorTelepon" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                            <input name="namaLengkap" id="namaLengkap"
                                class="form-control namaLengkap @error('namaLengkap') is-invalid @enderror"
                                value="{{ old('namaLengkap') }}">
                            @error('namaLengkap')
                                <div id="namaLengkap" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="roleId" class="form-label">Role</label>
                                    <select class="form-control @error('roleId') is-invalid @enderror"
                                        value="{{ old('roleId') }}" name="roleId" id="roleId">
                                        <option value="">Pilih Role</option>
                                        <option @if (old('roleId') == 1) ? selected : '' @endif value="1">Admin</option>
                                        <option @if (old('roleId') == 2) ? selected : '' @endif value="2">Super Admin</option>
                                    </select>
                                </div>
                                @error('roleId')
                                    <div id="roleId" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="id_desa" class="form-label">Nama Desa</label>
                                    <select class="form-control @error('id_desa') is-invalid @enderror"
                                        value="{{ old('id_desa') }}" name="id_desa" id="id_desa">
                                        <option value="">Pilih Desa</option>
                                        @foreach ($desa as $r)
                                            @if (old('id_desa') == $r->id_desa)
                                                <option selected value="{{ $r->id_desa }}">{{ $r->nama_desa }}
                                                </option>
                                            @else
                                                <option value="{{ $r->id_desa }}">{{ $r->nama_desa }}</option>
                                            @endif
                                        @endforeach
                                        <option value="0d28a67e-ea24-45c1-97a7-b9ff779292ff">Tidak Ada</option>
                                    </select>
                                </div>
                                @error('id_desa')
                                    <div id="id_desa" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="aktif" name="aktif" value="1" checked>
                            <label class="custom-control-label" for="aktif">Aktif?</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="setForm()"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')
