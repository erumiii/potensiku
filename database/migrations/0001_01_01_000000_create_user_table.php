<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fungsi up()
     * Dipakai saat menjalankan:
     * php artisan migrate
     */
    public function up(): void
    {
        /**
         * Hapus tabel lama kalau ada
         * supaya tidak bentrok saat migrate ulang
         */
        Schema::dropIfExists('users');
        Schema::dropIfExists('user');

        /**
         * Membuat tabel users
         * Laravel auth default memakai tabel "users"
         */
        Schema::create('users', function (Blueprint $table) {

            /**
             * Primary key auto increment
             * sama seperti:
             * INT AUTO_INCREMENT PRIMARY KEY
             */
            $table->id();

            /**
             * Nama user
             */
            $table->string('name');

            /**
             * Username unik
             * tidak boleh sama antar user
             */
            $table->string('username', 50)->unique();

            /**
             * Email untuk login/auth
             */
            $table->string('email')->unique();

            /**
             * Password yang sudah di-hash
             */
            $table->string('password');

            /**
             * Role untuk authorization
             * admin = akses dashboard admin
             * user = peserta biasa
             */
            $table->enum('role', ['admin', 'user'])->default('user');

            /**
             * Remember token
             * dipakai untuk fitur "remember me"
             */
            $table->rememberToken();

            /**
             * Membuat:
             * created_at
             * updated_at
             */
            $table->timestamps();
        });

        /**
         * Tabel reset password
         * dipakai jika nanti ada fitur forgot password
         */
        Schema::create('password_reset_tokens', function (Blueprint $table) {

            /**
             * Email sebagai primary key
             */
            $table->string('email')->primary();

            /**
             * Token reset password
             */
            $table->string('token');

            /**
             * Waktu token dibuat
             */
            $table->timestamp('created_at')->nullable();
        });

        /**
         * Tabel session
         * karena SESSION_DRIVER=database
         */
        Schema::create('sessions', function (Blueprint $table) {

            /**
             * Session id
             */
            $table->string('id')->primary();

            /**
             * Relasi user login
             */
            $table->foreignId('user_id')->nullable()->index();

            /**
             * IP address user
             */
            $table->string('ip_address', 45)->nullable();

            /**
             * Browser/device user
             */
            $table->text('user_agent')->nullable();

            /**
             * Isi session Laravel
             */
            $table->longText('payload');

            /**
             * Aktivitas terakhir user
             */
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Fungsi down()
     * Dipakai saat:
     * php artisan migrate:rollback
     */
    public function down(): void
    {
        /**
         * Hapus tabel jika rollback
         */
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};