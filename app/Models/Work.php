<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'link', 'type'];


    public function customer(){
        return $this->belongsToMany(Customer::class);
    }
}