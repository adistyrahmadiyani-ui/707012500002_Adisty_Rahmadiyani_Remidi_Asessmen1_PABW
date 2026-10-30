@extends('layouts.main')

@section('title', 'Riwayat Prediksi')

@section('content')
    <h1 class="page-title reveal">Riwayat Prediksi Mikroklimat</h1>

    <section class="grid grid-4 reveal">
        <div class="stat">
            <span class="stat-value">{{ $prediksi->count() }}</span>
            <span class="stat-label">Total Data</span>
        </div>
        <div class="stat stat-kering">
            <span class="stat-value">{{ $ringkasan['Kering'] }}</span>
            <span class="stat-label">Kering</span>
        </div>
        <div class="stat stat-optimal">
            <span class="stat-value">{{ $ringkasan['Optimal'] }}</span>
            <span class="stat-label">Optimal</span>
        </div>
        <div class="stat stat-lembap">
            <span class="stat-value">{{ $ringkasan['Terlalu Lembap'] }}</span>
            <span class="stat-label">Terlalu Lembap</span>
        </div>
    </section>

    <section class="card reveal">
        <div class="toolbar">
            <label for="filterStatus">Filter status</label>
            <select id="filterStatus">
                <option value="">Semua</option>
                <option value="Kering">Kering</option>
                <option value="Optimal">Optimal</option>
                <option value="Terlalu Lembap">Terlalu Lembap</option>
            </select>
        </div>

        <div class="table-wrap">
            <table class="table" id="tabelRiwayat">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lokasi</th>
                        <th>Tanaman</th>
                        <th>Suhu Udara (&deg;C)</th>
                        <th>Kelembapan Udara (%)</th>
                        <th>Kelembapan Tanah (%)</th>
                        <th>Status</th>
                        <th>Rekomendasi</th>
                        <th>Waktu Input</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prediksi as $item)
                        <tr data-status="{{ $item->status_mikroklimat }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>{{ $item->nama_tanaman }}</td>
                            <td>{{ $item->suhu_udara }}</td>
                            <td>{{ $item->kelembapan_udara }}</td>
                            <td>{{ $item->kelembapan_tanah }}</td>
                            <td>
                                @if ($item->status_mikroklimat === 'Kering')
                                    <span class="badge badge-kering">Kering</span>
                                @elseif ($item->status_mikroklimat === 'Optimal')
                                    <span class="badge badge-optimal">Optimal</span>
                                @else
                                    <span class="badge badge-lembap">Terlalu Lembap</span>
                                @endif
                            </td>
                            <td>{{ $item->rekomendasi }}</td>
                            <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="empty">
                                Belum ada data prediksi.
                                <a href="{{ route('prediksi') }}">Input prediksi pertama</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
