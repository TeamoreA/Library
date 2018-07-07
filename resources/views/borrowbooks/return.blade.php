@extends('layouts.app')

@section('content')

	<div class="container">
    <div class="row">
      {{-- @include('partials._sidenav') --}}
    <main role="main" class="col-md-12">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Confirm Book Return</h1>
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
                  <label for="id">Enter Book ID</label>
                <input type="number" id="id" class="form-control" placeholder="Book Id" required autofocus style="width: 70%;" />
                <br />
                <button class="btn btn-sm btn-success" type="submit">Find book</button>
                </center>
              </div>
            </form> --}}
            <br />

          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Borrowed by</th>
                  <th>Book Title</th>
                  <th>Description</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($borrowbooks as $borrowbook)
                <tr>
                  <td>{{$borrowbook->id}}</td>
                  <td>{{ Auth::user()->name }}</td>
                  <td>{{$borrowbook->book}}</td>
                  <td>{{$borrowbook->description}}</td>
                  {{-- @if($book->user_id == Auth::user()->id) --}}
                  <td><a href="#" class="btn btn-sm btn-success" onclick="
                    var result = confirm('Are you sure you want to delete? This action cant be reversed!');
                    if (result) {
                      event.preventDefault();
                      document.getElementById('delete-form').submit();
                    }
                    "> <i class="fas fa-check"></i> Confirm</a>
                    <form action="{{ route('borrowbooks.destroy', $borrowbook->id) }}" id="delete-form" method="POST" style="display: none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                  </td>
                  {{-- @endif --}}
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </main>
      </div>
      <div class="row align-items-center justify-content-center">
              <p class="text-center">{{ $borrowbooks->links() }} </p>
      </div>
	</div>

@stop