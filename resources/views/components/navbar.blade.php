<nav class="bg-white border-b border-gray-200 sticky top-0 z-40">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <div class="flex items-center space-x-3">
        <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">Inventaris Lab</a>
        <span class="hidden sm:inline-block text-gray-400">|</span>
        <span class="hidden sm:inline-block text-sm text-gray-600">SMK Pesat</span>
      </div>
      <div class="flex items-center space-x-4">
        @auth
          <span class="text-sm text-gray-700">Halo, {{ Auth::user()->nama ?? Auth::user()->email }}</span>
          <a href="{{ route('dashboard') }}" class="text-sm text-blue-600 hover:text-blue-500">Dashboard</a>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-sm text-red-600 hover:text-red-500">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900">Login</a>
          <a href="{{ route('register') }}" class="text-sm text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-lg">Register</a>
        @endauth
      </div>
    </div>
  </div>
</nav>
