<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Model Participant
 *
 * Menyimpan data profil peserta tes.
 * Setiap peserta terhubung ke satu akun User.
 */
class Participant extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'participants';

    /**
     * Field yang boleh diisi mass-assignment
     */
    protected $fillable = [
        'user_id',
        'participant_code',
        'phone',
        'address',
        'birth_date',
        'gender',
        'institution',
        'status',
    ];

    /**
     * Cast tipe data
     */
    protected $casts = [
        'birth_date' => 'date',
    ];

    // =====================================================
    // RELATIONSHIPS
    // =====================================================

    /**
     * Relasi ke User (akun login)
     * Setiap peserta punya 1 akun User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // =====================================================
    // HELPERS
    // =====================================================

    /**
     * Cek apakah peserta aktif
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Generate kode peserta otomatis
     * Format: PST-YYYY-XXXX
     */
    public static function generateCode(): string
    {
        $year = date('Y');
        $last = self::whereYear('created_at', $year)->count() + 1;
        return sprintf('PST-%s-%04d', $year, $last);
    }
}
