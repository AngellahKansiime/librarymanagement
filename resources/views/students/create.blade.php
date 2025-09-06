@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 mx-auto">
            <form action="{{route('students.store')}}" method="POST" class="form-group">
                @csrf
                @method('POST')
                <label for="first_name">First Name:</label>
                <input class="form-control" type="text" id="first_name" name="first_name">

                <label for="last_name">Last Name:</label>
                <input class="form-control" type="text" id="last_name" name="last_name">

                <label for="course">Course:</label>
                <input class="form-control" type="text" id="" id="course" name="course">

                <label for="year_of_study">Year of study:</label>
                <input class="form-control" type="text" id="year_of_study" name="year_of_study">

                <label for="phone">Phone:</label>
                <input class="form-control" type="text" id="phone" name="phone">

                <label for="email">Email:</label>
                <input class="form-control" type="text" id="email" name="email">

                 <label for="role">Role:</label>
                <input class="form-control" type="text" id="role" name="role">

                <button  class="btn btn-primary" type="submit">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection