<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Staff extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'staff';

    // Menentukan kolom yang bisa diisi
    protected $fillable = [
        'name',
        'no_telepon',
        'email',
        'password',
        'role',
        'profile',
    ];

    // Jika Anda ingin menggunakan hashing pada password secara otomatis
    protected static function booted()
    {
        static::creating(function ($staff) {
            if (isset($staff->password)) {
                $staff->password = bcrypt($staff->password);
            }
        });

        static::updating(function ($staff) {
            if (isset($staff->password)) {
                $staff->password = bcrypt($staff->password);
            }
        });
    }

    // Menambahkan accessor untuk mendapatkan URL gambar profil
    public function getProfileUrlAttribute()
    {
        return $this->profile ? asset('storage/' . $this->profile) : null;
    }

    public function payments()
{
    return $this->hasMany(Payment::class);
}
}
