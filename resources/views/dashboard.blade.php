@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="mb-4"> 📚 Dashboard</h2>
        <div class="alert alert-info">
            Welcome, <strong>{{ Auth::user()->username }}</strong>
            Your role: <span class="badge bg-primary">{{ ucfirst(Auth::user()->role) }}</span>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm text-left bg-primary text-white ps-4">
                    <div class="card-body">
                        <div class="col-3">

                        </div>
                       <div class="col-9">
                           <h5 class="card-title">📕 Books</h5>
                           <h3>{{ $totalBooks }}</h3>
                           <p>Total Books</p>
                       </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm text-left bgcard ">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-3 ">👨 </div>
                        <div class="col-9">
                            <h5 class="card-title">Borrowers</h5>
                            <h3>{{ $borrowers }}</h3>
                            <p>Currently Borrowed</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm text-left bg-dark text-white  ">
                    <div class="card-body">
                        <div class="col-3">
                            👨‍🎓
                        </div>
                        <div class="col-9">
                            <h5 class="card-title"> Users</h5>
                            <h3>{{ $totalUsers }}</h3>
                            <p>Registered Users</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm text-left ps-4">
                    <div class="card-body">
                        <h5 class="card-title">👨‍🎓 Students</h5>
                        <h3>{{ $totalStudents }}</h3>
                        <p>Registered Students</p>
                    </div>
                </div>
            </div><br>


        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'librarian')
            <div class="card mb-4 shadow-sm mt-5">
                <div class="card-header bg-primary text-white"> 📌 Management Tools</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('books.index') }}" class="btn btn-outline-primary w-100"> Manage Books</a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-100"> Manage Users</a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('borrowers.create') }}" class="btn btn-outline-primary w-100"> Borrow/Return</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">📌 Pending Book Requests</div>
                <div class="card-body">
                    @if($pendingRequests->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Book</th>
                                <th>Date Requested</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pendingRequests as $request)
                                <tr>
                                    <td>{{ $request->name }}</td>
                                    <td>{{ $request->book->title }}</td>
                                    <td>{{ $request->created_at->format('d M Y') }}</td>
                                    <td>
                                        <form action="{{ route('borrowers.approve', $request->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                        </form>

                                        <form action="{{ route('borrowers.reject', $request->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No pending requests.</p>
                    @endif
                </div>
            </div>

        </div>
        {{-- Borrow Requests / Active Borrowers Table --}}
{{--        @php--}}
{{--            $borrowRecords = \App\Models\Borrower::with('book')->orderBy('status')->get();--}}
{{--        @endphp--}}

{{--        @if($borrowRecords->count())--}}
{{--            <div class="card shadow-sm mt-4">--}}
{{--                <div class="card-header bg-secondary text-white">📋 Borrow Requests / Active Borrowers</div>--}}
{{--                <div class="card-body">--}}
{{--                    <table class="table table-bordered table-hover">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Student</th>--}}
{{--                            <th>Book</th>--}}
{{--                            <th>Date Taken</th>--}}
{{--                            <th>Expected Return</th>--}}
{{--                            <th>Status</th>--}}
{{--                            <th>Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($borrowRecords as $index => $borrow)--}}
{{--                            <tr class="{{ $borrow->status === 'borrowed' ? 'table-warning' : 'table-success' }}">--}}
{{--                                <td>{{ $index + 1 }}</td>--}}
{{--                                <td>{{ $borrow->name }}</td>--}}
{{--                                <td>{{ $borrow->book->title  }}</td>--}}
{{--                                <td>{{ $borrow->date_taken }}</td>--}}
{{--                                <td>{{ $borrow->expected_return }}</td>--}}
{{--                                <td>{{ ucfirst($borrow->status) }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($borrow->status === 'borrowed')--}}
{{--                                        <form action="{{ route('borrowers.return', $borrow->id) }}" method="POST" style="display:inline;">--}}
{{--                                            @csrf--}}
{{--                                            <button class="btn btn-primary btn-sm">Mark Returned</button>--}}
{{--                                        </form>--}}
{{--                                    @else--}}
{{--                                        <span class="text-success fw-bold">{{ ucfirst($borrow->status) }}</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

    </div>
@endsection
