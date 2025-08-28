<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- Navbar --}}
    @include('components.navbar')

    <div class="flex">
        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main Content --}}
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-6">@yield('page-title')</h1>
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
