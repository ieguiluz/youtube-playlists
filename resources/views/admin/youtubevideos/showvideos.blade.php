@extends('admin.template.main')

@section('title', 'Playlist Name')

@section('content')
<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Youtube Video</th>
						<th>Url</th>
						<!--th>Action</th-->
					</thead>
					<tbody>
					    @foreach ($youtubevideos as $youtubevideo)
					        <tr>
					        	<td>{{ $youtubevideo->id }}</td>
					        	<td>{{ $youtubevideo->title }}</td>
					        	<td><iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $youtubevideo->video_url }}?rel=0" frameborder="0" allowfullscreen></iframe></td>
					        	<!--td>
					        		<a href="{{ route('admin.youtubevideos.destroy', $youtubevideo->id) }}" onclick="return confirm('Do you wish to delete {{ $youtubevideo->title }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					        	</td-->
					        </tr>
					    @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection