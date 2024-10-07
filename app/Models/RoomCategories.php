<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategories extends Model
{
    protected $table = 'room_categories';
    use HasFactory;

    public function rooms()
{
    return $this->hasMany(Rooms::class, 'category_id');
}
}
