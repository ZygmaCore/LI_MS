<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Inventaris Lab SMK Pesat</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-fadeInLeft {
            animation: fadeInLeft 0.8s ease-out forwards;
        }

        .animate-slideIn {
            animation: slideIn 0.6s ease-out forwards;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .gradient-animate {
            background: linear-gradient(-45deg, #3b82f6, #1d4ed8, #2563eb, #1e40af);
            background-size: 400% 400%;
            animation: gradientShift 4s ease infinite;
        }

        .input-glow {
            transition: all 0.3s ease;
        }

        .input-glow:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
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

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            pointer-events: none;
            animation: float 4s ease-in-out infinite;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }

        .role-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .role-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .role-card.selected {
            border: 2px solid #3b82f6;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(29, 78, 216, 0.1));
            transform: scale(1.02);
        }

        .password-strength {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .strength-weak { background: #ef4444; width: 25%; }
        .strength-fair { background: #f59e0b; width: 50%; }
        .strength-good { background: #10b981; width: 75%; }
        .strength-strong { background: #059669; width: 100%; }
    </style>
</head>
<body class="min-h-screen gradient-animate overflow-x-hidden">

    <!-- Background particles -->
    <div class="particle w-2 h-2 top-1/4 left-1/4 delay-100"></div>
    <div class="particle w-3 h-3 top-1/3 right-1/4 delay-200"></div>
    <div class="particle w-1 h-1 top-3/4 left-1/3 delay-300"></div>
    <div class="particle w-2 h-2 top-1/2 right-1/3 delay-400"></div>
    <div class="particle w-1 h-1 top-1/5 left-3/4 delay-500"></div>

    <!-- Back to Home Button -->
    <div class="absolute top-6 left-6 z-50 animate-fadeInLeft">
        <a href="#" class="flex items-center space-x-2 text-white hover:text-gray-200 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="font-medium">Kembali ke Beranda</span>
        </a>
    </div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">

            <!-- Header -->
            <div class="text-center animate-fadeInUp">
                <div class="animate-float">
                    <h1 class="text-4xl font-extrabold text-white mb-2">
                        🔬 Inventaris Lab
                    </h1>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">Buat Akun Baru</h2>
                <p class="text-blue-100">Bergabunglah dengan SMK Pesat</p>
            </div>

            <!-- Form Container -->
            <div class="glass-effect rounded-2xl shadow-2xl p-8 animate-slideIn delay-200">
                <form class="space-y-6" id="registerForm">

                    <!-- Nama Lengkap -->
                    <div class="animate-fadeInUp delay-300">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            👤 Nama Lengkap
                        </label>
                        <input type="text"
                               id="name"
                               name="name"
                               required
                               class="input-glow w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                               placeholder="Masukkan nama lengkap Anda">
                    </div>

                    <!-- Email -->
                    <div class="animate-fadeInUp delay-400">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            📧 Email
                        </label>
                        <input type="email"
                               id="email"
                               name="email"
                               required
                               class="input-glow w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                               placeholder="nama@email.com">
                    </div>

                    <!-- Password -->
                    <div class="animate-fadeInUp delay-500">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            🔒 Password
                        </label>
                        <div class="relative">
                            <input type="password"
                                   id="password"
                                   name="password"
                                   required
                                   class="input-glow w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                   placeholder="Buat password yang kuat">
                            <button type="button"
                                    onclick="togglePassword('password')"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <svg id="eye-password" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Password Strength Indicator -->
                        <div class="mt-2">
                            <div class="bg-gray-200 h-1 rounded-full">
                                <div id="passwordStrength" class="password-strength bg-gray-300"></div>
                            </div>
                            <p id="strengthText" class="text-xs text-gray-500 mt-1">Minimal 8 karakter</p>
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="animate-fadeInUp delay-600">
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            🔐 Konfirmasi Password
                        </label>
                        <div class="relative">
                            <input type="password"
                                   id="password_confirmation"
                                   name="password_confirmation"
                                   required
                                   class="input-glow w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                                   placeholder="Ulangi password Anda">
                            <button type="button"
                                    onclick="togglePassword('password_confirmation')"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <svg id="eye-confirmation" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                        <div id="passwordMatch" class="hidden mt-1">
                            <p class="text-xs text-red-500">Password tidak cocok</p>
                        </div>
                    </div>

                    <!-- Role Selection -->
                    <div class="animate-fadeInUp" style="animation-delay: 0.7s;">
                        <label class="block text-sm font-semibold text-gray-700 mb-4">
                            👥 Daftar Sebagai
                        </label>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="role-card bg-white p-4 rounded-xl border-2 border-gray-200 text-center" onclick="selectRole('siswa')">
                                <div class="text-2xl mb-2">🎓</div>
                                <div class="text-sm font-medium text-gray-700">Siswa</div>
                            </div>
                            <div class="role-card bg-white p-4 rounded-xl border-2 border-gray-200 text-center" onclick="selectRole('guru')">
                                <div class="text-2xl mb-2">👨‍🏫</div>
                                <div class="text-sm font-medium text-gray-700">Guru</div>
                            </div>
                            <div class="role-card bg-white p-4 rounded-xl border-2 border-gray-200 text-center" onclick="selectRole('admin')">
                                <div class="text-2xl mb-2">⚙️</div>
                                <div class="text-sm font-medium text-gray-700">Admin</div>
                            </div>
                        </div>
                        <input type="hidden" id="role" name="role" value="">
                    </div>

                    <!-- Submit Button -->
                    <div class="animate-fadeInUp" style="animation-delay: 0.8s;">
                        <button type="submit"
                                class="btn-glow w-full bg-gradient-to-r from-green-500 to-green-600 text-white py-3 px-4 rounded-xl font-semibold text-lg hover:from-green-600 hover:to-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                                id="submitBtn"
                                disabled>
                            ✨ Buat Akun Sekarang
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center animate-fadeInUp" style="animation-delay: 0.9s;">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun?
                            <a href="/login" class="font-semibold text-blue-600 hover:text-blue-500 transition-colors">
                                Login di sini
                            </a>
                        </p>
                    </div>
                </form>
            </div>

            <!-- Features Preview -->
            <div class="text-center text-white animate-fadeInUp" style="animation-delay: 1s;">
                <p class="text-sm opacity-75 mb-4">Mengapa bergabung dengan kami?</p>
                <div class="flex justify-center space-x-6 text-xs">
                    <div class="flex items-center space-x-1">
                        <span>🚀</span>
                        <span>Mudah Digunakan</span>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span>🔒</span>
                        <span>Aman & Terpercaya</span>
                    </div>
                    <div class="flex items-center space-x-1">
                        <span>⚡</span>
                        <span>Real-time Updates</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedRole = '';

        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(`eye-${fieldId.replace('_', '-')}`);

            if (field.type === 'password') {
                field.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                `;
            } else {
                field.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }

        // Role selection
        function selectRole(role) {
            // Remove previous selection
            document.querySelectorAll('.role-card').forEach(card => {
                card.classList.remove('selected');
            });

            // Add selection to clicked card
            event.target.closest('.role-card').classList.add('selected');

            // Update hidden input
            document.getElementById('role').value = role;
            selectedRole = role;

            // Check form validation
            validateForm();
        }

        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('strengthText');

            let strength = 0;
            let text = '';

            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/)) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            strengthBar.className = 'password-strength';

            switch(strength) {
                case 0:
                case 1:
                    strengthBar.classList.add('strength-weak');
                    text = 'Password terlalu lemah';
                    break;
                case 2:
                    strengthBar.classList.add('strength-fair');
                    text = 'Password cukup';
                    break;
                case 3:
                case 4:
                    strengthBar.classList.add('strength-good');
                    text = 'Password baik';
                    break;
                case 5:
                    strengthBar.classList.add('strength-strong');
                    text = 'Password sangat kuat!';
                    break;
            }

            strengthText.textContent = text;
            validateForm();
        });

        // Password confirmation checker
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmation = this.value;
            const matchDiv = document.getElementById('passwordMatch');

            if (confirmation && password !== confirmation) {
                matchDiv.classList.remove('hidden');
                this.classList.add('border-red-300');
            } else {
                matchDiv.classList.add('hidden');
                this.classList.remove('border-red-300');
            }

            validateForm();
        });

        // Form validation
        function validateForm() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmation = document.getElementById('password_confirmation').value;
            const submitBtn = document.getElementById('submitBtn');

            const isValid = name &&
                           email &&
                           password.length >= 8 &&
                           password === confirmation &&
                           selectedRole;

            submitBtn.disabled = !isValid;

            if (isValid) {
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }
        }

        // Add event listeners to all inputs for real-time validation
        document.getElementById('name').addEventListener('input', validateForm);
        document.getElementById('email').addEventListener('input', validateForm);

        // Form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Add loading state
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '🔄 Memproses...';
            submitBtn.disabled = true;

            // Simulate form submission
            setTimeout(() => {
                // Redirect to verification page
                alert('Akun berhasil dibuat! Mengarahkan ke halaman verifikasi...');
                // In real Laravel app, this would be handled by the backend
                // window.location.href = "{{ route('verification.notice') }}";

                // For demo, we'll simulate redirect
                window.location.href = '#verification'; // This should be the verification page URL

                // Reset button (for demo if not redirecting)
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
    </script>

</body>
</html>
