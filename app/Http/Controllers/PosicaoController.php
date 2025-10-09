<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posicao;


class PosicaoController extends Controller
{
    /**
     * Listar todas as posições para uso em selects/filtros
     */
    public function index()
    {
        try {
            $posicoes = Posicao::select('id', 'nomePosicao')
                              ->orderBy('nomePosicao', 'asc')
                              ->get();

            return response()->json($posicoes, 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao buscar posições',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Buscar posição específica
     */
    public function show($id)
    {
        try {
            $posicao = Posicao::findOrFail($id);
            
            return response()->json($posicao, 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Posição não encontrada',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Criar nova posição (se necessário)
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nomePosicao' => 'required|string|max:100|unique:posicoes,nomePosicao',
                'descricao' => 'nullable|string|max:500',
            ]);

            $posicao = Posicao::create($validatedData);

            return response()->json([
                'message' => 'Posição criada com sucesso',
                'posicao' => $posicao
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao criar posição',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Atualizar posição existente
     */
    public function update(Request $request, $id)
    {
        try {
            $posicao = Posicao::findOrFail($id);

            $validatedData = $request->validate([
                'nomePosicao' => 'required|string|max:100|unique:posicoes,nomePosicao,' . $id,
                'descricao' => 'nullable|string|max:500',
            ]);

            $posicao->update($validatedData);

            return response()->json([
                'message' => 'Posição atualizada com sucesso',
                'posicao' => $posicao
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao atualizar posição',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Deletar posição
     */
    public function destroy($id)
    {
        try {
            $posicao = Posicao::findOrFail($id);
            
            // Verificar se há usuários usando esta posição
            $usuariosCount = $posicao->usuarios()->count();
            
            if ($usuariosCount > 0) {
                return response()->json([
                    'error' => 'Não é possível deletar esta posição',
                    'message' => "Existem {$usuariosCount} usuários associados a esta posição"
                ], 400);
            }

            $posicao->delete();

            return response()->json([
                'message' => 'Posição deletada com sucesso'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao deletar posição',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
