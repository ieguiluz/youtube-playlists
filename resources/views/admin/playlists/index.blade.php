@extends('admin.template.main')

@section('title', 'Playlists')

@section('content')
<div class="col-lg-12">
	<a href="{{ route('admin.playlists.create') }}" class="btn btn-default">New playlist</a>
	<hr>
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
			@foreach ($myplaylists as $myplaylist)
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<img src="https://dummyimage.com/242x200/000/fff" alt="{{ $myplaylist->title }}">
						<div class="caption">
							<h3>{{ $myplaylist->title }}</h3>
							<p>{{ $myplaylist->description }}</p>
							<p><a href="{{ route('admin.youtubevideos.index', ['id' => $myplaylist->id]) }}" class="btn btn-primary" role="button">Add YouTube Video</a> <!--a href="#" class="btn btn-default" role="button">Button</a--></p>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>

	<hr>
	<a href="{{ route('admin.playlists.all') }}" class="btn btn-default">Find playlists</a>
	<hr>
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
			@foreach ($playlists as $playlist)
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
						<img src="https://dummyimage.com/242x200/000/fff" alt="{{ $playlist->title }}">
						<div class="caption">
							<h3>{{ $playlist->title }}</h3>
							<p>{{ $playlist->description }}</p>
							<p><a href="{{ route('admin.youtubevideos.index', ['id' => $playlist->id]) }}" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</div>
@endsection