<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuariController extends Controller {
    public function showLogin()
    {
        return view('auth.login');
    }

    public function index() {
        $usuaris = Usuari::all();
        $tipusUsuaris = \App\Models\TipusUsuari::all();
        return view('usuaris.index',compact('usuaris', 'tipusUsuaris'));
    }

    public function create()
    {
        $tipusUsuaris = \App\Models\TipusUsuari::all();
        return view('usuaris.crearUsuaris', compact('tipusUsuaris'));
    }

    public function store(Request $request) {
        $request->validate([
            'nom_usuari' => 'required|unique:usuaris',
            'contrasenya' => 'required|min:8',
            'correu' => 'required|email|unique:usuaris',
            'nom' => 'required',
            'cognom' => 'required',
            'tipus_usuaris_id' => 'required|exists:tipus_usuaris,id',
        ]);
    
        $data = $request->all();
        $data['contrasenya'] = Hash::make($request->contrasenya);
    
        Usuari::create($data);
    
        return redirect()->route('usuaris.index')->with('success', 'Usuari creat correctament.');
    }
    

    public function edit($id) {
        $usuari = Usuari::findOrFail($id);
        $tipusUsuaris = \App\Models\TipusUsuari::all();
        return view('usuaris.editarUsuaris', compact('usuari', 'tipusUsuaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_usuari' => 'required|unique:usuaris,nom_usuari,' . $id,
            'contrasenya' => 'nullable|min:8',
            'correu' => 'required|email|unique:usuaris,correu,' . $id,
            'nom' => 'required',
            'cognom' => 'required',
            'tipus_usuaris_id' => 'required|exists:tipus_usuaris,id',
        ]);
    
        $usuari = Usuari::findOrFail($id);
        
        $data = $request->except(['contrasenya']);
        if ($request->filled('contrasenya')) {
            $data['contrasenya'] = Hash::make($request->contrasenya);
        }
    
        $usuari->update($data);
    
        return redirect()->route('usuaris.index')->with('success', 'Usuari actualitzat correctament.');
    }
    

    public function destroy($id)
    {
        $usuari = Usuari::findOrFail($id);
        $usuari->delete();

        return redirect()->route('usuaris.index')->with('success', 'Usuari eliminat correctament.');
    }

    public function showpass(Usuari $usuari){
        return view('usuarios.password',compact('usuari'));
    }

    public function show (Usuari $usuari){
        return view('usuaris.index',compact('usuari'));
    }

    public function login(Request $request){


        $username = $request->input('username');
        $password = $request->input('password');

        $user = Usuari::where('nom_usuari', $username)->first();

        if($user !=null && Hash::check($password, $user->contrasenya)){
        Auth::login($user);
            $response = redirect('/');
            request()->session()->flash('mensaje', 'Bienvenido ' . $user->nom_usuari);

        }else{
            $request->session()->flash('error', 'Usuario o contraseña incorrectos');
            //  $request->session()->flash($username,$password);
        $response = redirect('/login')->withInput();
        }
        return $response;
    }

    public function logout(){
        Auth::logout();
        session()->flash('mensaje', 'Sesión cerrada correctamente');
        return redirect('/');
    }
}
