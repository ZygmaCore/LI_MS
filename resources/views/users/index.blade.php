@extends('layouts.app')

@section('title', 'User Management')
@section('page-title', 'User Management')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar User</h2>

    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->email }}</td>
                <td><span class="badge bg-info">{{ ucfirst($user->role) }}</span></td>
                <td>
                    <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-success">Detail</a>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus user ini?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada user</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
