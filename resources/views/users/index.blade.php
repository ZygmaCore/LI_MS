@extends('layouts.app')

@section('title', 'Daftar User')
@section('page-title', 'Daftar User')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold">Manajemen User</h2>
        <a href="{{ route('users.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           + Tambah User
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
                <th class="p-2">Nama</th>
                <th class="p-2">Email</th>
                <th class="p-2">Role</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
            <tr class="border-b">
                <td class="p-2">{{ $u->id }}</td>
                <td class="p-2">{{ $u->nama }}</td>
                <td class="p-2">{{ $u->email }}</td>
                <td class="p-2 capitalize">{{ $u->role }}</td>
                <td class="p-2 flex gap-2">
                    <a href="{{ route('users.edit', $u) }}" 
                       class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('users.destroy', $u) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus user ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">Belum ada user</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
