<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getIndex(){
        $users = DB::table('superadmin')->get();
        
        echo $users;

        //return view('welcome');
    }
}
