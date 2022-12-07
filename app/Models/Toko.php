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

    public function laundry_categories(){
        return $this->hasMany(laundry_categories::class);
    }

    public function laundry_image(){
        return $this->hasMany(laundry_image::class);
    }

    public function laundry_service(){
        return $this->hasMany(laundry_service::class);
    }

    public function laundry_item(){
        return $this->hasMany(laundry_item::class);
    }

    public function Order(){
        return $this->hasMany(Order::class);
    }
}
