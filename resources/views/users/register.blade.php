@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('users.index')}}" method="POST" class="form-group">
                @csrf
                @method('POST')
                <label for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name">

                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email">

                <label for="address">Address</label>
                <input class="form-control" type="text" id="address" name="address">

                <label for="password">Password</label>
                <input class="form-control" type="text" id="password" name="password">

                 <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username">

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection