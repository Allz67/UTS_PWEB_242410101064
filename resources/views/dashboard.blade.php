@extends('layouts.app')

@section('content')
<div class="mb-10">
    <h1 class="text-3xl font-serif font-bold italic">Ringkasan Penjualan</h1>
    <p class="opacity-60 text-sm">Update terakhir: {{ date('d M Y') }}</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
    <div class="bg-white p-8 rounded-3xl border border-amber-100 shadow-sm">
        <p class="text-[10px] uppercase font-bold opacity-50 tracking-widest mb-2">Total Pendapatan</p>
        <h2 class="text-3xl font-serif font-bold text-green-700">Rp 495.000</h2>
    </div>
    <div class="bg-white p-8 rounded-3xl border border-amber-100 shadow-sm">
        <p class="text-[10px] uppercase font-bold opacity-50 tracking-widest mb-2">Customer Baru</p>
        <h2 class="text-3xl font-serif font-bold">12 Orang</h2>
    </div>
    <div class="bg-[#5D4037] p-8 rounded-3xl text-white shadow-md">
        <p class="text-[10px] uppercase font-bold opacity-70 tracking-widest mb-2">Transaksi Hari Ini</p>
        <h2 class="text-3xl font-serif font-bold">3 Pesanan</h2>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
    <div class="lg:col-span-2 bg-white p-8 rounded-3xl border border-amber-100 shadow-sm">
        <h3 class="font-serif font-bold mb-6 text-[#5D4037]">Tren Penjualan Mingguan</h3>
        <canvas id="salesChart" height="150"></canvas>
    </div>
    <div class="space-y-6">
        <div class="bg-[#5D4037] p-8 rounded-3xl text-white shadow-lg">
            <p class="text-[10px] uppercase font-bold opacity-70 mb-1">Profit Bersih</p>
            <h2 class="text-3xl font-serif font-bold">Rp 3.250.000</h2>
            <p class="text-[10px] mt-4 text-green-400 font-bold">▲ 12% vs bulan lalu</p>
        </div>
    </div>
</div>

<script>
    const ctxSales = document.getElementById('salesChart').getContext('2d');
    new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: @json($chartLabels),
            datasets: [{
                label: 'Penjualan Mingguan',
                data: @json($chartData),
                borderColor: '#8B4513',
                backgroundColor: 'rgba(139, 69, 19, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>

<div class="mb-6 flex justify-between items-end">
    <div>
        <h3 class="font-serif font-bold text-xl text-[#5D4037]">Riwayat Transaksi</h3>
        <p class="text-[10px] opacity-50 uppercase font-bold tracking-widest">7 Hari Terakhir</p>
    </div>
</div>

<div class="bg-white rounded-[32px] border border-amber-100 shadow-sm overflow-hidden mb-10">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-[#5D4037] text-[#FDF5E6] text-[10px] uppercase tracking-widest">
                <th class="p-6">Tanggal</th>
                <th class="p-6">Pelanggan</th>
                <th class="p-6 text-right">Total Transaksi</th>
                <th class="p-6 text-center">Status</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @foreach($transactions as $trx)
            <tr class="border-b border-amber-50 hover:bg-[#FDF5E6]/50 transition cursor-default group">
                <td class="p-6 font-medium opacity-60">{{ $trx['tgl'] }}</td>
                <td class="p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-amber-50 flex items-center justify-center text-xs group-hover:bg-white transition">👤</div>
                        <span class="font-bold text-[#5D4037]">{{ $trx['cust'] }}</span>
                    </div>
                </td>
                <td class="p-6 text-right font-bold text-[#5D4037]">
                    Rp {{ number_format($trx['total'], 0, ',', '.') }}
                </td>
                <td class="p-6 text-center">
                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-tighter
                        {{ $trx['status'] == 'Selesai' ? 'bg-green-100 text-green-700' :
                          ($trx['status'] == 'Diproses' ? 'bg-amber-100 text-amber-700' : 'bg-gray-100 text-gray-500') }}">
                        {{ $trx['status'] }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
