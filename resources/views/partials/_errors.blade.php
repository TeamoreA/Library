<div class="container">
@if (isset($errors)&&count($errors) > 0)

	<div class="alert alert-dismissable alert-danger">
		<button class="close" type="button" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
		</button>
		<i class="fas fa-exclamation-triangle"></i>
		@foreach($errors->all() as $error)
			<li><strong>{!! $error !!}</strong></li>
		@endforeach
	</div>

@endif
</div>