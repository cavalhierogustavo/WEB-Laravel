<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oportunidade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use App\Models\Clube;

class OportunidadeController extends Controller
{
    /**
     * Cria uma nova oportunidade (somente clube autenticado)
     */

    

    //ALGUEM ME AJUDA PELO AMOR DE DEUS --ASS: Luan

public function store(Request $request)
{
    try {
        // Verificar autenticação explicitamente
        if (!Auth::check()) {
            return response()->json([
                'error' => 'Usuário não autenticado',
                'redirect' => '/login'
            ], 401);
        }

        $validatedData = $request->validate([
            'descricaoOportunidades'    => 'required|string|max:255',
            'datapostagemOportunidades' => 'required|date',
            'esporte_id'                => 'required|exists:esportes,id',
            'posicoes_id'               => 'required|exists:posicoes,id',
            'idadeMinima'               => 'nullable|integer|min:0|max:120',
            'idadeMaxima'               => 'nullable|integer|min:0|max:120|gte:idadeMinima',
            'estadoOportunidade'        => 'nullable|string|size:2',
            'cidadeOportunidade'        => 'nullable|string|max:100',
            'enderecoOportunidade'      => 'nullable|string|max:255',
            'cepOportunidade'           => 'nullable|string|max:9',
        ]);
        
        $clube = $request->user();
        
        if (!$clube) {
            return response()->json([
                'error' => 'Clube não encontrado',
                'redirect' => '/login'
            ], 401);
        }

        $oportunidade = Oportunidade::create([
            'descricaoOportunidades'    => $validatedData['descricaoOportunidades'],
            'datapostagemOportunidades' => $validatedData['datapostagemOportunidades'],
            'esporte_id'                => $validatedData['esporte_id'],
            'posicoes_id'               => $validatedData['posicoes_id'],
            'clube_id'                  => $clube->id,
            'idadeMinima'               => $validatedData['idadeMinima']        ?? null,
            'idadeMaxima'               => $validatedData['idadeMaxima']        ?? null,
            'estadoOportunidade'        => $validatedData['estadoOportunidade'] ?? null,
            'cidadeOportunidade'        => $validatedData['cidadeOportunidade'] ?? null,
            'enderecoOportunidade'      => $validatedData['enderecoOportunidade'] ?? null,
            'cepOportunidade'           => $validatedData['cepOportunidade']    ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Oportunidade criada com sucesso',
            'data' => $oportunidade
        ], 201);

    } catch (ValidationException $e) {
        return response()->json([
            'error' => 'Dados inválidos',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Erro interno ao criar oportunidade',
            'message' => $e->getMessage()
        ], 500);
    }
}
    /* public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'descricaoOportunidades'    => 'required|string|max:255',
            'datapostagemOportunidades' => 'required|date',
            'esporte_id'                => 'required|exists:esportes,id',
            'posicoes_id'               => 'required|exists:posicoes,id',
            'idadeMinima'               => 'nullable|integer|min:0|max:120',
            'idadeMaxima'               => 'nullable|integer|min:0|max:120|gte:idadeMinima',
            'estadoOportunidade'        => 'nullable|string|size:2',
            'cidadeOportunidade'        => 'nullable|string|max:100',
            'enderecoOportunidade'      => 'nullable|string|max:255',
            'cepOportunidade'           => 'nullable|string|max:9',
        ]);
        
        $clube = $request->user();

        try {
            
            $oportunidade = Oportunidade::create([
                'descricaoOportunidades'    => $validatedData['descricaoOportunidades'],
                'datapostagemOportunidades' => $validatedData['datapostagemOportunidades'],
                'esporte_id'                => $validatedData['esporte_id'],
                'posicoes_id'               => $validatedData['posicoes_id'],
                'clube_id'                  => $clube->id,
                'idadeMinima'               => $validatedData['idadeMinima']        ?? null,
                'idadeMaxima'               => $validatedData['idadeMaxima']        ?? null,
                'estadoOportunidade'        => $validatedData['estadoOportunidade'] ?? null,
                'cidadeOportunidade'        => $validatedData['cidadeOportunidade'] ?? null,
                'enderecoOportunidade'      => $validatedData['enderecoOportunidade'] ?? null,
                'cepOportunidade'           => $validatedData['cepOportunidade']    ?? null,
            ]);

            // 4. Sucesso!
            return response()->json($oportunidade, 201); 

        } catch (\Exception $e) {
            
            return response()->json([
                'error' => 'Erro interno ao criar oportunidade',
                'message' => $e->getMessage()
            ], 500);
        }
    } */
public function index(Request $request)
{
    // 1. Pega os parâmetros da URL (para paginação e busca)
    $perPage = $request->query('per_page', 15);
    $searchTerm = $request->query('q'); // 'q' será nosso parâmetro de busca

    // 2. Inicia a construção da consulta (query)
    $query = Oportunidade::query()
        // 'with' é uma otimização para carregar os relacionamentos e evitar múltiplas queries
        ->with(['esporte', 'posicao', 'clube']);

    // 3. Se um termo de busca foi enviado, adiciona o filtro
    if ($searchTerm) {
        $query->where(function ($subQuery) use ($searchTerm) {
            $subQuery->where('descricaoOportunidades', 'like', "%{$searchTerm}%")
                     // Busca também no nome do clube relacionado
                     ->orWhereHas('clube', function ($clubeQuery) use ($searchTerm) {
                         $clubeQuery->where('nomeClube', 'like', "%{$searchTerm}%");
                     })
                     // Busca também no nome do esporte relacionado
                     ->orWhereHas('esporte', function ($esporteQuery) use ($searchTerm) {
                         $esporteQuery->where('nomeEsporte', 'like', "%{$searchTerm}%");
                     });
        });
    }

    // 4. Ordena pelos mais recentes por padrão
    $query->orderBy('datapostagemOportunidades', 'desc');

    // 5. Executa a consulta com paginação
    $oportunidades = $query->paginate($perPage);

    // 6. Retorna os resultados em formato JSON
    return response()->json($oportunidades, 200);
}
    /* public function index(Request $request)
    {
        $perPage = $request->query('per_page', 15);

        $oportunidades = Oportunidade::with(['esporte', 'posicao', 'clube'])->paginate($perPage);
        
        return response()->json($oportunidades, 200);
    } */

