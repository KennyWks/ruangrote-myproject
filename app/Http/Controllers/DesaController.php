<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function dashboard(){
        return view('desa.dashboard');
    }
}
