@extends('admin.layout.main')
@section('mobileNav')
<div class="row">
	<div class="col">
		<a href="/admin" class="btn btn-secondary">
			<i class="fa fa-home"></i>
		</a>
	</div>
	<div class="col text-right">
		<a href="/admin/testimonials/create" class="btn btn-primary">
			<i class="fa fa-plus"></i>
		</a>
	</div>
</div>
@endsection

@section('content')
<div class="container">
	<div class="list-group">
		@if(count($testimonials))
		@foreach ($testimonials as $testimonial)
		<div class="list-group-item">
			<div class="row">
				<div class="col">{{ $testimonial->name }} {!! ($testimonial->id === 1 ? '<em class="small">(root)</em>' : '') !!}</div>
				<div class="col text-right">
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
				<a href="#" class="btn btn-primary">Add Testimonial</a>
			</div>
		</div>
		@endif
	</div>
</div>
@endsection
