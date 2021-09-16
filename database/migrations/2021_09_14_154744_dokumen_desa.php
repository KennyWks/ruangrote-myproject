<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DokumenDesa extends Migration
{
    protected $connection = 'pgsql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_desa', function (Blueprint $table) {
            $table->uuid('id_dokumen')->primary();
            $table->uuid('id_desa');
            $table->string('tahun');
            $table->string('rpjm');
            $table->string('rkp');
            $table->string('apbd');
            $table->string('pj_sm1');
            $table->string('pj_sm2');            
            $table->string('kegiatan_prioritas');            
            $table->string('peraturan');            
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
        Schema::dropIfExists('dokumen_desa');
    }
}
