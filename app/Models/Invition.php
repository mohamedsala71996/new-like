<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invition extends Model
{
    use HasFactory;
    protected $fillable = [
        'referrer_id',
        'new_user_id',
        'invitation_code',
    ];
    public function referrer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function newUser()
    {
        return $this->belongsTo(User::class, 'new_user_id');
    }
}
