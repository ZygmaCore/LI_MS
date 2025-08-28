<aside class="w-64 bg-white border-r border-gray-200 min-h-screen hidden md:block">
  <nav class="p-4 space-y-1">
    <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">🏠 Dashboard</a>
    @auth
      @if(Auth::user()->role === 'admin')
        <a href="{{ route('users.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">👤 Users</a>
        <a href="{{ route('labs.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">🏫 Labs</a>
      @endif
      @if(in_array(Auth::user()->role, ['admin','guru']))
        <a href="{{ route('barangs.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">📦 Barang</a>
        <a href="{{ route('peminjamans.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">📋 Peminjaman</a>
        <a href="{{ route('maintenances.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">🛠️ Maintenance</a>
      @endif
      @if(Auth::user()->role === 'siswa')
        <a href="{{ url('/siswa/barang') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">📚 Daftar Barang</a>
        <a href="{{ url('/siswa/riwayat') }}" class="block px-3 py-2 rounded hover:bg-gray-100 text-gray-700">🕓 Riwayat</a>
      @endif
    @endauth
  </nav>
</aside>
