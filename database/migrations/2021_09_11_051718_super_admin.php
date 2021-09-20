<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SuperAdmin extends Migration
{
    protected $connection = 'pgsql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superadmin', function (Blueprint $table) {
            $table->uuid('id_admin')->primary();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('namaLengkap');
            $table->string('nomorTelepon')->unique();
            $table->string('roleId');
            $table->string('aktif');
            $table->uuid('id_desa');
            $table->rememberToken();
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
        Schema::dropIfExists('superadmin');
    }
}
