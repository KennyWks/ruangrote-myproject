<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_SUPERADMIN');
    }

    public function dashboard(){
        //$users = DB::table('superadmin')->get();
        return view('admin/dashboard');
    }
    
    //Desa
    public function dataDesa(){
        $desa = DB::table('profil_desa')->get();
        $data = [
            'desa' => $desa,
            'active' => 'profil'
        ];
        return view('admin/data-desa', $data);
    }

    public function insertDesa(Request $request){
        $filename = $request->file('gambar')->getClientOriginalName();
        $temp = $request->file('gambar')->getPathName();
        $file = $request->input('nama_desa')."_".$filename;
    
        $folder = "upload/foto_struktur/".$file;
                           
        move_uploaded_file($temp, $folder);
        //dd($file);
        
        DB::table('profil_desa')->insert(['nama_desa' => $request->input('nama_desa'), 'kecamatan' => $request->input('kecamatan'), 'kota_kab' => $request->input('kotakab'), 'provinsi' => 'NTT', 'kontak' => $request->input('kontak'), 'alamat' => $request->input('alamat'), 'foto_struktur' => $file, 'username' => $request->input('username'), 'password' => md5($request->input('password'))]);
        return redirect('/admin/data-desa');
    }
    
    public function updateDesa(Request $request){
        if(null !== $request->input('gambar_valid')){
            $filename = $request->file('gambar')->getClientOriginalName();
            $temp = $request->file('gambar')->getPathName();
            $file = $request->input('nama_desa')."_".$filename;

            $folder = "upload/foto_struktur/".$file;
                                
            move_uploaded_file($temp, $folder);
        }else{    
            DB::table('profil_desa')->where('id', $request->input('id_desa'))
            ->update(['nama_desa' => $request->input('nama_desa'), 'kecamatan' => $request->input('kecamatan'), 'kota_kab' => $request->input('kotakab'), 'provinsi' => 'NTT', 'kontak' => $request->input('kontak'), 'alamat' => $request->input('alamat'), 'foto_struktur' => 'upload/foto_struktur/test.jpg', 'username' => $request->input('username')]);
        }               
        return redirect('/admin/data-desa');
    }

    public function deleteDesa($id){
        DB::table('profil_desa')->where('id_desa', '=', $id)->delete();
        return redirect('/admin/data-desa');
    }

    public function passDesa(Request $request){
        DB::table('profil_desa')->where('id_desa', '=', $request->input('id_desa'))->update(['password' => md5($request->input('password'))]);
        return redirect('/admin/data-desa');
    }

    //Dokumen
    public function dokumen($id){
        $jumlah_dok = DB::table('dokumen_desa')->where('id_desa', $id)->count();
        $dokumen = DB::table('dokumen_desa')->where('id_desa', $id)->get();
        $desa = DB::table('profil_desa')->where('id_desa', $id)->first();
        $data = [
            'desa' => $desa,
            'jumlah_dok' => $jumlah_dok,
            'dokumen' => $dokumen
        ];
        return view('admin/dokumen', $data);
    }
    
    public function dokumenInsert($id){
    }
}
