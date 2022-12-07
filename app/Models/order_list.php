<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_list extends Model
{
    use HasFactory;

    protected $table = 'order_lists';

    protected $guarded = [];

    public function order(){
        return $this->belongsTo(order::class, 'order_id');
    }

    public function laundry_item()
    {
        return $this->belongsTo(laundry_item::class);
    }

    public function laundry_service()
    {
        return $this->belongsTo(laundry_service::class);
    }

}
