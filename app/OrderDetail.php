<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderDetails';

    protected $fillable = [
        'order_id', 'product_id', 'size', 'quantity', 'price', 'sale', 'pricesale',
    ];

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
