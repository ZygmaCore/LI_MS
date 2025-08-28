@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">Daftar Barang</h1>
            <a href="{{ route('barangs.create') }}"
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md bg-indigo-600 text-white hover:bg-indigo-700">
                + Tambah Barang
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-50 p-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('barangs.index') }}" method="GET" class="mb-6">
            <div class="flex gap-2">
                <input type="text" name="q" value="{{ $q ?? request('q') ?? '' }}"
                       placeholder="Cari nama atau kode…"
                       class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                       aria-label="Pencarian barang">
                <button type="submit"
                        class="px-4 py-2 rounded-md bg-gray-800 text-white hover:bg-gray-900">
                    Cari
                </button>
                @if (!empty($q ?? request('q')))
                    <a href="{{ route('barangs.index') }}"
                       class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
                        Bersihkan
                    </a>
                @endif
            </div>
        </form>

        <div class="overflow-x-auto max-h-[60vh] overflow-y-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 sticky top-0 z-10">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Laboratorium</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dibuat</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($barangs as $barang)
                    <tr>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $barang->kode_barang }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $barang->nama_barang }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ $barang->lab?->nama_lab ?? '—' }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $barang->jumlah_total }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ $barang->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-right">
                            <div class="flex items-center gap-2 justify-end">
                                <a href="{{ route('barangs.edit', $barang) }}"
                                   class="px-3 py-1 rounded-md border border-indigo-600 text-indigo-600 hover:bg-indigo-50">Edit</a>

                                <form action="{{ route('barangs.destroy', $barang) }}" method="POST"
                                      onsubmit="return confirm('Hapus item ini secara permanen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 rounded-md border border-red-600 text-red-600 hover:bg-red-50">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-sm text-gray-500">
                            Tidak ada data @if(!empty($q ?? request('q'))) untuk “{{ $q ?? request('q') }}” @endif.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $barangs->links() }}
        </div>
    </div>
@endsection
