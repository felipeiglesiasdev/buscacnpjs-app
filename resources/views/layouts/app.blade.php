<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('seo')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
</head>
<body class="font-sans bg-slate-50 text-slate-900">
    @include('components.header')
    <main class="min-h-screen">
        @if (session('success'))
            <div class="fixed inset-x-4 top-6 md:inset-x-auto md:right-6 z-50">
                <div class="rounded-lg border border-green-200 bg-white shadow-lg px-4 py-3 flex items-start gap-3">
                    <div class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100 text-green-700">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-green-800">{{ session('success') }}</p>
                        <p class="text-sm text-slate-600">Operação concluída com sucesso.</p>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </main>
    @include('components.footer')
    @stack('scripts')
</body>
</html>
