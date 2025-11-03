@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Top Up Book Stock</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('topuplogic') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="book_id" class="form-label">Select Book</label>
                                <select class="form-select" id="book_id" name="book_id" required>
                                    <option value="">-- Choose a Book --</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }} ({{ $book->quantity }} copies)</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Number of Copies to Add</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Top Up Stock</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
