<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['nis', 'name', 'kelas_id', 'birth_date'];

    // Relasi dengan Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }



        public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
