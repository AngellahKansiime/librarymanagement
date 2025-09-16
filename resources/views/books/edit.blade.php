@extends('layouts.app')
@section('content')
<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
<!-- 
    <label for="name">Name:</label>
    <input class="form-control" type="text" id="name" name="name" value="{{ $book->name }}"> -->

    <label for="book_id">Book ID:</label>
    <input class="form-control" type="text" id="book_id" name="book_id" value="{{ $book->book_id }}">

    <label for="title">Title:</label>
    <input class="form-control" type="text" id="title" name="title" value="{{ $book->title }}">

    <label for="genre">Genre:</label>
    <input class="form-control" type="text" id="genre" name="genre" value="{{ $book->genre }}">

    <label for="author">Author:</label>
    <input class="form-control" type="text" id="author" name="author" value="{{ $book->author }}">

    <button class="btn btn-success" type="submit">Update</button>
</form>
@endsection 