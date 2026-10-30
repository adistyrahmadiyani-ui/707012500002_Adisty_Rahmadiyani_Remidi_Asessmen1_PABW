@extends('layouts.main')

@section('title', 'Hasil Prediksi')

@section('content')
    <h1 class="page-title reveal">Hasil Prediksi Mikroklimat</h1>

    @if ($status === 'Kering')
        <div class="result-banner banner-kering reveal">
            <span class="badge badge-kering">Kering</span>
            <p>Tanah diprediksi kekurangan air. {{ $rekomendasi }}.</p>
        </div>
    @elseif ($status === 'Optimal')
        <div class="result-banner banner-optimal reveal">
            <span class="badge badge-optimal">Optimal</span>
            <p>Kondisi tanah diprediksi ideal. {{ $rekomendasi }}.</p>
        </div>
    @else
        <div class="result-banner banner-lembap reveal">
            <span class="badge badge-lembap">Terlalu Lembap</span>
            <p>Tanah diprediksi terlalu basah. {{ $rekomendasi }}.</p>
        </div>
    @endif

    <section class="card reveal">
        <div class="table-wrap">
            <table class="table table-detail">
                <tbody>
                    <tr>
                        <th scope="row">Lokasi Lahan</th>
                        <td>{{ $data['lokasi'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nama Tanaman</th>
                        <td>{{ $data['nama_tanaman'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Prediksi Suhu Udara</th>
                        <td>{{ $data['suhu_udara'] }} &deg;C</td>
                    </tr>
                    <tr>
                        <th scope="row">Prediksi Kelembapan Udara</th>
                        <td>{{ $data['kelembapan_udara'] }}%</td>
                    </tr>
                    <tr>
                        <th scope="row">Prediksi Kelembapan Tanah</th>
                        <td>{{ $data['kelembapan_tanah'] }}%</td>
                    </tr>
                    <tr>
                        <th scope="row">Status Mikroklimat</th>
                        <td>
                            @if ($status === 'Kering')
                                <span class="badge badge-kering">Kering</span>
                            @elseif ($status === 'Optimal')
                                <span class="badge badge-optimal">Optimal</span>
                            @else
                                <span class="badge badge-lembap">Terlalu Lembap</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Rekomendasi Perawatan</th>
                        <td>{{ $rekomendasi }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="note">Data ini sudah tersimpan di database.</p>

        <div class="form-actions">
            <a href="{{ route('prediksi') }}" class="btn btn-primary">Input Prediksi Lagi</a>
            <a href="{{ route('riwayat') }}" class="btn btn-ghost">Lihat Riwayat</a>
        </div>
    </section>
@endsection
