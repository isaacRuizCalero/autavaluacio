<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index()
    {
        return response()->json(Modul::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'codi' => 'required|string|max:10',
            'sigles' => 'required|string|max:10',
            'nom' => 'required|string|max:45',
            'actiu' => 'required|boolean',
            'cicles_id' => 'required|exists:cicles,id',
        ]);

        $modul = Modul::create($request->all());

        return response()->json($modul, 201);
    }

    public function show($id)
    {
        $modul = Modul::findOrFail($id);
        return response()->json($modul, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codi' => 'sometimes|required|string|max:10',
            'sigles' => 'sometimes|required|string|max:10',
            'nom' => 'sometimes|required|string|max:45',
            'actiu' => 'sometimes|required|boolean',
            'cicles_id' => 'sometimes|required|exists:cicles,id',
        ]);

        $modul = Modul::findOrFail($id);
        $modul->update($request->all());

        return response()->json($modul, 200);
    }

    public function destroy($id)
    {
        $modul = Modul::findOrFail($id);
        $modul->delete();

        return response()->json(null, 204);
    }
}
