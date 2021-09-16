@extends('desa.layouts.main')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Hallo {{ auth()->user()->namaLengkap }}</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard / OPD</li>
                </ol>
            </div>
        </main>
    @endsection
