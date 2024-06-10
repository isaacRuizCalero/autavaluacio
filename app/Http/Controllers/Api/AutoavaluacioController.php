<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autoavaluacio;

class AutoavaluacioController extends Controller
{
    public function store(Request $request)
    {
        try {
            $evaluations = $request->all();

            foreach ($evaluations as $evaluation) {
                Autoavaluacio::create($evaluation);
            }

            return response()->json(['message' => 'Autoavaluació enviada correctament!'], 200);
        } catch (\Exception $e) {
            // Registrar el error para depuración
            \Log::error('Error guardando la autoavaluació: ' . $e->getMessage());
            return response()->json(['message' => 'Hi ha hagut un error en enviar l\'autoavaluació.'], 500);
        }
    }
}
