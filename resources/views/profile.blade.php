@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-[40px] border border-amber-100 shadow-xl overflow-hidden">
        <div class="h-40 bg-[#5D4037] relative">
            <div class="absolute -bottom-12 left-10 w-24 h-24 bg-white p-2 rounded-3xl shadow-lg text-4xl flex items-center justify-center">👤</div>
        </div>
        <div class="p-10 pt-16">
            <h1 class="text-3xl font-serif font-bold text-[#5D4037]">{{ $username }}</h1>
            <p class="text-amber-800 font-bold uppercase text-[10px] tracking-widest mt-1">Lead Admin Alia Cookies</p>

            <div class="grid grid-cols-2 gap-4 mt-10">
                <div class="bg-[#FDF5E6] p-6 rounded-3xl">
                    <p class="text-[10px] font-bold opacity-40 uppercase">ID Admin</p>
                    <p class="font-bold text-[#5D4037]">ADM-2026-{{ strtoupper(substr($username, 0, 3)) }}</p>
                </div>
                <div class="bg-[#FDF5E6] p-6 rounded-3xl">
                    <p class="text-[10px] font-bold opacity-40 uppercase">Akses Level</p>
                    <p class="font-bold text-green-600">Full Access</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
