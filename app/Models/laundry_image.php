<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laundry_image extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Toko(){
        return $this->belongsTo(Toko::class);
    }
}
