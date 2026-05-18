<?php

namespace App\Models;

// Import trait bawaan Laravel
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Model User
 * Dipakai Laravel untuk:
 * - login
 * - register
 * - authentication
 * - authorization
 */
class User extends Authenticatable
{
    /**
     * Trait bawaan Laravel
     *
     * HasFactory:
     * dipakai untuk factory/seeder dummy data
     *
     * Notifiable:
     * dipakai untuk notification Laravel
     */
    use HasFactory, Notifiable;

    /**
     * Field yang boleh diisi mass-assignment
     *
     * Contoh:
     * User::create([...])
     *
     * Field di sini boleh langsung diinsert
     */
    protected $fillable = [

        /**
         * Nama user
         */
        'name',

        /**
         * Username login
         */
        'username',

        /**
         * Email user
         */
        'email',

        /**
         * Password user
         */
        'password',

        /**
         * Role authorization
         * admin / user
         */
        'role',
    ];

    /**
     * Field yang disembunyikan
     * saat data user ditampilkan
     */
    protected $hidden = [

        /**
         * Password tidak boleh tampil
         */
        'password',

        /**
         * Token remember me Laravel
         */
        'remember_token',
    ];

    /**
     * Cast otomatis Laravel
     */
    protected function casts(): array
    {
        return [

            /**
             * Email verification datetime
             */
            'email_verified_at' => 'datetime',

            /**
             * Password otomatis di-hash bcrypt
             */
            'password' => 'hashed',
        ];
    }

    /**
     * Cek apakah user adalah admin
     *
     * Dipakai untuk authorization
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}