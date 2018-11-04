@extends('admin.layout.main')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Confirm Delete</h5>
			<p>
				Are you sure you want to delete record #{{ $lead->id }}?
			</p>
		</div>
		<div class="card-footer">
			<form action="/admin/leads/{{ $lead->id }}" method="POST">
				@csrf
				<input type="hidden" name="_method" value="DELETE" />
				<button type="submit" class="btn btn-danger">Delete</button>
				<a href="/admin/leads/{{ $lead->id }}" class="btn btn-link">Cancel</a>
			</form>
		</div>
	</div>
</div>
@endsection
