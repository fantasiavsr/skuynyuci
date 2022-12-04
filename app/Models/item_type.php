<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_type extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function laundry_item(){
        return $this->hasMany(laundry_item::class);
    }
}
