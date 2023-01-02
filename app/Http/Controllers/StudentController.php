<?php

namespace App\Http\Controllers;
use     App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $task;

    public function __construct(){
        $this->task=new Student();
    }

    public function index(){
        $response['tasks']=$this->task->all();
        return view('pages\todo\index')->with($response);
    }
    public function store(Request $request){
        $this->task->create($request->all());
        return redirect()->back();
    }

    public function delete($student_id){
      $task=$this->task->find($student_id);
      $task->delete();
      return redirect()->back();
    }

    public function done($student_id){
        $task=$this->task->find($student_id);
       // $task->done=1;
       // $task->update();

        $task->done = !$task->done;
        $task->save();


        return redirect()->back();
      }
   
}
