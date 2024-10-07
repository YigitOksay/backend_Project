<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subTitle', 'leftTitle', 'leftContent', 'rightTitle', 'rightContent','url','meta_title','meta_description','meta_keywords'
    ];
}
