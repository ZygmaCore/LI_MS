@extends('layouts.app')

@section('title', 'Edit Maintenance')
@section('page-title', 'Edit Maintenance')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('maintenance.update', $maintenance) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block mb-1">Barang</label>
            <select name="barang_id" class="w-full border rounded p-2" required>
                @foreach($labs as $lab)
                    <option value="{{ $lab->id }}" 
                        {{ $lab->id == $maintenance->barang_id ? 'selected' : '' }}>
                        {{ $lab->nama_lab }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border rounded p-2" 
                   value="{{ $maintenance->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Status</label>
            <input type="text" name="status" class="w-full border rounded p-2" 
                   value="{{ $maintenance->status }}" required>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        <a href="{{ route('maintenance.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
