<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CriteriAvaluacio;
use Illuminate\Http\Request;
use App\Http\Resources\CriteriAvaluacioResource;

class CriteriAvaluacioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $resultatAprenentatgeId = $request->input('resultats_aprenentatge_id');
        $criterisAvaluacio = CriteriAvaluacio::where('resultats_aprenentatge_id', $resultatAprenentatgeId)->with('rubriques')->get();
        return CriteriAvaluacioResource::collection($criterisAvaluacio);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CriteriAvaluacio $criteriAvaluacio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CriteriAvaluacio $criteriAvaluacio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CriteriAvaluacio $criteriAvaluacio)
    {
        //
    }
}
