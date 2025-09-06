<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     
    protected $fillable = [
        'title',
        'book_id',
        'genre',
        'author',
        'status',
    ];
}
