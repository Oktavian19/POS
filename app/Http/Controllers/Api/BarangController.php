<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index() {
        return BarangModel::all();
    }

    public function store(Request $request) {
        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $data['image'] = $imagePath;
        }

        $barang = BarangModel::create($data);
        
        return response()->json($barang, 201);
    }

    public function show(BarangModel $barang){
        return BarangModel::find($barang);
    }

    public function show_img(BarangModel $barang){
        $imagePath = $barang->getRawOriginal('image');

        if (!Storage::disk('public')->exists($imagePath)) {
            abort(404, 'Image not found');
        }

        return response()->file(Storage::disk('public')->path($imagePath));
    }

    public function update(Request $request, BarangModel $barang) {
        $barang->update($request->all());
        return BarangModel::find($barang);        
    }

    public function destroy(BarangModel $item) {
        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
