@extends('layouts.main')

@section('title', 'User Profile')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>User Profile</h1>
			<hr>
			<h2>My Orders</h2>
			@foreach($orders as $order)
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Created At:</strong> <small class="text-muted">{{ $order->created_at }}</small>
					</div>
				  	<div class="panel-body">
				    	<!-- List group -->
					  	<ul class="list-group">
					  		@foreach($order->cart->items as $item)
					    		<li class="list-group-item">
					    			<span class="badge">${{$item['price']}}</span>
					    			{{ $item['item']['title'] }} || {{ $item['qty'] }}
					    		</li>
					    	@endforeach
					  	</ul>
				  	</div>
				  	<div class="panel-footer">
				  		<strong>Total Price: {{ $order->cart->totalPrice }} $</strong>
				  	</div>
				</div>
			@endforeach
			<hr>
		</div>
	</div>
@endsection