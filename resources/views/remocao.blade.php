@extends('layouts.app')

@section('content')
<section class="max-w-3xl mx-auto px-4 py-12 space-y-6">
    <div class="space-y-2 text-center">
        <p class="text-sm font-semibold text-blue-700">LGPD</p>
        <h1 class="text-3xl font-bold text-slate-900">Solicitar Remoção de Dados</h1>
        <p class="text-slate-600">Confirme os avisos abaixo para que possamos retirar este CNPJ da consulta pública.</p>
    </div>
    <div class="bg-white border border-slate-200 shadow-sm rounded-xl p-6 space-y-6">
        <div class="space-y-1">
            <p class="text-sm text-slate-600">CNPJ selecionado</p>
            <p class="text-xl font-semibold text-slate-900">{{ $cnpj_formatado }}</p>
            <p class="text-xs text-slate-500">Baseado em informações públicas do <a href="https://dados.gov.br/dados/conjuntos-dados/cadastro-nacional-da-pessoa-juridica---cnpj" class="text-blue-600 hover:underline" target="_blank" rel="noopener">Cadastro Nacional da Pessoa Jurídica</a>.</p>
        </div>

        <div class="rounded-lg border border-blue-100 bg-blue-50 px-4 py-3 space-y-2 text-sm text-slate-700">
            <p class="font-semibold text-blue-900">Antes de prosseguir:</p>
            <ul class="list-disc list-inside space-y-1">
                <li>Seguimos a LGPD (Lei n° 13.709/2018) e as diretrizes da Lei n° 14.129/2021 para governo digital.</li>
                <li>Os dados exibidos são públicos e também podem ser consultados diretamente na Receita Federal.</li>
                <li>Remover resultados de mecanismos de busca, como o Google, pode levar até 14 dias após a solicitação.</li>
            </ul>
        </div>

        @if ($errors->any())
            <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-5" action="{{ route('remocao.store', ['cnpj' => $cnpj]) }}" method="POST">
            @csrf
            <div class="space-y-2">
                <label for="nome_responsavel" class="block text-sm font-medium text-slate-700">Nome do responsável</label>
                <input id="nome_responsavel" name="nome_responsavel" type="text" placeholder="Seu nome completo" value="{{ old('nome_responsavel') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" required>
            </div>

            <div class="space-y-3">
                <label class="text-sm font-medium text-slate-700">Confirmações obrigatórias</label>
                <div class="space-y-2">
                    <label class="flex items-start gap-3 text-sm text-slate-700">
                        <input type="checkbox" name="confirmou_nao_divulgamos" value="1" class="mt-1 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500" {{ old('confirmou_nao_divulgamos') ? 'checked' : '' }} required>
                        <span>Estou ciente de que não divulgamos nome, endereço ou qualquer contato (telefone ou e-mail) do titular deste CNPJ.</span>
                    </label>
                    <label class="flex items-start gap-3 text-sm text-slate-700">
                        <input type="checkbox" name="ciente_dados_publicos" value="1" class="mt-1 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500" {{ old('ciente_dados_publicos') ? 'checked' : '' }} required>
                        <span>Estou ciente de que os dados são públicos e podem ser consultados por qualquer pessoa diretamente no site da Receita Federal.</span>
                    </label>
                    <label class="flex items-start gap-3 text-sm text-slate-700">
                        <input type="checkbox" name="ciente_prazo_busca" value="1" class="mt-1 h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500" {{ old('ciente_prazo_busca') ? 'checked' : '' }} required>
                        <span>Entendo que a retirada deste resultado de mecanismos de busca como o Google pode levar até 14 dias.</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold px-4 py-3 rounded-lg shadow hover:bg-blue-700 transition">
                <i class="bi bi-send"></i>
                Confirmar remoção
            </button>
        </form>
        <p class="text-xs text-slate-500">Processaremos sua solicitação conforme as bases legais de transparência de dados públicos e proteção de dados pessoais.</p>
    </div>
</section>
@endsection
