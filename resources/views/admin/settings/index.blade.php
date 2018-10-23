@extends('admin.layout.main')
@section('mobileNav')
<div class="row">
	<div class="col">
		<a href="/admin" class="btn btn-secondary">
			<i class="fa fa-home"></i>
		</a>
	</div>
</div>
@endsection

@section('content')
<div class="container">
	<div class="list-group">
		@if (auth()->user()->hasPermission('manage-users'))
		<a href="/admin/settings/users" class="list-group-item">
			<i class="fa fa-user"></i> Manage Users
		</a>
		@endif
		@if (auth()->user()->hasPermission('manage-emails'))
		<a href="/admin/settings/emails" class="list-group-item">
			<i class="fa fa-envelope"></i> Manage Emails
		</a>
		@endif
	</div>
</div>
@endsection
