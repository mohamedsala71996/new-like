<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
    'phone_number',
    'photo',
    'status',
    'method',
    'customer_id',
    'Subscription_End_Date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
