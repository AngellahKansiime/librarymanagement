@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4"> 📚 Dashboard</h2>
    <div class="alert alert-info">
        Welcome, <strong>{{ Auth::user()->username }}</strong>!  
        Your role: <span class="badge bg-primary">{{ ucfirst(Auth::user()->role) }}</span>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">📕 Books</h5>
                    <h3>{{ $totalBooks ?? 0 }}</h3>
                    <p>Total Books</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">📖 Borrowed</h5>
                    <h3>{{ $borrowedBooks ?? 0 }}</h3>
                    <p>Currently Borrowed</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">👨‍🎓 Users</h5>
                    <h3>{{ $totalUsers ?? 0 }}</h3>
                    <p>Registered Users</p>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->role == 'admin' || Auth::user()->role == 'librarian')
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-dark text-white"> 📌 Management Tools</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <a href="{{ route('books.index') }}" class="btn btn-outline-primary w-100"> Manage Books</a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary w-100"> Manage Users</a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="{{ route('borrowers.create') }}" class="btn btn-outline-warning w-100"> Borrow/Return</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    
@endsection
