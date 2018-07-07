@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row mb-2">
  <div class="col-md-12">
	      <div class="card-deck mb-3 text-center">
	        @include('genres.create')
	        @include('books.create')
        </div>
  </div>
  </div>
</div>

@stop