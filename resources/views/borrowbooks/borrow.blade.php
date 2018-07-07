@extends('layouts.app')

@section('content')

	<div class="container">
    <div class="row">
      @if(Auth::user()->role_id == 1)
      {{-- @include('partials._sidenav') --}}
      @endif
    <main role="main" class="col-md-12">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Borrow Book here</h1>
            {{-- <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div> --}}
          </div>
            
            <br />

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Genre</th>
                  <th>Book Title</th>
                  <th>Description</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($books as $book)
                <tr>
                  <form action="{{ route('borrowbooks.store') }}" method="POST">
                    @csrf
                    <td>
                      <input class="form-control no-border" type="text" name="genre" id="genre" value="{{$book->genre->name}}" readonly="">
                    </td>
                    <td>
                      <input class="form-control no-border" type="text" name="book" id="book" value="{{$book->name}}" readonly="">
                    </td>
                    <td>
                      <input class="form-control no-border" type="text" name="description" id="description" value="{{$book->description}}" readonly="">
                    </td>
                    <td><button type="submit" class="btn btn-sm btn-success">Borrow</button></td>
                  </form>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </main>
      </div>

      <div class="row align-items-center justify-content-center">
              <p class="text-center">{{ $books->links() }} </p>
      </div>
  	</div>

@stop