<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->string('nim', 9)->unique();
            $table->string('email')->unique();
            $table->string('nama_mahasiswa');
            $table->string('nomor_hp', 12);
            $table->enum('fakultas', ['informatika', 'bisnis']);
            $table->string('prodi');
            $table->enum('kategori_kelas', ['pagi', 'sore']);

            $table->timestamps();
        });
    }
};
