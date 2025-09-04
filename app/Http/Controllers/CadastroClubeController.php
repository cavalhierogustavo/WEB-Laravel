<?php

namespace App\Http\Controllers;

use App\Models\Clube; // <-- IMPORTANTE: Precisamos do Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // <-- Para criptografar a senha
use Carbon\Carbon; // <-- Para formatar a data

class CadastroClubeController extends Controller
{
    // MOSTRAR VIEW DO PASSO 1
    public function createStep1()
    {
        $clube = session()->get('clube');
        return view('cadastro.step1', compact('clube'));
    }

    // PROCESSAR DADOS DO PASSO 1
    public function postStep1(Request $request)
    {
        $validatedData = $request->validate([
            'nomeClube' => 'required|string|max:255',
            'anoCriacaoClube' => 'required|date_format:d/m/Y',
            'interesse' => 'required|string',
            'esporte' => 'required|string',
            'estadoClube' => 'required|string|max:255',
            'cidadeClube' => 'required|string|max:255',
        ]);
        
        // Se a sessão já existe, mescla os dados, senão, cria uma nova
        $clube = $request->session()->get('clube');
        $clube = $clube ? array_merge($clube, $validatedData) : $validatedData;
        $request->session()->put('clube', $clube);

        return redirect()->route('clubes.create.step2');
    }

    // MOSTRAR VIEW DO PASSO 2
    public function createStep2()
    {
        $clube = session()->get('clube');
        return view('cadastro.step2', compact('clube'));
    }

    // PROCESSAR DADOS DO PASSO 2
    public function postStep2(Request $request)
    {
        $validatedData = $request->validate([
            'categoria' => 'required|string',
            'cnpjClube' => 'required|string|max:20|unique:clubes,cnpjClube',
            'enderecoClube' => 'required|string|max:255',
            'bioClube' => 'nullable|string',
        ]);

        $clubeData = $request->session()->get('clube');
        $clubeData = array_merge($clubeData, $validatedData);
        $request->session()->put('clube', $clubeData);

        return redirect()->route('clubes.create.step3');
    }

    // MOSTRAR VIEW DO PASSO 3 (agora carrega a view de verdade)
    public function createStep3()
    {
        $clube = session()->get('clube');
        // Substituímos o placeholder pela view!
        return view('cadastro.step3', compact('clube'));
    }
     public function showSuccessPage()
    {
        return view('final'); // Mostra o arquivo final.blade.php
    }

    /**
     * Valida os dados finais, junta tudo e SALVA NO BANCO DE DADOS.
     */
    public function store(Request $request)
    {
        // 1. Valida os dados do último formulário
        $validatedData = $request->validate([
            'email' => 'required|email|unique:clubes,email',
            'senhaClube' => 'required|string|min:8|confirmed',
        ]);

        // 2. Pega todos os dados da sessão (passos 1 e 2)
        $clubeData = $request->session()->get('clube');
        
        // 3. Junta com os dados do passo final
        $allClubeData = array_merge($clubeData, $validatedData);

        // 4. Prepara os dados para o banco
        $allClubeData['anoCriacaoClube'] = Carbon::createFromFormat('d/m/Y', $allClubeData['anoCriacaoClube'])->format('Y-m-d');
        $allClubeData['senhaClube'] = Hash::make($allClubeData['senhaClube']);

        // 5. SALVA TUDO NO BANCO DE DADOS USANDO O MODEL!
        Clube::create($allClubeData);

        // 6. Limpa a sessão
        $request->session()->forget('clube');

        // 7. Redireciona para uma página de sucesso
        return redirect()->route('clubes.success');
    }
}