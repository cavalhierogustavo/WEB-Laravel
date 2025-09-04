<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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


    public function update(Request $request, $id)
    {
        $clube = Clube::find($id);
        if(!$clube){
            return response()->json(['message' => 'Clube não encontrado'], 404);
        }

        $clube->update($request->all());
        return response()->json($clube, 200);
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
