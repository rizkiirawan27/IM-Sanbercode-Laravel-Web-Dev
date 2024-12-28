<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genres;

class GenresController extends Controller
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
    
    $genres = Genres::withCount('listFilms')
        ->when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();

    return view('genres.index', compact('genres'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
        ],
        [
            'required' => 'Inputan :attribute harus diisi.'
        ]);

        $genres = new Genres;
 
        $genres->name = $validated['name'];
 
        $genres->save();
 
        return redirect('/genres');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = Genres::find($id);

        return view ('genres.detail', ['genres'=>$genres]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = Genres::find($id);
        
        return view ('genres.edit', ["genres"=>$genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
        ],
        [
            'required' => 'Inputan :attribute harus diisi.'
        ]);

        $genres = Genres::find($id);

        $genres->name = $validated['name'];

        $genres->save();

        return redirect('/genres');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // Temukan genre berdasarkan ID
        $genre = Genres::findOrFail($id);

        // Cek apakah genre memiliki film terkait
        $filmsCount = $genre->listFilms()->count();

        if ($filmsCount > 0) {
            // Jika ada film terkait, tampilkan pesan peringatan
            return redirect()->route('genres.index')
                            ->with('error', 'Tidak dapat menghapus genre karena ada film yang terkait.');
    }

        // Jika tidak ada film terkait, hapus genre
        $genre->delete();

        // Redirect ke halaman genres dengan pesan sukses
        return redirect()->route('genres.index')
                        ->with('success', 'Genre berhasil dihapus.');
        }
}
