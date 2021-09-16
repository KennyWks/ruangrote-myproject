<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PublikasiDesa extends Migration
{
    protected $connection = 'pgsql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasi_desa', function (Blueprint $table) {
            $table->uuid('id_publikasi')->primary();
            $table->uuid('id_desa');
            $table->string('judul');
            $table->string('isi');
            $table->string('instansi');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publikasi_desa');
    }
}
