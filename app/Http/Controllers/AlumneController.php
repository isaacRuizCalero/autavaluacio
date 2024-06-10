<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use Illuminate\Http\Request;

class AlumneController extends Controller
{
    public function index()
    {
        $alumnes = Alumne::all();
        return view('alumnes.index', compact('alumnes'));
    }

    public function create()
    {
        return view('alumnes.create');
    }

    public function store(Request $request)
    {
        $alumne = new Alumne();
        $alumne->usuari_id = $request->usuari_id;
        $alumne->save();
        return redirect()->route('alumnes.index');
    }

    public function show($id)
    {
        $alumne = Alumne::find($id);
        return view('alumnes.show', compact('alumne'));
    }

    public function edit($id)
    {
        $alumne = Alumne::find($id);
        return view('alumnes.edit', compact('alumne'));
    }

    public function update(Request $request, $id)
    {
        $alumne = Alumne::find($id);
        $alumne->usuari_id = $request->usuari_id;
        $alumne->save();
        return redirect()->route('alumnes.index');
    }

    public function destroy($id)
    {
        $alumne = Alumne::find($id);
        $alumne->delete();
        return redirect()->route('alumnes.index');
    }

    
}