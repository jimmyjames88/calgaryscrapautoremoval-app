@extends('admin.layout.main')
@section('mobileNav')
<div class="row">
	@if(request('searchDate'))
	<div class="col">
		<a href="/admin/leads" class="btn btn-secondary">
			<i class="fa fa-caret-left"></i> Back
		</a>
	</div>
	@else
	<div class="col">
		<a href="/" class="btn btn-secondary">
			<i class="fa fa-home"></i> Home
		</a>
	</div>
	@endif
	<div class="col text-right">
		<button class="btn btn-primary" data-toggle="modal" data-target="#searchDateModal">
			<i class="fa fa-search"></i>
		</button>
		<a href="/admin/leads/create" class="btn btn-primary">
			<i class="fa fa-plus"></i>
		</a>
	</div>
</div>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<h5 class="title">
				@if(request('searchDate'))
				{{ request('searchDate') }}
				@else
				<i class="fa fa-address-card-o"></i> Leads
				@endif
			</h5>
		</div>
	</div>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th class="d-none d-sm-table-cell">Email</th>
				<th>Submitted</th>
			</tr>
		</thead>
		<tbody>
			@if($leads->count())
				@foreach($leads as $lead)
				<tr onclick="window.location.href='/leads/{{ $lead->id }}'" class="cursor-pointer">
					<td>{{ $lead->name }}</td>
					<td class="d-none d-sm-table-cell">{{ $lead->email }}</td>
					<td>{{ $lead->created_at->diffForHumans() }}</td>
				</tr>

				@endforeach
			@else
			<tr>
				<td colspan="3" class="text-center">No results to display</td>
			</tr>
			@endif
		</tbody>
	</table>
	{{ $leads->appends( (request('searchDate') ? ['searchDate' => request('searchDate')] : [] ) )->links() }}
</div>
@include('admin.leads._search-modal')
@endsection
