@extends('admin.template.main')

@section('title', 'New playlist')

@section('content')
<div class="col-lg-6"><!--col-lg-offset-3-->
	<div class="form-panel">
		{!! Form::open(['route' => 'admin.playlists.store', 'method' => 'POST', 'files' => true]) !!}
			<div class="form-group">
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'required'])!!}
			</div>

			<div class="form-group">
				{!! Form::label('description', 'Description') !!}
				{!! Form::textarea('description', null, ['class' => 'form-control'])!!}
			</div>

			<div class="form-group">
				{!! Form::label('photo_cover', 'Cover') !!}
				{!! Form::file('photo_cover', ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection