<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
      
    protected $fillable = [
        'first_name',
        'last_name',
        'course',
        'year_of_study',
        'phone',
        'email',
        'username',
        'password',
        'role'
        
    ];
}
