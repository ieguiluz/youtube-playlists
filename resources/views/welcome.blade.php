@extends('admin.template.main')

@section('title', 'Home')

@section('content')
	<div class="jumbotron">
		<h1>Hello!</h1>
		<p>This system will allow you to create your favorite playlists and follow playlists of other users.</p>
		<!--p><a class="btn btn-primary" role="button" href="{{ route('admin.auth.login') }}"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Log in</a></p-->
	</div>
@endsection
