<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $table = 'rooms';
    use HasFactory;


    public function images()
    {
        return $this->hasMany(images::class, 'room_id');
    }

    public function roomAttributes()
    {
        return $this->belongsToMany(RoomFeature::class, 'rooms_and_features', 'room_id', 'feature_id');
    }

    public function category()
    {
        return $this->belongsTo(RoomCategories::class, 'category_id');
    }
}
