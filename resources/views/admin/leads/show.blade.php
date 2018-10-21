@extends('admin.layout.main')
@section('mobileNav')
<div class="row">
	<div class="col">
		<a href="/leads" class="btn btn-secondary">
			<i class="fa fa-arrow-left"></i> Back
		</a>
	</div>
	<div class="col text-right">
		<a href="/leads/{{ $lead->id }}/edit" class="btn btn-primary">
			Edit <i class="fa fa-pencil"></i>
		</a>
	</div>
</div>
@endsection
@section('content')
<div class="container">
	<h1 class="title">{{ $lead->name }}</h1>
	<div class="card mb-3">
		<div class="card-body">
			<h6 class="card-title mb-0">Submitted: {{ date('l F jS, Y', strtotime($lead->created_at)) }}</h6>
		</div>
	</div>
	<div class="card mb-3">
		<div class="card-body">
			<h5 class="card-title">Message:</h5>
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
