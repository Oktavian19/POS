<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangIDs = range(1, 10);
        $data = [];

        for ($penjualan_id = 1; $penjualan_id <= 10; $penjualan_id++) {
            $randomBarang = array_rand($barangIDs, 3); // Ambil 3 barang secara acak

            foreach ($randomBarang as $index) {
                $barang_id = $barangIDs[$index];

                $data[] = [
                    'detail_id'      => null, 
                    'penjualan_id'   => $penjualan_id,
                    'barang_id'      => $barang_id,
                    'jumlah'         => rand(1, 5),
                    'harga'          => rand(5, 50)*1000,
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}
