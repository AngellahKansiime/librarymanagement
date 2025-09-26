<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
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

    public function user(){
        return $this->belongsTo(User::class);
    }


 protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
