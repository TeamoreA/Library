@extends('layouts.app')

@section('content')

	<div class="container">
    <div class="row">
      @if(Auth::user()->role_id == 1)
      {{-- @include('partials._sidenav') --}}
      @endif
    <main role="main" class="col-md-12">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">ALlocate Book</h1>
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
            {{-- <form class="form-signin">
              <div class="form-label-group">
                <center>
                  <label for="inputEmail">Enter user ID</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus style="width: 70%;" />
                <br />
                <button class="btn btn-sm btn-success" type="submit">Find user</button>
                </center>
              </div>
            </form> --}}
            <br />

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Genre</th>
                  <th>Book Title</th>
                  <th>Description</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($books as $book)
                <tr>
                  <td>{{$book->id}}</td>
                  <td>{{$book->genre->name}}</td>
                  <td>{{$book->name}}</td>
                  <td>{{$book->description}}</td>
                  <td><button class="btn btn-sm btn-success">Borrow</button></td>
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