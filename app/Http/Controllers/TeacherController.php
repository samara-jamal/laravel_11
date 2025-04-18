<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherStoreProfile;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\Material;
use App\Models\teacher;
use App\Models\teacher_material;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

   public function Add_material(Material $material)
   {
      $user = Auth::user();
      $teacher = $user->teacher;
      $teacher->materials()->attach($material);

      return response()->json([
         "message" => "added"
      ]);
   }



   public function update(TeacherUpdateRequest $request, teacher $tech)
   {
      $teacher = teacher::FindOrFail($tech->id);
      $teacher->update($request->all());
      return response()->json([
         "message" => "update the data",
         "student" => $teacher

      ], 200);
   }


   public function destroy(teacher $tech)
   {

      $teacher = teacher::FindOrFail($tech->id);
      $teacher->delete();
      return response()->json([
         "message" => "delete the data",
      ], 200);
   }
}
