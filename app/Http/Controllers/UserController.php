<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class UserController extends Controller
{
    public function getProfile()
    {
    	$orders = Auth::user()->orders;
    	$orders->transform(function($order, $key) {
    		$order->cart = unserialize($order->cart);
    		return $order;
    	}); // the laravel built in method which allows to unserialize the 'cart' element in each order of the orders collection 

    	return view('user.profile')->withOrders($orders);
    }
}
