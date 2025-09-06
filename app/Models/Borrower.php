<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
      
    protected $fillable = [
        'name',
        'borrowers_id',
        'book',
        'date_taken',
        'expected_return',
        'issued_by',
    ];
}
