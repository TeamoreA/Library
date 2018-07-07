@extends('layouts.app')

@section('content')

<div class="container" style="margin:auto;" >

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">


      <div class="row mb-2">
        <div class="col-md-12 px-0">

            <center>
              <img class="card-img-right flex-auto d-none d-lg-block" src="images/face.png" alt="Card image cap" style="width:250px;height:250px;" />
            </center>
          <h1 class="display-4 font-italic">{{ Auth::user()->name }} </h1>
          {{-- <h1 class="display-6 font-italic">John Doe </h1> --}}
          <h1 class="display-6 font-italic">{{ Auth::user()->email }} </h1>
          <p class="display-5">Member since: {{ Auth::user()->created_at->format('m /d /Y ') }}</p>
        </div>

        {{-- <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body  align-items-start">
              <strong class="d-inline-block mb-2 text-success">Update profile</strong>
                <form class="form-signin">
                  <div class="form-label-group">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus>
                    <label for="name">Name</label>
                  </div>
                  <div class="form-label-group">
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputEmail">Email address</label>
                  </div>
                  
                  <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                </form>
            </div>
          </div>
        </div> --}}
      </div>


      </div>




        <div class="card mb-4 box-shadow">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">My Borrowed Books</h4>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Genre</th>
                  <th>Book Title</th>
                  <th>Description</th>
                  <th>Borrowed</th>
                </tr>
              </thead>
              <tbody>
                @foreach($books as $book)
                <tr>
                  <td>{{$book->id}}</td>
                  <td>{{$book->genre}}</td>
                  <td>{{$book->book}}</td>
                  <td>{{$book->description}}</td>
                  <td>{{ $book->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
        </div>


    <div class="row align-items-center justify-content-center">
            <p class="text-center">{{ $books->links() }} </p>
    </div>

</div>
	
@stop