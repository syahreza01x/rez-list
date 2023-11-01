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
        Schema::create('lis', function (Blueprint $table) {
            $table->id();
            $table->char('id_anime');
            $table->foreignId('id_user')->constrained('users', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('judul');
            $table->text('sinopsis');
            $table->string('studio');
            $table->string('genre');
            $table->string('gambar');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lis');
    }
};
