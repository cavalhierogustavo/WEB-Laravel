<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Deleta a conta do usuário autenticado.
     */
    public function destroy(Request $request)
    {
        // Pega o usuário (clube) que está logado
        $user = Auth::user();

        // Faz o logout primeiro para invalidar a sessão
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Deleta o usuário do banco de dados
        $user->delete();

        // Redireciona para a página de login com uma mensagem de sucesso
        return redirect('/login')->with('success', 'Sua conta foi excluída com sucesso.');
    }
}