<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

//use App\Http\Controllers\BookController;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allbooks = Book::all();

        return view('books.index', ['books' => $allbooks]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allbooks = Book::all();
        return view('books.create', ['book' => $allbooks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ]);

        $existingBook = Book::where('title', $request->title)
            ->where('author', $request->author)
            ->first();

        if ($existingBook) {
            $existingBook->quantity += 1;
            $existingBook->save();
        } else {
            Book::create([
                'title' => $request->title,
                'book_id' => $request->book_id,
                'genre' => $request->genre,
                'author' => $request->author,
                'status' => 'available',
                'quantity' => 1
            ]);
        }

        return redirect()->route('books.index')->with('success', 'Book saved successfully.');
    }

    public function getData(Request $request)
    {

        if ($request->ajax()) {
            $books = Book::query();

            if ($request->title) {
                $books->where('title', $request->title);
            }

            if ($request->year) {
                $books->where('genre', $request->genre);
            }

            return DataTables::of($books)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    return '
                <a href="'.route('books.edit', $row->id).'" class="btn btn-warning btn-sm">Edit</a>
                <a href="'.route('books.show', $row->id).'" class="btn btn-info btn-sm">View</a>
            ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    public function showTopUpForm()
    {
        $books = \App\Models\Book::all(); // Fetch all books for the dropdown
        return view('books.topup', compact('books'));
    }

    public function topUpLogic(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = \App\Models\Book::findOrFail($request->book_id);
        $book->quantity += $request->quantity;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book stock topped up successfully!');
    }


}
