@extends('layouts.app')
@section('content')
<h2>Table of books</h2>
<form action="{{route('borrowers.create')}}">
<button class="btn btn-primary">Borrow a book</button>
</form>
<table>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Book ID</th>
        <th>Genre</th>
        <th>Author</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <tr>
           <?php $number=0; ?>
@foreach($books as $book)
         <?php $number++; ?>
    <tr>
        <td>{{ $number }}</td> 
        <td>{{$book->title}}</td>
        <td>{{$book->book_id}}</td>
        <td>{{$book->genre}}</td>
        <td>{{$book->author}}</td>
        <td>{{$book->status}}</td>
        <td>
                    <!-- Edit button -->
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>

                    <!-- Delete form -->
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this book?')">
                            Delete
                        </button>
                    </form>
                </td>
    </tr>
    @endforeach
</table>
@endsection