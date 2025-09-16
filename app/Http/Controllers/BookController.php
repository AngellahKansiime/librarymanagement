<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
//use App\Http\Controllers\BookController;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $allbooks= Book::all();
       return view('books.index',['books'=>$allbooks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    $allbooks= Book::all();
         return view('books.create',['book'=>$allbooks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book= new Book();
        $book->title = $request->title;
        $book->book_id = $request->book_id;
        $book->genre = $request->genre;
        $book->author = $request->author ;
        $book->status = $request->status;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
       $book = Book::findOrFail($id);  
    return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
         $book = Book::findOrFail($id);
         return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
          $book = Book::findOrFail($id);
    $book->update($request->all());
    return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
         $book = Book::findOrFail($id);
    $book->delete();
    return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    public function returnBook(Request $request, $bookId)
{
    $userId = auth()->bookid();

    // Find active borrowing
    $borrowing = Book::where('user_id', $userId)
                          ->where('book_id', $bookId)
                          ->where('status', 'borrowed')
                          ->first();

    if (!$borrowing) {
        return back()->with('error', 'No active borrowing found.');
    }

    // Calculate fine
    $today = now();
    $fine = 0;
    if ($today->gt($borrowing->due_date)) {
        $daysLate = $today->diffInDays($borrowing->due_date);
        $fine = $daysLate * 1000; // e.g., 1000 UGX per day
    }

    // Update borrowing record
    $borrowing->update([
        'status' => 'returned',
        'return_date' => $today,
        'fine' => $fine,
    ]);

    // Update book stock
    $borrowing->book->increment('available_copies');

    return back()->with('success', "Book returned successfully. Fine: $fine");
}

}
