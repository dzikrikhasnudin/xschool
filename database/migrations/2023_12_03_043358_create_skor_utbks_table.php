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
        Schema::create('skor_utbk', function (Blueprint $table) {
            $table->id();
            $table->string('program_studi');
            $table->foreignId('ptn_id')->constrained('colleges')->cascadeOnDelete();
            $table->integer('skor')->default(0);
            $table->enum('hasil', ['Lulus', 'Tidak Lulus'])->default('Lulus');
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skor_utbk');
    }
};
