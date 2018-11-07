@extends('admin.layout.main')
@section('content')
<div class="container">
	<div class="card mb-4">
		<div class="card-body text-center">
			<h5 class="card-title">

			</h5>
			<p>
				{{ $leadCount['daily'] }} leads today ({{ App\Admin\Lead::unreadCount() }} unread)
			</p>
			<a href="/admin/leads" class="btn btn-primary ml-2">
				<i class="fa fa-address-card-o"></i> View
			</a>
		</div>
	</div>
	<nav>
		<div class="list-group">
			<a href="/admin/leads" class="list-group-item">
				<i class="fa fa-address-card-o"></i> Leads
			</a>
			@if (auth()->user()->hasPermission('manage-testimonials'))
			<a href="/admin/testimonials" class="list-group-item">
				<i class="fa fa-comment"></i> Testimonials
			</a>
			@endif
			@if (auth()->user()->hasPermission('manage-users'))
			<a href="/admin/settings" class="list-group-item">
				<i class="fa fa-cog"></i> Settings
			</a>
			@endif
			<a href="/auth/logout" class="list-group-item">
				<i class="fa fa-sign-out"></i> Sign Out
			</a>
		</div>
	</nav>
</div>
@endsection
