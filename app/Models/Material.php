<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['name', 'teacher_id'];


    public function teacher()
    {
        return $this->belongsToMany(teacher::class, 'teacher_materials');
    }
}
