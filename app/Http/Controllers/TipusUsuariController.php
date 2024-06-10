<?php

namespace App\Http\Controllers;

use App\Models\TipusUsuari;
use Illuminate\Http\Request;

class TipusUsuariController extends Controller
{
    public function index()
    {
        $tipusUsuaris = TipusUsuari::all();
        return view('tipus_usuaris.index', compact('tipusUsuaris'));
    }

    public function create()
    {
        return view('tipus_usuaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipus' => 'required|unique:tipus_usuaris|max:45',
            'actiu' => 'required|boolean',
        ]);

        TipusUsuari::create($request->all());

        return redirect()->route('tipus_usuaris.index')->with('success', 'Tipus Usuari creat satisfactòriament!');
    }

    public function show($id)
    {
        $tipusUsuari = TipusUsuari::findOrFail($id);
        return view('tipus_usuaris.show', compact('tipusUsuari'));
    }

    public function edit($id)
    {
        $tipusUsuari = TipusUsuari::findOrFail($id);
        return view('tipus_usuaris.edit', compact('tipusUsuari'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipus' => 'required|max:45|unique:tipus_usuaris,tipus,' . $id,
            'actiu' => 'required|boolean',
        ]);

        $tipusUsuari = TipusUsuari::findOrFail($id);
        $tipusUsuari->update($request->all());

        return redirect()->route('tipus_usuaris.index')->with('success', 'Tipus Usuari actualitzat satisfactòriament!');
    }

    public function destroy($id)
    {
        TipusUsuari::findOrFail($id)->delete();
        return redirect()->route('tipus_usuaris.index')->with('success', 'Tipus Usuari eliminat satisfactòriament!');
    }
}
