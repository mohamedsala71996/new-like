<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addlink extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'company_name', 'url', 'attachment', 'place', 'status','color','second'];
}
