@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    {{-- Card Statistik --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Jumlah User</h2>
        <p class="text-3xl font-bold mt-2">120</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Total Barang</h2>
        <p class="text-3xl font-bold mt-2">350</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Peminjaman Aktif</h2>
        <p class="text-3xl font-bold mt-2">25</p>
    </div>
</div>

{{-- Tabel Aktivitas --}}
<div class="bg-white p-6 rounded-lg shadow mt-6">
    <h2 class="text-lg font-semibold mb-4">Aktivitas Terbaru</h2>
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">Tanggal</th>
                <th class="p-2">User</th>
                <th class="p-2">Aktivitas</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td class="p-2">2025-08-27</td>
                <td class="p-2">Guru A</td>
                <td class="p-2">Menambahkan Barang Baru</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
