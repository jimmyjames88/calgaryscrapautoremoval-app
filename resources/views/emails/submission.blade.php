<p>
	<strong>Name: </strong>{{ $lead->name }}
</p>
<p>
	<strong>Email: </strong>{{ $lead->email }}
</p>
<p>
	<strong>Phone: </strong>{{ $lead->phone }}
</p>
<p>
	<strong>Message: </strong>{{ $lead->message }}
</p>
<p>
	<a href="{{ env('APP_URL') }}/admin/leads/{{ $lead->id }}">View in Admin Panel</a>
</p>
