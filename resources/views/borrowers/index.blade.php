@extends('layouts.app')
@section('content')
    <div class=" col-3 text-start"><form action="{{route('borrowers.create')}}">
        <button class="btn btn-primary">Add a borrower</button>
    </form>
    </div>
<table class="table  table-stripped mt-4">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Borrower's ID</th>
        <th>Book</th>
        <th>Date taken</th>
        <th>Expected return</th>
        <th>Book Status</th>
        <th>Action</th>

    </tr>
    <tr>
           <?php $number=0; ?>
@foreach($borrowers as $borrower)
         <?php $number++; ?>
    <tr>
        <td>{{ $number }}</td>
        <td>{{$borrower->name}}</td>
        <td>{{$borrower->borrowers_id}}</td>
        <td>{{ $borrower->book->title}}</td>
        <td>{{$borrower->date_taken}}</td>
        <td>{{$borrower->expected_return}}</td>
        <td>
            @if($borrower->status === 'borrowed')
                <form method="POST" action="{{ route('borrowers.return', $borrower->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary">Mark Returned</button>
                </form>
            @else
                <span class="text-muted">Returned</span>
            @endif
        </td>
        <td>
            <!-- Edit button -->
            <a href="{{ route('borrowers.show', $borrower->id) }}" class="btn btn-info btn-sm">View</a>

            <!-- Delete form -->
            <form action="{{ route('borrowers.destroy', $borrower->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this borrower?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
