<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionalVideo extends Model
{
    use HasFactory;
    protected $table = 'promotional_videos';
    protected $fillable = [
       'video'
  ];
}
