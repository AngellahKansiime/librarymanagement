<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body >

    <div class="container p-4">
        <div class="row mx-auto mt-5 white mb-5 rounded p-4 shadow " >

            <!-- Left: Text / Buttons -->
            <div class="col-lg-6  text-center text-lg-start">
                <h1 class="display-5 fw-bold text-pink">
                    A Proud Tradition of <br><span class="text-pink">Knowledge</span>
                </h1>
                <p class="lead mb-4 text-grey">
                    Manage books, members and records seamlessly.
                </p>
                <p class="lead mb-4 text-grey fw-bold">Choose how you would like to login</p>
                <a href="{{ route('adminlogin') }}" class="btn btn-primary btn-lg me-2">Staff</a>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Student</a>

            </div>

            <!-- Right: Hero Image -->
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/hero.jpg') }}" alt="Library" class="rounded img-fluid">
            </div>

        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

