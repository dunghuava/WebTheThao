<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view ('web.news');
    }

    public function detail(Request $request){
        return view ('web.new-detail');
    }
}
