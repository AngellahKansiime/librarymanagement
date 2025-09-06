@extends('layouts.app')
@section('content')
<form action="{{ route('borrowers.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input class="form-control" type="text" id="name" name="name" value="{{ $borrower->name }}">

    <label for="borrowers_id">Borrower's ID:</label>
    <input class="form-control" type="text" id="borrowers_id" name="book_id" value="{{ $borrower->borrowers_id }}">

    <label for="book">Book:</label>
    <input class="form-control" type="text" id="book" name="book" value="{{ $borrower->book }}">

    <label for="date_taken">Genre:</label>
    <input class="form-control" type="text" id="date_taken" name="date_taken" value="{{ $borrower->date_taken }}">

    <label for="expected_return">Author:</label>
    <input class="form-control" type="text" id="expected_return" name="expected_return" value="{{ $borrower->expected_return }}">

    <button class="btn btn-success" type="submit">Update</button>
</form>
@endsection
