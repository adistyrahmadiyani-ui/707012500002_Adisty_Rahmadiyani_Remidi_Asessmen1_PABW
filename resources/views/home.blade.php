@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <section class="hero reveal">
        <p class="eyebrow">Kelompok Tani Makmur &middot; Kabupaten Garut</p>
        <h1>Selamat Datang di AgroClima Garut &ndash; Sistem Prediksi Mikroklimat Tanaman Berbasis LSTM</h1>
        <p class="lead">
            AgroClima Garut mencatat hasil prediksi suhu udara, kelembapan udara, dan kelembapan tanah
            untuk 24 jam ke depan, lalu menerjemahkannya menjadi status mikroklimat dan rekomendasi
            perawatan yang mudah dipahami petani.
        </p>
        <div class="hero-actions">
            <a class="btn btn-primary" href="{{ route('prediksi') }}">Input Prediksi Baru</a>
            <a class="btn btn-ghost" href="{{ route('riwayat') }}">Lihat Riwayat</a>
        </div>
    </section>

    <section class="grid grid-3">
        <article class="card reveal">
            <h2>Tujuan Sistem</h2>
            <p>
                Menggantikan pencatatan manual di buku dengan dokumentasi digital, sehingga tren
                perubahan mikroklimat dan kebutuhan penyiraman lahan bisa dipantau secara teratur.
            </p>
        </article>
        <article class="card reveal">
            <h2>Teknologi Deep Learning</h2>
            <p>
                Model <strong>Long Short-Term Memory (LSTM)</strong> mempelajari pola data deret waktu
                dari sensor IoT di lahan untuk memprediksi kondisi 24 jam ke depan.
            </p>
        </article>
        <article class="card reveal">
            <h2>Rekomendasi Perawatan</h2>
            <p>
                Dari prediksi kelembapan tanah, sistem menentukan status <em>Kering</em>,
                <em>Optimal</em>, atau <em>Terlalu Lembap</em> beserta saran tindakan.
            </p>
        </article>
    </section>

    <section class="card reveal">
        <h2>Cara Kerja Prototipe</h2>
        <ol class="steps">
            <li>Operator memasukkan hasil prediksi model LSTM melalui form <a href="{{ route('prediksi') }}">Input Prediksi</a>.</li>
            <li>Sistem menentukan status mikroklimat dari nilai prediksi kelembapan tanah.</li>
            <li>Data tersimpan di database dan dapat dibuka kembali pada halaman <a href="{{ route('riwayat') }}">Riwayat Prediksi</a>.</li>
        </ol>
        <p class="note">Prototipe ini masih berupa simulasi: nilai prediksi diinput manual dan belum terhubung langsung ke model LSTM.</p>
    </section>
@endsection
