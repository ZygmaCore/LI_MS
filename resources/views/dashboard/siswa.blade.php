@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('page-title', 'Dashboard Siswa')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Card Statistik --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Peminjaman Saya</h2>
        <p class="text-3xl font-bold mt-2">3</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Status Aktif</h2>
        <p class="text-3xl font-bold mt-2 text-green-600">1</p>
    </div>
</div>

{{-- Riwayat Peminjaman --}}
<div class="bg-white p-6 rounded-lg shadow mt-6">
    <h2 class="text-lg font-semibold mb-4">Riwayat Peminjaman</h2>
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">Tanggal</th>
                <th class="p-2">Barang</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td class="p-2">2025-08-20</td>
                <td class="p-2">Laptop</td>
                <td class="p-2 text-red-600">Dipinjam</td>
            </tr>
            <tr class="border-b">
                <td class="p-2">2025-08-10</td>
                <td class="p-2">Proyektor</td>
                <td class="p-2 text-green-600">Dikembalikan</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
