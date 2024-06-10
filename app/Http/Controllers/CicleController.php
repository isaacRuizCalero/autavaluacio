<?php

namespace App\Http\Controllers;

use App\Models\Cicle;
use Illuminate\Http\Request;

class CicleController extends Controller
{
    public function index()
    {
        $cicles = Cicle::all();
        return view('cicles.index', compact('cicles'));
    }

    public function create()
    {
        return view('cicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sigles' => 'required|unique:cicles|max:10',
            'descripcio' => 'required|max:45',
            'actiu' => 'required|boolean',
        ]);

        Cicle::create($request->all());

        return redirect()->route('cicles.index')->with('success', 'Cicle creat satisfactòriament!');
    }

    public function show($id)
    {
        $cicle = Cicle::findOrFail($id);
        return view('cicles.show', compact('cicle'));
    }

    public function edit($id)
    {
        $cicle = Cicle::findOrFail($id);
        return view('cicles.edit', compact('cicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sigles' => 'required|max:10|unique:cicles,sigles,' . $id,
            'descripcio' => 'required|max:45',
            'actiu' => 'required|boolean',
        ]);

        $cicle = Cicle::findOrFail($id);
        $cicle->update($request->all());

        return redirect()->route('cicles.index')->with('success', 'Cicle actualitzat satisfactòriament!');
    }

    public function destroy($id)
    {
        Cicle::findOrFail($id)->delete();
        return redirect()->route('cicles.index')->with('success', 'Cicle eliminat satisfactòriament!');
    }
}
