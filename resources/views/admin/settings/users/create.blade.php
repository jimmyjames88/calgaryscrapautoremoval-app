@extends('admin.layout.main')


@section('content')
<div class="container">
	@if($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif
	<form action="/admin/settings/users/{{ $user->id }}" method="POST">
		@csrf
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" value="{{ $user->name }}" class="form-control" />
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" value="{{ $user->email }}" class="form-control" />
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password" value="" class="form-control" />
		</div>
		<div class="form-group">
			<label>Confirm</label>
			<input type="password" name="password_confirmation" value="" class="form-control" />
		</div>
		@include('admin.settings.users._permissions')
		<div class="form-group">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-user-plus"></i> Create User
			</button>
		</div>
	</form>
</div>
@endsection
