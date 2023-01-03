<?php

namespace  domain\Services;
use App\Models\Student;
class StudentService{

    protected $task;

    public function __construct(){
        $this->task=new Student();
    }

    public function all(){
        return $this ->task->all();
        //$response['tasks']=$this->task->all();
       // return view('pages\todo\index')->with($response);
    }
    public function store($data){
        $this->task->create($data);
        //return redirect()->back();
    }

    public function delete($student_id){
      $task=$this->task->find($student_id);
      $task->delete();
      //return redirect()->back();
    }

    public function done($student_id){
        $task=$this->task->find($student_id);
       // $task->done=1;
       // $task->update();

        $task->done = !$task->done;
        $task->save();


        //return redirect()->back();
      }
   





}