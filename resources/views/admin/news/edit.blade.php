@extends('layouts.app')
@section('title', 'news')
@push('css')
@endpush
@section('content')


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Update News</h4>
					</div>
					<div class="card-body">

						@include('layouts.partial.msg')

						<form action="{{ route('news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="" class="bmd-label-floating">Title</label>
										<input type="text" class="form-control" name="title" value="{{$news->title}}">
									</div>
									
										<label for="" class="bmd-label-floating">Document</label>
										<input type="file" class="form-control" name="document">
									
								</div>
								<a href="{{ route('news.index')}}" class="btn btn-dark"> BACK</a>
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