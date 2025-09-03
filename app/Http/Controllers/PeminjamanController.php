<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * List semua peminjaman (khusus admin/guru).
     */
    public function index()
    {
        $peminjamans = Peminjaman::with(['user', 'barang'])->latest()->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Form create peminjaman.
     */
    public function create()
    {
        $users = User::all();
        $barangs = Barang::all();
        return view('peminjaman.create', compact('users', 'barangs'));
    }

    /**
     * Simpan peminjaman baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'required|in:dipinjam,dikembalikan,rusak',
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);
        if ($barang->jumlah_total < $validated['jumlah']) {
            return back()->withErrors(['jumlah' => 'Stok barang tidak mencukupi'])->withInput();
        }

        $barang->decrement('jumlah_total', $validated['jumlah']);
        Peminjaman::create($validated);

        return redirect()->route('peminjamans.index')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    /**
     * Form edit peminjaman.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $users = User::all();
        $barangs = Barang::all();
        return view('peminjaman.edit', compact('peminjaman', 'users', 'barangs'));
    }

    /**
     * Update peminjaman.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'required|in:dipinjam,dikembalikan,rusak',
        ]);

        if ($validated['status'] === 'dikembalikan' && $peminjaman->status !== 'dikembalikan') {
            $peminjaman->barang->increment('jumlah_total', $peminjaman->jumlah);
        }

        $peminjaman->update($validated);

        return redirect()->route('peminjamans.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }

    /**
     * Hapus peminjaman.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->status === 'dipinjam') {
            $peminjaman->barang->increment('jumlah_total', $peminjaman->jumlah);
        }

        $peminjaman->delete();

        return redirect()->route('peminjamans.index')->with('success', 'Peminjaman berhasil dihapus.');
    }

    /**
     * Riwayat peminjaman siswa (hanya untuk user login).
     */
    public function riwayat()
    {
        $riwayat = Peminjaman::with('barang')
            ->where('user_id', Auth::id())
            ->get();

        return view('peminjaman.riwayat', compact('riwayat'));
    }
}
