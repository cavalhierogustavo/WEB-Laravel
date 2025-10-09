<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class ContaController extends Controller
{
    /**
     * Atualiza o email do clube autenticado.
     */
    public function updateEmail(Request $request)
    {
        try {
            // 1. Validar os dados recebidos
            $validatedData = $request->validate([
                'email' => 'required|string|email|max:255|unique:clubes,emailClube,' . Auth::id(),
                'senha_atual' => 'required|string',
            ]);

            // 2. Pegar o clube autenticado
            $clube = Auth::user();

            // 3. Verificar se a senha atual está correta
            if (!Hash::check($validatedData['senha_atual'], $clube->senhaClube)) {
                // Lança uma exceção de validação para o campo 'senha_atual'
                throw ValidationException::withMessages([
                    'senha_atual' => ['A senha atual está incorreta.'],
                ]);
            }

            // 4. Atualizar o email
            $clube->emailClube = $validatedData['email'];
            $clube->save();

            // 5. Retornar sucesso
            return response()->json(['message' => 'Email alterado com sucesso!'], 200);

        } catch (ValidationException $e) {
            // Retorna erros de validação (ex: email já existe, senha incorreta)
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Retorna um erro genérico caso algo inesperado aconteça
            return response()->json(['message' => 'Ocorreu um erro inesperado.'], 500);
        }
    }

    /**
     * Atualiza a senha do clube autenticado.
     */
    public function updatePassword(Request $request)
    {
        try {
            // 1. Validar os dados recebidos
            $validatedData = $request->validate([
                'senha_atual' => 'required|string',
                'nova_senha' => [
                    'required',
                    'string',
                    Password::min(8)->mixedCase()->numbers()->symbols(), // Senha forte
                    'confirmed' // Precisa ter um campo 'nova_senha_confirmation'
                ],
            ]);

            // 2. Pegar o clube autenticado
            $clube = Auth::user();

            // 3. Verificar se a senha atual está correta
            if (!Hash::check($validatedData['senha_atual'], $clube->senhaClube)) {
                throw ValidationException::withMessages([
                    'senha_atual' => ['A senha atual está incorreta.'],
                ]);
            }

            // 4. Atualizar a senha (o model 'Clube' já tem um cast para 'hashed')
            $clube->senhaClube = $validatedData['nova_senha'];
            $clube->save();

            // 5. Retornar sucesso
            return response()->json(['message' => 'Senha alterada com sucesso!'], 200);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ocorreu um erro inesperado.'], 500);
        }
    }

    public function destroyAccount(Request $request)
    {
        try {
            // 1. Validar a senha de confirmação
            $validatedData = $request->validate([
                'senha_confirmacao' => 'required|string',
            ]);

            // 2. Pegar o clube autenticado
            $clube = Auth::user();

            // 3. Verificar se a senha está correta
            if (!Hash::check($validatedData['senha_confirmacao'], $clube->senhaClube)) {
                throw ValidationException::withMessages([
                    'senha_confirmacao' => ['A senha de confirmação está incorreta.'],
                ]);
            }

            // 4. Fazer logout, excluir a conta e invalidar a sessão
            Auth::logout();
            $clube->delete(); // Exclui o registro do banco de dados
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // 5. Retornar sucesso (o frontend irá redirecionar)
            return response()->json([
                'message' => 'Conta excluída com sucesso.',
                'redirect_url' => '/' // Envia a URL de redirecionamento para o frontend
            ], 200);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ocorreu um erro inesperado ao excluir a conta.'], 500);
        }
    }
}
