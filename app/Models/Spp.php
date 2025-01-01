<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spp extends Model
{
    use HasFactory;

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'spps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount',
        'description',
    ];

    /**
     * Get the payments related to this fee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   

    /**
     * Format the amount as a currency.
     *
     * @return string
     */
    public function formattedAmount()
    {
        return 'Rp' . number_format($this->amount, 2, ',', '.');
    }

    public function payments()
{
    return $this->hasMany(Payment::class);
}
}
