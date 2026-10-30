<nav class="site-nav" id="siteNav" aria-label="Navigasi utama">
    <ul class="container nav-list">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Dashboard</a></li>
        <li><a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'active' : '' }}">Tentang</a></li>
        <li><a href="{{ route('prediksi') }}" class="{{ request()->routeIs('prediksi', 'hasil-prediksi') ? 'active' : '' }}">Input Prediksi</a></li>
        <li><a href="{{ route('riwayat') }}" class="{{ request()->routeIs('riwayat') ? 'active' : '' }}">Riwayat Prediksi</a></li>
    </ul>
</nav>
