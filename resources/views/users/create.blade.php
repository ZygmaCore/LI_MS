@extends('layouts.app')

@section('title', 'Tambah User')
@section('page-title', 'Tambah User')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                   class="w-full border rounded p-2" required>
            @error('nama') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border rounded p-2" required>
            @error('email') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block">Password</label>
            <input type="text" name="password" class="w-full border rounded p-2" required>
            @error('password') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block">Konfirmasi Password</label>
            <input type="text" name="password_confirmation" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block">Role</label>
            <select name="role" class="w-full border rounded p-2" required>
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
                <option value="siswa" selected>Siswa</option>
            </select>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('users.index') }}" class="px-4 py-2 border rounded">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
