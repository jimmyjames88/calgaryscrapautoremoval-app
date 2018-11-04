@extends('admin.layout.main')

@section('content')
<div class="container">
	<form action="/admin/leads" method="POST">
		@include('admin.leads._form')
	</form>
</div>
@endsection
