@extends('admin.layout.main')

@section('content')
<div class="container">
	<form action="/admin/leads/{{ $lead->id }}" method="POST">
		<input type="hidden" name="_method" value="PUT" />
		@include('admin.leads._form')
	</form>
</div>
@endsection
