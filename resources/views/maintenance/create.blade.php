@extends('layouts.app')

@section('title', 'Tambah Maintenance')
@section('page-title', 'Tambah Maintenance')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('maintenance.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="block mb-1">Barang</label>
            <select name="barang_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($labs as $lab)
                    <option value="{{ $lab->id }}">{{ $lab->nama_lab }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Status</label>
            <input type="text" name="status" class="w-full border rounded p-2" placeholder="contoh: sedang diperbaiki" required>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        <a href="{{ route('maintenance.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
