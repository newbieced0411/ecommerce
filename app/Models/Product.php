<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')->using(OrderItem::class)->withPivot(['quantity', 'price']);
    }
}
