@extends('layouts.app')

@section('content')
    <style>
        /* Full page background with fade effect */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background: #dddddd;
            background-size: cover;
            color: #000000;
        }

        .dashboard-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .dashboard-title {
            margin-bottom: 2rem;
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.7);
        }

        .card-dashboard {
            background-color: rgba(255, 255, 255, 0.9);
            color: #000;
            border-radius: 1rem;
            padding: 2rem;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 250px; /* Bigger cards */
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .card-dashboard:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.4);
            text-decoration: none;
        }

        .card-title {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            font-weight: bold;
            color: #e91e63;
        }

        .card-text {
            font-size: 1.1rem;
            color:#154d71;
        }

        .row-dashboard {
            width: 100%;
            max-width: 1200px;
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .card-dashboard {
                height: auto;
                padding: 1.5rem;
            }
        }
    </style>

    <div class="dashboard-container">
        <div class="dashboard-title">
            Welcome, {{ Auth::user()->name }}
        </div>

        <div class="row row-dashboard d-flex justify-content-center text-center">
            <div class="col-md-4 mb-4">
                <a href="{{ route('student.availablebooks') }}" class="text-decoration-none">
                    <div class="card card-dashboard shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Available Books</h5>
                            <p class="card-text">View all available books you can borrow.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="{{ route('student.borrowedbooks') }}" class="text-decoration-none">
                    <div class="card card-dashboard shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">My Borrowed Books</h5>
                            <p class="card-text">See the books you have currently borrowed.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="{{ route('student.borrowhistory') }}" class="text-decoration-none">
                    <div class="card card-dashboard shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">History</h5>
                            <p class="card-text">Check your borrowing history and returned books.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
