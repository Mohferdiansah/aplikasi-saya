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
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('kategori')->nullable();
        $table->time('waktu')->nullable();
        $table->integer('xp')->default(10); // poin XP per tugas
        $table->boolean('status')->default(false); // false = belum selesai
        $table->text('catatan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
