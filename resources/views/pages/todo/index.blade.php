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
      <a href="" class ="btn btn-success">Update Student</a>

    </tr>
    @endforeach
    
  </tbody>
</table>




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



@push('js')

<script>









  //<script src="https://code.jquery.com/jquery-3.6.0.min.js">
 //window.taskEditModal()=taskEditModal();
  function taskEditModal(student_id){
    var data={
      student_id:student_id,
    };

    $.ajax({
      url:"{{route('student.edit')}}",
      headers:{ 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
      type:"GET",
      datatype:'',
      data:data,
      success:function(response){
        $('#editTask').modal('show');
        $('#editTaskContent').html(response);
      }
    });
  }


</script>
@endpush
  

      
