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
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->string("kode");
            $table->string('nama_alternatif');   
            $table->string('keterangan')->nullable();
            $table->boolean('marketing')->nullable()->default(false);
            $table->boolean('finance')->nullable()->default(false);
            $table->boolean('stakeholder')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatifs');
    }
};
