<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = ['room_id', 'feature_id'];

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }
}
