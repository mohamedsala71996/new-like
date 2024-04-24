<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'phone_number',
        'withdrawal_amount',
        'total_earning',
        'status',
        'methoud',
        'photo',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public static function calculateTotalEarnings()
    {
        return self::sum('withdrawal_amount');
    }
}
