<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getIndex(){
        $pengaduan = DB::table('pengaduan')->get();
        
        $data = [
            'pengaduan' => $pengaduan
        ];
        
        return view('beranda', $data);
        //return view('welcome');
    }
    public function desa(){
       return view('desa');
    }
}
