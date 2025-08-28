<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Tampilkan semua barang.
     */
    public function index()
    {
        $barangs = Barang::with('lab')->get();
        return response()->json($barangs);
    }

    /**
     * Simpan barang baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:100|unique:barangs,kode_barang',
            'jumlah_total' => 'required|integer|min:0',
            'lab_id' => 'required|exists:labs,id',
        ]);

        $barang = Barang::create($validated);

        return response()->json($barang, 201);
    }

    /**
     * Tampilkan detail barang.
     */
    public function show(Barang $barang)
    {
        return response()->json($barang->load('lab'));
    }

    /**
     * Update data barang.
     */
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang' => 'sometimes|required|string|max:255',
            'kode_barang' => 'sometimes|required|string|max:100|unique:barangs,kode_barang,' . $barang->id,
            'jumlah_total' => 'sometimes|required|integer|min:0',
            'lab_id' => 'sometimes|required|exists:labs,id',
        ]);

        $barang->update($validated);

        return response()->json($barang);
    }

    /**
     * Hapus barang.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return response()->json(null, 204);
    }
}
