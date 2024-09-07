@extends('layouts.app')
@section('title', 'Student')
@push('css')
@endpush
@section('content')


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Edit Student</h4>
					</div>
					<div class="card-body">

						{{-- @include('layouts.partial.msg') --}}

						<form action="{{ route('student.update', $student->id)}}" method="POST" enctype="multipart/form-data">
							@csrf
                            @method('PUT')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="" class="bmd-label-floating">Roll</label>
										<input type="text" class="form-control" name="roll" value="{{ $student->roll }}">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Name</label>
										<input type="text" class="form-control" name="name" value="{{ $student->name }}">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Session</label>
										<input type="text" class="form-control" name="session" value="{{ $student->session }}">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Semester</label>
										<input type="text" class="form-control" name="semester" value="{{ $student->semester }}">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Result</label>
										<input type="text" class="form-control" name="result" value="{{ $student->result }}">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Department</label>
										<input type="text" class="form-control" name="department" value="{{ $student->department }}">
									</div>
								</div>
								<a href="{{ route('student.index')}}" class="btn btn-dark"> BACK</a>
								<button type="submit" class="btn btn-info btn-sm">Update
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