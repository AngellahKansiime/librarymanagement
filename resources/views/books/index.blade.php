@extends('layouts.app')

@section('content')
    {{-- Flash Messages --}}
    @if(session('success'))
        <div id="flash-message" class="alert alert-success position-fixed top-0 start-50 translate-middle-x mt-3" style="z-index: 1050;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div id="flash-message" class="alert alert-danger position-fixed top-0 start-50 translate-middle-x mt-3" style="z-index: 1050;">
            {{ session('error') }}
        </div>
    @endif

    {{-- Filters --}}
    <div class="mb-3">
        <select id="filter-title" class="form-select d-inline w-auto">
            <option value="">All Books</option>
            @foreach($books as $book)
                <option value="{{ $book->title }}">{{ $book->title }}</option>
            @endforeach
        </select>

        <select id="filter-genre" class="form-select d-inline w-auto">
            <option value="">All Genres</option>
            <option value="Science">Science</option>
            <option value="Art">Art</option>
            <option value="Literature">Literature</option>
            <option value="MTC">MTC</option>
        </select>
    </div>

    {{-- Add Book Button --}}
    <div class="d-flex gap-2 mb-3">
        <div class=" col-3 text-start"><form action="{{ route('books.create') }}">
            <button class="btn btn-primary">Record a New Book</button>
        </form>
        </div>
        <form action="{{ route('showtopupform') }}">
            <button class="btn btn-primary">Top Up Stock</button>
        </form>
    </div>



    {{-- Books Table --}}
    <table id="books-table" class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>ISBN</th>
            <th>Genre</th>
            <th>Author</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php $number = 0; @endphp
        @foreach($books as $book)
            @php $number++; @endphp
            <tr>
                <td>{{ $number }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->book_id }}</td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->quantity }}</td>
                <td>{{ ucfirst($book->status) }}</td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>

                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this book?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    {{-- Flash messages auto-hide --}}
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const flash = document.getElementById('flash-message');
            if (flash) {
                setTimeout(() => {
                    flash.classList.add('fade');
                    setTimeout(() => flash.remove(), 500);
                }, 3000);
            }
        });
    </script>

    {{-- jQuery & DataTables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#books-table').DataTable({
                pageLength: 5,
            });

            // Filter by Title
            $('#filter-title').on('change', function () {
                table.column(1).search(this.value).draw(); // column index 1 = Title
            });

            // Filter by Genre
            $('#filter-genre').on('change', function () {
                table.column(3).search(this.value).draw(); // column index 3 = Genre
            });
        });
    </script>
@endpush
