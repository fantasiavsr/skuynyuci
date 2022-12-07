<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_number',
        'user_id',
        'toko_id',
        'total_item',
        'total_price',
        'status',
    ];

    public function order_list()
    {
        return $this->hasMany(order_list::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toko()
    {
        return $this->belongsTo(toko::class);
    }

}
