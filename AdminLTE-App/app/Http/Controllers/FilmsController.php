<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genres;
use App\Models\Films;
use File;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Ambil film dan rata-rata ratingnya
    $films = Films::with('genres', 'listReviews') // Pastikan relasi sudah ada
        ->when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
        ->get()
        ->map(function ($films) {
            $films->average_rating = $films->listReviews->avg('point'); // Hitung rata-rata rating
            return $films;
        });

    return view('films.index', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genres::get();
        return view ('films.create', ['genres'=>$genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'summary' => 'required',
            'release_year' => 'required',
            'genre_id' => 'required',
            'poster' => 'required|image|mimes:jpg,png,jpeg',
        ],
        [
            'required' => 'Inputan :attribute harus diisi.'
        ]);

        $fileName = time().'.'.$request->poster->extension();

        $request->poster->move(public_path('uploads'), $fileName);



        $films = new Films;
 
        $films->title = $request->title;
        $films->summary = $request->summary;
        $films->release_year = $request->release_year;
        $films->genre_id = $request->genre_id;
        $films->poster = $fileName;
 
        $films->save();
 
        return redirect('/films');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $films = Films::find($id);

        return view('films.detail', ['films'=> $films]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $films = Films::find($id);
        $genres = Genres::get();

        return view('films.edit', ['films'=>$films, 'genres'=>$genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'summary' => 'required',
            'release_year' => 'required',
            'genre_id' => 'required',
            'poster' => 'image|mimes:jpg,png,jpeg',
        ]);

        $films = Films::find($id);
        
        if($request->has('poster')){
            $path = 'uploads/';
            
            File::delete($path. $films->poster);

            $fileName = time().'.'.$request->poster->extension();

            $request->poster->move(public_path('uploads'), $fileName);

            $films->poster = $fileName;

            $films->save();
        }

        $films->title = $request['title'];
        $films->summary = $request['summary'];
        $films->release_year = $request['release_year'];
        $films->genre_id = $request['genre_id'];
        
        $films->save();
        
        return redirect('/films');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $films = Films::find($id);
        
        $path = 'uploads/';
            
        File::delete($path. $films->poster);

        $films->delete();

        return redirect('/films');
    }
}
