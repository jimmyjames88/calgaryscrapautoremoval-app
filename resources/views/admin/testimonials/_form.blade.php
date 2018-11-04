@if($errors->any())
<ul class="alert alert-danger">
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@endif
@csrf
<div class="form-group">
	<label>Name</label>
	<input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" />
</div>
<div class="form-group">
	<label>Comment</label>
	<textarea name="comment" class="form-control" rows="3">{{ $testimonial->comment }}</textarea>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">Save</button>
	<a href="{{ url()->previous() }}" class="btn btn-link">Cancel</a>
</div>
