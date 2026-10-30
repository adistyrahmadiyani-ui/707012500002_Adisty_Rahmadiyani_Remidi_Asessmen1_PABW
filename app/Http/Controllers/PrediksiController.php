<?php

namespace App\Http\Controllers;

use App\Models\PrediksiMikroklimat;
use Illuminate\Http\Request;

class PrediksiController extends Controller
{
    /**
     * Menerima data form, menentukan status mikroklimat,
     * menyimpan ke database (Eloquent), lalu menampilkan hasil.
     */
    public function prosesData(Request $request)
    {
        $data = $request->validate([
            'lokasi'           => ['required', 'in:Garut Kota,Tarogong Kaler,Samarang'],
            'nama_tanaman'     => ['required', 'string', 'max:100'],
            'suhu_udara'       => ['required', 'numeric', 'between:0,60'],
            'kelembapan_udara' => ['required', 'integer', 'between:0,100'],
            'kelembapan_tanah' => ['required', 'integer', 'between:0,100'],
        ], [
            'required' => ':attribute wajib diisi.',
            'numeric'  => ':attribute harus berupa angka.',
            'integer'  => ':attribute harus berupa bilangan bulat.',
            'between'  => ':attribute harus berada di antara :min dan :max.',
            'in'       => ':attribute tidak valid.',
        ], [
            'lokasi'           => 'Lokasi lahan',
            'nama_tanaman'     => 'Nama tanaman',
            'suhu_udara'       => 'Prediksi suhu udara',
            'kelembapan_udara' => 'Prediksi kelembapan udara',
            'kelembapan_tanah' => 'Prediksi kelembapan tanah',
        ]);

        // Penentuan status mikroklimat berdasarkan prediksi kelembapan tanah
        $kelembapanTanah = (int) $data['kelembapan_tanah'];

        if ($kelembapanTanah < 40) {
            $status = 'Kering';
            $rekomendasi = 'Segera lakukan penyiraman atau irigasi';
        } elseif ($kelembapanTanah <= 70) {
            $status = 'Optimal';
            $rekomendasi = 'Pertahankan pola perawatan saat ini';
        } else {
            $status = 'Terlalu Lembap';
            $rekomendasi = 'Kurangi penyiraman dan periksa drainase';
        }

        // Simpan ke database menggunakan Eloquent ORM
        PrediksiMikroklimat::create([
            'lokasi'            => $data['lokasi'],
            'nama_tanaman'      => $data['nama_tanaman'],
            'suhu_udara'        => $data['suhu_udara'],
            'kelembapan_udara'  => $data['kelembapan_udara'],
            'kelembapan_tanah'  => $kelembapanTanah,
            'status_mikroklimat' => $status,
        ]);

        return view('hasil', [
            'data'        => $data,
            'status'      => $status,
            'rekomendasi' => $rekomendasi,
        ]);
    }

    /**
     * Menampilkan seluruh riwayat prediksi dari database.
     */
    public function riwayat()
    {
        $prediksi = PrediksiMikroklimat::latest()->orderByDesc('id')->get();

        $ringkasan = [
            'Kering'         => $prediksi->where('status_mikroklimat', 'Kering')->count(),
            'Optimal'        => $prediksi->where('status_mikroklimat', 'Optimal')->count(),
            'Terlalu Lembap' => $prediksi->where('status_mikroklimat', 'Terlalu Lembap')->count(),
        ];

        return view('riwayat', compact('prediksi', 'ringkasan'));
    }
}
