<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ResultatAprenentatge;
use Illuminate\Http\Request;
use App\Http\Resources\ResultatAprenentatgeResource;

class ResultatAprenentatgeController extends Controller
{
    public function index(Request $request)
    {
        $modulsId = $request->query('moduls_id');
        $resultatsAprenentatge = ResultatAprenentatge::where('moduls_id', $modulsId)->get();
        return ResultatAprenentatgeResource::collection($resultatsAprenentatge);
    }
}
