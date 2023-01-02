@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center" >
            <h1 class="page-title">Student List</h1>


<form action="{{route('student.store')}}" method="post" enctype="multipart/form">
    @csrf
            <div class="col-lg-12  mt-5">
                    <div class="row">
                        <div class="col-lg-8"> <div class="form-group">

<input name="name" class="form-control" type="text" placeholder="Full Name" aria-label="default input example">
<input name="image" class="form-control" type="file" placeholder="Image" aria-label="default input example">
<input name="age" class="form-control" type="number" placeholder="Age" aria-label="default input example">



                </div></div>
                        <div class="col-lg-4"><button type="submit" class="btn btn-primary">Submit</div>
                    </div>
               
                    
            </div>
        </form>
        </div>

<br><br><br><br>

        <div class="col-lg-12 mt-5">

            <div>
            <br><br><br><br>
            <table class="table table-dark table-striped" >
  <thead>
    <tr>
      <th scope="col">Count</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Age</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tasks as $key=>$student)
    <tr>
      <th scope="row">{{++$key}}</th>
      <td>{{$student->name}}</td>
      <td><img src="{{$student->image}}" wisth="100px"></td>
      <td>{{$student->age}}</td>
      <td>
        @if($student->done==0)
            <span class="badge bg-warning">Inactive</span>
        @else
            <span class="badge bg-success">Active</span>
        @endif
      </td>
      <td><a href="{{route('student.delete',$student->id)}}" class ="btn btn-danger">Delete</a>
      <a href="{{route('student.done',$student->id)}}" class ="btn btn-success">Change status</a>
      <a href="javascript:void(0)" class ="btn btn-info"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Student</a></td>
    </tr>
    @endforeach
    
  </tbody>
</table>




            </div>





        </div>
    </div>

</div>
<!--usage of bootstrap modal-->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Main Student Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="taskEditContent">
        <h1>modal</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


@endsection


@push('css')
<style>
    .page-title{
        padding-top:15vh;
        font-size:5rem;
        color: #6d86d2;
    }
</style>
@endpush