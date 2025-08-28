@extends('layouts.auth')

@section('title', 'Verifikasi Email')
@section('page-title', 'Verifikasi Email Anda')

@push('styles')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes bounce {
        0%, 20%, 53%, 80%, 100% {
            transform: translate3d(0, 0, 0);
        }
        40%, 43% {
            transform: translate3d(0, -30px, 0);
        }
        70% {
            transform: translate3d(0, -15px, 0);
        }
        90% {
            transform: translate3d(0, -4px, 0);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    .animate-bounce-custom {
        animation: bounce 2s infinite;
    }
    
    .animate-pulse-custom {
        animation: pulse 2s infinite;
    }
    
    .email-icon {
        font-size: 4rem;
        animation: bounce 2s infinite;
    }
    
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }

    .btn-glow {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .btn-glow::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }
    
    .btn-glow:hover::before {
        left: 100%;
    }
    
    .btn-glow:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
</style>
@endpush

@section('content')
<div class="text-center space-y-8">
    
    <!-- Email Icon -->
    <div class="email-icon text-blue-600 mb-6 animate-bounce-custom">
        📧
    </div>
    
    <!-- Header -->
    <div class="animate-fadeInUp delay-200">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            Verifikasi Email Anda
        </h1>
        <p class="text-gray-600 mb-6 leading-relaxed">
            Kami telah mengirimkan email verifikasi ke alamat email <strong>{{ Auth::user()->email ?? 'yang Anda daftarkan' }}</strong>. 
            Silakan cek kotak masuk email Anda dan klik link verifikasi untuk mengaktifkan akun.
        </p>
    </div>
    
    <!-- Instructions -->
    <div class="bg-blue-50 rounded-xl p-6 mb-6 animate-fadeInUp delay-300">
        <h3 class="font-semibold text-blue-800 mb-3 flex items-center justify-center">
            <span class="mr-2">ℹ️</span>
            Langkah-langkah Verifikasi:
        </h3>
        <ol class="text-sm text-blue-700 text-left space-y-2">
            <li class="flex items-start">
                <span class="font-bold mr-2">1.</span>
                <span>Buka aplikasi email Anda (Gmail, Yahoo, dll)</span>
            </li>
            <li class="flex items-start">
                <span class="font-bold mr-2">2.</span>
                <span>Cari email dari "Inventaris Lab SMK Pesat"</span>
            </li>
            <li class="flex items-start">
                <span class="font-bold mr-2">3.</span>
                <span>Klik tombol "Verifikasi Email" dalam email</span>
            </li>
            <li class="flex items-start">
                <span class="font-bold mr-2">4.</span>
                <span>Akun Anda akan aktif dan siap digunakan!</span>
            </li>
        </ol>
    </div>
    
    <!-- Action Buttons -->
    <div class="space-y-4 animate-fadeInUp delay-400">
        <!-- Resend Email Form -->
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit" 
                    class="btn-glow w-full bg-blue-600 text-white py-3 px-4 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                🔄 Kirim Ulang Email Verifikasi
            </button>
        </form>
        
        <!-- Back to Login -->
        <a href="{{ route('login') }}" 
           class="block w-full bg-gray-100 text-gray-700 py-3 px-4 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-300 transform hover:scale-105">
            ← Kembali ke Login
        </a>
    </div>
    
    <!-- Help Section -->
    <div class="mt-8 p-4 bg-amber-50 rounded-xl border border-amber-200 animate-fadeInUp delay-500">
        <h4 class="font-semibold text-amber-800 mb-2">
            🤔 Tidak menerima email?
        </h4>
        <div class="text-sm text-amber-700 space-y-1">
            <p>• Cek folder Spam/Junk email Anda</p>
            <p>• Pastikan email yang dimasukkan benar</p>
            <p>• Tunggu hingga 5 menit untuk email sampai</p>
            <p>• Hubungi admin jika masih bermasalah</p>
        </div>
    </div>
    
    <!-- Contact Support -->
    <div class="mt-6 text-center">
        <p class="text-sm text-gray-500 mb-2">Butuh bantuan?</p>
        <a href="mailto:support@smkpesat.sch.id" class="text-blue-600 hover:text-blue-500 font-medium text-sm">
            📞 Hubungi Support SMK Pesat
        </a>
    </div>
    
    <!-- Footer Info -->
    <div class="text-center text-gray-500 text-sm mt-8">
        <p>Email verifikasi valid selama 24 jam</p>
    </div>
</div>

<!-- Success Toast (Hidden by default) -->
<div id="successToast" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 z-50">
    ✅ Email verifikasi berhasil dikirim ulang!
</div>

@push('scripts')
<script>
    // Show success message if email was resent
    @if(session('resent'))
        document.addEventListener('DOMContentLoaded', function() {
            const toast = document.getElementById('successToast');
            toast.classList.remove('translate-x-full');
            
            setTimeout(() => {
                toast.classList.add('translate-x-full');
            }, 5000);
        });
    @endif
    
    // Auto-refresh page every 30 seconds to check verification status
    let refreshInterval = setInterval(() => {
        // Check if user is verified
        fetch('{{ route("verification.check") }}')
            .then(response => response.json())
            .then(data => {
                if (data.verified) {
                    clearInterval(refreshInterval);
                    window.location.href = '{{ route("dashboard") }}';
                }
            })
            .catch(error => {
                console.log('Checking verification status...');
            });
    }, 30000);
    
    // Clear interval when page is unloaded
    window.addEventListener('beforeunload', () => {
        clearInterval(refreshInterval);
    });
</script>
@endpush

@endsection