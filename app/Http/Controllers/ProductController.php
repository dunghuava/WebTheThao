<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view ('web.products');
    }

    public function detail(Request $request){
        return view ('web.product-detail');
    }
}
