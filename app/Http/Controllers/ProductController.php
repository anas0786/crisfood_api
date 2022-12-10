<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {   
        $product= Product::all();    
        if(isset($product)){
            return response()->json(['Data' => $product,],200);
        }else{
            return response()->json(['message' => 'Product not found!'], 404);
        }
    }
}