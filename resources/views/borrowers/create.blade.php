@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-5 mx-auto">
                    <div class="text-center mb-3">
                        <h2 class="text-primary fw-bold">Register Borrower</h2>
                    </div>

                    <form action="{{ route('borrowers.store') }}" method="POST" class="form-group p-4 border rounded-2 shadow-sm bg-light">
                        @csrf
                        @method('POST')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input class="form-control border-primary-subtle" type="text" id="name" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="borrowers_id" class="form-label fw-semibold">Borrower's ID</label>
                            <input class="form-control border-primary-subtle" type="text" id="borrowers_id" name="borrowers_id">
                        </div>

                        <div class="mb-3">
                            <label for="book_id" class="form-label fw-semibold">Book</label>
                            <select name="book_id" id="book_id" class="form-select searchable-select border-primary-subtle" required>
                                <option value=""></option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date_taken" class="form-label fw-semibold">Date Taken</label>
                            <input class="form-control border-primary-subtle" type="date" id="date_taken" name="date_taken">
                        </div>

                        <div class="mb-3">
                            <label for="expected_return" class="form-label fw-semibold">Expected Return</label>
                            <input class="form-control border-primary-subtle" type="date" id="expected_return" name="expected_return">
                        </div>

                        <div class="mb-4">
                            <label for="issued_by" class="form-label fw-semibold">Issued By</label>
                            <input class="form-control border-primary-subtle" type="text" id="issued_by" name="issued_by">
                        </div>

                        <button class="btn btn-primary w-100 py-2 fw-semibold" type="submit">Borrow</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.searchable-select').select2({
                minimumResultsForSearch: 0, // keeps dropdown clean, search only when typing
                allowClear: true,
                width: '100%',
                placeholder: ''
            });
        });
    </script>
@endsection
