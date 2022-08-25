<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ApiController extends Controller
{
 public function index(){
    $students = Student::get()->toJson(JSON_PRETTY_PRINT);
    return response($students, 200);
 }

 public function create(Request $request){
    $student = new Student;
    $student->name = $request->name;
    $student->course = $request->course;
    $student->save();

    return response()->json([
        "message" => "student record created"
    ], 201);
 }

//  public function show($id){

//  }

//  public function update(Request $request){

//  }

//  public function delete($id){

//  }

}
