<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AgroClima Garut') | AgroClima Kabupaten Garut</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-mark" aria-hidden="true"></span>
                <span class="brand-text">AgroClima Kabupaten Garut</span>
            </a>
            <button type="button" class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
        @include('partials.navbar')
    </header>

    <main class="container content">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; 2026 AgroClima Kelompok Tani Makmur Kabupaten Garut</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
