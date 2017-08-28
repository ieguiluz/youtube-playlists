@extends('admin.template.main')

@section('title', 'Login')

@section('content')
<div class="col-lg-8 col-lg-offset-2">
	{!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}

		<div class="form-group">
			{!! Form::label('email', 'e-Mail') !!}
			{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email@example.com'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '**********'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}
</div>
@endsection