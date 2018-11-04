@isset($page['backUrl'])
<!-- <a> -->
<a href="{{ $page['backUrl'] }}" class="btn btn-secondary">
@else
<a href="{{ url()->previous() }}" class="btn btn-secondary">
@endif
	<i class="fa fa-caret-left"></i>
</a>
<!-- </a> -->
