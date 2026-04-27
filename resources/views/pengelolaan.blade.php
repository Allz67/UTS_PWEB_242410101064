@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-serif font-bold text-[#5D4037]">Manajemen Inventaris</h1>
    <p class="opacity-60 text-sm italic">Pantau dan kelola ketersediaan stok Alia Cookies secara real-time.</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
    <div class="lg:col-span-2 bg-white rounded-3xl border border-amber-100 shadow-sm overflow-hidden">
        <div class="p-6 flex justify-between items-center border-b border-amber-50 bg-[#F9F6F2]/30">
            <h3 class="font-bold italic font-serif text-[#5D4037]">Ikhtisar Stok</h3>
            <button onclick="alert('Fitur tambah segera hadir!')" class="text-[10px] bg-[#8B4513] text-white px-5 py-2.5 rounded-xl font-bold uppercase tracking-widest hover:bg-[#5D4037] transition">
                + Tambah Produk
            </button>
        </div>
        <div class="p-8 grid grid-cols-2 md:grid-cols-4 gap-6">
            <div>
                <p class="text-[10px] uppercase font-bold opacity-40">Total Cookies</p>
                <p class="text-2xl font-serif font-bold text-[#5D4037]">240 Unit</p>
            </div>
            <div>
                <p class="text-[10px] uppercase font-bold opacity-40">Total Hampers</p>
                <p class="text-2xl font-serif font-bold text-[#5D4037]">45 Unit</p>
            </div>
            <div>
                <p class="text-[10px] uppercase font-bold opacity-40">Kapasitas Gudang</p>
                <p class="text-2xl font-serif font-bold text-[#5D4037]">85%</p>
            </div>
            <div>
                <p class="text-[10px] uppercase font-bold opacity-40 text-red-500">Perlu Restok</p>
                <p class="text-2xl font-serif font-bold text-red-600">3 Varian</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-8 rounded-3xl border border-amber-100 shadow-sm h-full flex flex-col items-center justify-center">
        <h3 class="font-bold mb-6 text-[10px] opacity-60 uppercase tracking-widest text-center">Proporsi Kategori Produk</h3>
        <div class="w-full h-40">
            <canvas id="stokChart"></canvas>
        </div>
    </div>
</div>

<div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <div class="flex gap-3 w-full md:w-auto">
        <input type="text" id="searchBar" placeholder="Cari nama cookies..."
               class="p-3 px-6 rounded-2xl bg-white border border-amber-100 text-sm outline-none w-full md:w-80 shadow-sm focus:border-[#8B4513] transition-all">

        <select id="filterCategory"
                class="p-3 px-6 rounded-2xl bg-white border border-amber-100 text-sm font-bold outline-none shadow-sm cursor-pointer focus:border-[#8B4513]">
            <option value="all">Semua Kategori</option>
            <option value="Cookies">Cookies</option>
            <option value="Hampers">Hampers</option>
        </select>
    </div>
    <p class="text-[10px] font-bold opacity-40 uppercase">Menampilkan {{ count($products) }} Produk Terdaftar</p>
</div>

<div class="bg-white rounded-[32px] border border-amber-100 shadow-sm overflow-hidden mb-10">
    <table class="w-full text-left border-collapse" id="productTable">
        <thead>
            <tr class="bg-[#5D4037] text-[#FDF5E6] text-[10px] uppercase tracking-widest">
                <th class="p-6">Detail Produk</th>
                <th class="p-6">Kategori</th>
                <th class="p-6 text-center">Status Stok</th>
                <th class="p-6">Harga Satuan</th>
                <th class="p-6 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @foreach($products as $item)
            <tr class="border-b border-amber-50 hover:bg-[#FDF5E6]/50 transition product-row group" data-category="{{ $item['kategori'] }}">
                <td class="p-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-50 flex items-center justify-center text-xl shadow-inner group-hover:scale-110 transition-transform">
                            🍪
                        </div>
                        <div>
                            <span class="font-bold block text-[#5D4037] product-name text-base">{{ $item['nama'] }}</span>
                            <span class="text-[10px] opacity-40 uppercase font-bold tracking-tighter italic">{{ $item['kode'] }}</span>
                        </div>
                    </div>
                </td>
                <td class="p-6">
                    <span class="px-3 py-1 rounded-lg bg-amber-50 text-amber-800 font-bold text-[10px] uppercase tracking-wider">
                        {{ $item['kategori'] }}
                    </span>
                </td>
                <td class="p-6 text-center">
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-base font-bold {{ $item['stok'] < 5 ? 'text-red-600' : 'text-green-700' }}">
                            {{ $item['stok'] }} Unit
                        </span>
                        <span class="text-[9px] uppercase font-bold opacity-40">
                            {{ $item['stok'] < 5 ? 'Stok Kritis' : 'Stok Aman' }}
                        </span>
                    </div>
                </td>
                <td class="p-6 font-bold text-[#5D4037] text-base">
                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                </td>
                <td class="p-6 text-center">
                    <div class="flex gap-2 justify-center">
                        <button onclick="alert('Fitur Edit hanya tersedia di Versi Pro (Database)')"
                                class="p-2 px-5 bg-amber-100 text-amber-800 rounded-xl text-[10px] font-bold uppercase hover:bg-amber-200 transition">
                            Edit
                        </button>
                        <button onclick="alert('Akses Ditolak: Anda tidak memiliki izin menghapus data')"
                                class="p-2 px-5 bg-red-50 text-red-400 rounded-xl text-[10px] font-bold uppercase hover:bg-red-100 transition">
                            Hapus
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctxStok = document.getElementById('stokChart').getContext('2d');
        new Chart(ctxStok, {
            type: 'doughnut',
            data: {
                labels: ['Cookies', 'Hampers'],
                datasets: [{
                    data: [{{ count(array_filter($products, fn($p) => $p['kategori'] == 'Cookies')) }},
                          {{ count(array_filter($products, fn($p) => $p['kategori'] == 'Hampers')) }}],
                    backgroundColor: ['#5D4037', '#EBD9C8'],
                    hoverOffset: 10,
                    borderWidth: 0
                }]
            },
            options: {
                cutout: '75%',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                family: 'Quicksand',
                                weight: 'bold',
                                size: 10
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
