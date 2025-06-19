<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function  classStudents()
    {
        return $this->hasMany(ClassStudent::class);
    }

    public function student()
    {
        return $this->belongsToMany(student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
