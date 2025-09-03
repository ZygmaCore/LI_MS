@extends('layouts.app')

@section('title', 'Daftar Barang')
@section('page-title', 'Daftar Barang Tersedia')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-lg font-semibold mb-4">Daftar Barang yang Bisa Dipinjam</h2>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">#</th>
                <th class="p-2">Nama Barang</th>
                <th class="p-2">Kode Barang</th>
                <th class="p-2">Stok Tersedia</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangs as $barang)
                @if($barang->jumlah_total > 0)
                <tr class="border-b">
                    <td class="p-2">{{ $barang->id }}</td>
                    <td class="p-2">{{ $barang->nama_barang }}</td>
                    <td class="p-2">{{ $barang->kode_barang }}</td>
                    <td class="p-2">{{ $barang->jumlah_total }}</td>
                    <td class="p-2">
                        <form action="{{ route('siswa.pinjam', $barang->id) }}" method="POST">
                            @csrf
                            <input type="number" name="jumlah" min="1" max="{{ $barang->jumlah_total }}"
                                   class="border rounded p-1 w-20" required>
                            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                                Pinjam
                            </button>
                        </form>
                    </td>
                </tr>
                @endif
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">Tidak ada barang tersedia</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
