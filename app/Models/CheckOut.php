<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function checkIn()
    {
        return $this->hasOne(CheckIn::class, 'check_in_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
