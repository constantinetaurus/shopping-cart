@extends('layouts.main')

@section('title', 'User Login')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1>Login Form:</h1>
		<br/>
			{!!Form::open()!!}
			{{Form::label('email', 'Email:')}}
			{{Form::email('email', null, ['class' => 'form-control'])}}
			<br/>
			{{Form::label('password', 'Password:')}}
			{{Form::password('password', ['class' => 'form-control'])}}
			{{Form::checkbox('remember')}}{{Form::label('remember', 'Remember Me')}}
			<br/>
			{{Form::submit('Login', ['class' => 'btn btn-success btn-block form-spacing-top'])}}

			{!!Form::close()!!}
		</div>
	</div>
@endsection