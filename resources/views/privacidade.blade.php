@extends('layouts.app')

@push('seo')
    @include('components.privacidade.tags')
@endpush

@section('content')
<section class="max-w-4xl mx-auto px-4 py-12 space-y-6">
    <div class="space-y-2">
        <p class="text-sm font-semibold text-blue-700">LGPD</p>
        <h1 class="text-3xl font-bold text-slate-900">Política de Privacidade</h1>
        <p class="text-slate-600">Entenda como tratamos e protegemos os dados apresentados em nossas consultas.</p>
    </div>
    <div class="bg-white border border-slate-200 shadow-sm rounded-xl p-6 space-y-4 text-slate-700 leading-relaxed">
        <p>Apresentamos somente informações de caráter público previstas na Lei nº 14.129/2021 (Governo Digital) e tratadas segundo a Lei Geral de Proteção de Dados (Lei nº 13.709/2018). Removemos nome, endereço completo, telefones e e-mails de exibição pública.</p>
        <p>Os registros são obtidos a partir das bases abertas do Cadastro Nacional da Pessoa Jurídica (CNPJ) e podem ser acessados por qualquer pessoa diretamente nos canais oficiais, como a Receita Federal.</p>
        <p>Se você é responsável pelo CNPJ, pode solicitar a remoção clicando em "Solicitar Remoção de Dados" na página do resultado ou acessando diretamente a rota de remoção. A exclusão do resultado dos mecanismos de busca pode levar até 14 dias após o processamento.</p>
    </div>
</section>
@endsection
