
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 mx-auto">
            <form action="{{route('books.store')}}" method="POST" class="form-group">
                @csrf
                @method('POST')
                <label for="title">Title:</label>
                <input class="form-control" type="text" id="title" name="title">

                <label for="book-id">Book ID:</label>
                <input class="form-control" type="text" id="book_id" name="book_id">

                <label for="genre">Genre:</label>
                <input class="form-control" type="text" id="genre" name="genre">

                <label for="author">Author:</label>
                <input class="form-control" type="text" id="author" name="author">

                <label for="status">Status:</label>
                <input class="form-control" type="text" id="staus" name="status">

                <button  class="btn btn-primary" type="submit">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection


