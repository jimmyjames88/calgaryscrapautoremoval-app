@extends('admin.layout.main')
@section('mobileNav')
<div class="row">
	<div class="col">
		<a href="/admin/leads/{{ $lead->id }}" class="btn btn-secondary">
			<i class="fa fa-arrow-left"></i> Back
		</a>
	</div>
	<div class="col text-right">
		<a href="/admin/leads/{{ $lead->id }}/delete" class="btn btn-danger">
			Delete <i class="fa fa-trash"></i>
		</a>
	</div>
</div>
@endsection
@section('content')
<div class="container">
	<h1 class="title">Edit Lead #{{ $lead->id }}</h1>
	<form action="/leads/{{ $lead->id }}" method="POST">
		<input type="hidden" name="_method" value="PUT" />
		@include('admin.leads._form')
	</form>
</div>
@endsection
