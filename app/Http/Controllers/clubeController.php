<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ClubeController extends Controller
{
    /**
     * Listar todos os clubes
     */
    public function index()
    {
        $clubes = Clube::all();
        return response()->json($clubes);
    }

    /**
     * Criar um novo clube
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomeClube' => 'required|string|max:255|unique:clubes',
            'emailClube' => 'required|email|max:255|unique:clubes',
            'cidadeClube' => 'required|string|max:255',
            'estadoClube' => 'required|string|max:255',
            'anoCriacaoClube' => 'required|date',
            'cnpjClube' => 'required|string|max:20|unique:clubes',
            'enderecoClube' => 'required|string|max:255',
            'bioClube' => 'nullable|string',
            'esporteClube' => 'required|string|max:255', // Campo padronizado
            'senhaClube' => 'required|string|min:6|confirmed',
        ]);

        $clube = Clube::create([
            'nomeClube' => $validatedData['nomeClube'],
            'emailClube' => $validatedData['emailClube'],
            'cidadeClube' => $validatedData['cidadeClube'],
            'estadoClube' => $validatedData['estadoClube'],
            'anoCriacaoClube' => $validatedData['anoCriacaoClube'],
            'cnpjClube' => $validatedData['cnpjClube'],
            'enderecoClube' => $validatedData['enderecoClube'],
            'bioClube' => $validatedData['bioClube'] ?? null,
            'esporteClube' => $validatedData['esporteClube'],
            'senhaClube' => Hash::make($validatedData['senhaClube']),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Clube criado com sucesso!',
            'clube' => $clube
        ], 201);
    }

    /**
     * Mostrar um clube específico
     */
    public function show($id)
    {
        $clube = Clube::find($id);

        if (!$clube) {
            return response()->json(['message' => 'Clube não encontrado'], 404);
        }

        return response()->json($clube, 200);
    }

    /**
     * Atualizar informações do clube logado
     */
    public function updateInfo(Request $request)
    {
        // 1. Pega o clube que está logado
        $clube = Auth::user();

        if (!$clube) {
            return back()->with('error', 'Usuário não está logado.');
        }

        // 2. Valida os dados que vieram do formulário
        $validatedData = $request->validate([
            // Garante que o nome seja único, IGNORANDO o nome do próprio clube
            'nomeClube' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('clubes')->ignore($clube->id)
            ],
            'esporteClube' => ['required', 'string', 'max:255'], // Campo padronizado
            'estadoClube' => ['required', 'string', 'max:255'],
            'cidadeClube' => ['required', 'string', 'max:255'],
            'bioClube' => ['nullable', 'string', 'max:1000'], // Adicionado limite e nullable
        ]);

        try {
            // 3. Atualiza os dados do clube com os dados validados
            $clube->update($validatedData);

            // 4. Redireciona o usuário de volta para a página anterior com uma mensagem de sucesso
            return back()->with('success', 'Informações atualizadas com sucesso!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar informações: ' . $e->getMessage());
        }
    }

    /**
     * Atualizar senha do clube
     */
    public function updatePassword(Request $request)
    {
        $clube = Auth::user();

        if (!$clube) {
            return back()->with('error', 'Usuário não está logado.');
        }

        $validatedData = $request->validate([
            'senhaAtual' => 'required|string',
            'novaSenha' => 'required|string|min:6|confirmed',
        ]);

        // Verificar se a senha atual está correta
        if (!Hash::check($validatedData['senhaAtual'], $clube->senhaClube)) {
            return back()->with('error', 'Senha atual incorreta.');
        }

        try {
            // Atualizar a senha
            $clube->update([
                'senhaClube' => Hash::make($validatedData['novaSenha'])
            ]);

            return back()->with('success', 'Senha atualizada com sucesso!');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao atualizar senha: ' . $e->getMessage());
        }
    }

    /**
     * Deletar um clube
     */
    public function destroy($id)
    {
        $clube = Clube::find($id);

        if (!$clube) {
            return response()->json(['message' => 'Clube não encontrado'], 404);
        }

        try {
            $clube->delete();
            return response()->json([
                'success' => true,
                'message' => 'Clube deletado com sucesso!'
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao deletar clube: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Buscar clubes por esporte
     */
    public function byEsporte($esporte)
    {
        $clubes = Clube::where('esporteClube', 'like', '%' . $esporte . '%')->get();
        
        return response()->json([
            'success' => true,
            'clubes' => $clubes,
            'total' => $clubes->count()
        ]);
    }

    /**
     * Buscar clubes por cidade
     */
    public function byCidade($cidade)
    {
        $clubes = Clube::where('cidadeClube', 'like', '%' . $cidade . '%')->get();
        
        return response()->json([
            'success' => true,
            'clubes' => $clubes,
            'total' => $clubes->count()
        ]);
    }
}
