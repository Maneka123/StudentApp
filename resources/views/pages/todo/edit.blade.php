<form action="{{route('student.update' , $task->id)}}" method="post" enctype="multipart/form">
    @csrf
            <div class="col-lg-12  mt-5">
                    <div class="row">
                        <div class="col-lg-8"> <div class="form-group">

<input  name="name" class="form-control" type="text" placeholder="Full Name" aria-label="default input example" value="{{$student->name}}">
<input  name="image" class="form-control" type="file" placeholder="Image" aria-label="default input example" value="{{$student->image}}">
<input  name="age" class="form-control" type="number" placeholder="Age" aria-label="default input example" value="{{$student->age}}">



                </div></div>
                        <div class="col-lg-4"><button type="submit" class="btn btn-primary">Update</div>
                    </div>
               
                    
            </div>
        </form>