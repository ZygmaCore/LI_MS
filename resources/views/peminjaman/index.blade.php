@extends('layouts.app')

@section('title', 'Daftar Peminjaman')
@section('page-title', 'Daftar Peminjaman')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Data Peminjaman</h2>
        <a href="{{ route('peminjamans.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           + Tambah Peminjaman
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded bg-green-50 text-green-800 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">#</th>
                <th class="p-2">User</th>
                <th class="p-2">Barang</th>
                <th class="p-2">Jumlah</th>
                <th class="p-2">Tanggal Pinjam</th>
                <th class="p-2">Tanggal Kembali</th>
                <th class="p-2">Status</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjamans as $p)
            <tr class="border-b">
                <td class="p-2">{{ $p->id }}</td>
                <td class="p-2">{{ $p->user->nama ?? '-' }}</td>
                <td class="p-2">{{ $p->barang->nama_barang ?? '-' }}</td>
                <td class="p-2">{{ $p->jumlah }}</td>
                <td class="p-2">{{ $p->tanggal_pinjam }}</td>
                <td class="p-2">{{ $p->tanggal_kembali ?? '-' }}</td>
                <td class="p-2">{{ ucfirst($p->status) }}</td>
                <td class="p-2 flex gap-2">
                    <a href="{{ route('peminjamans.edit', $p) }}"
                       class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('peminjamans.destroy', $p) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="p-4 text-center text-gray-500">Belum ada data peminjaman</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
