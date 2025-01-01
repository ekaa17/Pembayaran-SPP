<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
   use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kelas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_name',
        'grade',
    ];

    /**
     * Get the students associated with this class.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    // public function students()
    // {
    //     return $this->hasManyThrough(Student::class, StudentClass::class, 'class_id', 'id', 'id', 'student_id');
    // }
}
