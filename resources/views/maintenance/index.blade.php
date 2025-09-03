@extends('layouts.app')

@section('title', 'Daftar Maintenance')
@section('page-title', 'Daftar Maintenance')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Maintenance Barang</h2>
        <a href="{{ route('maintenances.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           + Tambah Maintenance
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
                <th class="p-2">Barang</th>
                <th class="p-2">Tanggal</th>
                <th class="p-2">Status</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($maintenances as $m)
            <tr class="border-b">
                <td class="p-2">{{ $m->id }}</td>
                <td class="p-2">{{ $m->barang->nama_barang ?? '-' }}</td>
                <td class="p-2">{{ $m->tanggal_maintenance }}</td>
                <td class="p-2 {{ $m->status == 'selesai' ? 'text-green-600' : 'text-yellow-600' }}">
                    {{ ucfirst(str_replace('_',' ',$m->status)) }}
                </td>
                <td class="p-2 flex gap-2">
                    <a href="{{ route('maintenances.edit', $m) }}" 
                       class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('maintenances.destroy', $m) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">Belum ada data maintenance</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
