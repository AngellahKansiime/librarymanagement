<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="login-background">

    <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container-fluid ">
        <div class="row justify-items-center">
            <div class="col-4 mx-auto">
                <div class="head text-center text-primary font-weight-100"><h1>Admin login</h1></div>
    <form action="{{route('userlogin')}}" method="POST" class="form-group p-4 border rounded shadow-sm bg-light">
        @csrf
        @method('POST')
        <div class="mb-3">
        <label for="username" class="form-label" >Username:</label>
        <input class ="form-control" type="text" name="username" id="username" required>
        </div>

        <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input  class ="form-control" type="password" name="password"><br>
        </div>

        <button class="btn btn-primary w-100" type="submit">login</button>
    </form>
    </div>
    </div>
    </div>
    </div>
</div>
</body>
</html>




