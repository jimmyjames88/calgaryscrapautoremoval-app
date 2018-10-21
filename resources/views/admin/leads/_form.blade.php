@csrf
<div class="form-group">
	<label>Name</label>
	<input type="text" name="name" class="form-control" value="{{ $lead->name }}" />
</div>
<div class="form-group">
	<label>Phone</label>
	<input type="text" name="phone" class="form-control" value="{{ $lead->phone }}" />
</div>
<div class="form-group">
	<label>Email</label>
	<input type="text" name="email" class="form-control" value="{{ $lead->email }}" />
</div>
<div class="form-group">
	<label>Message</label>
	<textarea name="message" class="form-control">{{ $lead->message }}</textarea>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">Save</button>
	<a href="{{ url()->previous() }}" class="btn btn-link">Cancel</a>
</div>
