<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'order_date',
    ];

    public function getTotalOrderSum()
    {
        $totalSum = 0;
        foreach ($this->orderItems as $item) {
            $totalSum += $item->product_price * $item->amount;
        }
        return $totalSum;
    }

    public static function getLastOrderNumber()
    {
        $lastOrder = Order::orderBy('order_number', 'desc')->first();
        if ($lastOrder) {
            return $lastOrder->order_number;
        }
        return 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
