@extends('admin.layout.main')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Confirm Delete</h5>
			<p>
				Are you sure you want to delete this testimonial?
			</p>
		</div>
		<div class="card-footer">
			<form action="/admin/testimonials/{{ $testimonial->id }}" method="POST">
				@csrf
				<input type="hidden" name="_method" value="DELETE" />
				<button type="submit" class="btn btn-danger">Delete</button>
				<a href="/admin/settings/users" class="btn btn-link">Cancel</a>
			</form>
		</div>
	</div>
</div>
@endsection
