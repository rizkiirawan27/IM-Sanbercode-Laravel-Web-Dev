<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function store(Request $request, $film_id){
        $user_id = Auth::id();

        $request->validate([
            'content' => 'required',
            'point' => 'required|int|min:1|max:5',
        ]);

        Reviews::create([
            'content' => $request->input("content"),
            'user_id' => $user_id,
            'film_id' => $film_id,
            'point' => $request->point,

        ]);
        
        return redirect('films/'. $film_id);
    }
}
