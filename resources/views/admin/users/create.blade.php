@extends('admin.template.main')

@section('title', 'New user')

@section('content')
<div class="col-lg-6"><!--col-lg-offset-3-->
	<div class="form-panel">
		{!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
			<div class="form-group">
				{!! Form::label('name', 'Full name') !!}
				{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full Name', 'required'])!!}
			</div>

			<div class="form-group">
				{!! Form::label('email', 'e-Mail') !!}
				{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email@example.com', 'required'])!!}
			</div>

			<div class="form-group">
				{!! Form::label('password', 'Password') !!}
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '**********', 'required'])!!}
			</div>

			<div class="form-group">
				{!! Form::label('type', 'User type') !!}
				{!! Form::select('type', ['admin' => 'Admin', 'member' => 'Member'], null, ['class' => 'form-control', 'placeholder' => '[Select a user type]', 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection