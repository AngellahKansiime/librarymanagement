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
                    <div class="head text-center text-primary font-weight-100"><h1>Student login</h1></div>
                    <form action="{{route('student.login.submit')}}" method="POST" class="form-group p-4 border rounded shadow-sm bg-light">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="username" class="form-label" >Reg No:</label>
                            <input class ="form-control" type="text" name="username" id="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input  class ="form-control" type="password" name="password"><br>
                        </div>

                        <button class="btn btn-primary w-100" type="submit">login</button>

                        @error('login_error')
                        <div id="login-error" class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const usernameInput = document.querySelector('input[name="username"]');
        const passwordInput = document.querySelector('input[name="password"]');
        const errorDiv = document.getElementById('login-error');

        if (errorDiv) {
            // Listen for input in either field
            usernameInput.addEventListener('input', () => errorDiv.style.display = 'none');
            passwordInput.addEventListener('input', () => errorDiv.style.display = 'none');
        }
    });
</script>
</body>
</html>


