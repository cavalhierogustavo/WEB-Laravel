<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchUsuarioController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\EsporteController;
// ✅ CORREÇÃO: Use o nome correto do controller.
use App\Http\Controllers\DashboardController; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você registra as rotas da sua API. Elas são automaticamente
| prefixadas com /api pelo Laravel.
|
*/

// Rota padrão do Laravel para obter o usuário autenticado via Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// --- ROTAS PÚBLICAS DA API ---

// Login do Administrador
Route::post('/login', [AdmController::class, 'loginAdm']);

// Rotas de busca e listagem
Route::get('/usuarios', [UserController::class, 'index']);
Route::get('/search-usuarios', [SearchUsuarioController::class, 'index']);

// Recurso de API para Esportes (ex: GET /api/esportes)
Route::apiResource('esportes', EsporteController::class);


// --- ROTAS DO DASHBOARD DO ADMIN ---
// ✅ CORREÇÃO: Apenas um bloco de rotas, usando o prefixo para organização.
// Todas as rotas aqui dentro começarão com /api/admin/dashboard/...
Route::prefix('admin/dashboard')->group(function () {
    Route::get('/stats', [DashboardController::class, 'getStats']);
    Route::get('/ultimas-oportunidades', [DashboardController::class, 'getUltimasOportunidades']);
    Route::get('/acoes-recentes', [DashboardController::class, 'getAcoesRecentes']);
});


// --- ROTAS PROTEGIDAS POR AUTENTICAÇÃO SANCTUM ---
// Este grupo serve de exemplo para rotas que precisariam de um token de API.
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/dashboard-posicoes', [DashboardController::class, 'getPosicoes']);
    Route::delete('/dashboard-remover-inscricao/{usuarioId}/{oportunidadeId}', [DashboardController::class, 'removerInscricao']);
});

