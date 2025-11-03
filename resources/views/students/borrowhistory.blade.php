@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Borrow History</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date Taken</th>
                <th>Returned On</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse($borrowhistory as $index => $borrow)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $borrow->book->title ?? 'Unknown' }}</td>
                    <td>{{ $borrow->date_taken }}</td>
                    <td>{{ $borrow->expected_return }}</td>
                    <td>{{ ucfirst($borrow->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No borrow history available.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
