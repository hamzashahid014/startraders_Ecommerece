<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;
class OrderItem extends Model
{
    protected $fillable=[
        'order_id',
        'product_id',
        'price',
        'quantity',
        'subtotal',

    ];
    public function order()
    {
        $this->belongsTo(Order::class);
    }
    public function product()
    {
        $this->belongsTo(Product::class);
    }
    
    //
}
