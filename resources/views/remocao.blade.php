@extends('layouts.app')

@section('content')
<section class="max-w-3xl mx-auto px-4 py-12 space-y-6">
    <div class="space-y-2 text-center">
        <p class="text-sm font-semibold text-blue-700">LGPD</p>
        <h1 class="text-3xl font-bold text-slate-900">Solicitar Remoção de Dados</h1>
        <p class="text-slate-600">Use o formulário abaixo para pedir a remoção ou anonimização das informações do seu CNPJ.</p>
    </div>
    <div class="bg-white border border-slate-200 shadow-sm rounded-xl p-6 space-y-4">
        <form class="space-y-4">
            <div class="space-y-2">
                <label for="cnpj" class="block text-sm font-medium text-slate-700">CNPJ</label>
                <input id="cnpj" type="text" placeholder="00.000.000/0000-00" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" required>
            </div>
            <div class="space-y-2">
                <label for="responsavel" class="block text-sm font-medium text-slate-700">Nome do responsável</label>
                <input id="responsavel" type="text" placeholder="Seu nome completo" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" required>
            </div>
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-slate-700">E-mail para contato</label>
                <input id="email" type="email" placeholder="seuemail@exemplo.com" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" required>
            </div>
            <div class="space-y-2">
                <label for="mensagem" class="block text-sm font-medium text-slate-700">Motivo da solicitação</label>
                <textarea id="mensagem" rows="4" placeholder="Descreva como deseja que os dados sejam tratados" class="w-full rounded-lg border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none" required></textarea>
            </div>
            <button type="button" class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 text-white font-semibold px-4 py-3 rounded-lg shadow hover:bg-blue-700 transition">
                <i class="bi bi-send"></i>
                Enviar Solicitação
            </button>
        </form>
        <p class="text-xs text-slate-500">As instruções finais serão enviadas para o e-mail informado. Nenhuma informação sensível é exibida ou armazenada nesta etapa.</p>
    </div>
</section>
@endsection
