@extends('layouts.app')

@section('title', 'Solicitar Remoção de Dados - Busca CNPJs')

@section('content')
<div class="bg-slate-50 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4">
        
        {{-- Cabeçalho da Página --}}
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-slate-900 mb-4">Solicitação de Remoção de Dados</h1>
            <p class="text-slate-600 max-w-2xl mx-auto">
                Utilize o formulário abaixo para solicitar a desindexação da sua empresa em nossa base de dados.
            </p>
        </div>

        {{-- Cartão Principal --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
            
            {{-- Aviso Legal (Background azul suave) --}}
            <div class="bg-blue-50 border-b border-blue-100 p-6 md:p-8">
                <div class="flex items-start gap-4">
                    <div class="text-blue-600 mt-1">
                        <i class="bi bi-info-circle-fill text-xl"></i>
                    </div>
                    <div class="text-sm text-blue-900 leading-relaxed space-y-2">
                        <p>
                            <strong>Informação Importante:</strong> Os dados exibidos neste site são de origem pública, provenientes da base de Dados Abertos da Receita Federal, conforme autorizado pela 
                            <a href="https://www.planalto.gov.br/ccivil_03/_ato2019-2022/2021/lei/l14129.htm" target="_blank" rel="nofollow noopener" class="underline hover:text-blue-700">Lei nº 14.129/2021 (Governo Digital)</a>.
                        </p>
                        <p>
                            A remoção neste site é um ato de <strong>liberalidade e cortesia</strong> e não implica na exclusão do registro oficial junto à Receita Federal ou outros órgãos governamentais.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Formulário --}}
            <div class="p-6 md:p-8">
                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-4 rounded-lg mb-6 flex items-center gap-3">
                        <i class="bi bi-check-circle-fill text-xl"></i>
                        <div>
                            <p class="font-bold">Solicitação Confirmada!</p>
                            <p class="text-sm">Os dados foram removidos da nossa exibição pública.</p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('home') }}" class="text-blue-600 font-semibold hover:underline">Voltar para a Home</a>
                    </div>
                @else
                    {{-- Exibição de Erros de Validação --}}
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('remocao.store', ['cnpj' => $cnpj]) }}" method="POST" class="space-y-6">
                        @csrf
                        
                        {{-- Campo CNPJ (Somente Leitura) --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">CNPJ a ser removido</label>
                            <input type="text" value="{{ $cnpj_formatado ?? $cnpj }}" disabled class="w-full bg-slate-100 border border-slate-300 text-slate-500 rounded-lg px-4 py-2 cursor-not-allowed">
                        </div>

                        {{-- Nome do Responsável --}}
                        <div class="space-y-1">
                            <label for="nome_responsavel" class="block text-sm font-medium text-slate-700">Nome do responsável</label>
                            <input type="text" name="nome_responsavel" id="nome_responsavel" required value="{{ old('nome_responsavel') }}" class="w-full border border-slate-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Digite seu nome completo">
                        </div>

                        {{-- Checkboxes Obrigatórios (Trazidos do seu arquivo original) --}}
                        <div class="space-y-4 pt-2">
                            <p class="text-sm font-semibold text-slate-900">Confirmações obrigatórias:</p>
                            
                            <label class="flex items-start gap-3 cursor-pointer p-3 rounded-lg hover:bg-slate-50 border border-transparent hover:border-slate-200 transition-colors">
                                <input type="checkbox" name="confirmou_nao_divulgamos" value="1" required class="mt-1 w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500" {{ old('confirmou_nao_divulgamos') ? 'checked' : '' }}>
                                <span class="text-sm text-slate-600 leading-snug">
                                    Estou ciente de que o site <strong>não divulga</strong> nome, endereço ou qualquer contato pessoal (telefone ou e-mail) dos sócios/titulares.
                                </span>
                            </label>

                            <label class="flex items-start gap-3 cursor-pointer p-3 rounded-lg hover:bg-slate-50 border border-transparent hover:border-slate-200 transition-colors">
                                <input type="checkbox" name="ciente_dados_publicos" value="1" required class="mt-1 w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500" {{ old('ciente_dados_publicos') ? 'checked' : '' }}>
                                <span class="text-sm text-slate-600 leading-snug">
                                    Estou ciente de que os dados são públicos e podem ser consultados por qualquer pessoa diretamente no site da Receita Federal.
                                </span>
                            </label>

                            <label class="flex items-start gap-3 cursor-pointer p-3 rounded-lg hover:bg-slate-50 border border-transparent hover:border-slate-200 transition-colors">
                                <input type="checkbox" name="ciente_prazo_busca" value="1" required class="mt-1 w-4 h-4 text-blue-600 rounded border-gray-300 focus:ring-blue-500" {{ old('ciente_prazo_busca') ? 'checked' : '' }}>
                                <span class="text-sm text-slate-600 leading-snug">
                                    Entendo que a retirada deste resultado de mecanismos de busca como o Google pode levar alguns dias ou semanas (cache do Google).
                                </span>
                            </label>
                        </div>

                        {{-- Botão de Ação --}}
                        <div class="pt-4">
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg transition shadow-md flex items-center justify-center gap-2 cursor-pointer">
                                <i class="bi bi-trash"></i>
                                Confirmar Remoção
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        {{-- Link de Voltar --}}
        <div class="text-center mt-8">
            <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-blue-600 font-medium transition">
                &larr; Voltar para a Página Inicial
            </a>
        </div>
    </div>
</div>
@endsection