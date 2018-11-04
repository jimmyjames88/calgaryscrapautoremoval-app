@extends('admin.layout.main')

@section('content')
<div class="container">
	<div class="list-group">
		@if (auth()->user()->hasPermission('manage-users'))
		<a href="/admin/settings/users" class="list-group-item">
			<i class="fa fa-user"></i> Manage Users
		</a>
		@endif
	</div>
</div>
@endsection
