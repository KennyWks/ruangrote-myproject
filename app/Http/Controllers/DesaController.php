<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DokumenDesa;
use App\Models\Kegiatan;
use App\Models\Pengaduan;
use App\Models\ProdukHukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProfilDesa;
use App\Models\PublikasiDesa;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DesaController extends Controller {
    public function dashboard(){

        $dokumen = DB::table('dokumen_desa')->where('id_desa', auth()->user()->id_desa)->get()->count();
        $prokum = DB::table('produk_hukum')->where('id_desa', auth()->user()->id_desa)->get()->count();
        $kegiatan = DB::table('kegiatan')->where('id_desa', auth()->user()->id_desa)->get()->count();
        $pengaduan = DB::table('pengaduan')->where('instansi', auth()->user()->id_desa)->get()->count();

        // pengaduan per bulan
        $monthData1 = Pengaduan::where('instansi', auth()->user()->id_desa)->whereMonth('created_at', '=', date('n'))->get()->count();
        $monthData2 = Pengaduan::where('instansi', auth()->user()->id_desa)->whereMonth('created_at', '=', intval(date('n') - 1))->get()->count();
        $monthData3 = Pengaduan::where('instansi', auth()->user()->id_desa)->whereMonth('created_at', '=', intval(date('n') - 2))->get()->count();
        $monthData4 = Pengaduan::where('instansi', auth()->user()->id_desa)->whereMonth('created_at', '=', intval(date('n') - 3))->get()->count();
        $monthData5 = Pengaduan::where('instansi', auth()->user()->id_desa)->whereMonth('created_at', '=', intval(date('n') - 4))->get()->count();
        $monthData6 = Pengaduan::where('instansi', auth()->user()->id_desa)->whereMonth('created_at', '=', intval(date('n') - 5))->get()->count();
      
        // pengaduan per hari
        $date_array = array();
        $i = 0;
        while ($i < 7) {
            $today = Carbon::today();
            array_push($date_array, $today->subDays($i)->format('Y-m-d'));
            $i++;
        }

        $days = [];
        foreach($date_array as $date){            
            $data = Pengaduan::where('instansi', auth()->user()->id_desa)->where(DB::raw("TO_DATE(to_char(created_at,'YYYY-MM-DD'),'YYYY-MM-DD') = to_timestamp('$date', 'YYYY-MM-DD')"))->get()->count();
            array_push($days, "$data");
        }

        return view('desa.dashboard', [
            'active' => 'dashboard',
            'dokumen' => $dokumen,
            'prokum' => $prokum,
            'kegiatan' => $kegiatan,
            'pengaduan' => $pengaduan,
            'monthData1' => $monthData1,
            'monthData2' => $monthData2,
            'monthData3' => $monthData3,
            'monthData4' => $monthData4,
            'monthData5' => $monthData5,
            'monthData6' => $monthData6,
            'labelDay1' => $date_array[0],
            'labelDay2' => $date_array[1],
            'labelDay3' => $date_array[2],
            'labelDay4' => $date_array[3],
            'labelDay5' => $date_array[4],
            'labelDay6' => $date_array[5],
            'labelDay7' => $date_array[6],
            'dataDay1' => $days[0],
            'dataDay2' => $days[1],
            'dataDay3' => $days[2],
            'dataDay4' => $days[3],
            'dataDay5' => $days[4],
            'dataDay6' => $days[5],
            'dataDay7' => $days[6],
        ]);
    }

    public function dataDesa($id_desa){
        $desa = DB::table('profil_desa')->where('id_desa', $id_desa)->get();
        return view('desa.profil', [
            'desa' => $desa,
            'active' => 'profil'
        ]);
    }

    public function detailDesa(Request $request){
        $desa = ProfilDesa::find($request->input('id'));
        echo json_encode($desa);
    }

    public function updateDesa(Request $request){

        if($request->input('gambar_valid') !== null){
            $filename = $request->file('gambar')->getClientOriginalName();
            $temp = $request->file('gambar')->getPathName();
            $file = $request->input('nama_desa')."_".$filename;
            $folder = "upload/foto_struktur/".$file;
            move_uploaded_file($temp, $folder);

            DB::table('profil_desa')->where('id_desa', $request->input('id_desa'))
        ->update([
            'nama_desa' => $request->input('nama_desa'), 
            'kecamatan' => $request->input('kecamatan'), 
            'kota_kab' => $request->input('kotakab'), 
            'kontak' => $request->input('kontak'), 
            'alamat' => $request->input('alamat'), 
            'foto_struktur' => "/upload/foto_struktur/".$file, 
        ]);
        } else {
            DB::table('profil_desa')->where('id_desa', $request->input('id_desa'))
            ->update([
                'nama_desa' => $request->input('nama_desa'), 
                'kecamatan' => $request->input('kecamatan'), 
                'kota_kab' => $request->input('kotakab'), 
                'kontak' => $request->input('kontak'), 
                'alamat' => $request->input('alamat'), 
            ]);
        }

        return redirect('/desa/profil/'.auth()->user()->id_desa)->with('success', 'Profil berhasil diubah');
    }

    public function publikasiDesa($id_desa){
        $publikasi = DB::table('publikasi_desa')->where('id_desa', $id_desa)->get();
        return view('desa.publikasi', [
            'publikasi' => $publikasi,
            'active' => 'publikasi'
        ]);
    }

    public function detailPublikasi(Request $request){
        $publikasi = PublikasiDesa::find($request->input('id'));
        echo json_encode($publikasi);
    }

    public function insertPublikasi(Request $request){
        $rules = [
            'isi' => 'required',
            'judul' => 'required',
            'instansi' => 'required',
            'id_desa' => 'required'
        ];

        $input = [
            'id_desa' => $request->input('id_desa'),
            'isi' => $request->input('isi'),
            'judul' => $request->input('judul'),
            'instansi' => $request->input('instansi'),
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/desa/publikasi/'.auth()->user()->id_desa)->withErrors($validator)->withInput();
        }

        PublikasiDesa::create($input);
         
        return redirect('/desa/publikasi/'.auth()->user()->id_desa)->with('success', 'Publikasi berhasil ditambahkan');
    }

    public function updatePublikasi(Request $request){
        $rules = [
            'isi' => 'required',
            'judul' => 'required',
            'instansi' => 'required',
            'id_desa' => 'required'
        ];

        $input = [
            'id_desa' => $request->input('id_desa'),
            'isi' => $request->input('isi'),
            'judul' => $request->input('judul'),
            'instansi' => $request->input('instansi'),
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/desa/publikasi/'.auth()->user()->id_desa)->withErrors($validator)->withInput();
        }

        PublikasiDesa::where('id_publikasi', $request->input('id'))->update($input);
        
        return redirect('/desa/publikasi/'.auth()->user()->id_desa)->with('success', 'Publikasi berhasil diubah');
    }
    
    public function deletePublikasi(Request $request){
        DB::table('publikasi_desa')->where('id_publikasi', $request->input('id'))->delete();
        return redirect('/desa/publikasi/'.auth()->user()->id_desa)->with('success', 'Publikasi berhasil ditambahkan');
    }

    public function kegiatanDesa($id_desa){
        $kegiatan = DB::table('kegiatan')->where('id_desa', $id_desa)->get();
        return view('desa.kegiatan', [
            'kegiatan' => $kegiatan,
            'active' => 'kegiatan'
        ]);
    }

    public function detailKegiatan(Request $request){
        $publikasi = Kegiatan::find($request->input('id'));
        echo json_encode($publikasi);
    }

    public function insertKegiatan(Request $request){

        $rules = [
            'id_desa' => 'required',
            'judul' => 'required',
            'gambar' => 'file',
            'keterangan' => 'required',
        ];

        $input = [
            'id_desa' => $request->input('id_desa'),
            'judul' => $request->input('judul'),
            'gambar' => $request->file('gambar'),
            'keterangan' => $request->input('keterangan'),
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'file' => 'Gambar :attribute wajib dipilih.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/desa/kegiatan/'.auth()->user()->id_desa)->withErrors($validator)->withInput();
        }

        $fileName = uniqid();
        $fileExtension = $request->file('gambar')->getClientOriginalName();
        $file = $fileName.$fileExtension;

        $temp = $request->file('gambar')->getPathName();
        $folder = "upload/foto_kegiatan/".$file;
        move_uploaded_file($temp, $folder);

        $input = [
            'id_desa' => $request->input('id_desa'),
            'judul' => $request->input('judul'),
            'foto' => '/'.$folder,
            'keterangan' => $request->input('keterangan'),
        ];

        Kegiatan::create($input);
         
        return redirect('/desa/kegiatan/'.auth()->user()->id_desa)->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function updateKegiatan(Request $request){

        $rules = [
            'id_desa' => 'required',
            'judul' => 'required',
            'keterangan' => 'required',
        ];

        $input = [
            'id_desa' => $request->input('id_desa'),
            'judul' => $request->input('judul'),
            'keterangan' => $request->input('keterangan'),
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/desa/kegiatan/'.auth()->user()->id_desa)->withErrors($validator)->withInput();
        }
        
        if($request->input('gambar_valid') !== null){
            $fileName = uniqid();
            $fileExtension = $request->file('gambar')->getClientOriginalName();
            $file = $fileName.$fileExtension;
            $folder = "upload/foto_kegiatan/".$file;
            $temp = $request->file('gambar')->getPathName();
            move_uploaded_file($temp, $folder);
            $input = [
                'id_desa' => $request->input('id_desa'),
                'judul' => $request->input('judul'),
                'foto' => '/'.$folder,
                'keterangan' => $request->input('keterangan'),
            ];
        } else {
            $input = [
                'id_desa' => $request->input('id_desa'),
                'judul' => $request->input('judul'),
                'keterangan' => $request->input('keterangan'),
            ];
        }

        Kegiatan::where('id_kegiatan', $request->input('id'))->update($input);
        
        return redirect('/desa/kegiatan/'.auth()->user()->id_desa)->with('success', 'Kegiatan berhasil diubah');
    }
    
    public function deleteKegiatan(Request $request){
        DB::table('kegiatan')->where('id_kegiatan',$request->input('id'))->delete();
        return redirect('/desa/kegiatan/'.auth()->user()->id_desa)->with('success', 'Kegiatan berhasil dihapus');
    }

    public function pengaduan($id_desa){
        $pengaduan = DB::table('pengaduan')->where('instansi', $id_desa)->get();
        return view('desa.pengaduan', [
            'pengaduan' => $pengaduan,
            'active' => 'pengaduan'
        ]);
    }

    public function detailPengaduan(Request $request){
        $pengaduan = Pengaduan::find($request->input('id'));
        echo json_encode($pengaduan);
    }

    public function dokumen($id_desa){
        $dokumen = DB::table('dokumen_desa')->where('id_desa', $id_desa)->get();
        return view('desa.dokumen', [
            'dokumen' => $dokumen,
            'active' => 'dokumen'
        ]);
    }

    public function detailDokumen(Request $request){
        $dokumen = DokumenDesa::find($request->input('id'));
        echo json_encode($dokumen);
    }

    public function insertDokumen(Request $request){

        $rules = [
            'tahun' => 'required',
            'rpjm' => 'required|file|max:500',
            'rkp' => 'required|file|max:500',
            'apbd' => 'required|file|max:500',
            'pj_sm1' => 'required|file|max:500',
            'pj_sm2' => 'required|file|max:500',
            'kegiatan_prioritas' => 'required|file|max:500',
            'peraturan' => 'required|file|max:500',
        ];

        $input = [
            'tahun' => $request->input('tahun'),
            'rpjm' => $request->file('rpjm'),
            'rkp' => $request->file('rkp'),
            'apbd' => $request->file('apbd'),
            'pj_sm1' => $request->file('pj_sm1'),
            'pj_sm2' => $request->file('pj_sm2'),
            'kegiatan_prioritas' => $request->file('kegiatan_prioritas'),
            'peraturan' => $request->file('peraturan'),
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'file' => 'File :attribute wajib dipilih.',
            'max' => 'Ukuran file :attribute maksimal :size Kb.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/desa/dokumen/'.auth()->user()->id_desa)->withErrors($validator)->withInput();
        } else {
            $fileRPJM = uniqid().$request->file('rpjm')->getClientOriginalName();
            $pathRPJM = "upload/file_dokumen/".$fileRPJM;
            move_uploaded_file($request->file('rpjm')->getPathName(), $pathRPJM);

            $fileRKP = uniqid().$request->file('rkp')->getClientOriginalName();
            $pathRKP = "upload/file_dokumen/".$fileRKP;
            move_uploaded_file($request->file('rkp')->getPathName(), $pathRKP);

            $fileAPBD = uniqid().$request->file('apbd')->getClientOriginalName();
            $pathAPBD = "upload/file_dokumen/".$fileAPBD;
            move_uploaded_file($request->file('apbd')->getPathName(), $pathAPBD);

            $filePJSM1 = uniqid().$request->file('pj_sm1')->getClientOriginalName();
            $pathPJMSM1 = "upload/file_dokumen/".$filePJSM1;
            move_uploaded_file($request->file('pj_sm1')->getPathName(), $pathPJMSM1);

            $filePJSM2 = uniqid().$request->file('pj_sm2')->getClientOriginalName();
            $pathPJMSM2 = "upload/file_dokumen/".$filePJSM2;
            move_uploaded_file($request->file('pj_sm2')->getPathName(), $pathPJMSM2);

            $fileKegiatanPrioritas = uniqid().$request->file('kegiatan_prioritas')->getClientOriginalName();
            $pathKegiatanPrioritas = "upload/file_dokumen/".$fileKegiatanPrioritas;
            move_uploaded_file($request->file('kegiatan_prioritas')->getPathName(), $pathKegiatanPrioritas);

            $filePeraturan = uniqid().$request->file('peraturan')->getClientOriginalName();
            $pathPeraturan = "upload/file_dokumen/".$filePeraturan;
            move_uploaded_file($request->file('peraturan')->getPathName(), $pathPeraturan);

            $data = [
                'tahun' => $request->input('tahun'),
                'id_desa' => $request->input('id_desa'),
                'rpjm' => '/'.$pathRPJM,
                'rkp' => '/'.$pathRKP,
                'apbd' => '/'.$pathAPBD,
                'pj_sm1' => '/'.$pathPJMSM1,
                'pj_sm2' => '/'.$pathPJMSM2,
                'kegiatan_prioritas' => '/'.$pathKegiatanPrioritas,
                'peraturan' => '/'.$pathPeraturan,
            ];

            DokumenDesa::create($data);
            
            return redirect('/desa/dokumen/'.auth()->user()->id_desa)->with('success', 'Dokumen berhasil ditambahkan');
        }
    }

    public function updateDokumen(Request $request){

        $rules = [
            'tahun' => 'required',
            'rpjm' => 'required|file|max:500',
            'rkp' => 'required|file|max:500',
            'apbd' => 'required|file|max:500',
            'pj_sm1' => 'required|file|max:500',
            'pj_sm2' => 'required|file|max:500',
            'kegiatan_prioritas' => 'required|file|max:500',
            'peraturan' => 'required|file|max:500',
        ];

        $input = [
            'tahun' => $request->input('tahun'),
            'rpjm' => $request->file('rpjm'),
            'rkp' => $request->file('rkp'),
            'apbd' => $request->file('apbd'),
            'pj_sm1' => $request->file('pj_sm1'),
            'pj_sm2' => $request->file('pj_sm2'),
            'kegiatan_prioritas' => $request->file('kegiatan_prioritas'),
            'peraturan' => $request->file('peraturan'),
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'file' => 'File :attribute wajib dipilih.',
            'max' => 'Ukuran file :attribute max 500 Kb.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/desa/dokumen/'.auth()->user()->id_desa)->withErrors($validator)->withInput();
        } else {
            $fileRPJM = uniqid().$request->file('rpjm')->getClientOriginalName();
            $pathRPJM = "upload/file_dokumen/".$fileRPJM;
            move_uploaded_file($request->file('rpjm')->getPathName(), $pathRPJM);

            $fileRKP = uniqid().$request->file('rkp')->getClientOriginalName();
            $pathRKP = "upload/file_dokumen/".$fileRKP;
            move_uploaded_file($request->file('rkp')->getPathName(), $pathRKP);

            $fileAPBD = uniqid().$request->file('apbd')->getClientOriginalName();
            $pathAPBD = "upload/file_dokumen/".$fileAPBD;
            move_uploaded_file($request->file('apbd')->getPathName(), $pathAPBD);

            $filePJSM1 = uniqid().$request->file('pj_sm1')->getClientOriginalName();
            $pathPJMSM1 = "upload/file_dokumen/".$filePJSM1;
            move_uploaded_file($request->file('pj_sm1')->getPathName(), $pathPJMSM1);

            $filePJSM2 = uniqid().$request->file('pj_sm2')->getClientOriginalName();
            $pathPJMSM2 = "upload/file_dokumen/".$filePJSM2;
            move_uploaded_file($request->file('pj_sm2')->getPathName(), $pathPJMSM2);

            $fileKegiatanPrioritas = uniqid().$request->file('kegiatan_prioritas')->getClientOriginalName();
            $pathKegiatanPrioritas = "upload/file_dokumen/".$fileKegiatanPrioritas;
            move_uploaded_file($request->file('kegiatan_prioritas')->getPathName(), $pathKegiatanPrioritas);

            $filePeraturan = uniqid().$request->file('peraturan')->getClientOriginalName();
            $pathPeraturan = "upload/file_dokumen/".$filePeraturan;
            move_uploaded_file($request->file('peraturan')->getPathName(), $pathPeraturan);

            $data = [
                'tahun' => $request->input('tahun'),
                'rpjm' =>  '/'.$pathRPJM,
                'rkp' => '/'.$pathRKP,
                'apbd' => '/'.$pathAPBD,
                'pj_sm1' => '/'.$pathPJMSM1,
                'pj_sm2' => '/'.$pathPJMSM2,
                'kegiatan_prioritas' => '/'.$pathKegiatanPrioritas,
                'peraturan' => '/'.$pathPeraturan,
            ];

            DB::table('dokumen_desa')->where('id_dokumen', $request->input('id'))->update($data);
            
            return redirect('/desa/dokumen/'.auth()->user()->id_desa)->with('success', 'Dokumen berhasil diubah');
        }
    }

    public function deleteDokumen(Request $request){
        DB::table('dokumen_desa')->where('id_dokumen',$request->input('id'))->delete();
        return redirect('/desa/dokumen/'.auth()->user()->id_desa)->with('success', 'Dokumen berhasil dihapus');
    }

    public function prokum($id_desa){
        $prokum = DB::table('produk_hukum')->where('id_desa', $id_desa)->get();
        return view('desa.prokum', [
            'prokum' => $prokum,
            'active' => 'prokum'
        ]); 
    }

    public function insertProkum(Request $request){

        $rules = [
            'produk_hukum' => 'required|file|max:500',
        ];

        $input = [
            'produk_hukum' => $request->file('produk_hukum'),
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'file' => 'File :attribute wajib dipilih.',
            'max' => 'Ukuran file :attribute max 500 Kb.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/desa/prokum/'.auth()->user()->id_desa)->withErrors($validator)->withInput();
        } else {
            $file = uniqid().$request->file('produk_hukum')->getClientOriginalName();
            $path = "upload/file_dokumen/".$file;
            move_uploaded_file($request->file('produk_hukum')->getPathName(), $path);

            $data = [
                'id_desa' => auth()->user()->id_desa,
                'produk_hukum' => '/'.$path,
            ];

            ProdukHukum::create($data);
            
            return redirect('/desa/prokum/'.auth()->user()->id_desa)->with('success', 'Produk hukum berhasil ditambahkan');
        }
    }

    public function detailProkum(Request $request){
        $prokum = ProdukHukum::find($request->input('id'));
        echo json_encode($prokum);
    }

    public function updateProkum(Request $request){

        $rules = [
            'produk_hukum' => 'required|file|max:500',
        ];

        $input = [
            'produk_hukum' => $request->file('produk_hukum'),
        ];

        $messages = [
            'required' => 'Kolom :attribute wajib diisi.',
            'file' => 'File :attribute wajib dipilih.',
            'max' => 'Ukuran file :attribute max 500 Kb.',
        ];

        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            return redirect('/desa/prokum/'.auth()->user()->id_desa)->withErrors($validator)->withInput();
        } else {
            $file = uniqid().$request->file('produk_hukum')->getClientOriginalName();
            $path = "upload/file_dokumen/".$file;
            move_uploaded_file($request->file('produk_hukum')->getPathName(), $path);

            $data = [
                'id_desa' => auth()->user()->id_desa,
                'produk_hukum' => '/'.$path,
            ];

            DB::table('produk_hukum')->where('id_prokum', $request->input('id'))->update($data);
            
            return redirect('/desa/prokum/'.auth()->user()->id_desa)->with('success', 'Produk hukum berhasil diubah');
        }
    }

    public function deleteProkum(Request $request){
        DB::table('produk_hukum')->where('id_prokum', $request->input('id'))->delete();
        return redirect('/desa/prokum/'.auth()->user()->id_desa)->with('success', 'Produk hukum berhasil dihapus');
    }    
}
