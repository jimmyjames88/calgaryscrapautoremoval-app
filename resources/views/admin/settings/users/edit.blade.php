@extends('admin.layout.main')
@section('mobileNav')
<div class="row">
	<div class="col">
		<a href="/admin/settings/users" class="btn btn-secondary">
			<i class="fa fa-caret-left"></i>
		</a>
	</div>
</div>
@endsection

@section('content')
<div class="container">
	@if($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif
	<h3 class="title">Edit Account</h3>
	<form action="/admin/settings/users/{{ $user->id }}" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT" />
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" value="{{ $user->name }}" class="form-control" />
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" value="{{ $user->email }}" class="form-control" />
		</div>
		@include('admin.settings.users._permissions')
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-save"></i> Save Changes
			</button>
		</div>
	</form>
	<hr />
	<h3 class="title">Change password</h3>
	<form action="/admin/settings/users/{{ $user->id }}/change-password" method="POST">
		@csrf
		<input type="hidden" name="_method" value="PUT" />
		<div class="form-group">
			<label>New Password</label>
			<input type="password" name="password" value="" class="form-control" />
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" name="password_confirmation" value="" class="form-control" />
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-lock"></i> Change Password
			</button>
		</div>
	</form>
</div>
@endsection
