@extends('layouts.app')
@section('content')
<form action="{{ route('students.update', $student->id) }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
    @csrf
    @method('PUT')

    <label for="first_name">First Name:</label>
    <input class="form-control" type="text" id="first_name" name="first_name" value="{{ $student->first_name }}">

    <label for="last_name">Last Name:</label>
    <input class="form-control" type="text" id="last_name" name="last_name" value="{{ $student->last_name }}">

    <label for="course">Course:</label>
    <input class="form-control" type="text" id="" id="course" name="course" value="{{ $student->course }}">

    <label for="year_of_study" class="form-label">Year of Study</label>
    <select name="year_of_study" id="year_of_study" class="form-select" required>
        <option value="">-- Select Year --</option>
        <option value="1">Year 1</option>
        <option value="2">Year 2</option>
        <option value="3">Year 3</option>
        <option value="4">Year 4</option>
    </select>

    <label for="phone">Phone:</label>
    <input class="form-control" type="text" id="phone" name="phone" value="{{ $student->phone }}">

    <label for="reg_no">Reg No:</label>
    <input class="form-control" type="text" id="reg_no" name="reg_no" value="{{$student->reg_no}}">


    <label for="email">Email:</label>
    <input class="form-control" type="text" id="email" name="email" value="{{ $student->email }}"><br>

    <button class="btn btn-primary w-100" type="submit">Update</button>
</form>

<script>
    const yearSelect = document.getElementById('year_of_study');
    yearSelect.addEventListener('change', function() {
        this.style.color = 'black';
    });
</script>
@endsection
