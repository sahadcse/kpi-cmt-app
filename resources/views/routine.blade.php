@extends('layouts.front.front-layout')

@section('content')

<section class="academic-routine-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-center">Class Routine</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                
                <th scope="col">Shift</th>
                <th scope="col">Semester</th>
                <th scope="col">Document</th>
              </tr>
            </thead>
            <tbody>
              @foreach($routines as $routine)
              <tr>
                <td>{{$routine->shift}}</td>
                <td>{{$routine->semester}}</td>
                <td><a href="{{asset('uploads/routine/'.$routine->document)}}">PDF</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>  
</section>


@endsection