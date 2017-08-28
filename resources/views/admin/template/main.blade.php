<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Untitled') | Admin Panel</title>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
	<header>
		@include('admin.template.partials.nav')
	</header>

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">@yield('title', 'Untitled')</h3>
			</div>
			<div class="panel-body">
				@include('flash::message')
				@yield('content')
			</div>
		</div>
	</div>

	<div class="container">
		<footer>
			@include('admin.template.partials.footer')
		</footer>
	</div>

	<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>