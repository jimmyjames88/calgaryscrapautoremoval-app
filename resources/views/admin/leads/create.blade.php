@extends('admin.layout.main')
@section('mobileNav')
<div class="row">
	<div class="col">
		<a href="/leads" class="btn btn-secondary">
			<i class="fa fa-arrow-left"></i> Back
		</a>
	</div>
</div>
@endsection
@section('content')
<div class="container">
	<h1 class="title">New Lead</h1>
	<form action="/leads" method="POST">
		@include('admin.leads._form')
	</form>
</div>
@endsection
