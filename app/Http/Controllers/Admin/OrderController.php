<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'orders' => Order::all()
        ];
        return view('admin.order.index', $data);
    }

    public function update(Order $id, Request $request)
    {
        $id->status = (int) $request->status;
        $id->save();
        return Redirect::back();
    }
}
