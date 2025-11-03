<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowers = Borrower::orderBy('status')->get();
        return view('borrowers.index', compact('borrowers'));
    }

    /**
     * Show the form for creating a new resource (librarian manual entry)
     */
    public function create()
    {
        $books = Book::where('quantity', '>', 0)->get(); // ✅ only books in stock
        return view('borrowers.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     * (Used by librarian to manually register a borrower)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'book_id' => 'required|exists:books,id',
            'borrowers_id' => 'required|string|max:50',
            'date_taken' => 'required|date',
            'expected_return' => 'required|date',
            'issued_by' => 'required|string|max:255'
        ]);

        $book = Book::findOrFail($request->book_id);

        //  Check if copies exist
        if ($book->quantity <= 0) {
            return back()->with('error', 'No copies available for this book.');
        }

        // Create borrower record manually
        Borrower::create([
            'name' => $request->name,
            'borrowers_id' => $request->borrowers_id,
            'book_id' => $book->id,
            'date_taken' => $request->date_taken,
            'expected_return' => $request->expected_return,
            'issued_by' => $request->issued_by,
            'status' => 'borrowed'
        ]);

        //Update book quantity and availability
        $book->quantity -= 1;
        if ($book->quantity <= 0) {
            $book->status = 'borrowed';
        }
        $book->save();

        return redirect()->route('borrowers.index')
            ->with('success', 'Book issued successfully!');
    }

    /**
     * Mark book as returned by librarian
     */
    public function returnBook($id)
    {
        $borrower = Borrower::findOrFail($id);

        // Mark borrower record
        $borrower->expected_return = now();
        $borrower->status = 'returned';
        $borrower->save();

        // Increase book quantity
        $book = Book::findOrFail($borrower->book_id);
        $book->quantity += 1;

        //  If there's at least one copy, mark available
        if ($book->quantity > 0) {
            $book->status = 'available';
        }
        $book->save();

        return back()->with('success', 'Book returned successfully.');
    }

    /**
     * Student Borrowing a Book (online request)
     */


    public function studentBorrow(Request $request, $book)
    {
        $student = Auth::user();
        $bookId = $book;

        $book = Book::findOrFail($bookId);

        if ($book->quantity <= 0) {
            return back()->with('error', 'Sorry, this book is out of stock.');
        }

        // Prevent duplicate requests
        $existing = Borrower::where('borrowers_id', $student->id)
            ->where('book_id', $bookId)
            ->whereIn('status', ['pending', 'borrowed'])
            ->first();

        if ($existing) {
            return back()->with('error', 'You already have a pending or borrowed copy of this book.');
        }

        // Create borrow request
        Borrower::create([
            'borrowers_id'    => $student->id,
            'name'            => $student->name,
            'book_id'         => $bookId,
            'date_taken'      => now(),
            'expected_return' => now()->addDays(7),
            'issued_by'       => 'Pending Approval',
            'status'          => 'pending',
        ]);

        return back()->with('success', 'Your book request has been sent for approval.');
    }
    public function approve($id)
    {
        $borrower = Borrower::findOrFail($id);

        // Only approve pending requests
        if ($borrower->status !== 'pending') {
            return back()->with('error', 'This request is not pending.');
        }

        $book = Book::findOrFail($borrower->book_id);

        //  Ensure stock is available
        if ($book->quantity <= 0) {
            return back()->with('error', 'No copies available for this book.');
        }

        //  Approve the request
        $borrower->status = 'borrowed';
        $borrower->issued_by = auth()->user()->name ?? 'Admin';
        $borrower->date_taken = now();
        $borrower->expected_return = now()->addDays(7);
        $borrower->save();

        // Reduce book quantity
        $book->quantity -= 1;
        if ($book->quantity <= 0) {
            $book->status = 'borrowed';
        }
        $book->save();

        return back()->with('success', 'Book request approved and book issued successfully.');
    }


    public function reject($id)
    {
        $borrower = Borrower::findOrFail($id);
        $borrower->status = 'rejected';
        $borrower->save();

        return back()->with('success', 'Book request rejected.');
    }



    /**
     * Display specific borrower
     */
    public function show($id)
    {
        $borrower = Borrower::findOrFail($id);
        return view('borrowers.show', compact('borrower'));
    }

    /**
     * Edit borrower record
     */
    public function edit($id)
    {
        $borrower = Borrower::findOrFail($id);
        return view('borrowers.edit', compact('borrower'));
    }

    /**
     * Update borrower record
     */
    public function update(Request $request, $id)
    {
        $borrower = Borrower::findOrFail($id);
        $borrower->update($request->all());
        return redirect()->route('borrowers.index')->with('success', 'Borrower updated successfully!');
    }

    /**
     * Delete borrower record
     */
    public function destroy($id)
    {
        $borrower = Borrower::findOrFail($id);
        $borrower->delete();
        return redirect()->route('borrowers.index')->with('success', 'Borrower deleted successfully!');
    }
}
