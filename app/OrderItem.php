<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_item';

    protected $fillable = ['name','order_id','product_id','price','quanity','amount'];
}
