@extends('layouts.main')

@section('title', 'Checkout')

{{-- @section('stylesheets')
	{{Html::style('css/parsley.css')}}
@endsection --}}

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1>Checkout</h1>
			<hr>
			<h4>Yout Total: {{$total}}$</h4>
			<br/>
			<div id="charge-error" class="alert alert-danger {{!Session::has('error') ? 'hidden' : ''}}">{{Session::get('error')}}</div>
			<div class="well">
			<form action="{{route('cart.checkout')}}" method="POST" id="checkout-form">

				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" id="name" class="form-control" required name="name">
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="address">Address:</label>
							<input type="text" id="address" class="form-control" required name="address">
						</div>
					</div>
					<hr>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="card-name">Credit Card Holder Name:</label>
							<input type="text" id="card-name" class="form-control" required>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="card-number">Credit Card Number:</label>
							<input type="text" id="card-number" class="form-control" required>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="card-expiry-year">Expiration Year:</label>
									<input type="text" id="card-expiry-year" class="form-control" required>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="card-expiry-month">Expiration Month:</label>
									<input type="text" id="card-expiry-month" class="form-control" required>
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group form-spacing-top">
									<label for="card-cvc">CVC:</label>
									<input type="text" id="card-cvc" class="form-control" required>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{ csrf_field() }}
				<div class="row">
					<div class="col-xs-6 col-xs-offset-3">
						<button type="submit" class="btn btn-success btn-block form-spacing-top">Buy Now</button>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="https://js.stripe.com/v2/"></script>
	<script src="{{URL::to('js/checkout.js')}}"></script>
@endsection