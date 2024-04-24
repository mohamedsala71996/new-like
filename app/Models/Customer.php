<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;
    use HasApiTokens;
    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'photo',
        'total_earning',
        'like_count_day',
        'invitation_code',
        'user_id',
        'invited_id',
        'email_verified_at',
        'verify_code'
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function completedTasks()
    {
        return $this->hasMany(Work::class, 'customer_id')->where('status', 1);
    }

    public function screenshots()
    {
        return $this->hasMany(Screenshot::class);
    }

    public function work()
    {
        return $this->belongsToMany(Work::class);
    }
    public function invited(){
        return $this->hasMany(Customer::class);
    }
}
