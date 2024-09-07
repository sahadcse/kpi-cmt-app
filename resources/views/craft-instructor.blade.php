@extends('layouts.front.front-layout')

@section('content')

<!-- teacher section strt -->
      <section class="teacher-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h4 class="text-center">
                Craft Instructor Of Computer Technology
              </h4>
            </div>
          </div>
          <div class="row">
          	@foreach($crafts as $craft)
            <div class="col-md-4">
              <div class="card">
                <img src="{{asset('uploads/craft/'.$craft->image)}}" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title text-center">
                    {{$craft->name}}
                  </h5>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="font-weight-bold">Designation:</span> {{$craft->designation}}</li>
                    <li class="list-group-item"><span class="font-weight-bold">Qualification:</span> {{$craft->qualification}}</li>
                    <li class="list-group-item"><span class="font-weight-bold">Email:</span> {{$craft->email}}</li>
                    <li class="list-group-item"><span class="font-weight-bold">Phone/Mobile:</span> {{$craft->phone}}</li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- craft section end -->

@endsection