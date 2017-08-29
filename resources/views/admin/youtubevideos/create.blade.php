

@extends('admin.template.main')

@section('title', 'New video')

@section('content')
<div class="col-lg-6">
	<div class="form-panel">
		{!! Form::open(['route' => 'admin.youtubevideos.store', 'method' => 'POST']) !!}
			
			<div class="form-group">
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'required'])!!}
			</div>

			<div class="form-group">
				{!! Form::label('video_url', 'YouTube URL Video') !!}
				{!! Form::text('video_url', null, ['class' => 'form-control', 'placeholder' => 'YouTube URL Video', 'required'])!!}
			</div>

			<div class="form-group">
				{!! Form::hidden('playlist_id', $id_playlist, ['class' => 'form-control', 'required'])!!}
			</div>

			<div class="form-group">
				{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}
	</div>
</div>
@endsection