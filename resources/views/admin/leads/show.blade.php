@extends('admin.layout.main')
@section('mobileNav')
@if (auth()->user()->hasPermission('manage-leads'))
	<a href="/admin/leads/{{ $lead->id }}/edit" class="btn btn-primary">
		<i class="fa fa-pencil"></i>
	</a>
	<a href="/admin/leads/{{ $lead->id }}/delete" class="btn btn-danger">
		<i class="fa fa-trash"></i>
	</a>
@endif
@endsection
@section('content')
<div class="container">
	<div class="card mb-3">
		<div class="card-body">
			<h6 class="card-title mb-0">
				<span class="text-muted">Submitted:</span> {{ date('F jS, Y @ h:ia', strtotime($lead->created_at)) }}</h6>
		</div>
	</div>
	<div class="card mb-3">
		<div class="card-body">
			<h5 class="card-title text-muted">Message:</h5>
			{{ $lead->message }}
		</div>
	</div>
	<div class="list-group">
		<a href="tel:{{ $lead->phone }}" class="list-group-item">
			<i class="fa fa-phone"></i> {{ $lead->phone }}
		</a>
		<a href="mailto:{{ $lead->email }}?body={{ str_replace('+', '%20', urlencode($lead->message)) }}&subject=Calgary%20Scrap%20Auto%20Removal" class="list-group-item">
			<i class="fa fa-envelope"></i> {{ $lead->email }}
		</a>
	</div>
	<p class="text-center mt-4 small text-muted">
		<em>Originally opened by: {{ $lead->openedBy() }}</em>
	</p>
</div>
@endsection
