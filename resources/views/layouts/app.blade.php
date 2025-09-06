<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library management</title>
    <link rel="stylesheet" href="images/library.jpg">
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body >
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="{{route('')}}">Login</a>
        </li>
         <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger btn-sm">
                            Logout
                        </button>
                    </form>
      </ul>
</div>
  </nav>
 <div class="container-fluid">
  <div class="row">
    
    <div class="col-2 min-vh-100 bg-primary">
      <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active text-white" aria-current="page" href="{{url('/mydashboard')}}">Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="{{route('students.index')}}">User Management</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="{{route('books.index')}}">Books Management</a>
  </li>
</ul>
    </div>
    <div class="col-10 ">
     <div class="container ">
           <div class="main">
             @yield('content')
           </div>
        </div> 
    </div>
  </div>          

</div>
      
        
        
<script src="{{ asset('js/bootstrap.min.js') }}">
     
</script>
</body>
</html>
