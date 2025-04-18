<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Is_Student;
use App\Http\Middleware\IsStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("Register",[UserController::class,'Register']);
Route::post("Login",[UserController::class,'Login']);
Route::post("Logout",[UserController::class,'Logout'])->middleware('auth:sanctum');

//student_route_group

Route::middleware(['auth:sanctum','Is_Student'])->group(function(){
    Route::post("student_add_profile",[UserController::class,'Register']);
    Route::put("student_update_profile/{std}",[StudentController::class,'update']);
    Route::delete("student_delete_profile/{std}",[StudentController::class,'destroy']);
    Route::post('Booking_material_teacher/{teacher_material}',[StudentController::class,'Booking']);
});   

////teacher_route_group

Route::middleware(['auth:sanctum','Is_Teacher'])->group(function(){
Route::post("teacher_add_profile",[UserController::class,'Register']);
Route::put("teacher_update_profile/{tech}",[TeacherController::class,'update']);
Route::delete("teacher_delete_profile/{tech}",[TeacherController::class,'destroy']);
Route::post("add_materia_teacher/{material}",[TeacherController::class,'Add_material']);

});


//material_routes
Route::prefix('material')->group(function(){
    Route::post("add_material",[MaterialController::class,'store']);
    Route::put("update_material/{material}",[MaterialController::class,'update']);
    Route::delete("delete_material/{material}",[MaterialController::class,'destroy']);

});

