@extends('layouts.app')

@section('title', 'Daftar Barang')
@section('page-title', 'Daftar Barang')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Barang</h2>
        <a href="{{ route('barang.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           + Tambah Barang
        </a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">#</th>
                <th class="p-2">Nama Barang</th>
                <th class="p-2">Jumlah</th>
                <th class="p-2">Status</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td class="p-2">1</td>
                <td class="p-2">Laptop</td>
                <td class="p-2">15</td>
                <td class="p-2 text-green-600">Tersedia</td>
                <td class="p-2">
                    <a href="{{ route('barang.edit', 1) }}" class="text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
