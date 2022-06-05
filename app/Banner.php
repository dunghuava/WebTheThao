<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Banner extends Model
{
    protected $table = 'banner';

    protected $fillable = ['name', 'image', 'link', 'status'];
}
