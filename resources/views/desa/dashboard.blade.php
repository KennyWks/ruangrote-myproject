<?php
 $monthNum1 = date('n');
 $monthName1 = date("F", mktime(0, 0, 0, $monthNum1, 10));
 $monthNum2 = intval(date('n') - 1);
 $monthName2 = date("F", mktime(0, 0, 0, $monthNum2, 10));
 $monthNum3 = intval(date('n') - 2);
 $monthName3 = date("F", mktime(0, 0, 0, $monthNum3, 10));
 $monthNum4 = intval(date('n') - 3);
 $monthName4 = date("F", mktime(0, 0, 0, $monthNum4, 10));
 $monthNum5 = intval(date('n') - 4);
 $monthName5 = date("F", mktime(0, 0, 0, $monthNum5, 10));
 $monthNum6 = intval(date('n') - 5);
 $monthName6 = date("F", mktime(0, 0, 0, $monthNum6, 10));
?>
@extends('desa.layouts.main')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Hallo {{ auth()->user()->namaLengkap }}! Selamat datang kembali.</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard / OPD</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Jumlah Dokumen {{$dokumen}}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="/desa/dokumen/{{ auth()->user()->id_desa }}">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Jumlah Produk Hukum {{$prokum}}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="/desa/prokum/{{ auth()->user()->id_desa }}">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Jumlah Kegiatan {{$kegiatan}}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="/desa/kegiatan/{{ auth()->user()->id_desa }}">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Jmlah Pengaduan {{$pengaduan}}</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="/desa/pengaduan/{{ auth()->user()->id_desa }}">Lihat Detail</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div id="data-day" data-day1="{{$dataDay1}}" data-day2="{{$dataDay2}}" data-day3="{{$dataDay3}}" data-day4="{{$dataDay4}}" data-day5="{{$dataDay5}}" data-day6="{{$dataDay6}}" data-day7="{{$dataDay7}}"></div>

                            <div id="data-label-day" data-labelday1="{{$labelDay1}}" data-labelday2="{{$labelDay2}}" data-labelday3="{{$labelDay3}}" data-labelday4="{{$labelDay4}}" data-labelday5="{{$labelDay5}}" data-labelday6="{{$labelDay6}}" data-labelday7="{{$labelDay7}}"></div>

                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Data Pengaduan Masyarakat Dalam 7 Hari Terakhir
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div id="data-labelmonth" data-labelmonth1="{{$monthName1}}" data-labelmonth2="{{$monthName2}}" data-labelmonth3="{{$monthName3}}" data-labelmonth4="{{$monthName4}}" data-labelmonth5="{{$monthName5}}" data-labelmonth6="{{$monthName6}}"></div>
                            
                            <div id="data-month" data-month1="{{$monthData1}}" data-month2="{{$monthName2}}" data-month3="{{$monthName3}}" data-month4="{{$monthName4}}" data-month5="{{$monthName5}}" data-month6="{{$monthName6}}"></div>

                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Data Pengaduan Masyarakat Dalam 6 Bulan Terakhir
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
