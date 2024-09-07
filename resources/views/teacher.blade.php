@extends('layouts.front.front-layout')

@section('content')

<!-- teacher section strt -->
      <section class="teacher-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h4 class="text-center">
                Teacher Of Computer Technology
              </h4>
            </div>
          </div>
          <div class="row">
          	@foreach($teachers as $teacher)
            <div class="col-md-4">
              <div class="card">
                <img src="{{asset('uploads/teacher/'.$teacher->image)}}" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title text-center">
                    {{$teacher->name}}
                  </h5>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="font-weight-bold">Designation:</span> {{$teacher->designation}}</li>
                    <li class="list-group-item"><span class="font-weight-bold">Qualification:</span> {{$teacher->qualification}}</li>
                    <li class="list-group-item"><span class="font-weight-bold">Email:</span> {{$teacher->email}}</li>
                    <li class="list-group-item"><span class="font-weight-bold">Phone/Mobile:</span> {{$teacher->phone}}</li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- teacher section end -->


@endsection