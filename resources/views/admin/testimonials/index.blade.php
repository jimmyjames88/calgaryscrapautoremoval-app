@extends('admin.layout.main')
@section('mobileNav')
<a href="/admin/testimonials/create" class="btn btn-primary">
	<i class="fa fa-plus"></i>
</a>
@endsection

@section('content')
<div class="container">
	<div class="list-group sortable">
		@if(count($testimonials))
		@foreach ($testimonials as $testimonial)
		<div class="list-group-item" data-id="{{ $testimonial->id }}">
			<div class="row">
				<div class="col col-2 handle">
					<i class="fa fa-arrows-v fa-2x text-muted"></i>
				</div>
				<div class="col col-6">
					{{ $testimonial->name }}
					<br />
					<small>
					@php
						echo substr($testimonial->comment, 0, 20);
						if(strlen($testimonial->comment) >= 20){
							echo '...';
						}
					@endphp
					</small>
				</div>
				<div class="col col-4 text-right">
					<a href="/admin/testimonials/{{ $testimonial->id }}/edit" class="btn btn-sm btn-primary">
						<i class="fa fa-pencil"></i>
					</a>
					<a href="/admin/testimonials/{{ $testimonial->id }}/delete" class="btn btn-sm btn-danger">
						<i class="fa fa-trash"></i>
					</a>
				</div>
			</div>
		</div>
		@endforeach
		@else
		<div class="card">
			<div class="card-body text-center">
				<p>No testimonials to Display</p>
				<a href="/admin/testimonials/create" class="btn btn-primary">Add Testimonial</a>
			</div>
		</div>
		@endif
	</div>
</div>
@endsection
