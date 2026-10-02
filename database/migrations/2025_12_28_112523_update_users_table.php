<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->string('no_telp')->nullable();
        $table->string('jenis_kelamin')->nullable();
        $table->integer('tinggi_badan')->nullable();
        $table->integer('berat_badan')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->string('kota')->nullable();
        $table->string('aplikasi_sehat')->nullable();
        $table->string('e_wallet')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'no_telp', 
                'jenis_kelamin', 
                'tinggi_badan', 
                'berat_badan', 
                'tanggal_lahir', 
                'kota', 
                'aplikasi_sehat', 
                'e_wallet'
            ]);
        });
    }
};
