<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsAndFeatures extends Model
{
    protected $table = 'rooms_and_features';
    protected $fillable = ['room_id', 'feature_id'];
    use HasFactory;
}
