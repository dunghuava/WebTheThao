<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'orders' => Order::all()
        ];
        return view('admin.order.index', $data);
    }
}
