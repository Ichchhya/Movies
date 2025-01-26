<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MovieController extends Controller
{
    public function index()
    {

        $movies = Movie::where('is_published',1)->latest()->get();
        return view ('user.index',compact('movies'));
    }

    public function favorite(Request $request){
        $favorite = Favorite::create([
            'user_id' => auth()->id(),
            'movie_id' => $request->movie_id,
        ]);
        $movie_name = Movie::find($request->movie_id)->title;

        $details = [

            'title' => 'Movie Favorited',
    
            'body' => 'Your have favorited movie titled '. $movie_name
    
        ];
    
       $user_email = User::where('id',$favorite->user_id)->first()->email;
        Mail::to($user_email)->send(new \App\Mail\FavoriteMail($details));
        $movies = Movie::latest()->get();
        return redirect()->route('movie',compact('movies'));
    }

    public function allFavorites(){
        $favorites = Favorite::where('user_id',auth()->id())->get();
        return view('user.favorite',compact('favorites'));
    }
}
