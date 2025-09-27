@extends('layouts.app')
@section('content')
<table>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Borrower's ID</th>
        <th>Book</th>
        <th>Date taken</th>
        <th>Expected return</th>
        <th>Status</th>
        <th>Book</th>
        
    </tr>
    <tr>
           <?php $number=0; ?>
@foreach($borrowers as $borrower)
         <?php $number++; ?>
    <tr>
        <td>{{ $number }}</td> 
        <td>{{$borrower->name}}</td>
        <td>{{$borrower->borrowers_id}}</td>
        <td>{{$borrower->book}}</td>
        <td>{{$borrower->date_taken}}</td>
        <td>{{$borrower->expected_return}}</td>
        <td>
                    <!-- Edit button -->
                    <a href="{{ route('borrowers.edit', $borrower->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
                <td>
                    @if($borrower->status === 'borrowed')
                        <span class="badge bg-danger">Borrowed</span>
                    @else
                        <span class="badge bg-success">Returned</span>
                    @endif
                </td>
                <td>
                    @if($borrower->status === 'borrowed')
                        <form method="POST" action="{{ route('borrowers.return', $borrower->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Mark Returned</button>
                        </form>
                    @else
                        <span class="text-muted">Completed</span>
                    @endif
                </td>
    </tr>
    @endforeach
</table>
@endsection