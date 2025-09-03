@extends('layouts.auth')

@section('title', 'Login')
@section('page-title', 'Login ke Akun Anda')

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

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-slideIn {
        animation: slideIn 0.6s ease-out forwards;
    }

    .input-glow {
        transition: all 0.3s ease;
    }

    .input-glow:focus {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        border-color: #3b82f6;
        outline: none;
        ring: 2px solid #3b82f6;
    }

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

    .checkbox-custom {
        appearance: none;
        width: 1.2rem;
        height: 1.2rem;
        border: 2px solid #d1d5db;
        border-radius: 0.375rem;
        position: relative;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .checkbox-custom:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
    }

    .checkbox-custom:checked::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 0.75rem;
        font-weight: bold;
    }

    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }
</style>
@endpush

@section('content')
<div class="animate-slideIn delay-200">
    <form action="{{ route('login') }}" method="POST" class="space-y-6" id="loginForm">
        @csrf

        {{-- Display Errors --}}
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 animate-fadeInUp">
                <div class="flex">
                    <div class="text-red-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            Terjadi kesalahan!
                        </h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Success Message --}}
        @if(session('status'))
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 animate-fadeInUp">
                <div class="flex">
                    <div class="text-green-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('status') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Email --}}
        <div class="animate-fadeInUp delay-300">
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                📧 Email
            </label>
            <input type="email"
                   id="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   class="input-glow w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('email') border-red-300 @enderror"
                   placeholder="nama@email.com"
                   autocomplete="email">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="animate-fadeInUp delay-400">
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                🔒 Password
            </label>
            <div class="relative">
                <input type="password"
                       id="password"
                       name="password"
                       required
                       class="input-glow w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('password') border-red-300 @enderror"
                       placeholder="Masukkan password Anda"
                       autocomplete="current-password">
                <button type="button"
                        onclick="togglePassword()"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 transition-colors">
                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </button>
            </div>
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="flex items-center justify-between animate-fadeInUp delay-500">
            <div class="flex items-center">
                <input type="checkbox"
                       id="remember"
                       name="remember"
                       {{ old('remember') ? 'checked' : '' }}
                       class="checkbox-custom mr-3">
                <label for="remember" class="text-sm text-gray-600 select-none cursor-pointer">
                    Ingat saya
                </label>
            </div>
            <a href="{{ route('password.request') }}"
               class="text-sm text-blue-600 hover:text-blue-500 font-medium transition-colors">
                Lupa Password?
            </a>
        </div>

        {{-- Submit Button --}}
        <div class="animate-fadeInUp delay-600">
            <button type="submit"
                    class="btn-glow w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white py-3 px-4 rounded-xl font-semibold text-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                    id="submitBtn">
                🚀 Masuk Sekarang
            </button>
        </div>

        {{-- Register Link --}}
        <div class="text-center animate-fadeInUp delay-700">
            <p class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:text-blue-500 transition-colors">
                    Daftar sekarang
                </a>
            </p>
        </div>
    </form>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-xl shadow-2xl text-center">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
        <p class="text-gray-700 font-medium">Memproses login...</p>
    </div>
</div>

@push('scripts')
<script>
    // Toggle password visibility
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
            `;
        } else {
            passwordField.type = 'password';
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            `;
        }
    }

    // Enhanced form submission with loading state
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const originalText = submitBtn.innerHTML;

        // Show loading state
        submitBtn.innerHTML = '⏳ Memproses...';
        submitBtn.disabled = true;
        loadingOverlay.classList.remove('hidden');

        // Note: In real Laravel app, form will submit normally
        // This is just for demo purposes

        // Remove loading state after a delay (for demo)
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            loadingOverlay.classList.add('hidden');
        }, 3000);
    });

    // Auto-focus email field when page loads
    window.addEventListener('load', () => {
        document.getElementById('email').focus();
    });

    // Enter key navigation
    document.getElementById('email').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            document.getElementById('password').focus();
        }
    });

    // Enhanced error handling
    @if ($errors->any())
        // Scroll to error message
        document.addEventListener('DOMContentLoaded', function() {
            const errorElement = document.querySelector('.bg-red-50');
            if (errorElement) {
                errorElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });
    @endif

    // Auto-hide success messages
    @if(session('status'))
        setTimeout(() => {
            const successMessage = document.querySelector('.bg-green-50');
            if (successMessage) {
                successMessage.style.transition = 'opacity 0.5s ease-out';
                successMessage.style.opacity = '0';
                setTimeout(() => {
                    successMessage.remove();
                }, 500);
            }
        }, 5000);
    @endif
</script>
@endpush

@endsection
