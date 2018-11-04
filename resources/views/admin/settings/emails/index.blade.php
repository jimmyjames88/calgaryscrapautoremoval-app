@extends('admin.layout.main')
@section('mobileNav')
<a href="/admin/settings/users/create" class="btn btn-primary">
	<i class="fa fa-user-plus"></i>
</a>
@endsection

@section('content')
<div class="container">
	<div class="list-group">
		@foreach ($users as $user)
		<div class="list-group-item">
			<div class="row">
				<div class="col">{{ $user->name }} {!! ($user->id === 1 ? '<em class="small">(root)</em>' : '') !!}</div>
				<div class="col text-right">
					<a href="/admin/settings/users/{{ $user->id }}/edit" class="btn btn-sm btn-primary">
						<i class="fa fa-pencil"></i>
					</a>
					<a href="/admin/settings/users/{{ $user->id }}/delete" class="btn btn-sm btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection
