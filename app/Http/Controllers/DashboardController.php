<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Borrower;


class DashboardController extends Controller
{
    public function index()
    {
       
        $totalBooks = Book::count();

        
        $borrowedBooks = Borrower::whereNull('returned_at')->count();

   
        $totalUsers = User::count();

        return view('dashboard', compact(
            'totalBooks', 
            'borrowedBooks', 
            'totalUsers', 
            
        ));
    }
}


