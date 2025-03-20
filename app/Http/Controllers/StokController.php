<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    //Menampilkan halaman awal supplier
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Stok',
            'list'  => ['Home', 'Stok']
        ];

        $page = (object) [
            'title' => 'Daftar Stok yang terdaftar dalam sistem'
        ];

        $activeMenu = 'stok'; // set menu yang sedang aktif

        $stok = StokModel::all(); //ambil data supplier untuk filter supplier

        return view('stok.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'stok' => $stok, 'activeMenu' => $activeMenu]);
    }

    // Ambil data kategori dalam bentuk json untuk datatables
    public function list()
    {
        $stok = StokModel::select('stok_id', 'stok_tanggal', 'stok_jumlah', 'barang_id', 'user_id')
            ->with(['barang', 'user']);

        return DataTables::of($stok)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($stok) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Menampilkan halaman form tambah supplier
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Stok',
            'list'  => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Stok baru'
        ];

        $user = UserModel::all(); // ambil data stok untuk ditampilkan di form
        $barang = BarangModel::all();
        $activeMenu = 'stok';       // set menu yang sedang aktif

        return view('stok.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'barang' => $barang,
            'activeMenu' => $activeMenu
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'barang_id'     => 'required|integer',  // nama harus diisi, berupa string, dan maksimal 100 karakter
            'user_id'       => 'required|integer',
            'stok_tanggal'  => 'nullable|date',
            'stok_jumlah'   => 'required|integer'
        ]);

        // Menyimpan data stok baru
        StokModel::create([
            'barang_id'     => $request->barang_id,
            'user_id'       => $request->user_id,
            'stok_tanggal'  => $request->stok_tanggal,
            'stok_jumlah'   => $request->stok_jumlah,
        ]);

        // Redirect ke halaman stok dengan pesan sukses
        return redirect('/stok')->with('success', 'Data stok berhasil disimpan');
    }

    // Menampilkan detail stok
    public function show(string $id)
    {
        $stok = StokModel::with('barang', 'user')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Stok',
            'list'  => ['Home', 'Stok', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Stok'
        ];

        $activeMenu = 'stok'; // set menu yang sedang aktif

        return view('stok.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'stok' => $stok,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menampilkan halaman form edit stok
    public function edit(string $id)
    {
        $stok = StokModel::find($id); // Ambil data stok yang akan diedit
        $user = UserModel::all();
        $barang = BarangModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Stok',
            'list'  => ['Home', 'Stok', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Stok'
        ];

        $activeMenu = 'stok'; // set menu yang sedang aktif

        return view('stok.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'stok' => $stok,
            'user' => $user,
            'barang' => $barang,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan data stok
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'barang_id'     => 'required|integer',  // nama harus diisi, berupa string, dan maksimal 100 karakter
            'user_id'       => 'required|integer',
            'stok_tanggal'  => 'nullable|date',
            'stok_jumlah'   => 'required|integer'
        ]);

        StokModel::find($id)->update([
            'barang_id'     => $request->barang_id,
            'user_id'       => $request->user_id,
            'stok_tanggal'  => $request->stok_tanggal,
            'stok_jumlah'   => $request->stok_jumlah,
        ]);

        return redirect('/stok')->with('success', 'Data stok berhasil diubah');
    }

    // Menghapus data stok
    public function destroy(string $id)
    {
        $check = StokModel::find($id);
        if (!$check) {    // untuk mengecek apakah data stok dengan id yang dimaksud ada atau tidak
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        try {
            StokModel::destroy($id);    // Hapus data stok

            return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/stok')->with('error', 'Data stok gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}