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
            'alamat' => 'Jalan sulamu 1',
            'foto_struktur' => '/upload/foto_struktur/default.png',
        ]);

        ProfilDesa::create([
            'nama_desa' => 'Bipolo',
            'kecamatan' => 'Sulamu',
            'kota_kab' => 'Kab Kupang',
            'provinsi' => 'NTT',
            'kontak' => '54321',
            'alamat' => 'Jalan sulamu 2',
            'foto_struktur' => '/upload/foto_struktur/default.png',
        ]);

        SuperAdmin::create([
            'username' => 'admins',
            'password' => '$2y$10$DStoP7StHRj4NFPHN.QG/e16S0N3CQpczCYYOtEh2P1Yqi0nB/E9G',
            'email' => 'kenny@gmail.com',
            'namaLengkap' => 'Kenny Perulu',
            'nomorTelepon' => '081247569523',
            'roleId' => '2',
            'aktif' => '1',
            'id_desa' => '3e74a87d-6e3a-4f32-9e89-c71b72c00667',
        ]);

        SuperAdmin::create([
            'username' => 'admino1',
            'password' => '$2y$10$2xMLOZbu/CiXuM1URUseoeEstaH3272UdMpZfHNyEzqfzB3pczbMq',
            'email' => 'feldi@gmail.com',
            'namaLengkap' => 'Feldi Amalo',
            'nomorTelepon' => '081247569532',
            'roleId' => '1',
            'aktif' => '0',
            'id_desa' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
        ]);

        SuperAdmin::create([
            'username' => 'admino2',
            'password' => '$2y$10$2xMLOZbu/CiXuM1URUseoeEstaH3272UdMpZfHNyEzqfzB3pczbMq',
            'email' => 'sinyo@gmail.com',
            'namaLengkap' => 'Sinyo Day',
            'nomorTelepon' => '081247569444',
            'roleId' => '1',
            'aktif' => '1',
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
            'nama' => 'Aris1',
            'email' => 'aris@gmail.com',
            'subjek' => 'pengaduan dugaan kkn1',
            'isi' => 'isi pengaduan dugaan kkn1',
            'kategori' => 'kategori1',
            'tag' => 'tag1',
        ]);
        
        Pengaduan::create([
            'instansi' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'nama' => 'Aris2',
            'email' => 'aris@gmail.com',
            'subjek' => 'pengaduan dugaan kkn1',
            'isi' => 'isi pengaduan dugaan kkn1',
            'kategori' => 'kategori1',
            'tag' => 'tag2',
        ]);

        Pengaduan::create([
            'instansi' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'nama' => 'Aris3',
            'email' => 'aris@gmail.com',
            'subjek' => 'pengaduan dugaan kkn3',
            'isi' => 'isi pengaduan dugaan kkn3',
            'kategori' => 'kategori3',
            'tag' => 'tag3',
        ]);

        Pengaduan::create([
            'instansi' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'nama' => 'Aris4',
            'email' => 'aris@gmail.com',
            'subjek' => 'pengaduan dugaan kkn4',
            'isi' => 'isi pengaduan dugaan kkn4',
            'kategori' => 'kategori4',
            'tag' => 'tag4',
        ]);
        
        Pengaduan::create([
            'instansi' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'nama' => 'Aris5',
            'email' => 'aris@gmail.com',
            'subjek' => 'pengaduan dugaan kkn5',
            'isi' => 'isi pengaduan dugaan kkn5',
            'kategori' => 'kategori5',
            'tag' => 'tag5',
        ]);

        Pengaduan::create([
            'instansi' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'nama' => 'Aris6',
            'email' => 'aris@gmail.com',
            'subjek' => 'pengaduan dugaan kkn6',
            'isi' => 'isi pengaduan dugaan kkn6',
            'kategori' => 'kategori6',
            'tag' => 'tag6',
        ]);

        
        Pengaduan::create([
            'instansi' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'nama' => 'Aris7',
            'email' => 'aris@gmail.com',
            'subjek' => 'pengaduan dugaan kkn7',
            'isi' => 'isi pengaduan dugaan kkn7',
            'kategori' => 'kategori7',
            'tag' => 'tag7',
        ]);

        Pengaduan::create([
            'instansi' => '3e74a87d-6e3a-4f32-9e89-c71b72c00667',
            'nama' => 'Kenny',
            'email' => 'kenny@gmail.com',
            'subjek' => 'pengaduan dugaan kkn8',
            'isi' => 'isi pengaduan dugaan kkn8',
            'kategori' => 'kategori8',
            'tag' => 'tag8',
        ]);

        DokumenDesa::create([
            'id_desa' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'tahun' => '2021_1',
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
            'tahun' => '2021_2',
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
            'produk_hukum' => '/upload/file_prokum/produkhukum1.pdf',
        ]);

        ProdukHukum::create([
            'id_prokum' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'id_desa' => '818fd87e-1d84-4966-8a25-87bcbf8e218c',
            'produk_hukum' => '/upload/file_prokum/produkhukum2.pdf',
        ]);
    }
}
