@extends('layouts.app')
@section('content')
<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="first_name">Name:</label>
    <input class="form-control" type="text" id="first_name" name="first_name" value="{{$student->first_name }}">

     <label for="last_name">Name:</label>
    <input class="form-control" type="text" id="last_name" name="last_name" value="{{ $student->last_name }}">

    <label for="course">Book ID:</label>
    <input class="form-control" type="text" id="course" name="course" value="{{ $student->course }}">

    <label for="year_of_study">Title:</label>
    <input class="form-control" type="text" id="year_of_study" name="year_of_study" value="{{ $student->year_of_study }}">

    <label for="phone">Genre:</label>
    <input class="form-control" type="text" id="phone" name="phone" value="{{ $student->phone }}">

    <label for="email">Author:</label>
    <input class="form-control" type="text" id="email" name="email" value="{{ $student->email }}">

    <button class="btn btn-success" type="submit">Update</button>
</form>
@endsection
