<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laundry_item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function toko(){
        return $this->belongsTo(Toko::class);
    }

    public function item_type(){
        return $this->belongsTo(item_type::class);
    }

    public function order_list()
    {
        return $this->hasMany(order_list::class);
    }
}
