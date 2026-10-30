<?php

namespace Database\Seeders;

use App\Models\PrediksiMikroklimat;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PrediksiMikroklimatSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $lokasi  = ['Garut Kota', 'Tarogong Kaler', 'Samarang'];
        $tanaman = ['Padi', 'Jagung', 'Cabai'];

        $jumlah = 18; // minimal 15 data

        for ($i = 0; $i < $jumlah; $i++) {
            // Tiga data pertama dipaksa mewakili tiap status agar semua kategori pasti muncul
            $kelembapanTanah = match ($i) {
                0       => $faker->numberBetween(20, 39),  // Kering
                1       => $faker->numberBetween(40, 70),  // Optimal
                2       => $faker->numberBetween(71, 90),  // Terlalu Lembap
                default => $faker->numberBetween(20, 90),
            };

            if ($kelembapanTanah < 40) {
                $status = 'Kering';
            } elseif ($kelembapanTanah <= 70) {
                $status = 'Optimal';
            } else {
                $status = 'Terlalu Lembap';
            }

            PrediksiMikroklimat::create([
                'lokasi'             => $faker->randomElement($lokasi),
                'nama_tanaman'       => $faker->randomElement($tanaman),
                'suhu_udara'         => $faker->randomFloat(1, 18, 35),
                'kelembapan_udara'   => $faker->numberBetween(40, 100),
                'kelembapan_tanah'   => $kelembapanTanah,
                'status_mikroklimat' => $status,
            ]);
        }
    }
}
