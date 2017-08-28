@extends('admin.template.main')

@section('title', 'Modify user: ' . $user->name)

@section('content')
<div class="col-lg-6">
<hr>
	<div class="form-panel">
		{!! Form::open(['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}

			<div class="form-group">
				{!! Form::label('name', 'Full name') !!}
				{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Full Name', 'required'])!!}
			</div>

			<div class="form-group">
				{!! Form::label('email', 'e-Mail') !!}
				{!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'email@example.com', 'required'])!!}
			</div>

			<div class="form-group">
				{!! Form::label('type', 'User type') !!}
				{!! Form::select('type', ['admin' => 'Admin', 'member' => 'Member'], $user->type, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection