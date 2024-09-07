@extends('layouts.app')
@section('title', 'result')
@push('css')
@endpush
@section('content')


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Update result</h4>
					</div>
					<div class="card-body">

						@include('layouts.partial.msg')

						<form action="{{ route('result.update', $result->id)}}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="" class="bmd-label-floating">Shift</label>
										<input type="text" class="form-control" name="shift" value="{{$result->shift}}">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Semester</label>
										<input type="text" class="form-control" name="semester" value="{{$result->semester}}">
									</div>
									
										<label for="" class="bmd-label-floating">Document</label>
										<input type="file" class="form-control" name="document">
									
								</div>
								<a href="{{ route('result.index')}}" class="btn btn-dark"> BACK</a>
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