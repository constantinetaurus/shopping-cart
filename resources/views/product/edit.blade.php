@extends('layouts.main')

@section('title', 'Edit Product')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<h1>Edit Product</h1>
			<hr>

			{!! Form::open(['route' => 'products.update', 'files' => 'true']) !!}

				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}

				{{ Form::label('description', 'Description:', ['class' => 'form-spacing-top']) }}
				{{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) }}

				{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
				{{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug']) }}

				{{ Form::label('price', 'Price:', ['class' => 'form-spacing-top']) }}
				{{ Form::number('price', 0, ['class' => 'form-control']) }}

				{{ Form::label('image', 'Upload Image:', ['class' => 'form-spacing-top']) }}
				{{ Form::file('image') }} 

				{{ Form::submit('Edit Product', ['class' => 'btn btn-success btn-lg btn-block form-spacing-top']) }}
			
			{!! Form::close() !!}
			
		</div>
	</div>
@endsection