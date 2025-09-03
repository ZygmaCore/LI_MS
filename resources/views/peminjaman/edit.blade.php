@extends('layouts.app')

@section('title', 'Edit Peminjaman')
@section('page-title', 'Edit Peminjaman')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form method="POST" action="{{ route('peminjamans.update', $peminjaman) }}" class="space-y-4">
        @csrf @method('PUT')

        <div>
            <label class="block mb-1">User</label>
            <select name="user_id" class="w-full border rounded p-2">
                @foreach($users as $u)
                    <option value="{{ $u->id }}" {{ $peminjaman->user_id == $u->id ? 'selected' : '' }}>
                        {{ $u->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Barang</label>
            <select name="barang_id" class="w-full border rounded p-2">
                @foreach($barangs as $b)
                    <option value="{{ $b->id }}" {{ $peminjaman->barang_id == $b->id ? 'selected' : '' }}>
                        {{ $b->nama_barang }} (stok: {{ $b->jumlah_total }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Jumlah</label>
            <input type="number" name="jumlah" class="w-full border rounded p-2"
                   value="{{ $peminjaman->jumlah }}" required>
        </div>

        <div>
            <label class="block mb-1">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="w-full border rounded p-2"
                   value="{{ $peminjaman->tanggal_pinjam->format('Y-m-d') }}" required>
        </div>

        <div>
            <label class="block mb-1">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="w-full border rounded p-2"
                   value="{{ $peminjaman->tanggal_kembali ? $peminjaman->tanggal_kembali->format('Y-m-d') : '' }}">
        </div>

        <div>
            <label class="block mb-1">Status</label>
            <select name="status" class="w-full border rounded p-2">
                <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="rusak" {{ $peminjaman->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update
        </button>
    </form>
</div>
@endsection
