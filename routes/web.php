<?php

use App\Http\Controllers\PrediksiController;
use Illuminate\Support\Facades\Route;

// Soal 1: halaman utama dan tentang
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

// Soal 2: form input prediksi dan pemrosesan data
Route::get('/prediksi', function () {
    return view('prediksi');
})->name('prediksi');

Route::post('/hasil-prediksi', [PrediksiController::class, 'prosesData'])->name('hasil-prediksi');

// Soal 3: riwayat prediksi dari database
Route::get('/riwayat', [PrediksiController::class, 'riwayat'])->name('riwayat');
