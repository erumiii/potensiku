<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration
     * php artisan migrate
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Relasi ke tabel users (akun login peserta)
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Nomor induk / ID peserta (opsional, bisa diisi manual)
            $table->string('participant_code', 50)->unique()->nullable();

            // Data diri tambahan
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();

            // Institusi / asal sekolah
            $table->string('institution')->nullable();

            // Status peserta
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Rollback migration
     * php artisan migrate:rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
