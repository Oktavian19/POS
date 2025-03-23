<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetailModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan_detail';        // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'detail_id';

    protected $fillable = ['penjualan_id', 'barang_id', 'harga', 'jumlah'];

    public function barang() {
        return $this->belongsTo(BarangModel::class, 'barang_id');
    }
}
