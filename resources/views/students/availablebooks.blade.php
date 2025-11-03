@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Available Books</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Available Copies</th>
                <th>Action</th> <!-- Added Action column -->
            </tr>
            </thead>
            <tbody>
            @foreach($books as $index => $book)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td class="text-center align-middle"> <!-- center & vertically align -->
                        @if($book->quantity > 0)
                            <form action="{{ route('student.borrow', $book->id) }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-sm px-2 py-1">Request</button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm px-2 py-1" disabled>Unavailable</button>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
