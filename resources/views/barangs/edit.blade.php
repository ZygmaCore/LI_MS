@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <div class="mb-6">
            <h1 class="text-2xl font-semibold">Edit Barang</h1>
            <p class="text-sm text-gray-500">Editing: <span class="font-mono">{{ $barang->kode_barang }}</span></p>
        </div>

        <form action="{{ route('barangs.update', $barang) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Barang <span class="text-red-500">*</span></label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}"
                       class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                @error('nama_barang')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Kode Barang <span class="text-red-500">*</span></label>
                <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}"
                       class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                @error('kode_barang')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Jumlah Total <span class="text-red-500">*</span></label>
                <input type="number" name="jumlah_total" min="0" value="{{ old('jumlah_total', $barang->jumlah_total) }}"
                       class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                @error('jumlah_total')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Lab <span class="text-red-500">*</span></label>
                <select name="lab_id"
                        class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">— Select Lab —</option>
                    @foreach ($labs as $lab)
                        <option value="{{ $lab->id }}" @selected(old('lab_id', $barang->lab_id) == $lab->id)>
                            {{ $lab->nama_lab }}
                        </option>
                    @endforeach
                </select>
                @error('lab_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">
                    Update
                </button>
                <a href="{{ route('barangs.index') }}"
                   class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
                    Back
                </a>
            </div>
        </form>
    </div>
@endsection
