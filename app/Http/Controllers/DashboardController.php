<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrower;
use App\Models\Student;


class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalStudents = Student::count();
        $totalBooks = Book::sum('quantity');
        $borrowers = Borrower::where('status', 'borrowed')->count();
        $pendingRequests = Borrower::where('status', 'pending')
        ->with('book')
        ->orderByDesc('created_at')
        ->get();




        return view('dashboard', compact('totalUsers', 'totalBooks', 'borrowers', 'pendingRequests','totalStudents'));
    }
}


