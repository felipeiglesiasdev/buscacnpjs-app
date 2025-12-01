@extends('layouts.app')

@push('seo')
    @include('components.privacidade.tags')
@endpush

@section('content')
<div class="bg-white">
    {{-- Cabeçalho da Página --}}
    <div class="bg-slate-50 border-b border-slate-200 py-12">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Política de Privacidade</h1>
            <p class="text-slate-600 text-lg">Transparência, legalidade e respeito aos seus dados.</p>
            <p class="text-sm text-slate-400 mt-2">Última atualização: {{ date('d/m/Y') }}</p>
        </div>
    </div>

    {{-- Conteúdo Legal --}}
    <div class="max-w-4xl mx-auto px-4 py-12 space-y-10">
        
        {{-- 1. Introdução e Base Legal --}}
        <section class="space-y-4">
            <h2 class="text-2xl font-bold text-slate-800">1. Sobre a Origem dos Dados</h2>
            <div class="prose prose-slate text-slate-600 leading-relaxed text-justify">
                <p>
                    O <strong>Busca CNPJs</strong> é uma plataforma privada de consulta e organização de dados empresariais. 
                    Todas as informações exibidas neste site são de <strong>domínio público</strong> e originárias da base de dados da Secretaria da Receita Federal do Brasil, conforme previsto na Lei de Acesso à Informação (Lei nº 12.527/2011) e na política de Dados Abertos do Governo Federal.
                </p>
                <p>
                    Nossa atuação está estritamente fundamentada na <strong>Lei nº 14.129/2021 (Lei do Governo Digital)</strong>, que estabelece diretrizes para a abertura de dados e transparência pública, permitindo a livre utilização de dados divulgados pelos órgãos governamentais para fins de pesquisa e consulta pela sociedade.
                </p>
            </div>
        </section>

        {{-- 2. LGPD e Dados Pessoais --}}
        <section class="space-y-4">
            <h2 class="text-2xl font-bold text-slate-800">2. Conformidade com a LGPD</h2>
            <div class="prose prose-slate text-slate-600 leading-relaxed text-justify">
                <p>
                    Respeitamos rigorosamente a <strong>Lei Geral de Proteção de Dados (Lei nº 13.709/2018)</strong>. Embora os dados de Pessoas Jurídicas (CNPJ) sejam públicos, entendemos a importância da privacidade dos sócios e representantes.
                </p>
                <p>
                    Por esta razão, adotamos como política de privacidade:
                </p>
                <ul class="list-disc pl-5 space-y-2 mt-2">
                    <li><strong>Não exibimos</strong> dados de contato sensíveis de sócios (telefone pessoal, e-mail pessoal ou endereço residencial) quando identificados como tal.</li>
                    <li>Limitamos a exibição às informações necessárias para a identificação da empresa (Razão Social, Nome Fantasia, Endereço Comercial e Situação Cadastral).</li>
                    <li>O tratamento dos dados justifica-se pelo legítimo interesse e pela publicidade legal dos atos constitutivos de empresas no Brasil.</li>
                </ul>
            </div>
        </section>

        {{-- 3. Uso das Informações --}}
        <section class="space-y-4">
            <h2 class="text-2xl font-bold text-slate-800">3. Finalidade do Uso</h2>
            <div class="prose prose-slate text-slate-600 leading-relaxed text-justify">
                <p>
                    O objetivo do site é facilitar o acesso à informação pública, permitindo que cidadãos e empresas verifiquem a situação cadastral de fornecedores, clientes e parceiros de negócios, contribuindo para um ambiente de negócios mais transparente e seguro. <strong>Não utilizamos os dados para fins de marketing direto invasivo, spam ou venda de listas de contatos.</strong>
                </p>
            </div>
        </section>

        {{-- SEÇÃO DE REMOÇÃO (Importante para evitar dores de cabeça) --}}
        <section id="remocao" class="bg-blue-50 border border-blue-100 rounded-xl p-6 md:p-8 scroll-mt-24">
            <div class="flex items-start gap-4">
                <div class="hidden md:flex h-12 w-12 rounded-full bg-blue-100 text-blue-600 items-center justify-center shrink-0">
                    <i class="bi bi-shield-x text-2xl"></i>
                </div>
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-slate-900">Como remover meu CNPJ do site?</h2>
                    <p class="text-slate-700 leading-relaxed">
                        Entendemos que, mesmo sendo dados públicos, alguns empreendedores preferem não ter as informações de suas empresas indexadas em buscadores de terceiros.
                    </p>
                    <p class="text-slate-700 leading-relaxed">
                        Embora <strong>não haja obrigação legal</strong> de remoção de dados públicos empresariais (visto que a publicidade é inerente ao registro empresarial), oferecemos, por liberalidade e cortesia, uma ferramenta automática para solicitar a desindexação da sua página em nosso sistema.
                    </p>
                    
                    <div class="bg-white p-4 rounded-lg border border-blue-200 mt-4">
                        <h3 class="font-semibold text-blue-800 mb-2">Passo a passo para remoção:</h3>
                        <ol class="list-decimal pl-5 space-y-2 text-slate-600 text-sm">
                            <li>Utilize a busca na página inicial para encontrar sua empresa pelo CNPJ.</li>
                            <li>Acesse a página de detalhes da empresa.</li>
                            <li>No final da página, clique no link ou botão <strong>"Solicitar Remoção de Dados"</strong>.</li>
                            <li>Siga as instruções para confirmar que você é o responsável pela empresa.</li>
                        </ol>
                    </div>
                    
                    <p class="text-xs text-slate-500 mt-2">
                        * A remoção do nosso site não apaga os dados da Receita Federal ou de outros sites, apenas deixa de exibi-los em nossa plataforma. O Google pode levar alguns dias para atualizar o cache e remover o resultado das buscas.
                    </p>
                </div>
            </div>
        </section>

        {{-- 4. Alterações na Política --}}
        <section class="space-y-4 pt-6 border-t border-slate-100">
            <h2 class="text-xl font-bold text-slate-800">4. Alterações nesta Política</h2>
            <p class="text-slate-600 text-sm leading-relaxed">
                Reservamo-nos o direito de alterar esta política a qualquer momento para adequação às normas jurídicas vigentes. Recomendamos a visita periódica a esta página.
            </p>
        </section>

    </div>
</div>
@endsection