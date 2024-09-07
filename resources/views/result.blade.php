@extends('layouts.front.front-layout')

@section('content')

<section class="academic-result-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="text-center">Result</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                
                <th scope="col">Shift</th>
                <th scope="col">Semester</th>
                <th scope="col">Document</th>
              </tr>
            </thead>
            <tbody>
              @foreach($results as $result)
              <tr>
                <td>{{$result->shift}}</td>
                <td>{{$result->semester}}</td>
                <td><a href="{{asset('uploads/result/'.$result->document)}}">PDF</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>  
</section>


@endsection