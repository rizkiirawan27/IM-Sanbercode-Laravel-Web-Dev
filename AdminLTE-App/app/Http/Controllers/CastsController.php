<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastsController extends Controller
{
    public function create() {
        return view('casts.create');
    }

    public function store(Request $request) {
        // Validasi
        $validated = $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'bio' => 'required',
        ],
        [
            'required' => 'Inputan :attribute harus diisi.'
        ]);

        // insert databbase
        DB::table('casts')->insert([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'bio' => $request->input('bio')
        ]);
     
        // redirect ke halaman casts
        return  redirect ('/casts');
    }

    public function index() {
        $casts = DB::table('casts')->get();

        return view ('casts.index', ['casts' => $casts]);
    }

    public function show($id) {
        $casts = DB::table('casts')->find($id);

        return view('casts.detail', ['casts' => $casts]);
    }

    public function edit($id) {
        $casts = DB::table('casts')->find($id);

        return view('casts.edit', ['casts' => $casts]);
    }

    public function update(Request $request, $id) {
         // Validasi
         $validated = $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'bio' => 'required',
        ],
        [
            'required' => 'Inputan :attribute harus diisi.'
        ]);

        // update databbase
        DB::table('casts')
              ->where('id', $id)
              ->update([
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'bio' => $request->input('bio')
            ]);
     
        // redirect ke halaman casts
        return  redirect ('/casts');
    }

    public function destroy($id) {
        DB::table('casts')->where('id', $id)->delete();

        return redirect('/casts');
    }
}

