<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = ['name', 'address', 'phone', 'email', 'status', 'cast'];
}
