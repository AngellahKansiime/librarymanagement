@extends('layouts.app')

@section('content')
    <div class="container">
        <div class=" col-3 text-start"><form action="{{ route('students.create') }}">
            <button class="btn btn-primary mb-3 align-items-left">Add New Student</button>
        </form>
        </div>

        <div class="mb-3">
            <select id="filter-course" class="form-select d-inline w-auto">
                <option value="">All Courses</option>
                <option value="DIT">DIT</option>
                <option value="BIT">BIT</option>
                <option value="BBA">BBA</option>
            </select>

            <select id="filter-year" class="form-select d-inline w-auto">
                <option value="">All Years</option>
                <option value="1">Year 1</option>
                <option value="2">Year 2</option>
                <option value="3">Year 3</option>
                <option value="4">Year 4</option>
            </select>
        </div>


        <table id="students-table" class="table  table-striped table-repsonsive table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Course</th>
                <th>Year of Study</th>
                <th>Phone</th>
                <th>Reg No</th>
                <th>Email</th>
                <th>Action</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php $number = 1; @endphp
            @foreach($students as $student)
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->year_of_study }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->reg_no }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a> </td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm">View</a> </td>
                     <td>   <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#students-table').DataTable({
                pageLength: 5,
            });

            //  Filter by Course
            $('#filter-course').on('change', function () {
                table.column(3).search(this.value).draw(); // 3 = Course column index
            });

            //  Filter by Year
            $('#filter-year').on('change', function () {
                table.column(4).search(this.value).draw(); // 4 = Year of study column index
            });
        });
    </script>
@endpush
