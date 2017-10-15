@extends('layouts.main')

@section('title', 'Shopping Cart')

@section('content')
	<a href="{{route('shop.index')}}" class="btn btn-default form-spacing-top"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;back to products</a>
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<h1>Shopping Cart:</h1>
			<hr>
				<ul class="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge">{{$product['qty']}}</span>
							<strong>Item: {{$product['item']['title']}}</strong>&nbsp;
							<span class="label label-success">Price: {{$product['price']}}$</span>
							<div class="button-group form-spacing-top">
								<button type="button" class="button btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="{{route('cart.reduceByOne', $product['item']['id'])}}">Reduce by 1</a></li>
									<li><a href="{{route('cart.removeAll', $product['item']['id'])}}">Remove All</a></li>
								</ul>
							</div>
						</li>
					@endforeach
				</ul><hr>
			</div>
		</div>
		<div class="row">
			<div class="text-center text-muted">
				<strong>Total Price: {{Session::get('cart')->totalPrice}}$</strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<a href="{{route('cart.checkout')}}" class="btn btn-block btn-success form-spacing-top"><i class="fa fa-money" aria-hidden="true"></i> Checkout</a>
			</div>
		</div>
	@else
		<div class="row">
			<div class="cold-md-6 col-md-offset-3">
				<h2>No Items in Shopping Cart</h2>
			</div>
		</div>
	@endif
@endsection