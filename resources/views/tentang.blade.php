@extends('layouts.main')

@section('title', 'Tentang')

@section('content')
    <h1 class="page-title reveal">Tentang AgroClima Garut</h1>

    <section class="card reveal">
        <h2>Tujuan Sistem</h2>
        <p>
            AgroClima Garut dikembangkan untuk membantu Kelompok Tani Makmur mengantisipasi perubahan
            kondisi lingkungan di sekitar tanaman. Sistem mencatat hasil prediksi mikroklimat,
            menampilkan informasi tanaman, serta menentukan status mikroklimat dan rekomendasi
            perawatan berdasarkan prediksi kelembapan tanah.
        </p>
    </section>

    <section class="grid grid-2">
        <article class="card reveal">
            <h2>Lokasi Pemantauan</h2>
            <ul class="check-list">
                <li>Kecamatan Garut Kota</li>
                <li>Kecamatan Tarogong Kaler</li>
                <li>Kecamatan Samarang</li>
            </ul>
        </article>

        <article class="card reveal">
            <h2>Parameter Mikroklimat</h2>
            <ul class="check-list">
                <li>Suhu udara (&deg;C)</li>
                <li>Kelembapan udara (%)</li>
                <li>Kelembapan tanah (%)</li>
            </ul>
        </article>
    </section>

    <section class="card reveal">
        <h2>Model Prediksi: LSTM</h2>
        <p>
            <strong>Long Short-Term Memory (LSTM)</strong> adalah jenis jaringan saraf berulang
            (<em>recurrent neural network</em>) yang mampu mengingat pola jangka panjang pada data
            deret waktu. Model dilatih dengan data sensor IoT di lahan untuk memprediksi suhu udara,
            kelembapan udara, dan kelembapan tanah 24 jam ke depan.
        </p>

        <h3>Ketentuan Status Mikroklimat</h3>
        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Prediksi Kelembapan Tanah</th>
                        <th>Status</th>
                        <th>Rekomendasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kurang dari 40%</td>
                        <td><span class="badge badge-kering">Kering</span></td>
                        <td>Segera lakukan penyiraman atau irigasi</td>
                    </tr>
                    <tr>
                        <td>40&ndash;70%</td>
                        <td><span class="badge badge-optimal">Optimal</span></td>
                        <td>Pertahankan pola perawatan saat ini</td>
                    </tr>
                    <tr>
                        <td>Lebih dari 70%</td>
                        <td><span class="badge badge-lembap">Terlalu Lembap</span></td>
                        <td>Kurangi penyiraman dan periksa drainase</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
