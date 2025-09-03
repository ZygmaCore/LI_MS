@extends('layouts.app')

@section('title', 'Tambah Peminjaman')
@section('page-title', 'Tambah Peminjaman')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form method="POST" action="{{ route('peminjamans.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">User</label>
            <select name="user_id" class="w-full border rounded p-2">
                @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Barang</label>
            <select name="barang_id" class="w-full border rounded p-2">
                @foreach($barangs as $b)
                    <option value="{{ $b->id }}">{{ $b->nama_barang }} (stok: {{ $b->jumlah_total }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Jumlah</label>
            <input type="number" name="jumlah" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="dipinjam">Dipinjam</option>
                <option value="dikembalikan">Dikembalikan</option>
                <option value="rusak">Rusak</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
    </form>
</div>
@endsection
