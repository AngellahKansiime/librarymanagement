
@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center ">
<div class="container">
    <div class="row">
        <div class="col-4 mx-auto">
            <h1>Add a book</h1>
            <form action="{{route('books.store')}}" method="POST" class="form-group p-4 border rounded shadow-sm bg-light">
                @csrf
                @method('POST')
                <label for="title">Title:</label>
                <input class="form-control" type="text" id="title" name="title">

                <label for="book-id">ISBN:</label>
                <input class="form-control" type="text" id="book_id" name="book_id">

                <label for="genre">Genre:</label>
                <input class="form-control" type="text" id="genre" name="genre">

                <label for="author">Author:</label>
                <input class="form-control" type="text" id="author" name="author"><br>

{{--                <label for="status">Status:</label>--}}
{{--                <input class="form-control" type="text" id="status" name="status"><br>--}}


                <button  class="btn btn-primary w-100" type="submit">Add</button>
            </form>
        </div>
    </div>
</div>
    </div>
@endsection


