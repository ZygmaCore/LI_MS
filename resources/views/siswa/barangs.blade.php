@extends('layouts.app')

@section('title', 'Daftar Barang')
@section('page-title', 'Daftar Barang Tersedia')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-lg font-semibold mb-4">Daftar Barang</h2>

    @if(session('success'))
        <div class="mb-4 rounded bg-green-50 text-green-800 px-4 py-3">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="mb-4 rounded bg-red-50 text-red-800 px-4 py-3">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2">#</th>
                <th class="p-2">Nama Barang</th>
                <th class="p-2">Kode</th>
                <th class="p-2">Stok</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangs as $b)
            <tr class="border-b">
                <td class="p-2">{{ $b->id }}</td>
                <td class="p-2">{{ $b->nama_barang }}</td>
                <td class="p-2">{{ $b->kode_barang }}</td>
                <td class="p-2">{{ $b->jumlah_total }}</td>
                <td class="p-2">
                    <form action="{{ url('/siswa/pinjam/'.$b->id) }}" method="POST" class="flex items-center gap-2">
                        @csrf
                        <input type="number" name="jumlah" min="1" class="border rounded p-1 w-24" placeholder="Jumlah" required>
                        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed" @if($b->jumlah_total <= 0) disabled @endif>
                            Pinjam
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">Belum ada barang</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
