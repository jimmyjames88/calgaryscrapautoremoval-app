@extends('admin.layout.main')

@section('content')
<div class="container">
	<form action="/admin/testimonials/{{ $testimonial->id }}" method="POST">
		<input type="hidden" name="_method" value="PUT" />
		@include('admin.testimonials._form')
	</form>
</div>
@endsection
