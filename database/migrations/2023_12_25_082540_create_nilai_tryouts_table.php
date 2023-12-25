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
        Schema::create('nilai_tryout', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('batch');
            $table->integer('subtes_pu')->default(0);
            $table->integer('subtes_ppu')->default(0);
            $table->integer('subtes_pbm')->default(0);
            $table->integer('subtes_pk')->default(0);
            $table->integer('subtes_litbindo')->default(0);
            $table->integer('subtes_litbing')->default(0);
            $table->integer('subtes_pm')->default(0);
            $table->integer('rata_rata')->default(0);
            $table->integer('jumlah_benar')->default(0);
            $table->date('tanggal_pelaksanaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_tryout');
    }
};
