@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('page-title', 'Dashboard Guru')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Card Statistik --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Barang Diajukan</h2>
        <p class="text-3xl font-bold mt-2">10</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Peminjaman Aktif</h2>
        <p class="text-3xl font-bold mt-2">4</p>
    </div>
</div>

{{-- Daftar Barang --}}
<div class="bg-white p-6 rounded-lg shadow mt-6">
    <h2 class="text-lg font-semibold mb-4">Daftar Barang</h2>
    <ul class="list-disc ml-6 space-y-2">
        <li>Proyektor - <span class="text-green-600">Tersedia</span></li>
        <li>Laptop - <span class="text-red-600">Dipinjam</span></li>
    </ul>
</div>
@endsection
