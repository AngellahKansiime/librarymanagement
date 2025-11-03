<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrower extends Model
{
    use HasFactory;

    // Status constants
    const STATUS_PENDING  = 'pending';
    const STATUS_BORROWED = 'borrowed';
    const STATUS_RETURNED = 'returned';
    const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'borrowers_id',      // stores student ID
        'name',              // student name
        'book_id',
        'date_taken',
        'expected_return',
        'issued_by',
        'status',
    ];

    // Relation to book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
