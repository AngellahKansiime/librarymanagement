@extends('layouts.app')

@section('content')
<form action="{{route('users.create')}}">
<button class="btn btn-primary">Add a user</button>
</form>
<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
    <tr>
           <?php $number=0; ?>
@foreach($users as $user)
         <?php $number++; ?>
    <tr>
        <td>{{ $number }}</td> 
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->address}}</td>
        <td>{{$user->username}}</td>
        <td>
                    <!-- Delete form -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete this user?')">
                            Delete
                        </button>
                    </form>
                </td>
    </tr>
    @endforeach
</table>
@endsection