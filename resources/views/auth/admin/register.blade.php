@extends('auth.admin.layouts.main')
@section('content')
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Akun</h3></div>
                                    <div class="card-body">
                                        <form action="/admin/signup" method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required maxlength="6" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" id="username" name="username" type="text" placeholder="Masukan username anda"  autofocus />
                                                        <label for="username">Username</label>
                                                        @error('username')
                                                        <div id="username" class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input required maxlength="12" minlength="11" class="form-control @error('nomorTelepon') is-invalid @enderror" value="{{old('nomorTelepon')}}" id="nomorTelepon" name="nomorTelepon" type="number" placeholder="Masukan nomor telepon anda"  />
                                                        <label for="nomorTelepon">Nomor Telepon</label>
                                                        @error('nomorTelepon')
                                                        <div id="nomorTelepon" class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input required class="form-control @error('namaLengkap') is-invalid @enderror" value="{{old('namaLengkap')}}" id="namaLengkap" name="namaLengkap" type="text" placeholder="Masukann nama lengkap anda"  />
                                                <label for="namaLengkap">Nama Lengkap</label>
                                                @error('namaLengkap')
                                                <div id="namaLengkap" class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input required class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email" type="email" placeholder="Masukann email anda"  />
                                                <label for="email">Email</label>
                                                @error('email')
                                                <div id="email" class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required maxlength="8" class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Create a password"  />
                                                        <label for="password">Password</label>
                                                        @error('password')
                                                        <div id="password" class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required maxlength="8" class="form-control @error('konfirmasiPassword') is-invalid @enderror" id="konfirmasiPassword"  name="konfirmasiPassword" type="password" placeholder="Konfirmasi password"  />
                                                        <label for="konfirmasiPassword">Konfirmasi Password</label>
                                                        @error('konfirmasiPassword')
                                                        <div id="konfirmasiPassword" class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Buat Akun</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">Sudah punya akun? <a href="/admin/login">Login Sekarang!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>        
@endsection
