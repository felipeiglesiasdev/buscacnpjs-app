@extends('layouts.app')

@push('seo')
    @include('components.home.tags')
@endpush

@section('content')
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
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold px-4 py-3 rounded-lg shadow hover:bg-blue-700 transition">
                    <i class="bi bi-search"></i>
                    Consultar CNPJ
                </button>
                <p class="text-xs text-slate-500 text-center">Dados pessoais sensíveis são ocultados em respeito à LGPD.</p>
            </form>
        </div>
    </div>
</section>
@endsection
