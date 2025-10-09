<?php

namespace App\Http\Controllers;

use App\Models\Clube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CadastroClubeController extends Controller
{
    /**
     * Mostrar view do passo 1
     */
    public function createStep1()
    {
        return view('cadastro.step1');
    }

    /**
     * API: Processar dados do passo 1
     */
    public function postStep1(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nomeClube' => 'required|string|max:255|unique:clubes,nomeClube',
                'anoCriacaoClube' => 'required|date_format:Y-m-d',
                'interesseClube' => 'required|string|in:Recrutamento,Competição,Lazer',
                'esporteClube' => 'required|string|in:Futebol,Vôlei,Basquete,Tênis,Natação,Atletismo',
                'estadoClube' => 'required|string|max:255',
                'cidadeClube' => 'required|string|max:255',
            ], [
                'nomeClube.required' => 'O nome do clube é obrigatório.',
                'nomeClube.unique' => 'Este nome de clube já está em uso.',
                'anoCriacaoClube.required' => 'O ano de criação é obrigatório.',
                'anoCriacaoClube.date_format' => 'O formato da data deve ser YYYY-MM-DD.',
                'interesseClube.required' => 'O interesse do clube é obrigatório.',
                'interesseClube.in' => 'Interesse inválido.',
                'esporteClube.required' => 'O esporte é obrigatório.',
                'esporteClube.in' => 'Esporte inválido.',
                'estadoClube.required' => 'O estado é obrigatório.',
                'cidadeClube.required' => 'A cidade é obrigatória.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $validatedData = $validator->validated();
            
            // Salvar na sessão
            $clube = $request->session()->get('clube_cadastro', []);
            $clube = array_merge($clube, $validatedData);
            $request->session()->put('clube_cadastro', $clube);

            return response()->json([
                'success' => true,
                'message' => 'Dados do passo 1 salvos com sucesso.',
                'data' => $validatedData,
                'next_step' => route('clubes.create.step2')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar view do passo 2
     */
    public function createStep2()
    {
        $clube = session()->get('clube_cadastro');
        
        if (!$clube) {
            return redirect()->route('clubes.create.step1')
                ->with('error', 'Complete o passo 1 primeiro.');
        }

        return view('cadastro.step2', compact('clube'));
    }

    /**
     * API: Processar dados do passo 2
     */
    public function postStep2(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'categoriaClube' => 'required|string|in:Profissional,Semi-profissional,Amador,Juvenil,Infantil',
                'cnpjClube' => 'required|string|size:18|unique:clubes,cnpjClube',
                'enderecoClube' => 'required|string|max:500',
                'bioClube' => 'nullable|string|max:1000',
            ], [
                'categoriaClube.required' => 'A categoria do clube é obrigatória.',
                'categoriaClube.in' => 'Categoria inválida.',
                'cnpjClube.required' => 'O CNPJ é obrigatório.',
                'cnpjClube.size' => 'O CNPJ deve ter 18 caracteres (formato: XX.XXX.XXX/XXXX-XX).',
                'cnpjClube.unique' => 'Este CNPJ já está cadastrado.',
                'enderecoClube.required' => 'O endereço é obrigatório.',
                'enderecoClube.max' => 'O endereço não pode ter mais de 500 caracteres.',
                'bioClube.max' => 'A biografia não pode ter mais de 1000 caracteres.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $validatedData = $validator->validated();
            
            // Verificar se existe dados do passo 1
            $clubeData = $request->session()->get('clube_cadastro');
            if (!$clubeData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Dados do passo 1 não encontrados. Reinicie o cadastro.'
                ], 400);
            }

            // Mesclar dados
            $clubeData = array_merge($clubeData, $validatedData);
            $request->session()->put('clube_cadastro', $clubeData);

            return response()->json([
                'success' => true,
                'message' => 'Dados do passo 2 salvos com sucesso.',
                'data' => $validatedData,
                'next_step' => route('clubes.create.step3')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro interno do servidor.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mostrar view do passo 3
     */
    public function createStep3()
    {
        $clube = session()->get('clube_cadastro');
        
        if (!$clube || !isset($clube['categoriaClube'])) {
            return redirect()->route('clubes.create.step1')
                ->with('error', 'Complete os passos anteriores primeiro.');
        }

        return view('cadastro.step3', compact('clube'));
    }

    /**
     * API: Finalizar cadastro e salvar no banco
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'emailClube' => 'required|email|max:255|unique:clubes,emailClube',
                'senhaClube' => 'required|string|min:8|confirmed',
            ], [
                'emailClube.required' => 'O email é obrigatório.',
                'emailClube.email' => 'O email deve ter um formato válido.',
                'emailClube.unique' => 'Este email já está cadastrado.',
                'senhaClube.required' => 'A senha é obrigatória.',
                'senhaClube.min' => 'A senha deve ter pelo menos 8 caracteres.',
                'senhaClube.confirmed' => 'A confirmação da senha não confere.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $validatedData = $validator->validated();
            
            // Pegar todos os dados da sessão
            $clubeData = $request->session()->get('clube_cadastro');
            if (!$clubeData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Dados do cadastro não encontrados. Reinicie o processo.'
                ], 400);
            }

            // Mesclar dados finais
            $allClubeData = array_merge($clubeData, $validatedData);

            // Criptografar senha

            // Criar o clube no banco de dados
            $clube = Clube::create($allClubeData);

            // Limpar sessão
            $request->session()->forget('clube_cadastro');

            return response()->json([
                'success' => true,
                'message' => 'Clube cadastrado com sucesso!',
                'data' => [
                    'clube_id' => $clube->id,
                    'nome' => $clube->nomeClube,
                    'email' => $clube->emailClube
                ],
                'redirect' => route('login')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar clube.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Página de sucesso
     */
    public function showSuccessPage()
    {
        return view('cadastro.success');
    }

    /**
     * API: Verificar disponibilidade de nome do clube
     */
    public function checkNomeDisponibilidade(Request $request)
    {
        $nome = $request->input('nome');
        
        if (!$nome) {
            return response()->json([
                'available' => false,
                'message' => 'Nome é obrigatório.'
            ]);
        }

        $exists = Clube::where('nomeClube', $nome)->exists();
        
        return response()->json([
            'available' => !$exists,
            'message' => $exists ? 'Nome já está em uso.' : 'Nome disponível.'
        ]);
    }

    /**
     * API: Verificar disponibilidade de email
     */
    public function checkEmailDisponibilidade(Request $request)
    {
        $email = $request->input('email');
        
        if (!$email) {
            return response()->json([
                'available' => false,
                'message' => 'Email é obrigatório.'
            ]);
        }

        $exists = Clube::where('emailClube', $email)->exists();
        
        return response()->json([
            'available' => !$exists,
            'message' => $exists ? 'Email já está em uso.' : 'Email disponível.'
        ]);
    }

    /**
     * API: Verificar disponibilidade de CNPJ
     */
    public function checkCnpjDisponibilidade(Request $request)
    {
        $cnpj = $request->input('cnpj');
        
        if (!$cnpj) {
            return response()->json([
                'available' => false,
                'message' => 'CNPJ é obrigatório.'
            ]);
        }

        $exists = Clube::where('cnpjClube', $cnpj)->exists();
        
        return response()->json([
            'available' => !$exists,
            'message' => $exists ? 'CNPJ já está em uso.' : 'CNPJ disponível.'
        ]);
    }

    /**
     * API: Obter dados salvos na sessão
     */
    public function getDadosSessao(Request $request)
    {
        $clube = $request->session()->get('clube_cadastro', []);
        
        return response()->json([
            'success' => true,
            'data' => $clube
        ]);
    }

    /**
     * API: Limpar dados da sessão
     */
    public function limparSessao(Request $request)
    {
        $request->session()->forget('clube_cadastro');
        
        return response()->json([
            'success' => true,
            'message' => 'Dados da sessão limpos.'
        ]);
    }
}
