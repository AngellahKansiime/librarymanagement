@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="text-center mb-4">
                    <h2 class="text-primary fw-bold">Add  New Staff</h2>
                </div>

                <form action="{{ route('users.store') }}" method="POST" class="form-group p-4 border rounded-2 shadow-sm bg-light">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold"> Name</label>
                        <input class="form-control border-primary-subtle" type="text" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input class="form-control border-primary-subtle" type="text" id="email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-semibold">Address</label>
                        <input class="form-control border-primary-subtle" type="text" id="address" name="address">
                    </div>


                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input class="form-control border-primary-subtle" type="text" id="password" name="password">
                    </div>

                    <div class="mb-4">
                        <label for="username" class="form-label fw-semibold">Username</label>
                        <input class="form-control border-primary-subtle" type="text" id="username" name="username">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="form-label fw-semibold">Role</label>
                        <select name="role" id="role" class="form-select searchable-select border-primary-subtle" required>
                            <option value=""></option>
                                <option value="1">admin</option>
                                <option value="2">librarian</option>

                        </select>
                    </div><br>

                    <button class="btn btn-primary w-100 py-2 fw-semibold" type="submit">
                        Register
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
