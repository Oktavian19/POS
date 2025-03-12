<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id'      => 1,
                'user_id'           => 1,
                'pembeli'           => 'John Doe',
                'penjualan_kode'    => 'PNJ-001',
                'penjualan_tanggal' => '2025-03-01 10:00:00',
            ],
            [
                'penjualan_id'      => 2,
                'user_id'           => 2,
                'pembeli'           => 'Jane Doe',
                'penjualan_kode'    => 'PNJ-002',
                'penjualan_tanggal' => '2025-03-01 11:00:00',
            ],
            [
                'penjualan_id'      => 3,
                'user_id'           => 3,
                'pembeli'           => 'Alex Smith',
                'penjualan_kode'    => 'PNJ-003',
                'penjualan_tanggal' => '2025-03-01 12:00:00',
            ],
            [
                'penjualan_id'      => 4,
                'user_id'           => 1,
                'pembeli'           => 'Maria Garcia',
                'penjualan_kode'    => 'PNJ-004',
                'penjualan_tanggal' => '2025-03-01 13:00:00',
            ],
            [
                'penjualan_id'      => 5,
                'user_id'           => 2,
                'pembeli'           => 'David Johnson',
                'penjualan_kode'    => 'PNJ-005',
                'penjualan_tanggal' => '2025-03-01 14:00:00',
            ],
            [
                'penjualan_id'      => 6,
                'user_id'           => 3,
                'pembeli'           => 'Emily Davis',
                'penjualan_kode'    => 'PNJ-006',
                'penjualan_tanggal' => '2025-03-01 15:00:00',
            ],
            [
                'penjualan_id'      => 7,
                'user_id'           => 1,
                'pembeli'           => 'James Miller',
                'penjualan_kode'    => 'PNJ-007',
                'penjualan_tanggal' => '2025-03-01 16:00:00',
            ],
            [
                'penjualan_id'      => 8,
                'user_id'           => 2,
                'pembeli'           => 'Linda Wilson',
                'penjualan_kode'    => 'PNJ-008',
                'penjualan_tanggal' => '2025-03-01 17:00:00',
            ],
            [
                'penjualan_id'      => 9,
                'user_id'           => 3,
                'pembeli'           => 'Chris Brown',
                'penjualan_kode'    => 'PNJ-009',
                'penjualan_tanggal' => '2025-03-01 18:00:00',
            ],
            [
                'penjualan_id'      => 10,
                'user_id'           => 1,
                'pembeli'           => 'Jennifer Wilson',
                'penjualan_kode'    => 'PNJ-010',
                'penjualan_tanggal' => '2025-03-01 19:00:00',
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
