<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // 1. Pega APENAS o 'email' e a 'password' da requisição
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required', // O nome no formulário é 'password'
        ]);

        // 2. Tenta fazer o login
        // O Laravel vai procurar na tabela 'clubes' (definido no config/auth.php)
        // por um registro com este 'email'.
        // E vai comparar a senha usando a coluna 'senhaClube' (definido no Model).
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('paraAtletas');
        }

        // 3. Se falhar, volta com o erro.
        return back()->with('error', 'E-mail ou senha inválidos.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}