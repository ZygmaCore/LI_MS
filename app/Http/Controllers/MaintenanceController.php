<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Tampilkan semua data maintenance.
     */
    public function index()
    {
        $maintenances = Maintenance::with('barang')->get();
        return response()->json($maintenances);
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

        $maintenance = Maintenance::create($validated);

        return response()->json($maintenance, 201);
    }

    /**
     * Tampilkan detail maintenance.
     */
    public function show(Maintenance $maintenance)
    {
        return response()->json($maintenance->load('barang'));
    }

    /**
     * Update data maintenance.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $validated = $request->validate([
            'barang_id'           => 'sometimes|required|exists:barangs,id',
            'deskripsi_kerusakan' => 'sometimes|required|string',
            'tanggal_maintenance' => 'sometimes|required|date',
            'status'              => 'sometimes|required|in:sedang_diperbaiki,selesai',
            'catatan'             => 'nullable|string',
        ]);

        $maintenance->update($validated);

        return response()->json($maintenance);
    }

    /**
     * Hapus data maintenance.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return response()->json(null, 204);
    }
}
