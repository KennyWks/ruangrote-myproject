<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getIndex(){
        //$users = DB::table('superadmin')->get();
        
        //echo $users;
        //$superadmin = DB::table('superadmin')->get();
        //echo $superadmin;
        
        return view('beranda');
        
        return view('beranda');
        //return view('welcome');
    }
    public function desa(){
       return view('desa');
    }
}
