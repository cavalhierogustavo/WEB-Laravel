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
    // João: Luan, eu estava pesquisando e, o envio da mensagem de 404 pode ser automático se você usar findOrFail() em vez de find().

    // Listar todos os clubes
    public function index()
    {
        $clubes = Clube::all();
        return response()->json($clubes);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomeClube' => 'required|string|max:255',
            'cidadeClube' => 'required|string|max:255',
            'estadoClube' => 'required|string|max:255',
            'anoCriacaoClube' => 'required|date',
            'cnpjClube' => 'required|string|max:20|unique:clubes',
            'enderecoClube' => 'required|string|max:255',
            'bioClube' => 'nullable|string',
            'senhaClube' => 'required|string|min:6|confirmed',
        ]);

        $clube = Clube::create([
            'nomeClube' => $validatedData['nomeClube'],
            'cidadeClube' => $validatedData['cidadeClube'],
            'estadoClube' => $validatedData['estadoClube'],
            'anoCriacaoClube' => $validatedData['anoCriacaoClube'],
            'cnpjClube' => $validatedData['cnpjClube'],
            'enderecoClube' => $validatedData['enderecoClube'],
            'bioClube' => $validatedData['bioClube'] ?? null,
            'senhaClube' => Hash::make($validatedData['senhaClube']),
        ]);

        return response()->json($clube, 201);

    }


    public function show($id)
    {
        $clube = Clube::find($id);

        if(!$clube){
            return response()->json(['message' => 'Clube não encontrado'], 404);
        }

        return response()->json($clube, 200);
    }


    public function updateInfo(Request $request)
    {
        // 1. Pega o clube que está logado
        $clube = Auth::user();

        // 2. Valida os dados que vieram do formulário
        $validatedData = $request->validate([
            // Garante que o nome seja único, IGNORANDO o nome do próprio clube
            'nomeClube' => ['required', 'string', 'max:255', Rule::unique('clubes')->ignore($clube->id)],
            'esporte' => ['required', 'string', 'max:255'],
            'estadoClube' => ['required', 'string', 'max:255'],
            'cidadeClube' => ['required', 'string', 'max:255'],
        ]);

        // 3. Atualiza os dados do clube com os dados validados
        $clube->update($validatedData);

        // 4. Redireciona o usuário de volta para a página anterior com uma mensagem de sucesso
        return back()->with('success', 'Informações atualizadas com sucesso!');
    }


    public function destroy($id)
    {
        $clube = Clube::find($id);

        if(!$clube){
            return response()->json(['message' => 'Clube não encontrado'], 404);
        }

        $clube->delete();
        return response()->json(['sucesso' => true], 200);
    }
    
}
