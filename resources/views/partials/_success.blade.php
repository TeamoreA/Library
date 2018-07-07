<div class="container">
@if (session()->has('success'))

	<div class="alert alert-dismissable alert-success">
		<button class="close" type="button" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>
			<i class="fas fa-shield-check"></i> {!! Session()->get('success') !!}
		</strong>
	</div>

@endif
</div>