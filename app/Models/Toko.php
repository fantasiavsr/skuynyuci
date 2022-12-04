<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Item(){
        return $this->hasMany(Item::class);
    }
}
