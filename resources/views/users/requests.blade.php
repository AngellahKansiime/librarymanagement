@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 class="mb-4">📩 Borrow Requests</h3>

        @if($requests->isEmpty())
            <p>No borrow requests at the moment.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Student</th>
                    <th>Book</th>
                    <th>Status</th>
                    <th>Requested On</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $r)
                    <tr>
                        <td>{{ $r->student->name }}</td>
                        <td>{{ $r->book->title }}</td>
                        <td>
                        <span class="badge bg-{{ $r->status == 'pending' ? 'warning' : ($r->status == 'borrowed' ? 'success' : ($r->status == 'returned' ? 'info' : 'danger')) }}">
                            {{ ucfirst($r->status) }}
                        </span>
                        </td>
                        <td>{{ $r->created_at->format('d M Y') }}</td>
                        <td>
                            @if($r->status == 'pending')
                                <form action="{{ route('admin.requests.approve', $r->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="{{ route('admin.requests.reject', $r->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
