










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Management</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app">
@include('components.flash-message')

<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

            <!-- Logout button aligned to the right -->
            <form class="d-flex ms-auto" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-2 min-vh-100 bgnav">
            <ul class="nav flex-column mt-3 ">
                @php
                    $role = auth()->user()->role ?? null;
                @endphp

                {{-- Dashboard link --}}
                <li class="nav-item ">
                    @if($role === 'student')
                        <a class="nav-link active text-dark p-2" href="{{ route('student.dashboard') }}"><i class="fa fa-book"></i> Dashboard</a>
                    @else
                        <a class="nav-link active text-dark" href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    @endif
                </li>
                <hr>

                {{-- Admin/Librarian Links --}}
                @if($role !== 'student')
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('users.index') }}"><i class="fa fa-users"></i> Manage Staff</a>
                    </li><hr>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('studentlist') }}"><i class="fa fa-users"></i> Manage Students</a>
                    </li><hr>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('books.index') }}"> <i class="fa fa-book"></i> Books Management</a>
                    </li><hr>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('borrowers.index') }}"><i class="fa fa-users"></i> Manage Borrowers</a>
                    </li><hr>
                @elseif($role === 'student')
                    {{-- Student Links --}}
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('student.availablebooks') }}"><i class="fa fa-book"></i> Available Books</a>
                    </li><hr>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('student.borrowedbooks') }}"><i class="fa fa-book"></i> My Borrowed Books</a>
                    </li><hr>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('student.borrowhistory') }}"><i class="fa fa-history"></i> Borrow History</a>
                    </li><hr>
                @endif
            </ul>
        </div>

        <!-- Main content -->
        <div class="col-10">
            <div class="container py-3">
                <div class="main">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@stack('scripts')
</body>
</html>























{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Library management</title>--}}
{{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
{{--    <link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body class="app" >--}}
{{--@include('components.flash-message')--}}
{{--<nav class="navbar navbar-expand-lg navbar-light bg-secondary">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand text-white" href="#">Library</a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">--}}
{{--            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>--}}

{{--            <form class="d-flex ms-auto" method="POST" action="{{ route('logout') }}">--}}
{{--                @csrf--}}
{{--                <button type="submit" class="btn btn-danger btn-sm">--}}
{{--                    Logout--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

{{--<div class="container-fluid">--}}
{{--    <div class="row">--}}

{{--        <div class="col-2 min-vh-100 bg-primary">--}}
{{--            <ul class="nav flex-column">--}}

{{--                --}}{{-- Dashboard link: admin -> admin dashboard, student -> student dashboard --}}
{{--                <li class="nav-item">--}}
{{--                    @if(auth()->user()->role === 'student')--}}
{{--                        <a class="nav-link active text-white" href="{{ route('student.dashboard') }}">Dashboard</a>--}}
{{--                    @else--}}
{{--                        <a class="nav-link active text-white" href="{{ route('dashboard') }}">Dashboard</a>--}}
{{--                    @endif--}}
{{--                </li>--}}

{{--                --}}{{-- Links visible only to admin/librarian --}}
{{--                @if(auth()->user()->role !== 'student')--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-white" href="{{ route('users.index') }}">Add Librarian</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-white" href="{{ route('studentlist') }}">Add Student</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-white" href="{{ route('books.index') }}">Books Management</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-white" href="{{ route('borrowers.index') }}">Borrowers Management</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    --}}{{-- Links visible only to students --}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-white" href="{{ route('student.availableBooks') }}">Available Books</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-white" href="{{ route('student.borrowedBooks') }}">My Borrowed Books</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-white" href="{{ route('student.borrowHistory') }}">Borrow History</a>--}}
{{--                    </li>--}}
{{--                @endif--}}

{{--            </ul>--}}
{{--        </div>--}}

{{--        <div class="col-10">--}}
{{--            <div class="container">--}}
{{--                <div class="main">--}}
{{--                    @yield('content')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}

{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
{{--@stack('scripts')--}}
{{--</body>--}}
{{--</html>--}}


































{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Library management</title>--}}
{{--     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
{{--     <link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body class="app" >--}}
{{--@include('components.flash-message')--}}
{{--<nav class="navbar navbar-expand-lg navbar-light bg-secondary">--}}
{{--    <div class="container-fluid">--}}
{{--        <a class="navbar-brand text-white" href="#">Library</a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">--}}
{{--            <!-- Left side can be empty or have other nav links -->--}}
{{--            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>--}}

{{--            <!-- Right-aligned logout button -->--}}
{{--            <form class="d-flex ms-auto" method="POST" action="{{ route('logout') }}">--}}
{{--                @csrf--}}
{{--                <button type="submit" class="btn btn-danger btn-sm">--}}
{{--                    Logout--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}


{{--<div class="container-fluid">--}}
{{--  <div class="row">--}}

{{--    <div class="col-2 min-vh-100 bg-primary">--}}
{{--      <ul class="nav flex-column">--}}
{{--  <li class="nav-item">--}}
{{--    <a class="nav-link active text-white" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>--}}
{{--  </li>--}}
{{--  <li class="nav-item">--}}
{{--      <a class="nav-link text-white" href="{{route('users.index')}}">Add Librarian</a>--}}
{{--      </li>--}}
{{--      <li>--}}
{{--          <a class="nav-link text-white" href="{{route('studentlist')}}">Add Student</a>--}}
{{--      </li>--}}
{{--  </li>--}}
{{--  <li class="nav-item">--}}
{{--    <a class="nav-link text-white" href="{{route('books.index')}}">Books Management</a>--}}
{{--  </li>--}}
{{--          <li class="nav-item">--}}
{{--              <a class="nav-link text-white" href="{{route('borrowers.index')}}">Borrowers Management</a>--}}
{{--          </li>--}}
{{--</ul>--}}
{{--    </div>--}}
{{--    <div class="col-10 ">--}}
{{--     <div class="container ">--}}
{{--           <div class="main">--}}
{{--             @yield('content')--}}
{{--           </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--  </div>--}}

{{--</div>--}}
{{--    <script src="{{ asset('js/bootstrap.min.js') }}">--}}

{{--</script>--}}
{{--    @stack('scripts')--}}
{{--</body>--}}
{{--</html>--}}
