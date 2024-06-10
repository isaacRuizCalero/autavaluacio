<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rubriques;
use Illuminate\Http\Request;
use App\Http\Resources\RubriquesResource;

class RubriquesController extends Controller
{
    public function index(Request $request)
    {
        $criterisAvaluacioId = $request->query('criteris_avaluacio_id');
        $rubriques = Rubriques::where('criteris_avaluacio_id', $criterisAvaluacioId)->get();
        return RubriquesResource::collection($rubriques);
    }
}
