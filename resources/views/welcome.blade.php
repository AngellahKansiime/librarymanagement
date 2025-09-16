<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container-fluid bg-image" style="background-image:url('images/library.jpg')">
        <div class="row">
            <div class="col-6 mx-auto">
    <form action="{{route('userlogin')}}" method="POST" class="form-group">
        @csrf
        @method('POST')

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password">

        <button class="btn btn-primary" type="submit">login</button>
    </form>
    </div>
    </div>
    </div>
    
</body>
</html>