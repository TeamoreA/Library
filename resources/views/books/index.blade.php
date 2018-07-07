@extends('layouts.app')

@section('content')

	<div class="container">
    <div class="row">
    <main role="main" class="col-md-12">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Books List</h1>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Genre</th>
                  <th>Book Title</th>
                  <th>Description</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($books as $book)
                <tr>
                  <td>{{$book->id}}</td>
                  <td>{{$book->genre->name}}</td>
                  <td>{{$book->name}}</td>
                  <td>{{$book->description}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </main>
      </div>
	</div>

@stop