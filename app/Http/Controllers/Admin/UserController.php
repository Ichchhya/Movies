<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $users = User::select('id','name','email')->
        with('favorites',function($q) use($start_date,$end_date){
            $q->when($start_date, function($q)use($start_date,$end_date){
                $q->whereHas('movie',function($q) use($start_date,$end_date){
                    $q->whereBetween('release_date', [$start_date, $end_date]);
                });
            });
        } )->get();

        // $users = User::all();
        return view ('admin.users.index',compact('users','start_date','end_date'));
    }
}
