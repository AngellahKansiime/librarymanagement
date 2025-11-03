@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>My Borrowed Books</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Date Taken</th>
                <th>Expected Return</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @forelse($borrowedbooks as $index => $borrow)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $borrow->book->title ?? 'Unknown' }}</td>
                    <td>{{ $borrow->date_taken }}</td>
                    <td>{{ $borrow->expected_return }}</td>
                    <td>{{ ucfirst($borrow->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">You have not borrowed any books yet.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
