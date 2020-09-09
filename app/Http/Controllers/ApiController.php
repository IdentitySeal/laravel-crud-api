<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getAllStudents(){
        // get all student data 
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students,200);

    }
    public function createStudent(Request $request){
        // create Student data
        $student = new Student;
        $student->name = $request->name; 
        $student->course = $request->course;
        $student->save();

        return response()->json([
            "message" => "student record created"
        ],201);

    }
    public function getStudent($id){
        // get student data by Id
        if (Student::where('id', $id)->exists()){
            $student = Student::where('id',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response ($student,200);
        }
        else {
            return response()->json([
                "message" => "Student ID not found"
            ],404);
        }
    }
    public function updateStudent(Request $request,$id){
        // update Student data by id
        if (Student::where('id', $id)->exists()){
            $student = Student::find($id);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->save();
            return response()->json([
                "message" => "records updated sucessfully"
            ],200);
        }
        else {
            return response()->json([
                "message" => "Student not found"
            ],404);
        }
    }
    public function deleteStudent ($id) {
        if(Student::where('id', $id)->exists()) {
          $student = Student::find($id);
          $student->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "Student not found"
          ], 404);
        }
      }
}
