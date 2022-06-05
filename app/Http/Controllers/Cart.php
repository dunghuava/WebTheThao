<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Cart extends Controller
{
    protected $cart = [];

    public function __construct()
    {
        if (Session::has('cart')) {
            $this->cart = Session::get('cart');
        } else {
            $this->cart = [];
        }
    }

    public function add($product_id = 0)
    {
        $item = Product::find($product_id);
        if ($item) {
            if (!$this->exist($product_id)) {
                $this->cart[$product_id] = [
                    'name' => $item->name,
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'quantity' => 1,
                    'amount' => $item->price
                ];
            } else {
                $this->cart[$product_id]['quantity'] += 1;
                $this->cart[$product_id]['amount'] = $this->cart[$product_id]['quantity'] * $this->cart[$product_id]['price'];
            }
            Session::put('cart', $this->cart);
            return true;
        }
        return false;
    }

    public function get()
    {
        return $this->cart;
    }

    public function count()
    {
        return count($this->cart);
    }

    private function exist($product_id = 0)
    {
        return isset($this->cart[$product_id]);
    }
}
