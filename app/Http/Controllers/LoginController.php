<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Clube;

class LoginController extends Controller
{
    /**
     * Mostrar o formulário de login
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Processar login simples (API) - SEM remember token
     */
    public function loginSimples(Request $request)
    {
        try {
            // Validar dados de entrada
            $request->validate([
                'emailClube' => 'required|email',
                'senhaClube' => 'required|string',
            ]);

            $email = $request->emailClube;
            $senha = $request->senhaClube;

            // Buscar clube pelo email
            $clube = Clube::where('emailClube', $email)->first();

            if (!$clube) {
                return response()->json([
                    'success' => false,
                    'message' => 'E-mail não encontrado.',
                ], 401);
            }

            // Verificar senha
            if (!Hash::check($senha, $clube->senhaClube)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Senha incorreta.',
                ], 401);
            }

            // FAZER LOGIN SEM REMEMBER TOKEN (false = não lembrar)
            Auth::login($clube, false);

            // Regenerar ID da sessão por segurança
            $request->session()->regenerate();

            // Verificar se o login funcionou
            if (!Auth::check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erro interno: Login não foi processado corretamente.',
                ], 500);
            }

            return response()->json([
                'success' => true,
                'message' => 'Login realizado com sucesso!',
                'redirect' => '/dashClub',
                'debug' => [
                    'auth_check' => Auth::check(),
                    'auth_id' => Auth::id(),
                    'clube_nome' => Auth::user()->nomeClube ?? 'N/A',
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Verificar status de login
     */
    public function verificarLogin()
    {
        try {
            if (Auth::check()) {
                $clube = Auth::user();
                
                return response()->json([
                    'logado' => true,
                    'clube' => [
                        'id' => $clube->id,
                        'nome' => $clube->nomeClube,
                        'email' => $clube->emailClube,
                        'esporte' => $clube->esporteClube ?? $clube->esporte ?? 'Não informado',
                        'cidade' => $clube->cidadeClube ?? 'Não informado',
                        'estado' => $clube->estadoClube ?? 'Não informado',
                    ]
                ]);
            }

            return response()->json([
                'logado' => false,
                'message' => 'Usuário não está logado'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'logado' => false,
                'error' => 'Erro ao verificar login: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Fazer logout
     */
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Logout realizado com sucesso!'
                ]);
            }

            return redirect('/login')->with('message', 'Logout realizado com sucesso!');

        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Erro ao fazer logout: ' . $e->getMessage()
                ], 500);
            }

            return redirect('/login')->with('error', 'Erro ao fazer logout.');
        }
    }

    /**
     * Listar clubes (para debug)
     */
    public function listarClubes()
    {
        try {
            $clubes = Clube::select('id', 'nomeClube', 'emailClube', 'esporteClube', 'cidadeClube', 'estadoClube')
                           ->limit(10)
                           ->get();

            return response()->json([
                'success' => true,
                'total' => $clubes->count(),
                'clubes' => $clubes->map(function($clube) {
                    return [
                        'id' => $clube->id,
                        'nomeClube' => $clube->nomeClube,
                        'emailClube' => $clube->emailClube,
                        'esporteClube' => $clube->esporteClube ?? 'Não informado',
                        'cidadeClube' => $clube->cidadeClube ?? 'Não informado',
                        'estadoClube' => $clube->estadoClube ?? 'Não informado',
                    ];
                })
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Erro ao listar clubes: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Debug do Auth (para identificar problemas)
     */
    public function debugAuth()
    {
        try {
            $authUser = Auth::user();
            
            return response()->json([
                'auth_check' => Auth::check(),
                'auth_id' => Auth::id(),
                'auth_user_exists' => $authUser !== null,
                'auth_user_data' => $authUser ? [
                    'id' => $authUser->id,
                    'nomeClube' => $authUser->nomeClube ?? 'N/A',
                    'emailClube' => $authUser->emailClube ?? 'N/A',
                    'esporteClube' => $authUser->esporteClube ?? 'N/A',
                    'cidadeClube' => $authUser->cidadeClube ?? 'N/A',
                    'estadoClube' => $authUser->estadoClube ?? 'N/A',
                ] : null,
                'guard_name' => Auth::getDefaultDriver(),
                'provider_model' => config('auth.providers.clubes.model') ?? config('auth.providers.users.model'),
                'session_id' => session()->getId(),
                'remember_token_disabled' => 'SIM - Model configurado para não usar remember_token',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro no debug: ' . $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}
