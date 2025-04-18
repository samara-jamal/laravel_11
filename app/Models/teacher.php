<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{

    protected $fillable = ['img', 'education_dgree', 'user_id', 'material_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function materials()
    {
        return $this->belongsToMany(Material::class, 'teacher_materials');
    }
}
