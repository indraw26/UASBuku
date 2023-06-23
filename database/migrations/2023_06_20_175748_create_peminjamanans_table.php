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
        Schema::create('peminjamanans', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignid('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreignid('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoris');
            $table->integer('lamaPinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamanans');
    }
};
