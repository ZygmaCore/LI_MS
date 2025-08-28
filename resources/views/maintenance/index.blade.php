@extends('layouts.app')

@section('title', 'Daftar Maintenance')
@section('page-title', 'Daftar Maintenance')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Maintenance Barang</h2>
        <a href="{{ route('maintenance.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           + Tambah Maintenance
        </a>
    </div>

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
            <tr class="border-b">
                <td class="p-2">1</td>
                <td class="p-2">Proyektor</td>
                <td class="p-2">2025-08-25</td>
                <td class="p-2 text-yellow-600">Sedang diperbaiki</td>
                <td class="p-2">
                    <a href="{{ route('maintenance.edit', 1) }}" class="text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
