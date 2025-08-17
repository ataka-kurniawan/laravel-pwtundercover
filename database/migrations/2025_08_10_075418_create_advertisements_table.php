<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // judul iklan
            $table->string('image'); // path gambar/banner
            $table->string('link')->nullable(); // link tujuan
            $table->enum('position', ['homepage', 'article']); // posisi iklan
            $table->date('start_date'); // tanggal mulai
            $table->date('end_date');   // tanggal berakhir
            $table->boolean('is_active')->default(true); // status aktif/nonaktif
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
