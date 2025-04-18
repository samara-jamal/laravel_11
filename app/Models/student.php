<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Soap\Url;

class student extends Model
{
    protected $fillable=['Age','School_Name','img','user_id'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function teacher_material(){
        return $this->belongsToMany(teacher_material::class,'_teacher_material_stusent_booking');
    }
}