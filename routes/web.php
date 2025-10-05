<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroClubeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\ProfileController;


// Rota para MOSTRAR o formulário do passo 1
// É ESTA ROTA QUE O USUÁRIO DEVE ACESSAR PARA COMEÇAR
Route::get('/cadastro/clube/passo-1', [CadastroClubeController::class, 'createStep1'])->name('clubes.create.step1');
Route::post('/cadastro/clube/passo-1', [CadastroClubeController::class, 'postStep1'])->name('clubes.post.step1');
Route::get('/cadastro/clube/passo-2', [CadastroClubeController::class, 'createStep2'])->name('clubes.create.step2');

// --- ADICIONE ESTAS ROTAS ---

// Rota para PROCESSAR os dados do passo 2
Route::post('/cadastro/clube/passo-2', [CadastroClubeController::class, 'postStep2'])->name('clubes.post.step2');

// Rota para MOSTRAR o formulário do passo 3 (final)
Route::get('/cadastro/clube/passo-3', [CadastroClubeController::class, 'createStep3'])->name('clubes.create.step3');


// Rota para PROCESSAR TUDO e salvar no banco
Route::post('/cadastro/clube/passo-3', [CadastroClubeController::class, 'store'])->name('clubes.store');

// Rota de Sucesso

Route::get('/cadastro/sucesso', [CadastroClubeController::class, 'showSuccessPage'])->name('clubes.success');

// Rota de Login: Uma nova rota para a sua página de login.
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rota para PROCESSAR o formulário de login que você enviou
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Rota para fazer o LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return "<h1>Bem-vindo ao Dashboard!</h1> <form action='/logout' method='post'> @csrf <button type='submit'>Sair</button></form>";
})->middleware('auth'); // <-- O middleware 'auth' protege a rota

Route::get('/dashboard/index', function () {
    return view('dashboard.index');
});

Route::get('/dashboard/usuarios', function () {
    return view('dashboard.usuarios');
})->name('dashboard.usuarios');




Route::get('/perfi', function () {
    return view('dashClub/perfilClub');
})->name('perfil');

Route::get('/clube', function () {
    return view('mensagem.clube');
})->name('clube');

Route::get('/mensagem', function () {
    return view('mensagem.mensagem');
})->name('mensagem');

Route::get('/nlidas', function () {
    return view('mensagem.nlidas'); 
})->name('nlidas');

Route::get('/info', function () {
    return view('clube.info'); 
})->name('info');

Route::get('/feed', function () {
    return view('clube.feed'); 
})->name('feed');

Route::get('/confi', function () {
    return view('confi'); 
})->name('confi');

Route::get('/mensagens', function () {
    return view('dashClub/mensagemClub'); 
})->middleware('auth')->name('Mensagens');

Route::get('/perfil', function () {
    return view('dashClub/perfilClub');
})->middleware('auth')->name('Perfil');

Route::get('/pesquisa', function () {
    return view('dashClub/pesquisaClub');
})->middleware('auth')->name('Pesquisa');

Route::get('/dashClub', function () {
    return view('dashClub/dashClub');
})->middleware('auth')->name('DashClub');

Route::get('/oportunidades', function () {
    return view('dashClub/oportunidadesClub');
})->middleware('auth')->name('Oportunidades');

Route::get('/notificaçao', function () {
    return view('dashClub/notificaçaoClub');
})->middleware('auth')->name('notificações');

Route::get('/lista', function () {
    return view('dashClub/listaClub');
})->middleware('auth')->name('lista');

Route::get('/configuracao', function () {
    return view('dashClub/configuraçoesClub');
})->middleware('auth')->name('Configurações');


// Rota para a aba "Social"
Route::get('/social', function () {
    return '<h1>Página Social</h1>'; // Placeholder
})->middleware('auth')->name('social');

Route::get('/clube', function () {
    return view('mensagem.clube'); // Usando a notação de ponto para a subpasta
})->middleware('auth')->name('clube'); // Protegida e com o nome 'clube'

// Nova rota para processar a atualização do perfil do clube via modal
Route::put('/clube', [ClubeController::class, 'update'])->middleware('auth')->name('clube.update');

Route::put('/clube/update-info', [ClubeController::class, 'updateInfo'])
    ->middleware('auth') // Garante que apenas usuários logados possam acessar
    ->name('clube.updateInfo');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// NOVA ROTA PARA EXCLUIR A CONTA
Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');