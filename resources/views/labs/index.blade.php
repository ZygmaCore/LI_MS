@extends('layouts.app')

@section('title', 'Daftar Lab')
@section('page-title', 'Daftar Lab')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Laboratorium</h2>
        <a href="{{ route('labs.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           + Tambah Lab
        </a>
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">#</th>
                <th class="p-2">Nama Lab</th>
                <th class="p-2">Keterangan</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b">
                <td class="p-2">1</td>
                <td class="p-2">Lab Komputer</td>
                <td class="p-2">Tersedia 30 unit PC</td>
                <td class="p-2">
                    <a href="{{ route('labs.edit', 1) }}" class="text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
