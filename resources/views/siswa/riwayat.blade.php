@extends('layouts.app')

@section('title', 'Riwayat Peminjaman')
@section('page-title', 'Riwayat Peminjaman Saya')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-lg font-semibold mb-4">Riwayat Peminjaman</h2>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">#</th>
                <th class="p-2">Barang</th>
                <th class="p-2">Jumlah</th>
                <th class="p-2">Tgl Pinjam</th>
                <th class="p-2">Tgl Kembali</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($riwayat as $r)
            <tr class="border-b">
                <td class="p-2">{{ $r->id }}</td>
                <td class="p-2">{{ $r->barang->nama_barang }}</td>
                <td class="p-2">{{ $r->jumlah }}</td>
                <td class="p-2">{{ $r->tanggal_pinjam }}</td>
                <td class="p-2">{{ $r->tanggal_kembali ?? '-' }}</td>
                <td class="p-2">
                    <span class="px-2 py-1 rounded text-sm 
                        @if($r->status == 'dipinjam') bg-yellow-100 text-yellow-700 
                        @elseif($r->status == 'dikembalikan') bg-green-100 text-green-700 
                        @else bg-red-100 text-red-700 @endif">
                        {{ ucfirst($r->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-4 text-center text-gray-500">Belum ada riwayat peminjaman</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
