@extends('admin.layout.main')
@section('content')
<div class="container">
	<nav>
		<div class="list-group">
			<a href="/leads" class="list-group-item">
				<i class="fa fa-address-card-o"></i> Leads
			</a>
			<a href="/testimonials" class="list-group-item">
				<i class="fa fa-comment"></i> Testimonials
			</a>
			<a href="/settings" class="list-group-item">
				<i class="fa fa-cog"></i> Settings
			</a>
			<a href="/auth/logout" class="list-group-item">
				<i class="fa fa-sign-out"></i> Sign Out
			</a>
		</div>
	</nav>
</div>
@endsection
