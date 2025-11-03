@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="head text-center text-primary font-weight-100"><h1>Add a new student</h1></div>
            <form action="{{route('students.store')}}" method="POST" class="form-group p-4 border rounded shadow-sm bg-light">
                @csrf
                @method('POST')
                <label for="first_name">First Name:</label>
                <input class="form-control" type="text" id="first_name" name="first_name">

                <label for="last_name">Last Name:</label>
                <input class="form-control" type="text" id="last_name" name="last_name">

                <label for="course">Course:</label>
                <input class="form-control" type="text" id="" id="course" name="course">

                <label for="year_of_study" class="form-label">Year of Study</label>
                <select name="year_of_study" id="year_of_study" class="form-select" required>
                    <option value="">-- Select Year --</option>
                    <option value="1">Year 1</option>
                    <option value="2">Year 2</option>
                    <option value="3">Year 3</option>
                    <option value="4">Year 4</option>
                </select>

                <label for="phone">Phone:</label>
                <input class="form-control" type="text" id="phone" name="phone">

                <label for="reg_no">Reg No:</label>
                <input class="form-control" type="text" id="reg_no" name="reg_no">

                <label for="email">Email:</label>
                <input class="form-control" type="text" id="email" name="email"><br>

{{--                 <label for="role">Role:</label>--}}
{{--                <input class="form-control" type="text" id="role" name="role">--}}

                <button  class="btn btn-primary w-100" type="submit">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
