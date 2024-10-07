<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo', 'mobileLogo', 'favicon', 'companyName', 'gsm', 'phone', 'fax', 'email', 'address',
        'title', 'author', 'description', 'keywords', 'robots', 'publisher', 'language', 'generator',
        'googlebot', 'bingbot', 'alexa', 'headerCode', 'footerCode', 'copyright','location'
    ];
}