    public function show($id)
    {
        $oportunidade = Oportunidade::with(['esporte', 'posicao', 'clube'])->find($id);

        if (!$oportunidade) {
            return response()->json(['message' => 'Oportunidade não encontrada'], 404);
        }

        return response()->json($oportunidade, 200);
    }

    public function update(Request $request, $id)
    {
        $oportunidade = Oportunidade::find($id);

        if (!$oportunidade) {
            return response()->json(['message' => 'Oportunidade não encontrada'], 404);
        }

        $clube = $request->user();
        if (!$clube || !($clube instanceof Clube) || $oportunidade->clube_id !== $clube->id) {
            return response()->json(['message' => 'Apenas o clube que criou a oportunidade pode atualizá-la'], 403);
        }

        $validatedData = $request->validate([
            'descricaoOportunidades'    => 'sometimes|required|string|max:255',
            'datapostagemOportunidades' => 'sometimes|required|date',
            'esporte_id'                => 'sometimes|required|exists:esportes,id',
            'posicoes_id'               => 'sometimes|required|exists:posicoes,id',
        ]);

        try {
            $oportunidade->update($validatedData);
            return response()->json($oportunidade, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro interno ao atualizar oportunidade',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        $oportunidade = Oportunidade::find($id);

        if (!$oportunidade) {
            return response()->json(['message' => 'Oportunidade não encontrada'], 404);
        }

        $clube = $request->user();
        if (!$clube || !($clube instanceof Clube) || $oportunidade->clube_id !== $clube->id) {
            return response()->json(['message' => 'Apenas o clube que criou a oportunidade pode deletá-la'], 403);
        }

        try {
            $oportunidade->delete();
            return response()->json(['message' => 'Oportunidade deletada com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro interno ao deletar oportunidade',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
 /**
     * Lista oportunidades do clube logado (NOVO - para a página)
     */
    public function minhasOportunidades(Request $request)
    {
        try {
            $clube = $request->user();
            $perPage = $request->query('per_page', 15);

            $oportunidades = Oportunidade::with(['esporte', 'posicao', 'inscricoes'])
                ->where('clube_id', $clube->id)
                ->orderBy('datapostagemOportunidades', 'desc')
                ->paginate($perPage);

            // Adicionar contagem de interessados para cada oportunidade
            $oportunidades->getCollection()->transform(function ($oportunidade) {
                $oportunidade->total_interessados = $oportunidade->inscricoes->count();
                return $oportunidade;
            });

            return response()->json($oportunidades, 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao buscar oportunidades',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Buscar esportes para formulários (NOVO - para os selects)
     */
    public function getEsportes()
    {
        try {
            $esportes = \App\Models\Esporte::select('id', 'nomeEsporte')
                ->orderBy('nomeEsporte', 'asc')
                ->get();

            return response()->json($esportes, 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao buscar esportes',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Buscar posições para formulários (NOVO - para os selects)
     */
    public function getPosicoes()
    {
        try {
            $posicoes = \App\Models\Posicao::select('id', 'nomePosicao')
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
     * Estatísticas das oportunidades do clube (NOVO - para o dashboard)
     */
    public function estatisticas()
    {
        try {
            $clube = Auth::user();

            $stats = [
                'total_oportunidades' => Oportunidade::where('clube_id', $clube->id)->count(),
                'oportunidades_ativas' => Oportunidade::where('clube_id', $clube->id)
                    ->where('datapostagemOportunidades', '>=', now()->subDays(30))
                    ->count(),
                'total_interessados' => Oportunidade::where('clube_id', $clube->id)
                    ->withCount('inscricoes')
                    ->get()
                    ->sum('inscricoes_count'),
                'oportunidades_recentes' => Oportunidade::where('clube_id', $clube->id)
                    ->where('created_at', '>=', now()->subDays(7))
                    ->count(),
            ];

            return response()->json($stats, 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao buscar estatísticas',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}