<nav class="bg-white/80 backdrop-blur-md p-4 px-8 flex justify-between items-center sticky top-0 z-50 border-b border-amber-100">
    <div class="flex items-center gap-3">
        <img src="{{ asset('images/aliacookies.png') }}" class="w-10 h-10">
        <h1 class="font-serif font-bold text-lg text-[#5D4037]">ALIACOOKIES</h1>
    </div>

    <ul class="flex space-x-8 font-bold text-[11px] uppercase tracking-widest text-[#5D4037]">
        @php $u = request('username'); @endphp
        <li class="relative group">
            <a href="{{ route('dashboard', ['username' => $u]) }}" class="{{ request()->routeIs('dashboard') ? 'text-[#8B4513]' : '' }}">Dashboard</a>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#8B4513] transition-all duration-300 group-hover:w-full {{ request()->routeIs('dashboard') ? 'w-full' : '' }}"></span>
        </li>
        <li class="relative group">
            <a href="{{ route('pengelolaan', ['username' => $u]) }}" class="{{ request()->routeIs('pengelolaan') ? 'text-[#8B4513]' : '' }}">Pengelolaan</a>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#8B4513] transition-all duration-300 group-hover:w-full {{ request()->routeIs('pengelolaan') ? 'w-full' : '' }}"></span>
        </li>
        <li class="relative group">
            <a href="{{ route('profile', ['username' => request('username')]) }}">Profile</a>
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#8B4513] transition-all duration-300 group-hover:w-full {{ request()->routeIs('profile') ? 'w-full' : '' }}"></span>
        </li>
    </ul>

    <div class="relative">
        <button id="profileBtn" class="w-10 h-10 rounded-full bg-[#EBD9C8] flex items-center justify-center text-xl border-2 border-white shadow-sm overflow-hidden focus:outline-none transition hover:scale-105">
            👤
        </button>

        <div id="profileMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-amber-50 hidden overflow-hidden z-50">
            <a href="{{ route('profile', ['username' => request('username')]) }}" class="block px-6 py-4 text-xs font-bold hover:bg-[#FDF5E6] transition text-[#5D4037]">👁️ Lihat Akun</a>
            <a href="/" class="block px-6 py-4 text-xs font-bold text-red-500 hover:bg-red-50 transition border-t border-amber-50">🚪 Logout</a>
        </div>
    </div>
</nav>
