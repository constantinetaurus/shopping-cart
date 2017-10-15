<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use Session;
use Auth;
use App\Cart;
use App\Order;
use Stripe\Stripe;
use Stripe\Charge;

class CartController extends Controller
{
	public function getShoppingCart()
	{
		if(!Session::has('cart'))
		{
			return view('cart.shopping-cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		return view('cart.shopping-cart')->withProducts($cart->items);
	}

    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);

    	return redirect()->route('shop.index');
    }

    public function getCheckout()
    {
    	if(!Session::has('cart'))
		{
			return view('cart.shopping-cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$total = $cart->totalPrice;
		return view('cart.checkout')->withTotal($total);
    }

    public function postCheckout(Request $request)
    {
    	if(!Session::has('cart'))
		{
			return redirect()->route('cart.shoppingCart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);

		Stripe::setApiKey('sk_test_UyxNqjkXJzUnQu9wllbwKU5S');
		
		try 
		{
			$charge = Charge::create(array(
  				"amount" => $cart->totalPrice * 100,
  				"currency" => "usd",
				"source" => $request->input('stripeToken'), // obtained with Stripe.js
				"description" => "Test Charge"
			));
			$order = new Order();
			$order->cart = serialize($cart);
			$order->address = $request->input('address');
			$order->name = $request->input('name');
			$order->payment_id = $charge->id;
			
			Auth::user()->orders()->save($order);
		} catch(\Exception $e) {
			Session::flash('error', $e->getMessage());
			return redirect()->route('cart.checkout');
		}

		Session::forget('cart');
		Session::flash('success', 'Successfully purchased products!');
		return redirect()->route('shop.index');
    }

    public function getReduceByOne($id)
    {
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$cart->reduceByOne($id);

		if(count($cart->items) > 0)
		{
			Session::put('cart', $cart);
		} else
		{
			Session::forget('cart');
		}

		return redirect()->route('cart.shoppingCart');
    }

    public function getRemoveAll($id)
    {
    	$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$cart->removeAll($id);

		if(count($cart->items) > 0)
		{
			Session::put('cart', $cart);
		} else
		{
			Session::forget('cart');
		}

		return redirect()->route('cart.shoppingCart');
    	
    }
}
