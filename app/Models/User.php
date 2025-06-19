<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    public $timestamps = false;

    use HasFactory;
    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }

    public function userRole()
    {
        return $this->hasMany(UserRole::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
