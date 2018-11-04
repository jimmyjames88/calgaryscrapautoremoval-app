@extends('admin.layout.main')

@section('content')
<div class="container">
	<form action="/admin/testimonials" method="POST">
		@include('admin.testimonials._form')
	</form>
</div>
@endsection
