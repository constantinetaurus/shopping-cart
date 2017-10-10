@extends('layouts.main')

@section('title', 'User Register')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1>Register Form:</h1>
		<br/>
			{!!Form::open()!!}

			{{Form::label('name', 'Name:')}}
			{{Form::text('name', null, ['class' => 'form-control'])}}
			<br/>
			{{Form::label('email', 'Email:')}}
			{{Form::email('email', null, ['class' => 'form-control'])}}
			<br/>
			{{Form::label('password', 'Password:')}}
			{{Form::password('password', ['class' => 'form-control'])}}
			<br/>
			{{Form::label('password_confirmation', 'Confirm Password:')}}
			{{Form::password('password_confirmation', ['class' => 'form-control'])}}
			<br/>
			{{Form::submit('Register', ['class' => 'btn btn-success btn-block form-spacing-top'])}}

			{!!Form::close()!!}
		</div>
	</div>
@endsection