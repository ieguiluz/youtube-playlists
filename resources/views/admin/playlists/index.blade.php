@extends('admin.template.main')

@section('title', 'Playlists')

@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">My Playlists</h3>
		</div>
		<div class="panel-body">
			<a href="{{ route('admin.playlists.create') }}" class="btn btn-default">New playlist</a>
			<hr>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
					@foreach ($myplaylists as $myplaylist)
						<div class="col-sm-6 col-md-3">
							<div class="thumbnail">
								<img src="/img/playlists/photocovers/{{ $myplaylist->photo_cover }}" alt="{{ $myplaylist->title }}">
								<div class="caption">
									<h3>{{ $myplaylist->title }}</h3>
									<p>{{ $myplaylist->description }}</p>
									<p><a href="{{ route('admin.youtubevideos.index', ['id' => $myplaylist->id]) }}" class="btn btn-primary" role="button">Add YouTube Video</a> <!--a href="http://localhost:8000/admin/playlists/2/youtubevideos/showvideos" class="btn btn-default" role="button">Button</a--></p>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">My Playlists like</h3>
		</div>
		<div class="panel-body">
			<a href="#" class="btn btn-default">Find playlists</a>
			<hr>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
					@foreach ($playlistsFollow as $playlist)
						<div class="col-sm-6 col-md-3">
							<div class="thumbnail">
								<img src="/img/playlists/photocovers/{{ $playlist->photo_cover }}" alt="{{ $playlist->title }}">
								<div class="caption">
									<h3>{{ $playlist->title }}</h3>
									<p>{{ $playlist->description }}</p>
									<p><a href="{{ route('admin.playlists.unfollow', ['id' => $playlist->id]) }}" class="btn btn-primary" role="button">Unfollow</a><a href="{{ route('admin.youtubevideos.showvideos', ['id' => $playlist->id]) }}" class="btn btn-primary" role="button">See playlist</a></p>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Other Playlists</h3>
		</div>
		<div class="panel-body">
			<a href="#" class="btn btn-default">Find playlists</a>
			<hr>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
					@foreach ($playlistsUnfollow as $playlist)
						<div class="col-sm-6 col-md-3">
							<div class="thumbnail">
								<img src="/img/playlists/photocovers/{{ $playlist->photo_cover }}" alt="{{ $playlist->title }}">
								<div class="caption">
									<h3>{{ $playlist->title }}</h3>
									<p>{{ $playlist->description }}</p>
									<p><a href="{{ route('admin.playlists.follow', ['id' => $playlist->id]) }}" class="btn btn-primary" role="button">Follow</a><a href="{{ route('admin.youtubevideos.showvideos', ['id' => $playlist->id]) }}" class="btn btn-primary" role="button">See playlist</a></p>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection