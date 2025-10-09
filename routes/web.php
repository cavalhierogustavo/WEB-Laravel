<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroClubeController;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchUsuarioController;
use App\Http\Controllers\PosicaoController;
use App\Http\Controllers\OportunidadeController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\EsporteController;
use App\Http\Controllers\dashcontroller;
/*
|--------------------------------------------------------------------------
| Web Routes - Integração Completa
|--------------------------------------------------------------------------
*/

// Rota inicial
Route::get('/', function () {
    return view('welcome');
});

// ========== ROTAS DE LOGIN ==========
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/api/login-simples', [LoginController::class, 'loginSimples'])->name('login.simples');
Route::get('/api/verificar-login', [LoginController::class, 'verificarLogin'])->name('verificar.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout']);

// Rotas de debug (remover em produção)
Route::get('/debug/clubes-simples', [LoginController::class, 'listarClubes'])->name('debug.clubes');
Route::get('/debug/auth', [LoginController::class, 'debugAuth'])->name('debug.auth');

// ========== ROTAS DE CADASTRO ==========
// Páginas de cadastro (GET)
Route::get('/cadastro/clube/passo-1', [CadastroClubeController::class, 'createStep1'])->name('clubes.create.step1');
Route::get('/cadastro/clube/passo-2', [CadastroClubeController::class, 'createStep2'])->name('clubes.create.step2');
Route::get('/cadastro/clube/passo-3', [CadastroClubeController::class, 'createStep3'])->name('clubes.create.step3');

// APIs de cadastro (POST)
Route::post('/api/cadastro/clube/passo-1', [CadastroClubeController::class, 'postStep1']);
Route::post('/api/cadastro/clube/passo-2', [CadastroClubeController::class, 'postStep2']);
Route::post('/api/cadastro/clube/finalizar', [CadastroClubeController::class, 'store']);

// Verificações de disponibilidade
Route::post('/api/check-nome-disponibilidade', [CadastroClubeController::class, 'checkNomeDisponibilidade']);
Route::post('/api/check-email-disponibilidade', [CadastroClubeController::class, 'checkEmailDisponibilidade']);
Route::post('/api/check-cnpj-disponibilidade', [CadastroClubeController::class, 'checkCnpjDisponibilidade']);

// Sessão do cadastro
Route::get('/api/cadastro/dados-sessao', [CadastroClubeController::class, 'getDadosSessao']);
Route::delete('/api/cadastro/limpar-sessao', [CadastroClubeController::class, 'limparSessao']);

// ========== ROTAS PROTEGIDAS (DASHBOARD) ==========
// Usando middleware auth padrão do Laravel
Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashClub', function () {
        return view('dashClub/dashClub');
    })->name('DashClub');

    Route::get('/perfil', function () {
        return view('dashClub/perfilClub');
    })->name('Perfil');

    // NOVA ROTA INTEGRADA - Pesquisa com dados dinâmicos
    Route::get('/pesquisa', function () {
        return view('dashClub/pesquisaClub');
    })->name('Pesquisa');

    Route::get('/mensagens', function () {
        return view('dashClub/mensagemClub');
    })->name('Mensagens');

    Route::get('/oportunidades', function () {
        return view('dashClub/oportunidadesClub');
    })->name('Oportunidades');

    Route::get('/notificacao', function () {
        return view('dashClub/notificaçaoClub');
    })->name('notificações');

    Route::get('/lista', function () {
        return view('dashClub/listaClub');
    })->name('lista');

    Route::get('/configuracao', function () {
        return view('dashClub/configuraçoesClub');
    })->name('Configurações');

 Route::get('/api/usuarios/sugestoes', [App\Http\Controllers\SearchUsuarioController::class, 'sugestoes'])
         ->name('api.usuarios.sugestoes');

         Route::delete('/api/conta/delete', [ContaController::class, 'destroyAccount'])->name('conta.delete');

         
    Route::put('/api/conta/update-email', [ContaController::class, 'updateEmail'])->name('conta.update.email');
    Route::put('/api/conta/update-password', [ContaController::class, 'updatePassword'])->name('conta.update.password');

    // Rotas do ClubeController
    Route::put('/clube/update-info', [ClubeController::class, 'updateInfo'])->name('clube.updateInfo');
    Route::put('/clube/update-password', [ClubeController::class, 'updatePassword'])->name('clube.updatePassword');
});

// ========== ROTAS DE API PARA BUSCA DE USUÁRIOS ==========
// PRINCIPAL: Rota integrada para busca de usuários
Route::get('/api/search-usuarios', [SearchUsuarioController::class, 'index'])->name('api.search.usuarios');

// Rota para buscar posições (para os filtros)
Route::get('/api/posicoes', [PosicaoController::class, 'index'])->name('api.posicoes');

// Rotas adicionais de posições (se necessário)
Route::get('/api/posicoes/{id}', [PosicaoController::class, 'show'])->name('api.posicoes.show');
Route::post('/api/posicoes', [PosicaoController::class, 'store'])->name('api.posicoes.store');
Route::put('/api/posicoes/{id}', [PosicaoController::class, 'update'])->name('api.posicoes.update');
Route::delete('/api/posicoes/{id}', [PosicaoController::class, 'destroy'])->name('api.posicoes.destroy');

// ========== ROTAS DE API PARA USUÁRIOS (EXISTENTES) ==========
Route::get('/usuarios', [UserController::class, 'index']);

// ========== ROTAS DE TESTE E DEBUG ==========
Route::get('/teste-login', function () {
    return view('teste-login');
})->name('teste.login');

// Rota para testar Auth diretamente
Route::get('/teste-auth', function () {
    return response()->json([
        'auth_check' => Auth::check(),
        'auth_id' => Auth::id(),
        'auth_user' => Auth::user() ? [
            'id' => Auth::user()->id,
            'nome' => Auth::user()->nomeClube ?? 'N/A',
            'email' => Auth::user()->emailClube ?? 'N/A',
            'esporte' => Auth::user()->esporteClube ?? Auth::user()->esporte ?? 'N/A',
        ] : null,
        'guard' => Auth::getDefaultDriver(),
        'provider' => config('auth.providers.clubes.model') ?? config('auth.providers.users.model'),
    ]);
})->name('teste.auth');

// Rota para forçar login (apenas para debug)
Route::get('/force-login/{id}', function ($id) {
    if (!config('app.debug')) {
        abort(404);
    }
    
    $clube = \App\Models\Clube::find($id);
    if ($clube) {
        Auth::login($clube);
        return redirect('/perfil')->with('success', 'Login forçado realizado! Auth::check() = ' . (Auth::check() ? 'true' : 'false'));
    }
    
    return redirect('/login')->with('error', 'Clube não encontrado.');
})->name('force.login');

// ========== ROTAS DE TESTE DA INTEGRAÇÃO ==========
// Rota para testar a API de busca diretamente
Route::get('/teste-busca', function () {
    return response()->json([
        'message' => 'API de busca funcionando!',
        'endpoint' => '/api/search-usuarios',
        'controller' => 'SearchUsuarioController@index',
        'timestamp' => now()->toISOString(),
    ]);
})->name('teste.busca');

// Rota para testar posições
Route::get('/teste-posicoes', function () {
    try {
        $posicoes = \App\Models\Posicao::select('id', 'nomePosicao')->limit(5)->get();
        return response()->json([
            'message' => 'API de posições funcionando!',
            'total_posicoes' => $posicoes->count(),
            'posicoes' => $posicoes,
            'endpoint' => '/api/posicoes',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Erro ao buscar posições',
            'message' => $e->getMessage(),
            'suggestion' => 'Verifique se a tabela posicoes existe e tem dados',
        ], 500);
    }
})->name('teste.posicoes');

// Rota para testar usuários
Route::get('/teste-usuarios', function () {
    try {
        $usuarios = \App\Models\Usuario::select('id', 'nomeCompletoUsuario', 'emailUsuario')
                                      ->limit(5)
                                      ->get();
        return response()->json([
            'message' => 'Tabela de usuários funcionando!',
            'total_usuarios' => $usuarios->count(),
            'usuarios' => $usuarios,
            'endpoint' => '/api/search-usuarios',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Erro ao buscar usuários',
            'message' => $e->getMessage(),
            'suggestion' => 'Verifique se a tabela usuarios existe e tem dados',
        ], 500);
    }
})->name('teste.usuarios');

// ========== ROTAS PARA AÇÕES DOS USUÁRIOS ==========
// Rotas que serão chamadas pelos botões "Ver perfil" e "Contatar"
Route::middleware(['auth'])->group(function () {
    
    // Ver perfil de um usuário específico
    Route::get('/usuario/{id}', function ($id) {
        try {
            $usuario = \App\Models\Usuario::with('posicoes')->findOrFail($id);
            
            // Por enquanto, retorna JSON. Depois pode ser uma view
            return response()->json([
                'usuario' => $usuario,
                'message' => 'Perfil do usuário carregado com sucesso'
            ]);
            
            // Futuramente: return view('usuario.perfil', compact('usuario'));
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Usuário não encontrado',
                'message' => $e->getMessage()
            ], 404);
        }
    })->name('usuario.perfil');

    // Iniciar conversa com um usuário
    Route::get('/contatar/{id}', function ($id) {
        try {
            $usuario = \App\Models\Usuario::findOrFail($id);
            
            // Por enquanto, retorna JSON. Depois pode redirecionar para mensagens
            return response()->json([
                'message' => 'Funcionalidade de contato será implementada',
                'usuario' => [
                    'id' => $usuario->id,
                    'nome' => $usuario->nomeCompletoUsuario,
                    'email' => $usuario->emailUsuario,
                ],
                'next_step' => 'Implementar sistema de mensagens'
            ]);
            
            // Futuramente: return redirect()->route('mensagens.nova', ['usuario' => $id]);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Usuário não encontrado',
                'message' => $e->getMessage()
            ], 404);
        }
    })->name('usuario.contatar');
});

Route::middleware(['auth'])->group(function () {
    
   Route::get('/api/oportunidades/minhas', [OportunidadeController::class, 'minhasOportunidades'])
        ->name('api.oportunidades.minhas');

    /**
     * Buscar esportes para formulários (GET)
     * Método: getEsportes() - MÉTODO ADICIONADO
     */
    Route::get('/api/oportunidades/esportes', [OportunidadeController::class, 'getEsportes'])
        ->name('api.oportunidades.esportes');

    /**
     * Buscar posições para formulários (GET)
     * Método: getPosicoes() - MÉTODO ADICIONADO
     */
    Route::get('/api/oportunidades/posicoes', [OportunidadeController::class, 'getPosicoes'])
        ->name('api.oportunidades.posicoes');

    /**
     * Estatísticas das oportunidades do clube (GET)
     * Método: estatisticas() - MÉTODO ADICIONADO
     */
    Route::get('/api/oportunidades/estatisticas', [OportunidadeController::class, 'estatisticas'])
        ->name('api.oportunidades.estatisticas');

    // ========== ROTAS GENÉRICAS POR ÚLTIMO ==========
    
    /**
     * ⚠️ ESTAS ROTAS DEVEM VIR DEPOIS DAS ROTAS ESPECÍFICAS
     */
    
    /**
     * Criar nova oportunidade (POST)
     * Método: store() - SEU MÉTODO ORIGINAL
     */
    Route::post('/api/oportunidades', [OportunidadeController::class, 'store'])
        ->name('api.oportunidades.store');

    /**
     * Mostrar oportunidade específica (GET)
     * Método: show() - SEU MÉTODO ORIGINAL
     * ⚠️ ESTA DEVE VIR POR ÚLTIMO ENTRE AS ROTAS GET
     */
    Route::get('/api/oportunidades/{id}', [OportunidadeController::class, 'show'])
        ->name('api.oportunidades.show');

    /**
     * Atualizar oportunidade (PUT)
     * Método: update() - SEU MÉTODO ORIGINAL
     */
    Route::put('/api/oportunidades/{id}', [OportunidadeController::class, 'update'])
        ->name('api.oportunidades.update');

    /**
     * Deletar oportunidade (DELETE)
     * Método: destroy() - SEU MÉTODO ORIGINAL
     */
    Route::delete('/api/oportunidades/{id}', [OportunidadeController::class, 'destroy'])
        ->name('api.oportunidades.destroy');
});

// ========== ROTA PÚBLICA (SEM AUTENTICAÇÃO) ==========

/**
 * Listar todas as oportunidades (busca geral) (GET)
 * Método: index() - SEU MÉTODO ORIGINAL
 */
Route::get('/api/oportunidades', [OportunidadeController::class, 'index'])
    ->name('api.oportunidades.index');

    Route::get('/admin', function () {
    return view('loginAdmin'); 
})->name('loginAdmin');

Route::get('/dashboard/index', function () {
    return view('dashboard.index');
});

Route::get('/dashboard/oportunidades', function () {
    return view('dashboard.oportunidades');
});

Route::get('/dashboard/esporte', function () {
    return view('dashboard.esportes');
});

Route::get('/dashboard/usuarios', function () {
    return view('dashboard.usuarios');
})->name('dashboard.usuarios');

Route::apiResource('esportes', EsporteController::class);