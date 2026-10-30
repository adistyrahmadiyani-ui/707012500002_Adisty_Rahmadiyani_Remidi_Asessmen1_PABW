@extends('layouts.main')

@section('title', 'Input Prediksi')

@section('content')
    <h1 class="page-title reveal">Input Hasil Prediksi Mikroklimat</h1>
    <p class="lead reveal">Masukkan hasil prediksi model LSTM untuk 24 jam ke depan.</p>

    @if ($errors->any())
        <div class="alert alert-error reveal" role="alert">
            <strong>Data belum valid:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hasil-prediksi') }}" method="POST" class="card form reveal" id="formPrediksi" novalidate>
        @csrf

        <div class="form-row">
            <div class="field">
                <label for="lokasi">Lokasi Lahan</label>
                <select name="lokasi" id="lokasi" required>
                    <option value="" disabled {{ old('lokasi') ? '' : 'selected' }}>Pilih lokasi</option>
                    @foreach (['Garut Kota', 'Tarogong Kaler', 'Samarang'] as $lokasi)
                        <option value="{{ $lokasi }}" {{ old('lokasi') === $lokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="nama_tanaman">Nama Tanaman</label>
                <input type="text" name="nama_tanaman" id="nama_tanaman" list="daftarTanaman"
                       placeholder="Contoh: Padi, Jagung, Cabai" value="{{ old('nama_tanaman') }}" required>
                <datalist id="daftarTanaman">
                    <option value="Padi">
                    <option value="Jagung">
                    <option value="Cabai">
                </datalist>
            </div>
        </div>

        <div class="form-row form-row-3">
            <div class="field">
                <label for="suhu_udara">Prediksi Suhu Udara (&deg;C)</label>
                <input type="number" name="suhu_udara" id="suhu_udara" step="0.1" min="0" max="60"
                       placeholder="mis. 26.5" value="{{ old('suhu_udara') }}" required>
            </div>

            <div class="field">
                <label for="kelembapan_udara">Prediksi Kelembapan Udara (%)</label>
                <input type="number" name="kelembapan_udara" id="kelembapan_udara" step="1" min="0" max="100"
                       placeholder="mis. 78" value="{{ old('kelembapan_udara') }}" required>
            </div>

            <div class="field">
                <label for="kelembapan_tanah">Prediksi Kelembapan Tanah (%)</label>
                <input type="number" name="kelembapan_tanah" id="kelembapan_tanah" step="1" min="0" max="100"
                       placeholder="mis. 55" value="{{ old('kelembapan_tanah') }}" required>
            </div>
        </div>

        <div class="preview" id="statusPreview" aria-live="polite">
            Isi kelembapan tanah untuk melihat pratinjau status mikroklimat.
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Proses &amp; Simpan Prediksi</button>
            <button type="reset" class="btn btn-ghost" id="btnReset">Reset</button>
        </div>
    </form>
@endsection
