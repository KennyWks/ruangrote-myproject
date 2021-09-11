<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\SuperAdmin;

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

    public function logIn(){
        return view('auth/admin//login', [
            'title' => 'Ruang Rote | Login',
        ]);
    }

    public function signIn(Request $request){
        // $validator = $request->validate([
        //     'email' => 'required|email:dns',
        //     'password' => 'required'
        // ]);

        $rules = [
            'email' => 'required|email:dns',
            'password' => 'required'
        ];

        $input = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'email' => 'Domain :attribute tidak valid.',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if(Auth::attempt($input)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return redirect('/admin/login')->withErrors($validator)->withInput()->with('loginError', 'Login Gagal!');
    }

    public function register(){
        return view('auth/admin/register', [
            'title' => 'Ruang Rote | Register',
        ]);
    }

    public function signUp(Request $request){
        $rules = [
            'username' => ['required', 'min:6', 'max:255', 'unique:superadmin'],
            'password' => 'required|min:8|max:255',
            'konfirmasiPassword' => 'required|same:password',
            'email' => 'required|unique:superadmin|email:dns',
            'namaLengkap' => 'required|max:255',
            'nomorTelepon' => 'required|max:12|min:11|unique:superadmin',
        ];

        $input = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'konfirmasiPassword' => $request->input('konfirmasiPassword'),
            'email' => $request->input('email'),
            'namaLengkap' => $request->input('namaLengkap'),
            'nomorTelepon' => $request->input('nomorTelepon')
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'email' => 'Domain :attribute tidak valid.',
            'max' => 'Kolom :attribute maksimal :max karakter.',
            'min' => 'Kolom :attribute minimal :min karakter.',
            'unique' => 'Inputan :attribute sudah terdaftar.',
            'same' => 'Kolom :attribute dan :other harus sama.'        
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('admin/register')->withErrors($validator)->withInput();
        }

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'namaLengkap' => $request->input('namaLengkap'),
            'nomorTelepon' => $request->input('nomorTelepon')
        ];

        $data['password'] = Hash::make($data['password']); 
        SuperAdmin::create($data);
         
        return redirect('/admin/login')->with('success', 'Registrasi berrhasil!');
     }

     public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
