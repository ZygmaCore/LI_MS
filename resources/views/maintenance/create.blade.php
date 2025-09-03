@extends('layouts.app')

@section('title', 'Tambah Maintenance')
@section('page-title', 'Tambah Maintenance')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('maintenances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block mb-1">Barang</label>
            <select name="barang_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="w-full border rounded p-2" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Tanggal Maintenance</label>
            <input type="date" name="tanggal_maintenance" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="sedang_diperbaiki">Sedang diperbaiki</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Catatan (Opsional)</label>
            <textarea name="catatan" class="w-full border rounded p-2" rows="2"></textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        <a href="{{ route('maintenances.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
