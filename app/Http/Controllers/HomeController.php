<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookUser;
use App\Genre;
use App\User;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $books = Book::paginate(9);
            return view('home')->withBooks($books);
        } else {
            Session::flash('errors', 'Ensure you are logged in');
            return redirect()->route('login');
        }
        
    }


    public function show(Book $book)
    {
        $book = Book::where('id',$book->id)->first();
        // $comments = $book->comments;
        return view('books.show')->withBook($book);
    }
}
