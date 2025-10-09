<?php

namespace App\Http\Controllers;

use App\Models\Esporte;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EsporteController extends Controller
{
    /**
     * Lista todos os esportes, com opção de busca.
     */
    public function index(Request $request)
    {
        $query = Esporte::query();

        // Filtro de busca pelo nome do esporte
        if ($request->has('q')) {
            $query->where('nomeEsporte', 'like', '%' . $request->query('q') . '%');
        }

        $esportes = $query->orderBy('nomeEsporte', 'asc')->paginate(15);

        return response()->json($esportes);
    }

    /**
     * Cria um novo esporte.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomeEsporte' => 'required|string|max:255|unique:esportes,nomeEsporte',
            'descricaoEsporte' => 'nullable|string',
        ]);

        $esporte = Esporte::create($validatedData);

        return response()->json($esporte, 201); // 201 Created
    }

    /**
     * Exibe um esporte específico.
     */
    public function show(Esporte $esporte)
    {
        return response()->json($esporte);
    }

    /**
     * Atualiza um esporte existente.
     */
    public function update(Request $request, Esporte $esporte)
    {
        $validatedData = $request->validate([
            // Garante que o nome seja único, exceto para o próprio esporte que está sendo editado
            'nomeEsporte' => ['required', 'string', 'max:255', Rule::unique('esportes')->ignore($esporte->id)],
            'descricaoEsporte' => 'nullable|string',
        ]);

        $esporte->update($validatedData);

        return response()->json($esporte);
    }

    /**
     * Deleta um esporte.
     */
    public function destroy(Esporte $esporte)
    {
        // Adicionar lógica de verificação aqui se necessário (ex: não deletar se tiver oportunidades associadas)
        $esporte->delete();

        return response()->json(null, 204); // 204 No Content
    }
}
