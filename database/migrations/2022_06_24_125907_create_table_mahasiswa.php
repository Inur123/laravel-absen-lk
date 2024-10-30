<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('qr_code')->nullable(); // Menambahkan kolom qr_code
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('prodi');
            $table->string('fakultas');
            $table->string('kelompok');
            $table->string('absen1')->nullable();
            $table->string('absen2')->nullable();
            $table->string('absen3')->nullable();
            $table->string('absen4')->nullable();
            $table->string('absen5')->nullable();
            $table->string('absen6')->nullable();
            $table->string('absen7')->nullable();
            $table->string('absen8')->nullable();
            $table->string('absen9')->nullable();
            $table->string('absen10')->nullable();
            $table->string('absen11')->nullable();
            $table->string('absen12')->nullable();
            $table->string('absen13')->nullable();
            $table->string('absen14')->nullable();
            $table->string('absen15')->nullable();
            $table->string('absen16')->nullable();

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
        Schema::dropIfExists('mahasiswa');
    }
}
