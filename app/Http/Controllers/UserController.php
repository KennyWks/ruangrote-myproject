<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getIndex(){
        $pengaduan = DB::table('pengaduan')->orderBy('created_at', 'desc')->get();
        $publikasi = DB::table('publikasi_desa')->join('profil_desa', 'publikasi_desa.id_desa', '=', 'profil_desa.id_desa')->orderBy('publikasi_desa.created_at', 'desc')->get();
        $desa = DB::table('profil_desa')->get();
        
        $data = [
            'pengaduan' => $pengaduan,
            'desa' => $desa,
            'publikasi' => $publikasi
        ];
        
        return view('beranda', $data);
        //return view('welcome');
    }
    public function desa(){
        return view('desa');
    }
    public function listDesa(){
        $list = DB::table('profil_desa')->get();
        $data = [
            'list' => $list
        ];
        return view('list-desa', $data);
    }
    public function profil($id){
        $desa = DB::table('profil_desa')->where('id_desa', $id)->first();
        $dokumen = DB::table('dokumen_desa')->where('id_desa', $id)->get();
        $kegiatan = DB::table('kegiatan')->where('id_desa', $id)->get();
        $kegiatan_limit = DB::table('kegiatan')->limit(3)->where('id_desa', $id)->get();
        $data = [
            'desa' => $desa,
            'dokumen' => $dokumen,
            'kegiatan_limit' => $kegiatan_limit,
            'kegiatan' => $kegiatan
        ];
        
        return view('desa', $data);
    }
    public function insertAduan(Request $request){
        DB::table('pengaduan')->insert([
            'instansi' => $request->input('instansi'),
            'kategori' => $request->input('kategori'),
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'subjek' => $request->input('subjek'),
            'isi' => $request->input('isi'),
            'tag' => $request->input('tag')
        ]);

        return redirect('/');
    }
}
