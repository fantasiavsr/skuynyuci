<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laundry_service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function toko(){
        return $this->belongsTo(Toko::class);
    }

    public function service(){
        return $this->belongsTo(service::class);
    }

    public function order_list()
    {
        return $this->hasMany(order_list::class);
    }
}
