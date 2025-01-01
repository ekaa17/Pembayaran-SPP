<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'spp_id',
        'payment_date',
        'amount_paid',
        'staff_id',
    ];


        public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
