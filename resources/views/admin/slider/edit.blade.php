@extends('layouts.app')
@section('title', 'slider')
@push('css')
@endpush
@section('content')


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Edit Slider</h4>
					</div>
					<div class="card-body">
						<form action="{{ route('slider.update', $slider->id )}}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="" class="bmd-label-floating">Title</label>
										<input type="text" class="form-control" name="title" value="{{ $slider->title }}">
									</div>
									<div class="form-group">
										<label for="" class="bmd-label-floating">Sub Title</label>
										<input type="text" class="form-control" name="sub_title" value="{{ $slider->sub_title }} ">
									</div>
									
										<label for="" class="bmd-label-floating">Image</label>
										<input type="file" class="form-control" name="image">
									
								</div>
								<a href="{{ route('slider.index')}}" class="btn btn-dark"> BACK</a>
								<button type="submit" class="btn btn-info btn-sm">Update
								</button>
								<img src="{{ asset('uploads.slider', $slider->image)}}" alt="">
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