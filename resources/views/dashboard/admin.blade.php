@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    {{-- Statistik --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Jumlah User</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Total Barang</h2>
        <p class="text-3xl font-bold mt-2">{{ $totalBarang }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Peminjaman Aktif</h2>
        <p class="text-3xl font-bold mt-2">{{ $peminjamanAktif }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold">Maintenance Aktif</h2>
        <p class="text-3xl font-bold mt-2">{{ $maintenanceAktif }}</p>
    </div>
</div>

{{-- Aktivitas Terbaru --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
    {{-- User baru --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-4">User Baru</h2>
        <ul class="space-y-2">
            @forelse($latestUsers as $user)
                <li class="flex justify-between border-b pb-1">
                    <span>{{ $user->nama }}</span>
                    <span class="text-xs text-gray-500">{{ $user->created_at->format('d-m-Y') }}</span>
                </li>
            @empty
                <li class="text-gray-500">Belum ada user baru</li>
            @endforelse
        </ul>
    </div>

    {{-- Peminjaman --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-4">Peminjaman Terbaru</h2>
        <ul class="space-y-2">
            @forelse($latestPeminjaman as $pinjam)
                <li class="flex justify-between border-b pb-1">
                    <span>{{ $pinjam->user->nama ?? 'Unknown' }} - {{ $pinjam->barang->nama ?? 'Barang' }}</span>
                    <span class="text-xs text-gray-500">{{ $pinjam->created_at->format('d-m-Y') }}</span>
                </li>
            @empty
                <li class="text-gray-500">Belum ada peminjaman</li>
            @endforelse
        </ul>
    </div>

    {{-- Maintenance --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-4">Maintenance Terbaru</h2>
        <ul class="space-y-2">
            @forelse($latestMaintenance as $mt)
                <li class="flex justify-between border-b pb-1">
                    <span>{{ $mt->barang->nama ?? 'Barang' }} ({{ ucfirst($mt->status) }})</span>
                    <span class="text-xs text-gray-500">{{ $mt->created_at->format('d-m-Y') }}</span>
                </li>
            @empty
                <li class="text-gray-500">Belum ada maintenance</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
