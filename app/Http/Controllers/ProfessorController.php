<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        $professor = new Professor();
        $professor->usuari_id = $request->usuari_id;
        $professor->save();
        return redirect()->route('professors.index');
    }

    public function show($id)
    {
        $professor = Professor::find($id);
        return view('professors.show', compact('professor'));
    }

    public function edit($id)
    {
        $professor = Professor::find($id);
        return view('professors.edit', compact('professor'));
    }

    public function update(Request $request, $id)
    {
        $professor = Professor::find($id);
        $professor->usuari_id = $request->usuari_id;
        $professor->save();
        return redirect()->route('professors.index');
    }

    public function destroy($id)
    {
        $professor = Professor::find($id);
        $professor->delete();
        return redirect()->route('professors.index');
    }

    
}
