@extends('admin.layout.main')
@section('content')
<div class="container">
	<div class="card mb-4">
		<div class="card-body text-center">
			<h5 class="card-title">
				@if($leadCount)
				{{ $leadCount }} submissions today
				 <a href="/admin/leads" class="btn btn-primary btn-sm">
					 <i class="fa fa-address-card-o"></i> View
				 </a>
				@endif
			</h5>
		</div>
	</div>
	<nav>
		<div class="list-group">
			<a href="/admin/leads" class="list-group-item">
				<i class="fa fa-address-card-o"></i> Leads
			</a>
			<a href="/admin/testimonials" class="list-group-item">
				<i class="fa fa-comment"></i> Testimonials
			</a>
			<a href="/admin/settings" class="list-group-item">
				<i class="fa fa-cog"></i> Settings
			</a>
			<a href="/auth/logout" class="list-group-item">
				<i class="fa fa-sign-out"></i> Sign Out
			</a>
		</div>
	</nav>
</div>
@endsection
