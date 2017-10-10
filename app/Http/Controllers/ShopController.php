<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ShopController extends Controller
{
    public function getIndex() 
    {
    	$products = Product::all();
    	return view('shop.index')->withProducts($products);
    }

    public function getSingle($slug) 
    {
    	$product = Product::where('slug', '=', $slug)->first();
    	return view('shop.single')->withProduct($product);
    }
}
