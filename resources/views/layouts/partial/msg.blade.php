@if(session('successMsg'))

<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<i class="material-icons">close</i>
	</button>
	<span>
		<b>Success-</b>{{ session('successMsg')}}
	</span>
</div>

@endif

@if($errors->any())

	@foreach($errors->all() as $errors)

		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<i class="material-icons">close</i>
			</button>
			<span>
				<b>Danger-</b>{{ $errors }}
			</span>
		</div>


	@endforeach


@endif