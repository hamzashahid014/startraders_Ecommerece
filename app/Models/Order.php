<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\User;
class Order extends Model
{
    protected $fillable=[
    'user_id',
    'order_type',
    'phone',
    'address',
    'notes',
    'payment_method',
    'payment_status',
    'total_amount',
    'status'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    //
}
