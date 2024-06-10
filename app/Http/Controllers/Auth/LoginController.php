<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UsuariController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuari;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return [
            'correu' => $request->{$this->username()},
            'password' => $request->password,
        ];
    }

    protected function authenticated(Request $request, $user)
{
    if ($user->tipusUsuari->tipus == 'Administrador') {
        return redirect('/layouts/main');
    } elseif ($user->tipusUsuari->tipus == 'Professor') {
        return redirect('/professors');
    } elseif ($user->tipusUsuari->tipus == 'Alumne') {
        return redirect('/alumnes');
    }

    return redirect('/home');
}


    public function username()
    {
        return 'correu';
    }



}
