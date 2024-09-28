<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function course_materials()
    {
        return $this->hasMany(CourseMaterial::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
