<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::latest()->get();
        return view ('admin.movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'nullable',
        ]);

        $image = $request->poster;
        if($request->hasFile('poster')){
            $path = storage_path().'/app/public/posters';
            $ext = $image->getClientOriginalExtension();
            $image_name = time().uniqid().auth()->id().'.'.'webp';
            $image->move($path , $image_name);
        }
        $movie = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'is_published' => $request->is_published,
            'poster' => $image_name,
        ]);
        return redirect()->route('admin.movies.index')->with('success','Movie Created Successfully');
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
        $movie = Movie::find($id);
        return view('admin.movies.edit', compact('movie'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'nullable',
        ]);
        $attributes = $request->all();

        if($request->hasFile('poster')){
            $image = $request->poster;
            $request->validate([
                // 'poster' => 'mimes: jpg, jpeg, png, gif, webp | max:10000'
            ]);
            $path = storage_path().'/app/public/posters';
            $ext = $image->getClientOriginalExtension();
            $image_name = time().uniqid().auth()->id().'.'.'webp';
            $image->move($path , $image_name);
            $attributes['poster']=$image_name;

        }

        $movie = Movie::find($id);
        $movie->update($attributes);

        return redirect()->route('admin.movies.index')->with('message','Movie updated successfully!');
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
