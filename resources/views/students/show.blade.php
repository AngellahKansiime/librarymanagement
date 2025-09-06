@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Book Details</h2>

    <p><strong> First Name:</strong> {{ $student->first_name }}</p>
     <p><strong> Last Name:</strong> {{ $student->last_name }}</p>
    <p><strong>Course:</strong> {{$student->course }}</p>
    <p><strong>Year of study:</strong> {{$student->year_of_study }}</p>
    <p><strong>Phone:</strong> {{ $student->phone }}</p>
    <p><strong>email:</strong> {{$student->email }}</p>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this student?')">
            Delete
        </button>
    </form>
</div>
@endsection

