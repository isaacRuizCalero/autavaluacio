<?php

namespace App\Http\Controllers;

use App\Models\ResultatAprenentatge;
use App\Models\Modul;
use Illuminate\Http\Request;

class ResultatAprenentatgeController extends Controller
{
    public function index()
    {
        $resultatsAprenentatge = ResultatAprenentatge::all();
        return view('resultats_aprenentatge.index', compact('resultatsAprenentatge'));
    }

    public function create()
    {
        $moduls = Modul::all();
        return view('resultats_aprenentatge.create', compact('moduls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ordre' => 'required|integer',
            'descripcio' => 'required|max:256',
            'actiu' => 'required|boolean',
            'moduls_id' => 'required|exists:moduls,id',
        ]);

        ResultatAprenentatge::create($request->all());

        return redirect()->route('resultats_aprenentatge.index')->with('success', 'Resultat Aprenentatge creat satisfactòriament!');
    }

    public function show($id)
    {
        $resultatAprenentatge = ResultatAprenentatge::findOrFail($id);
        return view('resultats_aprenentatge.show', compact('resultatAprenentatge'));
    }

    public function edit($id)
    {
        $resultatAprenentatge = ResultatAprenentatge::findOrFail($id);
        $moduls = Modul::all();
        return view('resultats_aprenentatge.edit', compact('resultatAprenentatge', 'moduls'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ordre' => 'required|integer',
            'descripcio' => 'required|max:256',
            'actiu' => 'required|boolean',
            'moduls_id' => 'required|exists:moduls,id',
        ]);

        $resultatAprenentatge = ResultatAprenentatge::findOrFail($id);
        $resultatAprenentatge->update($request->all());

        return redirect()->route('resultats_aprenentatge.index')->with('success', 'Resultat Aprenentatge actualitzat satisfactòriament!');
    }

    public function destroy($id)
    {
        ResultatAprenentatge::findOrFail($id)->delete();
        return redirect()->route('resultats_aprenentatge.index')->with('success', 'Resultat Aprenentatge eliminat satisfactòriament!');
    }
}
