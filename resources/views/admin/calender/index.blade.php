@extends('layouts.app')
@section('title', 'calender')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')


<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="{{route('calender.create')}}" class="btn btn-primary">Add New</a>

              @include('layouts.partial.msg')

              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All calender</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Shift</th>
                        <th>Semester</th>
                        <th>Document</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($calenders as $key=>$calender)
                        <tr>
                        	<td>{{ $key + 1}}</td>
                        	<td>{{ $calender->shift}}</td>
                          <td>{{ $calender->semester}}</td>
                        	<td>{{ $calender->document}}</td>
                        	<td>{{ $calender->created_at}}</td>
                        	<td>{{ $calender->updated_at}}</td>
                          <td>
                            <a href="{{ route('calender.edit', $calender->id)}}" class="btn btn-info"><i class="material-icons">edit</i></a>
                            <form id="delete-form-{{ $calender->id}}" action="{{ route('calender.destroy', $calender->id )}}" method="POST" style="display:none;">
                              @csrf
                              @method('DELETE')
                            </form>
                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? want to delete this?')){
                              event.preventDefault();
                              document.getElementById('delete-form-{{ $calender->id }}').submit();
                            }else{
                              event.preventDefault();
                            }"><i class="material-icons">delete</i></button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection

@push('script')
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
    		$('#table').DataTable();
		} );
	</script>
@endpush