<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use Session;
use Auth;

class GenresController extends Controller
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
            $genres = Genre::where('user_id', Auth::user()->id)->get();
            return view('genres.index')->withGenres($genres);
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
    public function create()
    {
        //
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
            'name' => 'required|max:100',
            'description' => 'required|min:50|max:255'

        ]);
        $genre = new Genre;
        if (Auth::check()) {
            $genre->name = $request->name;
            $genre->description = $request->description;
            $genre->user_id = $request->user()->id;
            $genre->save();

            if ($genre->save()) {
                Session::flash('success', 'Genre added succesfully');
                return redirect()->route('admin.index', $genre->id);
            } else {
                return back()->withInput();
            }
            
        }
         else {
           return redirect()->route('admin.index', $genre->id);
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
