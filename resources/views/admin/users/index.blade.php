@extends('admin.template.main')

@section('title', 'Users')

@section('content')
<div class="col-lg-12">
	<a href="{{ route('admin.users.create') }}" class="btn btn-default">New user</a>
	<hr>
	<div class="row">
		<div class="col-lg-8">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Full name</th>
						<th>e-Mail</th>
						<th>User type</th>
						<th>Action</th>
					</thead>
					<tbody>
					    @foreach ($users as $user)
					        <tr>
					        	<td>{{ $user->id }}</td>
					        	<td>{{ $user->name }}</td>
					        	<td>{{ $user->email }}</td>
					        	<td>
					        	@if($user->type == 'admin')
					        		<span class="label label-danger">{{ $user->type }}</span>
					        	@else
					        		<span class="label label-primary">{{ $user->type }}</span>
					        	@endif
					        	</td>
					        	<td>
					        		<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
					        		<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('Do you wish to delete to {{ $user->name }}?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					        	</td>
					        </tr>
					    @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<center>
		{!! $users->render() !!}
	</center>
</div>
@endsection