@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> --}}

    {{-- My codes --}}
    <div class="row">


        <div class="col-md-12 order-md-1">
          <h4 class="sm-3">Available books</h4>
          <hr>
         {{-- </div> --}}

        <div class="row mb-2">


            @foreach($books as $book)
            <div class="col-md-4 mb-2">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="{{ asset('images/download.png') }}" alt="Book image cap">
                  <div class="card-body">
                    <h5 class="card-title">{{ $book->name }}</h5>
                    <p class="card-text">{{$book->description}}</p>
                    @if(Auth::user()->role_id != 1)
                    <a href="{{ route('borrowbooks.index') }}" class="btn btn-primary">Borrow book</a>
                    @endif
                  </div>
                </div>
            </div>
            @endforeach

        </div>
        </div>
    </div>

    <div class="row align-items-center justify-content-center">
            <p class="text-center">{{ $books->links() }} </p>
    </div>
</div>


@endsection
