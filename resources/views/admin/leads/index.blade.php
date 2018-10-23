@extends('admin.layout.main')
@section('mobileNav')
<div class="row">
	@if(request('searchDate'))
	<div class="col">
		<a href="/admin/leads" class="btn btn-secondary">
			<i class="fa fa-caret-left"></i>
		</a>
	</div>
	@else
	<div class="col">
		<a href="/admin" class="btn btn-secondary">
			<i class="fa fa-home"></i>
		</a>
	</div>
	@endif
	<div class="col text-right">
		<button class="btn btn-primary" data-toggle="modal" data-target="#searchDateModal">
			<i class="fa fa-search"></i>
		</button>
		@if (auth()->user()->hasPermission('manage-leads'))
		<a href="/admin/leads/create" class="btn btn-primary">
			<i class="fa fa-plus"></i>
		</a>
		@endif
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
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th class="d-none d-sm-table-cell">Email</th>
				<th class="text-right">Submitted</th>
			</tr>
		</thead>
		<tbody>
			@if($leads->count())
				@foreach($leads as $lead)
				<tr
					onclick="window.location.href='/admin/leads/{{ $lead->id }}'"
					class="cursor-pointer {{ ($lead->unread ? 'table-warning' : '') }}">
					<td>{{ $lead->name }}</td>
					<td class="d-none d-sm-table-cell">{{ $lead->email }}</td>
					<td class="text-right">{{ $lead->created_at->diffForHumans() }}</td>
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
