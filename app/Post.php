<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['name', 'slug', 'category_id', 'status', 'menu_top', 'order_index', 'content', 'desc'];

    protected $append = ['slug_link'];

    protected function getSlugLinkAttribute()
    {
        return  URL::asset('tin-tuc' . '/' . $this->slug);
    }
}
