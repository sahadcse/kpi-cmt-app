@extends('layouts.front.front-layout')

@section('content')

<!-- teacher section strt -->
      <section class="teacher-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h4 class="text-center">
                Staff Of Computer Technology
              </h4>
            </div>
          </div>
          <div class="row">
          	@foreach($staffs as $staff)
            <div class="col-md-4">
              <div class="card">
                <img src="{{asset('uploads/staff/'.$staff->image)}}" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title text-center">
                    {{$staff->name}}
                  </h5>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="font-weight-bold">Designation:</span> {{$staff->designation}}</li>
                    <li class="list-group-item"><span class="font-weight-bold">Qualification:</span> {{$staff->qualification}}</li>
                    <li class="list-group-item"><span class="font-weight-bold">Email:</span> {{$staff->email}}</li>
                    <li class="list-group-item"><span class="font-weight-bold">Phone/Mobile:</span> {{$staff->phone}}</li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- staff section end -->


@endsection