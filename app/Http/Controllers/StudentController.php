<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentProfileRequest;
use App\Http\Requests\StudentUpdateProfileRequesrt;
use App\Http\Requests\UpdateProfileRequesrt;
use App\Models\Material;
use App\Models\student;
use App\Models\teacher;
use App\Models\teacher_material;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

   public function update(StudentUpdateProfileRequesrt $request,student $std){
      $student=student::FindOrFail($std->id);
      $student->update($request->all());
      return response()->json([
         "message"=>"update the data",
         "student"=>$student
         
      ],200);
      
   }
   public function destroy(StudentUpdateProfileRequesrt $request, student $std){
      
      $student=student::FindOrFail($std->id);
      $student->delete();
      return response()->json([
         "message"=>"delete the data",         
      ],200);
   }

   public function Booking(teacher_material $teacher_material, Request $reuest){
      $user = Auth::user();
      $std = $user->student;
   
      return response()->json([
         "message" => "added"
      ]);
   }
   
}