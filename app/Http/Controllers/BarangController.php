<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lab;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $query = Barang::with('lab')->latest();

        if ($q) {
            $query->where(function ($w) use ($q) {
                $w->where('nama_barang', 'like', "%{$q}%")
                    ->orWhere('kode_barang', 'like', "%{$q}%");
            });
        }

        $barangs = $query->paginate(10)->withQueryString();
        return view('barangs.index', compact('barangs', 'q'));
    }

    public function create()
    {
        $labs = Lab::select('id', 'nama_lab')->orderBy('nama_lab')->get();
        return view('barangs.create', compact('labs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang'  => 'required|string|max:255',
            'kode_barang'  => 'required|string|max:100|unique:barangs,kode_barang',
            'jumlah_total' => 'required|integer|min:0',
            'lab_id'       => 'required|exists:labs,id',
        ]);

        Barang::create($validated);

        return redirect()
            ->route('barangs.index')
            ->with('success', 'Barang created successfully.');
    }

    public function edit(Barang $barang)
    {
        $labs = Lab::select('id', 'nama_lab')->orderBy('nama_lab')->get();
        return view('barangs.edit', compact('barang', 'labs'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang'  => 'required|string|max:255',
            'kode_barang'  => 'required|string|max:100|unique:barangs,kode_barang,' . $barang->id,
            'jumlah_total' => 'required|integer|min:0',
            'lab_id'       => 'required|exists:labs,id',
        ]);

        $barang->update($validated);

        return redirect()
            ->route('barangs.index')
            ->with('success', 'Barang updated successfully.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()
            ->route('barangs.index')
            ->with('success', 'Barang deleted successfully.');
    }
}
