<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * List semua peminjaman (khusus admin/guru).
     */
    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'barang'])->get();
        return response()->json($peminjaman);
    }

    /**
     * Simpan peminjaman baru (umumnya dari admin/guru).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'in:dipinjam,dikembalikan,rusak',
        ]);

        // Validasi stok barangs
        $barang = Barang::findOrFail($validated['barang_id']);
        if ($barang->jumlah_total < $validated['jumlah']) {
            return response()->json(['message' => 'Stok barangs tidak mencukupi'], 400);
        }

        // Kurangi stok barangs
        $barang->decrement('jumlah_total', $validated['jumlah']);

        $peminjaman = Peminjaman::create($validated);

        return response()->json($peminjaman, 201);
    }

    /**
     * Tampilkan detail peminjaman.
     */
    public function show(Peminjaman $peminjaman)
    {
        return response()->json($peminjaman->load(['user','barang']));
    }

    /**
     * Update peminjaman (misal status jadi dikembalikan/rusak).
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'jumlah' => 'sometimes|required|integer|min:1',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'in:dipinjam,dikembalikan,rusak',
        ]);

        // Kalau status jadi dikembalikan → tambah stok barangs
        if (isset($validated['status']) && $validated['status'] === 'dikembalikan') {
            $peminjaman->barang->increment('jumlah_total', $peminjaman->jumlah);
        }

        $peminjaman->update($validated);

        return response()->json($peminjaman);
    }

    /**
     * Hapus peminjaman.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return response()->json(null, 204);
    }

    /* =======================
       ========== SISWA =======
       ======================= */

    /**
     * List barangs untuk siswa (lihat stok tersedia).
     */
    public function listBarang()
    {
        $barangs = Barang::all(['id','nama_barang','kode_barang','jumlah_total']);
        return response()->json($barangs);
    }

    /**
     * Proses siswa meminjam barangs.
     */
    public function pinjam(Request $request, $id)
    {
        $validated = $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($id);

        if ($barang->jumlah_total < $validated['jumlah']) {
            return response()->json(['message' => 'Stok barangs tidak mencukupi'], 400);
        }

        // Kurangi stok barangs
        $barang->decrement('jumlah_total', $validated['jumlah']);

        $peminjaman = Peminjaman::create([
            'user_id' => Auth::id(),
            'barang_id' => $barang->id,
            'jumlah' => $validated['jumlah'],
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam',
        ]);

        return response()->json($peminjaman, 201);
    }

    /**
     * Riwayat peminjaman siswa.
     */
    public function riwayat()
    {
        $riwayat = Peminjaman::with('barang')
            ->where('user_id', Auth::id())
            ->get();

        return response()->json($riwayat);
    }
}
