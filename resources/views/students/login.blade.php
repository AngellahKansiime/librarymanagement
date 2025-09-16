
<div class="container-fluid bg-image" style="background-image:url('images/library.jpg')">
        <div class="row">
            <div class="col-6 mx-auto">
    <form action="{{route('studentlogin')}}" method="POST" class="form-group">
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
   