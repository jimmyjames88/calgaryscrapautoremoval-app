<div class="form-group">
	<label>Permissions</label>
	<div class="list-group">
		@foreach ($permissions as $permission)
		<label class="list-group-item cursor-pointer">
			<input type="checkbox" name="permissions[{{ $permission->id }}]" value="1" {{ ( $user->hasPermission($permission->slug) ? 'checked' : '' ) }} /> {{ $permission->slug }}	- <em class="small">{{ $permission->description }}</em>
		</label>
		@endforeach
		<label class="list-group-item cursor-pointer disabled">
			<input type="checkbox" name="" disabled checked /> view-leads - <em class="small">View leads. All user accounts have this permission</em>
		</label>
	</div>
</div>
