<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allborrowers= Borrower::all();
       return view('books',['borrowers'=>$allborrowers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allbooks= Borrower::all();
         return view('borrowers.create',['borrower'=>$allbooks]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $borrower= new Borrower();
        $borrower->name = $request->name;
        $borrower->borrowers_id = $request->borrowers_id;
        $borrower->book = $request->book;
        $borrower->date_taken = $request->date_taken ;
        $borrower->expected_return = $request->expected_return;
        $borrower->issued_by = $request->issued_by;
        $borrower->save();

        return redirect()->route('borrowers.index')->with('success', 'Borrower recorded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Borrower::findOrFail($id);  // find the borrower or throw 404 if not found
    return view('borrowers.show', compact('borrower'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Borrower::findOrFail($id);
         return view('borrowers.edit', compact('borrower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $book = Borrower::findOrFail($id);
    $book->update($request->all());
    return redirect()->route('borrowers.index')->with('success', 'Borrower updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Borrower::findOrFail($id);
    $book->delete();
    return redirect()->route('borrowers.index')->with('success', 'Borrower deleted successfully!');
    }
}
