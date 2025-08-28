<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Lab - SMK Pesat</title>
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

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
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

        .animate-fadeInRight {
            animation: fadeInRight 0.8s ease-out forwards;
        }

        .animate-pulse-custom {
            animation: pulse 2s infinite;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .gradient-animate {
            background: linear-gradient(-45deg, #3b82f6, #1d4ed8, #2563eb, #1e40af);
            background-size: 400% 400%;
            animation: gradientShift 4s ease infinite;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }

        .btn-glow {
            position: relative;
            overflow: hidden;
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

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            pointer-events: none;
            animation: float 4s ease-in-out infinite;
        }

        .navbar-scroll {
            transition: all 0.3s ease;
        }

        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased overflow-x-hidden">

    <!-- Navbar dengan efek scroll -->
    <nav class="navbar-scroll fixed w-full z-50 bg-white shadow-md p-4 flex justify-between items-center">
        <div class="animate-fadeInLeft">
            <h1 class="text-xl font-bold text-blue-700 hover:text-blue-800 transition-colors">
                <span class="animate-float inline-block">🔬</span> Inventaris Lab
            </h1>
        </div>
{{--        <div class="animate-fadeInRight">--}}
{{--            <a href="{{ route('login') }}"--}}
{{--               class="btn-glow px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-all duration-300 mr-2 transform hover:scale-105">--}}
{{--               Login--}}
{{--            </a>--}}
{{--            <a href="{{ route('register') }}"--}}
{{--               class="btn-glow px-6 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-full hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-105">--}}
{{--               Register--}}
{{--            </a>--}}
{{--        </div>--}}
    </nav>

    <!-- Hero Section dengan efek gradien animasi -->
    <section class="relative text-center py-32 gradient-animate text-white overflow-hidden min-h-screen flex items-center">
        <!-- Partikel floating -->
        <div class="particle w-2 h-2 top-1/4 left-1/4 delay-100"></div>
        <div class="particle w-3 h-3 top-1/3 right-1/4 delay-200"></div>
        <div class="particle w-1 h-1 top-3/4 left-1/3 delay-300"></div>
        <div class="particle w-2 h-2 top-1/2 right-1/3 delay-400"></div>
        <div class="particle w-1 h-1 top-1/5 left-3/4 delay-500"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="animate-fadeInUp delay-100">
                <h2 class="text-6xl md:text-7xl font-extrabold mb-6 leading-tight">
                    Selamat Datang di
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300 animate-pulse-custom">
                        Sistem Inventaris Lab
                    </span>
                </h2>
            </div>

            <div class="animate-fadeInUp delay-200">
                <p class="text-xl md:text-2xl mb-8 opacity-90 max-w-3xl mx-auto leading-relaxed">
                    Mengelola barang, peminjaman, dan maintenance dengan lebih mudah dan efisien
                </p>
            </div>

            <div class="animate-fadeInUp delay-300">
                @guest
                <div class="flex items-center justify-center gap-4">
                    <a href="{{ route('register') }}"
                       class="btn-glow inline-block bg-white text-blue-700 px-8 py-4 rounded-full shadow-2xl hover:bg-gray-100 font-bold text-lg transform hover:scale-110 transition-all duration-300">
                       🚀 Daftar Sekarang
                    </a>
                    <a href="{{ route('login') }}"
                       class="inline-block bg-transparent border border-white/70 text-white px-8 py-4 rounded-full shadow hover:bg-white/10 font-bold text-lg transform hover:scale-110 transition-all duration-300">
                       🔑 Login
                    </a>
                </div>
                @else
                <a href="{{ route('dashboard') }}"
                   class="btn-glow inline-block bg-white text-blue-700 px-8 py-4 rounded-full shadow-2xl hover:bg-gray-100 font-bold text-lg transform hover:scale-110 transition-all duration-300">
                   🏠 Ke Dashboard
                </a>
                @endguest
            </div>

            <!-- Floating icons -->
            <div class="absolute top-20 left-10 animate-float delay-100">
                <div class="text-4xl opacity-20">📊</div>
            </div>
            <div class="absolute top-40 right-20 animate-float delay-300">
                <div class="text-3xl opacity-20">⚙️</div>
            </div>
            <div class="absolute bottom-20 left-1/4 animate-float delay-500">
                <div class="text-5xl opacity-20">💻</div>
            </div>
        </div>
    </section>

    <!-- Fitur Utama dengan animasi card -->
    <section class="max-w-7xl mx-auto py-20 px-6 relative">
        <div class="animate-fadeInUp text-center mb-16">
            <h3 class="text-4xl font-bold text-gray-800 mb-4">✨ Fitur Unggulan</h3>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Solusi lengkap untuk mengelola inventaris laboratorium modern
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="card-hover bg-white p-8 rounded-2xl shadow-lg border border-gray-100 animate-fadeInUp delay-100">
                <div class="text-center">
                    <div class="text-6xl mb-4 animate-float">📦</div>
                    <h4 class="text-2xl font-bold mb-4 text-gray-800">Manajemen Barang</h4>
                    <p class="text-gray-600 leading-relaxed">
                        Tambah, edit, dan kelola seluruh barang laboratorium dengan interface yang intuitif dan mudah digunakan
                    </p>
                </div>
                <div class="mt-6 flex justify-center">
                    <div class="w-20 h-1 bg-gradient-to-r from-blue-400 to-blue-600 rounded"></div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card-hover bg-white p-8 rounded-2xl shadow-lg border border-gray-100 animate-fadeInUp delay-200">
                <div class="text-center">
                    <div class="text-6xl mb-4 animate-float delay-100">📑</div>
                    <h4 class="text-2xl font-bold mb-4 text-gray-800">Sistem Peminjaman</h4>
                    <p class="text-gray-600 leading-relaxed">
                        Catat dan pantau semua peminjaman barang dengan sistem tracking real-time untuk guru dan siswa
                    </p>
                </div>
                <div class="mt-6 flex justify-center">
                    <div class="w-20 h-1 bg-gradient-to-r from-green-400 to-green-600 rounded"></div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card-hover bg-white p-8 rounded-2xl shadow-lg border border-gray-100 animate-fadeInUp delay-300">
                <div class="text-center">
                    <div class="text-6xl mb-4 animate-float delay-200">🔧</div>
                    <h4 class="text-2xl font-bold mb-4 text-gray-800">Smart Maintenance</h4>
                    <p class="text-gray-600 leading-relaxed">
                        Kelola jadwal perawatan & perbaikan barang dengan sistem reminder otomatis
                    </p>
                </div>
                <div class="mt-6 flex justify-center">
                    <div class="w-20 h-1 bg-gradient-to-r from-orange-400 to-orange-600 rounded"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer dengan animasi -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center animate-fadeInUp">
                <div class="text-2xl font-bold mb-4">
                    <span class="animate-float inline-block">🔬</span> Inventaris Lab - SMK Pesat
                </div>
                <p class="text-gray-400 mb-4">
                    Mengelola laboratorium dengan teknologi terdepan
                </p>
                <div class="flex justify-center space-x-6 mb-6">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">📧 Email</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">📱 WhatsApp</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">🌐 Website</a>
                </div>
                <div class="border-t border-gray-800 pt-6">
                    <p class="text-gray-500">
                        &copy; <span id="currentYear"></span> Inventaris Lab - SMK Pesat. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Update tahun otomatis
        document.getElementById('currentYear').textContent = new Date().getFullYear();

        // Efek navbar saat scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-scroll');
            if (window.scrollY > 100) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Intersection Observer untuk animasi saat scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeInUp');
                }
            });
        }, observerOptions);

        // Observe semua elemen yang memiliki class untuk animasi
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.card-hover, .animate-fadeInUp');
            animatedElements.forEach(el => observer.observe(el));
        });

        // Smooth scrolling untuk anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

</body>
</html>
