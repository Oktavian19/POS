<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id'   => 1,
                'kategori_id' => 1,
                'supplier_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Laptop',
                'harga_beli' => 5000000,
                'harga_jual'  => 6000000,
            ],
            [
                'barang_id'   => 2,
                'kategori_id' => 1,
                'supplier_id' => 1,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Smartphone',
                'harga_beli' => 2000000,
                'harga_jual'  => 2500000,
            ],
            [
                'barang_id'   => 3,
                'kategori_id' => 1,
                'supplier_id' => 1,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Headphone',
                'harga_beli' => 300000,
                'harga_jual'  => 350000,
            ],
            [
                'barang_id'   => 4,
                'kategori_id' => 2,
                'supplier_id' => 2,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Kaos',
                'harga_beli' => 40000,
                'harga_jual'  => 50000,
            ],
            [
                'barang_id'   => 5,
                'kategori_id' => 2,
                'supplier_id' => 2,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Celana Jeans',
                'harga_beli' => 100000,
                'harga_jual'  => 120000,
            ],
            [
                'barang_id'   => 6,
                'kategori_id' => 3,
                'supplier_id' => 2,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Snack',
                'harga_beli' => 5000,
                'harga_jual'  => 7000,
            ],
            [
                'barang_id'   => 7,
                'kategori_id' => 3,
                'supplier_id' => 2,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Biskuit',
                'harga_beli' => 6000,
                'harga_jual'  => 8000,
            ],
            [
                'barang_id'   => 8,
                'kategori_id' => 4,
                'supplier_id' => 3,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Air Mineral',
                'harga_beli' => 2000,
                'harga_jual'  => 3000,
            ],
            [
                'barang_id'   => 9,
                'kategori_id' => 4,
                'supplier_id' => 3,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Soda',
                'harga_beli' => 4000,
                'harga_jual'  => 6000,
            ],
            [
                'barang_id'   => 10,
                'kategori_id' => 5,
                'supplier_id' => 3,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Pisau Dapur',
                'harga_beli' => 20000,
                'harga_jual'  => 25000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
