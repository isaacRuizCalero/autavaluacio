<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->tipusUsuari->tipus == 'Administrador') {
            return redirect()->route('layouts.main');
        } elseif ($user->tipusUsuari->tipus == 'Professor') {
            return redirect()->route('professors.index');
        } elseif ($user->tipusUsuari->tipus == 'Alumne') {
            return redirect()->route('alumnes.index');
        }

        return view('home');
    }
}
