<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\FormStudent;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
 public function index(){
    $students = Student::get()->toJson(JSON_PRETTY_PRINT);
    return response($students, 200);
 }

 public function create(FormStudent $request){
    $student = new Student;
    $student->name = $request->name;
    $student->course = $request->course;
    $student->save();

    return response()->json([
        "message" => "student record created"
    ], 201);
 }

 public function show($id){
    if(Student::where('id', $id)->exists()){
        $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($student, 200);
    }else{
        return response()->json([
            "message" => "Student not found"
        ], 400);
    }
 }

 public function update(Request $request ,$id){
    if(Student::where('id', $id)->exists()){
       $student = Student::find($id);
       $student->name = is_null($student->name) ? $student->name : $request->name;
       $student->course = is_null($student->course) ? $student->course : $request->course;
       $student->save();

       return response()->json([
            "message" => "records updated successfully"
       ], 200);
    }else{
        return response()->json([
            "message" => "Student not found"
        ], 404);
    }
 }

 public function delete($id){
    if(Student::where('id', $id)->exists()){
        $student = Student::find($id);
        $student->delete();

        return response()->json([
            "message" => "records delete"
        ], 202);
    }else{
        return response()->json([
            "message" => "Student not found"
        ], 404);
    }
 }
}
