<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index()
    {
        return view('web.cart');
    }

    public function store(Request $request)
    {
        if ($request->id) {
            $cart = new Cart();
            $cart->add($request->id);
            return Redirect::route('cart.index');
        }
    }
}
