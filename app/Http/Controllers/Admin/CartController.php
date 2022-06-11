<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
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

    public function submit(Request $request)
    {
        try{
            if($order = Order::create($request->all())){
                $cart = new Cart();
                foreach ($cart->get() as $item){
                    $item['order_id'] = $order->id;
                    OrderItem::create($item);
                }
                $cart->clear();
                return Redirect::route('cart.success');
            }
        }catch(\Exception $e){
            dd($e->getMessage());
            return Redirect::back();
        }
    }

    public function success()
    {
        $cart = new Cart();
        if($cart->count() > 0){
            return Redirect::to('/');
        }
        return view('web.cart-success');
    }
}
