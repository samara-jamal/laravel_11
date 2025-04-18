<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher_material extends Model
{
    protected $fillable=['teacher_id','material_id'];

    public function student(){
        return $this->belongsToMany(student::class,'teacher_material_booking','teacher_materials_id','student_id');
    }
}