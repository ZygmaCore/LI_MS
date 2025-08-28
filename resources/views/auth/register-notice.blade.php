@extends('layouts.auth')

@section('title', 'Cek Email Anda')
@section('page-title', 'Verifikasi Pendaftaran')

@section('content')
<div class="text-center space-y-6">
    <div class="text-5xl">📬</div>
    <h2 class="text-xl font-semibold">Silakan cek email Anda</h2>
    <p class="text-gray-600 text-sm">
        Kami telah mengirimkan link verifikasi ke <strong>{{ $email ?? 'alamat email Anda' }}</strong>.
        Klik link tersebut untuk mengaktifkan akun.
    </p>
    <a href="{{ route('home') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Kembali ke Beranda</a>
</div>
@endsection
