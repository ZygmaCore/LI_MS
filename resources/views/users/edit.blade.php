@extends('layouts.app')

@section('title', 'Edit User')
@section('page-title', 'Edit User')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')

        <div>
            <label class="block">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" 
                   class="w-full border rounded p-2" required>
            @error('nama') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                   class="w-full border rounded p-2" required>
            @error('email') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block">Password (opsional)</label>
            <input type="password" name="password" class="w-full border rounded p-2">
            @error('password') <div class="text-red-600">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block">Role</label>
            <select name="role" class="w-full border rounded p-2" required>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
            </select>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('users.index') }}" class="px-4 py-2 border rounded">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
