<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Clube;
use App\Models\Oportunidade;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Retorna os dados para os cards de estatísticas GERAIS (visão do admin).
     */
    public function getStats()
    {
        return response()->json([
            'totalUsuarios' => Usuario::count(),
            'totalClubes' => Clube::count(),
            'totalOportunidades' => Oportunidade::count(),
            'totalDenuncias' => 0, // Valor fixo
        ]);
    }

    /**
     * Retorna as 5 últimas oportunidades GERAIS para a lista.
     */
    public function getUltimasOportunidades()
    {
        $oportunidades = Oportunidade::with(['clube', 'posicao'])
            ->latest() // Ordena pela data de criação, da mais nova para a mais antiga
            ->take(5)  // Pega apenas 5
            ->get();
            
        return response()->json($oportunidades);
    }

    /**
     * Retorna as 5 últimas ações GERAIS para a tabela.
     */
    public function getAcoesRecentes()
    {
        // Usando oportunidades como exemplo de "ação recente"
        $acoes = Oportunidade::with('clube')
            ->latest()
            ->take(5)
            ->get();

        return response()->json($acoes);
    }
}
