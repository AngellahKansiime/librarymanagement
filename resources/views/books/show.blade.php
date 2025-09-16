@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Book Details</h2>
<!-- 
    <p><strong>Name:</strong> {{ $book->name }}</p> -->
    <p><strong>Book ID:</strong> {{ $book->book_id }}</p>
    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Genre:</strong> {{ $book->genre }}</p>
    <p><strong>Author:</strong> {{ $book->author }}</p>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this book?')">
            Delete
        </button>
    </form>
</div>
@endsection

