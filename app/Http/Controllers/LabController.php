<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Tampilkan semua lab.
     */
    public function index()
    {
        $labs = Lab::with('barangs')->get();
        return response()->json($labs);
    }

    /**
     * Simpan lab baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lab' => 'required|string|max:255',
            'lokasi'   => 'required|string|max:255',
        ]);

        $lab = Lab::create($validated);

        return response()->json($lab, 201);
    }

    /**
     * Tampilkan detail lab.
     */
    public function show(Lab $lab)
    {
        return response()->json($lab->load('barangs'));
    }

    /**
     * Update data lab.
     */
    public function update(Request $request, Lab $lab)
    {
        $validated = $request->validate([
            'nama_lab' => 'sometimes|required|string|max:255',
            'lokasi'   => 'sometimes|required|string|max:255',
        ]);

        $lab->update($validated);

        return response()->json($lab);
    }

    /**
     * Hapus lab.
     */
    public function destroy(Lab $lab)
    {
        $lab->delete();
        return response()->json(null, 204);
    }
}
