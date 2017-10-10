@extends('layouts.main')

@section('title', 'Shop Index')

@section('content')
	@if(count($products) == 0)
	<h1>No Items were found in database..</h1>
	@else
	<div class="row">
	@foreach($products as $product)
	  <div class="col-md-3">	  	
		    <div class="well">
		      	<a href="{{route('shop.single', $product->slug)}}"><img src="{{asset('images/' . $product->image)}}" width="220" height="200" /></a>
		      	<div class="caption">
			      	<h3 class="text-center text-muted">{{$product->title}}</h3>
			      	<hr>	     
			      	<div class="clearfix">
			      		<div class="pull-left price">
				        	{{$product->price}}$
				        </div>
				        <div class="pull-right">
				        	<a href="{{route('cart.addToCart', $product->id)}}" class="btn btn-success btn-sm" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to Cart</a>
				        </div>
			      	</div>	        
		      	</div>
		    </div>		
	  </div>
	@endforeach
	</div>
	@endif
@endsection