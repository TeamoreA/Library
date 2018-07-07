<?php

namespace App\Http\Controllers;
use App\Book;
use App\BookUser;
use App\Genre;
use App\User;
use Auth;
use Session;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::check()) {
            $books = Book::all();
            return view('books.index')->withBooks($books);
        } else {
            Session::flash('errors', 'Ensure you are logged in');
            return redirect()->route('login');
        }
    }

    public function adduser(Request $request)
    {
        $book = Book::find($request->input('book_id'));
        if (Auth::user()->id == $book->user_id) {
            $user = User::where('email', $request->input('email'))->first();

            $bookUser =BookUser::where('user_id', $user->id)->where('book_id', $book->id)->first();

            if ($bookUser) {
                Session::flash('success', 'user already exists');
                return redirect()->route('books.show', ['book' => $book->id]);
            }

            if ($user && $book) {
                $book->users()->attach($user->id);
                Session::flash('success', 'User added to book successfuly');
                return redirect()->route('books.show', ['book' => $book->id]);
            }
        } else {
            Session::flash('errors', 'Error incurred in adding user to book');
            return redirect()->route('books.show', ['book' => $book->id]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($genre_id = null)
    {
        $genres = null;
        if (!$genre_id) {
            $genres = Genre::where('user_id' , Auth::user()->id)->get();
        }
        return view('admin.dashboard',['genre_id' =>$genre_id])->withGenres($genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:100',
            'description'=>'required|max:255'
        ]);
        $book = new Book;
        if (Auth::check()) {
            
            $book->name = $request->name;
            $book->description = $request->description;
            $book->genre_id = $request->genre_id;
            $book->user_id = $request->user()->id;
            $book->save();

            if ($book->save()) {
                Session::flash('success', 'Book Added Successfully');
                return redirect()->route('admin.index', $book->id);
            } else {
                return back()->withInput();
            }
        }else {
           return redirect()->route('admin.index', $book->id);
           Session::flash('errors', 'Ensure you have Logged in');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
