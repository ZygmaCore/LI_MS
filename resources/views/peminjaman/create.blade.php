@extends('layouts.app')

@section('title', 'Tambah Peminjaman')
@section('page-title', 'Tambah Peminjaman')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block mb-1">User</label>
            <select name="user_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->nama }} ({{ $u->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Barang</label>
            <select name="barang_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $b)
                    <option value="{{ $b->id }}">{{ $b->nama_barang }} (Stok: {{ $b->jumlah_total }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Jumlah</label>
            <input type="number" name="jumlah" min="1" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="dipinjam">Dipinjam</option>
                <option value="dikembalikan">Dikembalikan</option>
                <option value="rusak">Rusak</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        <a href="{{ route('peminjaman.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
