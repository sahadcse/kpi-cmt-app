@extends('layouts.front.front-layout')

@section('content')

<section class="academic-calender-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-center">Academic Calender</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                
                <th scope="col">Shift</th>
                <th scope="col">Semester</th>
                <th scope="col">Document</th>
              </tr>
            </thead>
            <tbody>
              @foreach($calenders as $calender)
              <tr>
                <td>{{$calender->shift}}</td>
                <td>{{$calender->semester}}</td>
                <td><a href="{{asset('uploads/calender/'.$calender->document)}}">PDF</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>  
</section>


@endsection