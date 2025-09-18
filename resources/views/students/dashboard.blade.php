<!-- @if(Auth::user()->role == 'student' || Auth::user()->role == 'user') -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white"> My Library</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <a href="{{ route('catalog.index') }}" class="btn btn-outline-info w-100"> Search genre</a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="{{ route('borrowers.mybooks') }}" class="btn btn-outline-dark w-100"> My Borrowed Books</a>
                </div>
            </div>
        </div>
    </div>
    <!-- @endif -->
</div>