@extends('layouts.app')

@push('seo')
    @include('components.home.tags')
@endpush

@section('content')
{{-- SEÇÃO 1: HERO E BUSCA PRINCIPAL --}}
<section class="bg-gradient-to-b from-blue-50 via-white to-white">
    <div class="max-w-5xl mx-auto px-4 py-16 grid gap-10 md:grid-cols-2 md:items-center">
        <div class="space-y-4">
            <p class="text-sm font-semibold text-blue-700">Consulta CNPJ</p>
            <h1 class="text-3xl md:text-4xl font-bold leading-tight text-slate-900">Encontre informações essenciais de empresas em segundos.</h1>
            <p class="text-slate-600">Digite o CNPJ no formulário ao lado para visualizar dados públicos de forma rápida e em conformidade com a LGPD.</p>
            @if (session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="bg-white shadow-lg rounded-xl border border-slate-200 p-6">
            <h2 class="text-xl font-semibold text-slate-900 mb-4">Consultar CNPJ</h2>
            <form action="{{ route('cnpj.consultar') }}" method="POST" class="space-y-4">
                @csrf
                <div class="space-y-2">
                    <label for="cnpj" class="block text-sm font-medium text-slate-700">Número do CNPJ</label>
                    <input id="cnpj" name="cnpj" type="text" inputmode="numeric" placeholder="00.000.000/0000-00" value="{{ old('cnpj') }}" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" required>
                    @error('cnpj')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold px-4 py-3 rounded-lg shadow hover:bg-blue-700 transition cursor-pointer">
                    <i class="bi bi-search"></i>
                    Consultar CNPJ
                </button>
                <p class="text-xs text-slate-500 text-center">Dados pessoais sensíveis são ocultados em respeito à LGPD.</p>
            </form>
        </div>
    </div>
</section>

{{-- SEÇÃO 2: INFO SEO E FAQ --}}
<section class="bg-white border-t border-slate-100 py-16">
    <div class="max-w-5xl mx-auto px-4 grid gap-12 md:grid-cols-2">
        
        {{-- COLUNA 1: Benefícios e Detalhes --}}
        <div class="space-y-6">
            <h2 class="text-2xl font-bold text-slate-900">Por que usar nossa ferramenta de busca?</h2>
            <p class="text-slate-600 leading-relaxed">
                O Busca CNPJs oferece uma solução prática e ética. Focamos em entregar a situação cadastral da empresa de forma ágil, <strong>sem expor dados sensíveis</strong> ou de contato, garantindo total conformidade com a Lei Geral de Proteção de Dados.
            </p>
            
            <ul class="space-y-4 mt-4">
                <li class="flex items-start gap-3">
                    <div class="mt-1 h-6 w-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0">
                        <i class="bi bi-check-lg text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-900">Consulta Grátis e Ilimitada</h3>
                        <p class="text-sm text-slate-600">Faça quantas pesquisas precisar para verificar a situação cadastral de empresas, sem custos ocultos.</p>
                    </div>
                </li>

                <li class="flex items-start gap-3">
                    <div class="mt-1 h-6 w-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                        <i class="bi bi-shield-lock text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-900">Privacidade em Primeiro Lugar</h3>
                        <p class="text-sm text-slate-600">Para sua segurança e conformidade com a LGPD, <strong>não exibimos</strong> quadro societário, telefones, e-mails ou endereços.</p>
                    </div>
                </li>

                <li class="flex items-start gap-3">
                    <div class="mt-1 h-6 w-6 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0">
                        <i class="bi bi-lightning text-sm"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-900">Dados Públicos Oficiais</h3>
                        <p class="text-sm text-slate-600">Acesse rapidamente a Razão Social, Nome Fantasia e Status na Receita Federal de forma limpa e direta.</p>
                    </div>
                </li>
            </ul>
        </div>

        {{-- COLUNA 2: FAQ (Perguntas Frequentes) --}}
        <div class="space-y-6">
            <h2 class="text-2xl font-bold text-slate-900">Perguntas Frequentes</h2>
            
            <div class="space-y-4">
                {{-- Pergunta 1 --}}
                <details class="group bg-slate-50 rounded-lg p-4 open:bg-white open:shadow-md border border-transparent open:border-slate-200 transition-all">
                    <summary class="flex items-center justify-between cursor-pointer list-none font-semibold text-slate-800">
                        <span>Como consultar CNPJ grátis?</span>
                        <span class="transition group-open:rotate-180">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </summary>
                    <p class="text-slate-600 mt-3 text-sm leading-relaxed">
                        Basta digitar o número do documento no campo de busca no topo desta página e clicar em "Consultar". O sistema retornará o status cadastral da empresa imediatamente.
                    </p>
                </details>

                {{-- Pergunta 2 --}}
                <details class="group bg-slate-50 rounded-lg p-4 open:bg-white open:shadow-md border border-transparent open:border-slate-200 transition-all">
                    <summary class="flex items-center justify-between cursor-pointer list-none font-semibold text-slate-800">
                        <span>Vocês exibem dados de sócios e contato?</span>
                        <span class="transition group-open:rotate-180">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </summary>
                    <p class="text-slate-600 mt-3 text-sm leading-relaxed">
                        Não. Em respeito à privacidade e à LGPD, nós <strong>não exibimos</strong> dados como quadro societário (sócios), telefones, e-mails ou endereços das empresas consultadas.
                    </p>
                </details>

                {{-- Pergunta 3 --}}
                <details class="group bg-slate-50 rounded-lg p-4 open:bg-white open:shadow-md border border-transparent open:border-slate-200 transition-all">
                    <summary class="flex items-center justify-between cursor-pointer list-none font-semibold text-slate-800">
                        <span>Quais informações vou encontrar?</span>
                        <span class="transition group-open:rotate-180">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </summary>
                    <p class="text-slate-600 mt-3 text-sm leading-relaxed">
                        Ao <strong>buscar CNPJ</strong> em nossa ferramenta, você visualizará dados públicos essenciais como: Razão Social, Nome Fantasia, Data de Abertura, Natureza Jurídica e a Situação Cadastral (Ativa/Inativa/Baixada).
                    </p>
                </details>

                 {{-- Pergunta 4 --}}
                 <details class="group bg-slate-50 rounded-lg p-4 open:bg-white open:shadow-md border border-transparent open:border-slate-200 transition-all">
                    <summary class="flex items-center justify-between cursor-pointer list-none font-semibold text-slate-800">
                        <span>A consulta é ilimitada?</span>
                        <span class="transition group-open:rotate-180">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </summary>
                    <p class="text-slate-600 mt-3 text-sm leading-relaxed">
                        Sim! Nosso serviço de <strong>consulta CNPJ grátis</strong> não possui limites de requisições por usuário.
                    </p>
                </details>
            </div>
        </div>
    </div>
</section>
@endsection