<?php

namespace App\Http\Controllers;

use App\Models\ProfilDesa;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        $opdAktif = DB::table('superadmin')->where('aktif', '1')->where('roleId', '1')->get()->count();
        $opdNonAktif = DB::table('superadmin')->where('aktif', '0')->where('roleId', '1')->get()->count();
        $superadmin = DB::table('superadmin')->where('roleId', '2')->get()->count();
        $desa = DB::table('profil_desa')->get()->count();
        return view('admin/dashboard', [
            'active' => 'dashboard',
            'opdAktif' => $opdAktif,
            'opdNonAktif' => $opdNonAktif,
            'superadmin' => $superadmin,
            'desa' => $desa
        ]);
    }
    
    //Desa
    public function dataDesa(){
        $desa = DB::table('profil_desa')->get();
        $data = [
            'desa' => $desa,
            'active' => 'data desa'
        ];
        return view('admin/data-desa', $data);
    }

    public function insertDesa(Request $request){
        $rules = [
            'nama_desa' => 'required',
            'kecamatan' => 'required',
            'kota_kab' => 'required',
            'kontak' => 'required|numeric|digits_between:11,12|unique:profil_desa',
            'alamat' => 'required',
        ];

        $input = [
            'nama_desa' => $request->input('nama_desa'), 
            'kecamatan' => $request->input('kecamatan'), 
            'kota_kab' => $request->input('kota_kab'), 
            'kontak' => $request->input('kontak'), 
            'alamat' => $request->input('alamat'), 
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'digits_between' => 'Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => 'Kolom :attribute harus berupa karakter angka.',
            'unique' => 'Kontak :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/admin/data-desa')->withErrors($validator)->withInput();
        }

        $path = "/upload/foto_struktur/default.png";

        if ($request->hasFile('foto_struktur')) {
            $filename = $request->file('foto_struktur')->getClientOriginalName();
            $temp = $request->file('foto_struktur')->getPathName();
            $file = $request->input('nama_desa')."_".$filename;
            $folder = "upload/foto_struktur/".$file;
            move_uploaded_file($temp, $folder);

            $path = "/upload/foto_struktur/".$file;
        }

        $data = [
            'nama_desa' => $request->input('nama_desa'), 
            'kecamatan' => $request->input('kecamatan'), 
            'kota_kab' => $request->input('kota_kab'), 
            'provinsi' => 'Nusa Tenggara Timur', 
            'kontak' => $request->input('kontak'), 
            'alamat' => $request->input('alamat'), 
            'foto_struktur' => $path, 
        ];

        ProfilDesa::create($data);        
         
        return redirect('/admin/data-desa')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function updateDesa(Request $request){
        
        $rules = [
            'nama_desa' => 'required',
            'kecamatan' => 'required',
            'kota_kab' => 'required',
            'kontak' => 'required|numeric|digits_between:11,12|unique:profil_desa',
            'alamat' => 'required',
        ];

        $input = [
            'nama_desa' => $request->input('nama_desa'), 
            'kecamatan' => $request->input('kecamatan'), 
            'kota_kab' => $request->input('kota_kab'), 
            'kontak' => $request->input('kontak'), 
            'alamat' => $request->input('alamat'), 
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'digits_between' => 'Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => 'Kolom :attribute harus berupa karakter angka.',
            'unique' => 'Inputan :attribute sudah terdaftar.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/admin/data-desa')->withErrors($validator)->withInput();
        }

        $path = "/upload/foto_struktur/default.png";

        if ($request->hasFile('foto_struktur')) {
            $filename = $request->file('foto_struktur')->getClientOriginalName();
            $temp = $request->file('foto_struktur')->getPathName();
            $file = $request->input('nama_desa')."_".$filename;
            $folder = "upload/foto_struktur/".$file;
            move_uploaded_file($temp, $folder);

            $path = "/upload/foto_struktur/".$file;
        }

        $data = [
            'nama_desa' => $request->input('nama_desa'), 
            'kecamatan' => $request->input('kecamatan'), 
            'kota_kab' => $request->input('kota_kab'), 
            'provinsi' => 'Nusa Tenggara Timur', 
            'kontak' => $request->input('kontak'), 
            'alamat' => $request->input('alamat'), 
            'foto_struktur' => $path, 
        ];

        DB::table('profil_desa')->where('id_desa', $request->input('id_desa'))
            ->update($data);
         
        return redirect('/admin/data-desa')->with('success', 'Data berhasil diubah');
    }

    public function deleteDesa(Request $request){
        DB::table('profil_desa')->where('id_desa', '=', $request->input('id_desa'))->delete();
        return redirect('/admin/data-desa');
    }

    //Akun opd desa
    public function dataAkunAdmin(){
        $admin = DB::table('superadmin')->join('profil_desa', 'profil_desa.id_desa', '=', 'superadmin.id_desa')->orderBy('superadmin.created_at', 'desc')->get();
        $desa = DB::table('profil_desa')->get();
        $data = [
            'admin' => $admin,
            'desa' => $desa,
            'active' => 'Admin'
        ];
        return view('admin/data-admin', $data);
    }

    public function insertAkun(Request $request){
        $rules = [
            'username' => 'required|unique:superadmin',
            'password' => 'required|min:8',
            'email' => 'required|email:dns|unique:superadmin',
            'nomorTelepon' => 'required|numeric|digits_between:11,12|unique:superadmin',
            'namaLengkap' => 'required',
            'roleId' => 'required',
            'id_desa' => 'required',
        ];

        $input = [
            'username' => $request->input('username'), 
            'password' => $request->input('password'), 
            'email' => $request->input('email'), 
            'nomorTelepon' => $request->input('nomorTelepon'), 
            'namaLengkap' => $request->input('namaLengkap'), 
            'roleId' => $request->input('roleId'), 
            'id_desa' => $request->input('id_desa'), 
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'min' => 'Kolom :attribute minimal :min karakter.',
            'digits_between' => 'Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => 'Kolom :attribute harus berupa karakter angka.',
            'unique' => 'Inputan :attribute sudah terdaftar.',
            'email' => 'Domain :attribute tidak valid.',      
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/admin/data-admin')->withErrors($validator)->withInput();
        }

        $aktif = $request->input('aktif') !== null ? '1' : '0'; 

        $data = [
            'username' => $request->input('username'), 
            'password' => $request->input('password'), 
            'email' => $request->input('email'), 
            'nomorTelepon' => $request->input('nomorTelepon'), 
            'namaLengkap' => $request->input('namaLengkap'), 
            'roleId' => $request->input('roleId'), 
            'id_desa' => $request->input('id_desa'), 
            'aktif' => $aktif, 
        ];
        
        $data['password'] = Hash::make($data['password']); 

        SuperAdmin::create($data);  
         
        return redirect('/admin/data-admin')->with('success', 'Data berhasil ditambahkan');
    }

    public function updateAkun(Request $request){
        $rules = [
            'username' => 'required|unique:superadmin',
            'password' => 'required|min:8',
            'email' => 'required|email:dns|unique:superadmin',
            'nomorTelepon' => 'required|numeric|digits_between:11,12|unique:superadmin',
            'namaLengkap' => 'required',
            'roleId' => 'required',
            'id_desa' => 'required',
        ];

        $input = [
            'username' => $request->input('username'), 
            'password' => $request->input('password'), 
            'email' => $request->input('email'), 
            'nomorTelepon' => $request->input('nomorTelepon'), 
            'namaLengkap' => $request->input('namaLengkap'), 
            'roleId' => $request->input('roleId'), 
            'id_desa' => $request->input('id_desa'), 
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'min' => 'Kolom :attribute minimal :min karakter.',
            'digits_between' => 'Kolom :attribute minimal 11 dan maksimal 12 karekter.',
            'numeric' => 'Kolom :attribute harus berupa karakter angka.',
            'unique' => 'Inputan :attribute sudah terdaftar.',
            'email' => 'Domain :attribute tidak valid.',      
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/admin/data-admin')->withErrors($validator)->withInput();
        }

        $aktif = $request->input('aktif') !== null ? '1' : '0'; 

        $data = [
            'username' => $request->input('username'), 
            'password' => $request->input('password'), 
            'email' => $request->input('email'), 
            'nomorTelepon' => $request->input('nomorTelepon'), 
            'namaLengkap' => $request->input('namaLengkap'), 
            'roleId' => $request->input('roleId'), 
            'id_desa' => $request->input('id_desa'),
            'aktif' => $aktif,  
        ];
        
        $data['password'] = Hash::make($data['password']); 

        DB::table('superadmin')->where('id_admin', $request->input('id_admin'))->update($data);
         
        return redirect('/admin/data-admin')->with('success', 'Data berhasil diubah');
    }

    public function detailAkun(Request $request){
        $admin = SuperAdmin::find($request->input('id'));
        echo json_encode($admin);
    }

    public function setAktif(Request $request){
        $data = [
            'aktif' => $request->input('aktif') == 1 ? '0' : '1'
        ];
        DB::table('superadmin')->where('id_admin', $request->input('id_admin'))->update($data);
        return redirect('/admin/data-admin')->with('success', 'Status aktif akun berhasil diubah');
    }

    public function deleteAdmin(Request $request){
        DB::table('superadmin')->where('id_admin', '=', $request->input('id_admin'))->delete();
        return redirect('/admin/data-admin');
    }
}