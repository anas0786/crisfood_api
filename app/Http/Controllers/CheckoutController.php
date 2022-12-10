<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function buy(Request $request){
    
        $this->validate($request, [
            'name' => 'required',
            'shipping_address' => 'required',
            'phone' => 'required',
            'product_name' => 'required',
            'qty' => 'required',
            'payment_method' => 'required'
        ]);
    
        // Create the order
        $order = new Order;
        $order->name = $request->name;
        $order->shipping_address = $request->shipping_address;
        $order->phone = $request->phone;
        $order->qty = $request->qty;
        $order->product_name = $request->product_name;
        $order->payment_method = $request->payment_method;
        $order->save();

        return response()->json(['message' => 'Order placed successfully!'], 200);
    }
}
