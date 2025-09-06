@extends('layouts.app')
@section('content')

<form action="{{route('students.create')}}">
<button class="btn btn-primary">Add New Student</button>
</form>
<table>
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Course</th>
        <th>Year of study</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Action</th>

    </tr>
    <tr>
           <?php $number=0; ?>
@foreach($students as $student)
         <?php $number++; ?>
    <tr>
        <td>{{ $number }}</td> 
        <td>{{$student->first_name}}</td>
        <td>{{$student->last_name}}</td>
        <td>{{$student->course}}</td>
        <td>{{$student->year_of_study}}</td>
        <td>{{$student->phone}}</td>
        <td>{{$student->email}}</td>
        <td>
                    <!-- Edit button -->
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">View</a>

                    <!-- Delete form -->
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this student?')">
                            Delete
                        </button>
                    </form>
                </td>
    </tr>
    @endforeach
</table>
@endsection