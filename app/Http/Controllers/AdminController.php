<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard(){
        //$users = DB::table('superadmin')->get();
        return view('admin/dashboard');
    }
    public function dataDesa(){
        $desa = DB::table('profil_desa')->get();
        $data = [
            'desa' => $desa
        ];
        return view('admin/data-desa', $data);
    }
    public function insertDesa(Request $request){
        $name= $_FILES['file']['name'];
        $tmp_name= $_FILES['file']['tmp_name'];
        $position= strpos($name, ".");
        $fileextension= substr($name, $position + 1);
        $fileextension= strtolower($fileextension);

        $path= 'Upload/foto_struktur/';
            
        if (($fileextension !== "jpg") && ($fileextension !== "jpeg") && ($fileextension !== "png") && ($fileextension !== "bmp")){
            echo "The file extension must be .jpg, .jpeg, .png, or .bmp in order to be uploaded";
        }
        else if (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")){
            if (move_uploaded_file($tmp_name, $path.$name)) {
                echo 'Uploaded!';
            }
        }

        DB::table('profil_desa')
        ->updateOrInsert(
            ['nama_desa' => $request->input('nama_desa'), 'kecamatan' => $request->input('kecamatan')],
            [
                'kota_kab' => $request->input('kotakab'),
                'provinsi' => 'NTT',
                'kontak' => $request->input('kontak'),
                'alamat' => $request->input('alamat'),
                'foto_struktur' => 'test.jpg',
                'username' => $request->input('username'),
                'password' => md5($request->input('password'))
            ]
        );

        return redirect('/admin/data-desa');
    }
}
