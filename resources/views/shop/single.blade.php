@extends('layouts.main')

@section('title', "$product->title")

@section('content')
		
		<a href="{{route('shop.index')}}" class="btn btn-default form-spacing-top"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;back to products</a>
		<div class="row">	

	  		<div class="col-md-3 col-md-offset-2">
	    		<img src="{{asset('images/' . $product->image)}}" height="400" width="400" />
	  		</div>
		  	<div class="col-md-3 col-md-offset-1">
		  		<div class="panel panel-info">
  					<div class="panel-body">
				    	<h1>{{$product->title}}</h1>
				    	<hr>
				    	<p>{{$product->description}}</p>
				    	<h3>{{$product->price}}$</h3>				    
				    	<hr>
				    	<a href="{{route('cart.addToCart', $product->id)}}" class="btn btn-success btn-block form-spacing-top"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a>
				    </div>
				</div>
		  	</div>	 	
		</div> 

@endsection