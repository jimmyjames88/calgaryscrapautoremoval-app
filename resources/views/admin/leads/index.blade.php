@extends('admin.layout.main')
@section('mobileNav')
<button class="btn btn-primary" data-toggle="modal" data-target="#searchDateModal">
	<i class="fa fa-search"></i>
</button>
@if (auth()->user()->hasPermission('manage-leads'))
<a href="/admin/leads/create" class="btn btn-primary">
	<i class="fa fa-plus"></i>
</a>
@endif
@endsection

@section('content')
<div class="container">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>
					<a href="?order=name">Name</a>
				</th>
				<th class="d-none d-sm-table-cell">
					<a href="?order=email">Email</a>
				</th>
				<th class="text-right">
					<a href="/admin/leads">Submitted</a>
				</th>
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
