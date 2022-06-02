<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'type', 'parent_id', 'status', 'menu_top', 'order_index'];

    protected $append = ['slug_link'];

    protected function getSlugLinkAttribute()
    {
        return  URL::asset('danh-muc' . '/' . $this->slug);
    }
}
