@extends('layouts.app')
@section('title', 'teacher')
@push('css')
@endpush
@section('content')


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Add New Teacher</h4>
					</div>
					<div class="card-body">

						@include('layouts.partial.msg')

						<form action="{{ route('teacher.store')}}" method="POST" enctype="multipart/form-data">
							@csrf

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="" class="bmd-label-floating">Name</label>
										<input type="text" class="form-control" name="name">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Designation</label>
										<input type="text" class="form-control" name="designation">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Qualification</label>
										<input type="text" class="form-control" name="qualification">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">E-mail</label>
										<input type="text" class="form-control" name="email">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Phone</label>
										<input type="text" class="form-control" name="phone">
									</div>
									
										<label for="" class="bmd-label-floating">Image</label>
										<input type="file" class="form-control" name="image">
									
								</div>
								<a href="{{ route('teacher.index')}}" class="btn btn-dark"> BACK</a>
								<button type="submit" class="btn btn-info btn-sm">INSERT
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection
@push('script')
@endpush