<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function laundry_service(){
        return $this->hasMany(laundry_service::class);
    }
}
