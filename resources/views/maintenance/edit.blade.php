@extends('layouts.app')

@section('title', 'Edit Maintenance')
@section('page-title', 'Edit Maintenance')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('maintenances.update', $maintenance) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block mb-1">Barang</label>
            <select name="barang_id" class="w-full border rounded p-2" required>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ $barang->id == $maintenance->barang_id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Deskripsi Kerusakan</label>
            <textarea name="deskripsi_kerusakan" class="w-full border rounded p-2" rows="3" required>{{ $maintenance->deskripsi_kerusakan }}</textarea>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Tanggal Maintenance</label>
            <input type="date" name="tanggal_maintenance" value="{{ $maintenance->tanggal_maintenance }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="sedang_diperbaiki" {{ $maintenance->status == 'sedang_diperbaiki' ? 'selected' : '' }}>Sedang diperbaiki</option>
                <option value="selesai" {{ $maintenance->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Catatan (Opsional)</label>
            <textarea name="catatan" class="w-full border rounded p-2" rows="2">{{ $maintenance->catatan }}</textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        <a href="{{ route('maintenances.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
