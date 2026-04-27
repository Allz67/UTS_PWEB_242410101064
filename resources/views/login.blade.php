@extends('layouts.app') @section('content')
<div class="max-w-md mx-auto bg-white p-10 rounded-3xl border border-amber-100 shadow-xl text-center">
    <h2 class="font-serif text-3xl font-bold mb-2">Selamat Datang</h2>
    <p class="text-sm text-gray-500 mb-8">Masuk ke Dashboard Alia Cookies</p>

    <form action="{{ route('dashboard') }}" method="GET">
        <input type="text" name="username" placeholder="Username Admin"
               class="w-full p-4 rounded-2xl bg-[#F9F6F2] border-none outline-none mb-4" required>
        <button type="submit" class="w-full bg-[#8B4513] text-white py-4 rounded-2xl font-bold uppercase tracking-widest hover:bg-[#5D4037] transition">
            Masuk
        </button>
    </form>
</div>
@endsection
