<?php

namespace Database\Seeders;

use App\Models\DokumenDesa;
use Illuminate\Database\Seeder;
use App\Models\ProfilDesa;
use App\Models\SuperAdmin;
use App\Models\PublikasiDesa;
use App\Models\Kegiatan;
use App\Models\Pengaduan;
use App\Models\ProdukHukum;
use App\Models\Roles;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        ProfilDesa::create([
            'nama_desa' => 'Oelatimo',
            'kecamatan' => 'Kupang Timur',
            'kota_kab' => 'Kab Kupang',
            'provinsi' => 'NTT',
            'kontak' => '12345',
            'alamat' => 'Jalan sulamu',
            'foto_struktur' => '/upload/foto_struktur/default.png',
        ]);

        ProfilDesa::create([
            'nama_desa' => 'Bipolo',
            'kecamatan' => 'Sulamu',
            'kota_kab' => 'Kab Kupang',
            'provinsi' => 'NTT',
            'kontak' => '54321',
            'alamat' => 'Jalan sulamu',
            'foto_struktur' => '/upload/foto_struktur/default.png',
        ]);

        SuperAdmin::create([
            'username' => 'admins',
            'password' => '$2y$10$DStoP7StHRj4NFPHN.QG/e16S0N3CQpczCYYOtEh2P1Yqi0nB/E9G',
            'email' => 'kenny.perulu@gmail.com',
            'namaLengkap' => 'Kenny Perulu',
            'nomorTelepon' => '081247569523',
            'roleId' => '2',
            'id_desa' => '3e74a87d-6e3a-4f32-9e89-c71b72c00667',
        ]);

        SuperAdmin::create([
            'username' => 'admino',
            'password' => '$2y$10$2xMLOZbu/CiXuM1URUseoeEstaH3272UdMpZfHNyEzqfzB3pczbMq',
            'email' => 'feldiamalo@gmail.com',
            'namaLengkap' => 'Feldi Amalo',
            'nomorTelepon' => '081247569532',
            'roleId' => '1',
            'id_desa' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
        ]);

        PublikasiDesa::create([
            'id_desa' => '3e74a87d-6e3a-4f32-9e89-c71b72c00667',
            'judul' => 'Kegiatan 2',
            'isi' => 'Isi Kegiatan 2',
            'instansi' => 'LPM',
        ]);

        PublikasiDesa::create([
            'id_desa' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'judul' => 'Kegiatan 1',
            'isi' => 'Isi Kegiatan 1',
            'instansi' => 'BPD',
        ]);

        Kegiatan::create([
            'id_desa' => '3e74a87d-6e3a-4f32-9e89-c71b72c00667',
            'judul' => 'Kegiatan 1',
            'foto' => '/upload/foto_kegiatan/default.png',
            'keterangan' => 'keterangan kegiatan 1',
        ]);

        Kegiatan::create([
            'id_desa' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'judul' => 'Kegiatan 2',
            'foto' => '/upload/foto_kegiatan/default.png',
            'keterangan' => 'keterangan kegiatan 2',
        ]);

        Pengaduan::create([
            'instansi' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'nama' => 'Aris',
            'email' => 'aris@gmail.com',
            'subjek' => 'pengaduan dugaan kkn1',
            'isi' => 'isi pengaduan dugaan kkn1',
            'kategori' => 'kategori1',
            'tag' => 'tag2',
        ]);

        Pengaduan::create([
            'instansi' => '3e74a87d-6e3a-4f32-9e89-c71b72c00667',
            'nama' => 'Kenny',
            'email' => 'kenny@gmail.com',
            'subjek' => 'pengaduan dugaan kkn2',
            'isi' => 'isi pengaduan dugaan kkn2',
            'kategori' => 'kategori2',
            'tag' => 'tag2',
        ]);

        DokumenDesa::create([
            'id_desa' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'tahun' => '20211',
            'rpjm' => '/upload/file_dokumen/rpjm1.pdf',
            'rkp' => '/upload/file_dokumen/rkp1.pdf',
            'apbd' => '/upload/file_dokumen/apbd1.pdf',
            'pj_sm1' => '/upload/file_dokumen/pj_sm11.pdf',
            'pj_sm2' => '/upload/file_dokumen/pj_sm21.pdf',
            'kegiatan_prioritas' => '/upload/file_dokumen/kegiatan_prioritas1.pdf',
            'peraturan' => '/upload/file_dokumen/peraturan1.pdf',
        ]);

        DokumenDesa::create([
            'id_desa' => '3e74a87d-6e3a-4f32-9e89-c71b72c00667',
            'tahun' => '20212',
            'rpjm' => '/upload/file_dokumen/rpjm2.pdf',
            'rkp' => '/upload/file_dokumen/rkp2.pdf',
            'apbd' => '/upload/file_dokumen/apbd2.pdf',
            'pj_sm1' => '/upload/file_dokumen/pj_sm12.pdf',
            'pj_sm2' => '/upload/file_dokumen/pj_sm22.pdf',
            'kegiatan_prioritas' => '/upload/file_dokumen/kegiatan_prioritas2.pdf',
            'peraturan' => '/upload/file_dokumen/peraturan2.pdf',
        ]);

        ProdukHukum::create([
            'id_prokum' => '3e74a87d-6e3a-4f32-9e89-c71b72c00667',
            'id_desa' => '3e74a87d-6e3a-4f32-9e89-c71b72c00667',
            'produk_hukum' => 'produkhukum1.pdf',
        ]);

        ProdukHukum::create([
            'id_prokum' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'id_desa' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'produk_hukum' => '/upload/file_prokum/produkhukum2.pdf',
        ]);

        Roles::create([
            'name' => 'ROLE_ADMIN',
            'description' => 'Akun role for admin/opd',
        ]);
        
        Roles::create([
            'name' => 'ROLE_SUPERADMIN',
            'description' => 'Akun role for super admin',
        ]);
 
    }
}
