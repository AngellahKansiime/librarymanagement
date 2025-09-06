@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Book Details</h2>

    <p><strong>Name:</strong> {{ $borrower->name }}</p>
    <p><strong>Borrower's ID:</strong> {{ $borrower->borrowers_id }}</p>
    <p><strong>Book:</strong> {{ $borrower->book }}</p>
    <p><strong>Date taken:</strong> {{ $borrower->date_taken }}</p>
    <p><strong>Expected return:</strong> {{ $book->expected_return }}</p>

    <a href="{{ route('borrowers.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('borrowers.edit', $borrower->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('borrowers.destroy', $borrower->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this borrower?')">
            Delete
        </button>
    </form>
</div>
@endsection

