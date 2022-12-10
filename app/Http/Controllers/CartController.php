<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request){
        $product_id = $request->post('product_id');
        $order_id = $request->post('order_id');
        $quantity = $request->post('qty');
        $product_name = $request->post('product_name');
        $price = $request->post('price');
        $product = Product::findOrFail($product_id);
    if ($product) {
        $cart = new Cart();
        $cart->product_id = $product_id;
        $cart->order_id = $order_id;
        $cart->qty = $quantity;
        $cart->product_name = $product_name;
        $cart->price = $price;
        $cart->save();
        return response()->json(['message' => 'Product added to cart successfully!'], 200);
        } else {
        return response()->json(['message' => 'Product not found!'], 404);
        }
    }
}