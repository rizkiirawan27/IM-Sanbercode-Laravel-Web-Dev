<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cast = Cast::all();
        return view('casts.index', ["casts"=>$cast]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('casts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'bio' => 'required',
        ],
        [
            'required' => 'Inputan :attribute harus diisi.'
        ]);

        $cast = new Cast;
 
        $cast->name = $validated['name'];
        $cast->age = $validated['age'];
        $cast->bio = $validated['bio'];
 
        $cast->save();
 
        return redirect('/casts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cast = Cast::find($id);
        
        return view ('casts.detail', ["casts"=>$cast]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cast = Cast::find($id);
        
        return view ('casts.edit', ["casts"=>$cast]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'bio' => 'required',
        ],
        [
            'required' => 'Inputan :attribute harus diisi.'
        ]);

        $cast = Cast::find($id);

        $cast->name = $validated['name'];
        $cast->age = $validated['age'];
        $cast->bio = $validated['bio'];

        $cast->save();

        return redirect('/casts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cast = Cast::find($id);
 
        $cast->delete();

        return redirect('/casts');
    }
}
