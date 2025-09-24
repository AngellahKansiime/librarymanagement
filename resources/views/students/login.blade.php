<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student login</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-6 mx-auto">
    <form action="{{url('student/studentl')}}" method="POST" class="form-group p-4 border rounded shadow-sm bg-light">
        @csrf
        @method('POST')

        <label for="username">Username:</label>
        <input class="form-control" type="text" name="username" id="username" >

        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password"><br>

        <button class="btn btn-primary w-50 " type="submit">login</button>
    </form>
    </div>
    </div>
    </div>

</body>
</html>
 
   
   