<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use Illuminate\Http\Request;
use App\Http\Resources\ModulResource;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moduls = Modul::all();

        return ModulResource::collection($moduls);
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
    public function show(Modul $modul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modul $modul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modul $modul)
    {
        //
    }
}
