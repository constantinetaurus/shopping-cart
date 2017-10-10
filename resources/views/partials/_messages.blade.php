@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <strong>Error:</strong> {{ Session::get('error') }}
    </div>
@endif