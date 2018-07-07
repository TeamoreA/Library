<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Genre;
use Session;
use App\Borrowbook;
use Auth;

class BorrowbooksController extends Controller
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
            $books = Book::paginate(15);
            return view('borrowbooks.borrow')->withBooks($books);
        } else {
            Session::flash('errors', 'Ensure you are logged in');
            return redirect()->route('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($genre_id = null)
    {
        if (Auth::check()) {
            $books = Borrowbook::where('user_id', Auth::user()->id)->paginate(15);
            return view('books.index')->withBooks($books);
        } else {
            Session::flash('errors', 'Ensure you are logged in');
            return redirect()->route('login');
        }
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
            'genre'=>'required|max:100',
            'book'=>'required|max:100',
            'description'=>'required|max:255'
        ]);
        $book = new Borrowbook;
        if (Auth::check()) {
            
            $book->genre = $request->genre;
            $book->book = $request->book;
            $book->description = $request->description;
            $book->user_id = $request->user()->id;
            $book->save();

            if ($book->save()) {
                Session::flash('success', 'Book Borrowed Successfully');
                return redirect()->url('/home');
            } else {
                return back()->withInput();
            }
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
        return view('borrowbooks.borrow');
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
    public function destroy(Borrowbook $borrowbook)
    {
        $borrowbook = Borrowbook::find($borrowbook->id);
        if ($borrowbook->delete()) {
            return redirect()->route('admin.index')->with('success', 'Book was removed from records successfully.');
        } else {
            return back()->withInput()->with('error', 'Error in returning the book');
        }
    }
}
