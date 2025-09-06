@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 mx-auto">
            <form action="{{route('borrowers.store')}}" method="POST" class="form-group">
                @csrf
                @method('POST')
                <label for="name">Name:</label>
                <input class="form-control" type="text" id="name" name="name">

                <label for="borrowers_id">Borrower's ID:</label>
                <input class="form-control" type="text" id="borrowers_id" name="borrowers_id">

                <label for="book">Book:</label>
                <input class="form-control" type="text" id="book" name="book">

                <label for="date_taken">Date Taken:</label>
                <input class="form-control" type="text" id="date_taken" name="date_taken">

                <label for="expected_return">Expected Return:</label>
                <input class="form-control" type="text" id="expected_return" name="expected_return">

                <label for="issued_by">Issued by:</label>
                <input class="form-control" type="text" id="issued_by" name="issued_by">

                <button  class="btn btn-primary" type="submit">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection