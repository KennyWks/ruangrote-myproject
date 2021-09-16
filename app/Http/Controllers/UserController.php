<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\SuperAdmin;

class UserController extends Controller
{
    public function getIndex(){
        $pengaduan = DB::table('pengaduan')->get();
        
        $data = [
            'pengaduan' => $pengaduan
        ];
        
        return view('beranda', $data);
    }
    
    public function desa(){
       return view('desa');
    }

    public function logIn(){
        return view('auth/admin/login', [
            'title' => 'Ruang Rote | Login',
        ]);
    }

    public function signIn(Request $request){
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
            if(auth()->user()->roleId == 2) {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/desa/dashboard');
            }
        }

        return redirect('/login')->withErrors($validator)->withInput()->with('loginError', 'Login Gagal!');
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
            'roleId' => 'required',
        ];

        $input = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'konfirmasiPassword' => $request->input('konfirmasiPassword'),
            'email' => $request->input('email'),
            'namaLengkap' => $request->input('namaLengkap'),
            'nomorTelepon' => $request->input('nomorTelepon'),
            'roleId' => $request->input('roleId')
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
            return redirect('/register')->withErrors($validator)->withInput();
        }

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'namaLengkap' => $request->input('namaLengkap'),
            'nomorTelepon' => $request->input('nomorTelepon'),
            'roleId' => $request->input('roleId')
        ];

        $data['password'] = Hash::make($data['password']); 
        SuperAdmin::create($data);
         
        return redirect('/login')->with('success', 'Registrasi berrhasil!');
     }

     public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
     }
}
