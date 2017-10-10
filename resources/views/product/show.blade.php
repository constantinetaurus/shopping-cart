@extends('layouts.main')

@section('title', 'Show Single Product')

@section('content')
		
		<a href="" class="btn btn-default form-spacing-top"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;back to products</a>
		<div class="row">	

	  		<div class="col-md-3 col-md-offset-3">
	    		<img src="{{asset('images/' . $product->image)}}" height="250" width="250" />
	  		</div>
		  	<div class="col-md-3">
		  		<div class="panel panel-info">
  					<div class="panel-body">
				    	<h1>{{$product->title}}</h1>
				    	<hr>
				    	<p>{{$product->description}}</p>
				    	<h3>{{$product->price}}$</h3>
				    	<a href="{{url('shop/' . $product->slug)}}">URL: {{url('shop/' . $product->slug)}}</a><br/>
				    	<small class="text-muted">Created At: {{$product->created_at}}</small><br/>
				    	<small class="text-muted">Updated At: {{$product->updated_at}}</small>
				    	<hr>
				    	<a href="{{route('products.create')}}" class="btn btn-success form-spacing-top"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
				    	<a href="{{route('products.edit', $product->id)}}" class="btn btn-primary form-spacing-top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				    	<a href="{{route('products.destroy', $product->id)}}" class="btn btn-danger form-spacing-top"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				    </div>
				</div>
		  	</div>	 	
		</div> 

@endsection