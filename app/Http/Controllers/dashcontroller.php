<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Clube;
use App\Models\Oportunidade;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Retorna os dados para os cards de estatísticas.
     */
    public function getStats()
    {
        return response()->json([
            'totalUsuarios' => Usuario::count(),
            'totalClubes' => Clube::count(),
            'totalOportunidades' => Oportunidade::count(),
            'totalDenuncias' => 0, // Valor fixo, pois não temos o Model Denuncia
        ]);
    }

    /**
     * Retorna as 5 últimas oportunidades para a lista.
     */
    public function getUltimasOportunidades()
    {
        $oportunidades = Oportunidade::with(['clube', 'posicao'])
            ->latest()
            ->take(5)
            ->get();
            
        return response()->json($oportunidades);
    }

    /**
     * Retorna as 5 últimas ações para a tabela.
     * (Usando oportunidades como exemplo de "ação recente")
     */
    public function getAcoesRecentes()
    {
        $acoes = Oportunidade::with('clube')
            ->latest()
            ->take(5)
            ->get();

        return response()->json($acoes);
    }
}
