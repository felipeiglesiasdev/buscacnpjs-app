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
        <p>Apresentamos apenas informações públicas e omitimos dados sensíveis, como contatos e endereço completo, para respeitar a Lei Geral de Proteção de Dados (LGPD).</p>
        <p>Os registros exibidos são atualizados a partir de bases públicas, mas você pode solicitar a revisão ou remoção de dados a qualquer momento.</p>
        <p>Para dúvidas ou solicitações, utilize o botão "Solicitar Remoção de Dados" disponível na página do CNPJ ou acesse a página dedicada à remoção.</p>
    </div>
</section>
@endsection
