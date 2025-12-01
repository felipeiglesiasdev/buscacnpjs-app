@extends('layouts.app')

@push('seo')
    @include('components.cnpj.tags', ['data' => $data])
@endpush

@section('content')
<section class="bg-gradient-to-b from-blue-50 via-white to-white border-b border-slate-200">
    <div class="max-w-5xl mx-auto px-4 py-10 space-y-6">
        <div class="space-y-2">
            <p class="text-sm font-semibold text-blue-700">CNPJ {{ $data['cnpj_completo'] ?? '' }}</p>
            <h1 class="text-3xl font-bold text-slate-900">{{ $data['razao_social'] ?? 'Empresa não encontrada' }}</h1>
            <p class="text-slate-600">Exibimos apenas dados públicos essenciais. Contatos, endereço completo e quadro societário foram ocultados em respeito à LGPD.</p>
        </div>
        <div class="grid gap-4 md:grid-cols-2">
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-3">
                <div class="flex items-center gap-2 text-slate-500 text-sm">
                    <i class="bi bi-building"></i>
                    <span>Informações básicas</span>
                </div>
                <dl class="grid grid-cols-1 gap-2 text-sm text-slate-700">
                    <div>
                        <dt class="font-semibold text-slate-900">CNPJ</dt>
                        <dd>{{ $data['cnpj_completo'] ?? 'Não informado' }}</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-slate-900">Nome Fantasia</dt>
                        <dd>{{ $data['nome_fantasia'] ?? 'Não informado' }}</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-slate-900">Natureza Jurídica</dt>
                        <dd>{{ $data['natureza_juridica'] ?? 'Não informado' }}</dd>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <dt class="font-semibold text-slate-900">Porte</dt>
                            <dd>{{ $data['porte'] ?? 'Não informado' }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-slate-900">Matriz/Filial</dt>
                            <dd>{{ $data['matriz_ou_filial'] ?? 'Não informado' }}</dd>
                        </div>
                    </div>
                    <div>
                        <dt class="font-semibold text-slate-900">Data de Abertura</dt>
                        <dd>{{ $data['data_abertura'] ?? 'Não informado' }}</dd>
                    </div>
                </dl>
            </div>
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-3">
                <div class="flex items-center gap-2 text-slate-500 text-sm">
                    <i class="bi bi-shield-check"></i>
                    <span>Situação Cadastral</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-sm font-medium {{ $data['situacao_cadastral_classe'] ?? 'bg-slate-100 text-slate-700' }}">
                        {{ $data['situacao_cadastral'] ?? 'Não informado' }}
                    </span>
                    <p class="text-sm text-slate-600">Atualizada em {{ $data['data_situacao_cadastral'] ?? 'Não informado' }}</p>
                </div>
                <div class="pt-2 border-t border-slate-100 text-sm text-slate-600">
                    <p>Atividades econômicas principais e secundárias são exibidas abaixo. Dados de contato e endereço completo estão ocultos.</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-3">
            <div class="flex items-center gap-2 text-slate-500 text-sm">
                <i class="bi bi-briefcase"></i>
                <span>Atividades econômicas</span>
            </div>
            <div class="grid gap-2 text-sm text-slate-700">
                <div>
                    <p class="font-semibold text-slate-900">CNAE Principal</p>
                    <p>{{ $data['cnae_principal']['codigo'] ?? 'Não informado' }} - {{ $data['cnae_principal']['descricao'] ?? '' }}</p>
                </div>
                @if(!empty($data['cnaes_secundarios']))
                    <div>
                        <p class="font-semibold text-slate-900">CNAEs Secundários</p>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($data['cnaes_secundarios'] as $cnae)
                                <li>{{ $cnae['codigo'] }} - {{ $cnae['descricao'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 space-y-3">
            <div class="flex items-center gap-2 text-slate-500 text-sm">
                <i class="bi bi-geo-alt"></i>
                <span>Localização (dados reduzidos)</span>
            </div>
            <p class="text-sm text-slate-700">Cidade/UF: <span class="font-semibold text-slate-900">{{ $data['cidade_uf'] ?? 'Não informado' }}</span></p>
            <p class="text-xs text-slate-500">Endereço completo, telefones e e-mails não são exibidos para proteger a privacidade.</p>
        </div>
        <div class="bg-blue-50 border border-blue-100 rounded-xl p-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="space-y-1">
                <p class="text-sm font-semibold text-blue-700">LGPD</p>
                <p class="text-lg font-bold text-slate-900">Deseja remover seus dados desta consulta?</p>
                <p class="text-sm text-slate-600">Se você é responsável por este CNPJ, solicite a remoção das informações apresentadas.</p>
            </div>
            <a href="{{ route('remocao.show', ['cnpj' => $data['cnpj_limpo']]) }}" class="inline-flex items-center justify-center gap-2 px-4 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 shadow cursor-pointer">
                <i class="bi bi-shield-lock"></i>
                Solicitar Remoção de Dados
            </a>
        </div>
    </div>
</section>
@endsection
