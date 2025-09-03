@extends('layouts.app')

@section('title', 'Edit Peminjaman')
@section('page-title', 'Edit Peminjaman')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('peminjaman.update', $peminjaman) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block mb-1">User</label>
            <input type="text" class="w-full border rounded p-2 bg-gray-100" 
                   value="{{ $peminjaman->user->nama }}" disabled>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Barang</label>
            <input type="text" class="w-full border rounded p-2 bg-gray-100" 
                   value="{{ $peminjaman->barang->nama_barang }}" disabled>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Jumlah</label>
            <input type="number" name="jumlah" min="1" 
                   value="{{ $peminjaman->jumlah }}" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block mb-1">Tanggal Pinjam</label>
            <input type="date" value="{{ $peminjaman->tanggal_pinjam }}" 
                   class="w-full border rounded p-2 bg-gray-100" disabled>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" 
                   value="{{ $peminjaman->tanggal_kembali }}" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="rusak" {{ $peminjaman->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        <a href="{{ route('peminjaman.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
