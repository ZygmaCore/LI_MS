<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Barang;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Tampilkan semua data maintenance.
     */
    public function index()
    {
        $maintenances = Maintenance::with('barang')->latest()->get();
        return view('maintenance.index', compact('maintenances'));
    }

    /**
     * Form tambah maintenance.
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('maintenance.create', compact('barangs'));
    }

    /**
     * Simpan data maintenance baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id'           => 'required|exists:barangs,id',
            'deskripsi_kerusakan' => 'required|string',
            'tanggal_maintenance' => 'required|date',
            'status'              => 'required|in:sedang_diperbaiki,selesai',
            'catatan'             => 'nullable|string',
        ]);

        Maintenance::create($validated);

        return redirect()->route('maintenances.index')->with('success', 'Data maintenance berhasil ditambahkan.');
    }

    /**
     * Form edit maintenance.
     */
    public function edit(Maintenance $maintenance)
    {
        $barangs = Barang::all();
        return view('maintenance.edit', compact('maintenance', 'barangs'));
    }

    /**
     * Update data maintenance.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $validated = $request->validate([
            'barang_id'           => 'required|exists:barangs,id',
            'deskripsi_kerusakan' => 'required|string',
            'tanggal_maintenance' => 'required|date',
            'status'              => 'required|in:sedang_diperbaiki,selesai',
            'catatan'             => 'nullable|string',
        ]);

        $maintenance->update($validated);

        return redirect()->route('maintenances.index')->with('success', 'Data maintenance berhasil diperbarui.');
    }

    /**
     * Hapus data maintenance.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return redirect()->route('maintenances.index')->with('success', 'Data maintenance berhasil dihapus.');
    }
}
