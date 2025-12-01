@php
    $meta = $data['meta_data'] ?? [];
    $og = $data['og_data'] ?? [];
    $structured = $data['structured_data'] ?? [];
@endphp

<title>{{ $og['og:title'] ?? ($data['razao_social'] ?? 'Consulta de CNPJ') }} - {{ $data['cnpj_completo'] ?? '' }}</title>
<meta name="description" content="{{ $meta['description'] ?? ("Visualize dados essenciais do CNPJ {$data['cnpj_completo']} em conformidade com a LGPD.") }}">
@if(!empty($meta['keywords']))
    <meta name="keywords" content="{{ $meta['keywords'] }}">
@endif

@foreach($og as $property => $content)
    <meta property="{{ $property }}" content="{{ $content }}">
@endforeach

@if(!empty($structured))
    <script type="application/ld+json">
        {!! json_encode($structured, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
    </script>
@endif
