<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['name', 'slug', 'price', 'category_id', 'status', 'order_index', 'content', 'desc'];

    protected $append = ['slug_link'];

    protected function getSlugLinkAttribute()
    {
        return  URL::asset('san-pham' . '/' . $this->slug);
    }
}
