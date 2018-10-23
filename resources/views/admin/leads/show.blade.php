@extends('admin.layout.main')
@section('mobileNav')
<div class="row">
	<div class="col">
		<a href="/admin/leads" class="btn btn-secondary">
			<i class="fa fa-arrow-left"></i>
		</a>
	</div>
	@if (auth()->user()->hasPermission('manage-leads'))
	<div class="col text-right">
		<a href="/admin/leads/{{ $lead->id }}/edit" class="btn btn-primary">
			<i class="fa fa-pencil"></i>
		</a>
		<a href="/admin/leads/{{ $lead->id }}/delete" class="btn btn-danger">
			<i class="fa fa-trash"></i>
		</a>
	</div>
	@endif
</div>
@endsection
@section('content')
<div class="container">
	<h3 class="title">{{ $lead->name }}</h3>
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
		<a href="#" class="list-group-item">
			<i class="fa fa-phone"></i> {{ $lead->phone }}
		</a>
		<a href="#" class="list-group-item">
			<i class="fa fa-envelope"></i> {{ $lead->email }}
		</a>
	</div>
	<p class="text-center mt-4 small text-muted">
		<em>Last edited: {{ $lead->updated_at }}</em>
	</p>
</div>
@endsection
