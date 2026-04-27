<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $username = $request->input('username');
        session(['username' => $username]);
        return redirect()->route('dashboard');
    }

    public function dashboard(Request $request)
    {
        $username = session('username', 'Admin');

        $transactions = [
            ['id' => '#TRX-001', 'customer' => 'Budi Santoso',    'produk' => 'Choco Chip Cookies',  'qty' => 3, 'total' => 135000,  'status' => 'Selesai',  'tanggal' => '27 Apr 2026'],
            ['id' => '#TRX-002', 'customer' => 'Siti Rahayu',     'produk' => 'Lidah Kucing','qty' => 2, 'total' => 110000,  'status' => 'Proses',   'tanggal' => '27 Apr 2026'],
            ['id' => '#TRX-003', 'customer' => 'Ahmad Fauzi',     'produk' => 'Mini Delight Hampers',   'qty' => 1, 'total' => 250000,  'status' => 'Selesai',  'tanggal' => '26 Apr 2026'],
            ['id' => '#TRX-004', 'customer' => 'Dewi Lestari',    'produk' => 'Nastar Premium',       'qty' => 5, 'total' => 175000,  'status' => 'Selesai',  'tanggal' => '26 Apr 2026'],
            ['id' => '#TRX-005', 'customer' => 'Rizky Pratama',   'produk' => 'Putri Salju',      'qty' => 2, 'total' => 90000,   'status' => 'Batal',    'tanggal' => '25 Apr 2026'],
            ['id' => '#TRX-006', 'customer' => 'Maya Indah',      'produk' => 'Choco Chip Cookies',  'qty' => 4, 'total' => 180000,  'status' => 'Proses',   'tanggal' => '25 Apr 2026'],
            ['id' => '#TRX-007', 'customer' => 'Hendra Gunawan',  'produk' => 'Kastangel Keju',      'qty' => 3, 'total' => 120000,  'status' => 'Selesai',  'tanggal' => '24 Apr 2026'],
            ['id' => '#TRX-008', 'customer' => 'Rina Wulandari',  'produk' => 'Twin Delight Hampers',     'qty' => 1, 'total' => 200000,  'status' => 'Selesai',  'tanggal' => '24 Apr 2026'],
        ];

        $stats = [
            'pendapatan'  => 'Rp 12.480.000',
            'pesanan'     => 148,
            'terjual'     => 342,
            'pelanggan'   => 87,
        ];

        $grafik = [
            'labels' => ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            'data'   => [1200000, 980000, 1450000, 870000, 1600000, 2100000, 1850000],
        ];

        return view('dashboard', compact('username', 'transactions', 'stats', 'grafik'));
    }

    public function pengelolaan(Request $request)
    {
        $username = session('username', 'Admin');

        $produk = [
            ['kode' => 'PRD-001', 'nama' => 'Choco Chip Cookies',   'kategori' => 'Cookies', 'stok' => 45,  'satuan' => 'Box', 'harga' => 45000,  'status' => 'Tersedia'],
            ['kode' => 'PRD-002', 'nama' => 'Lidah Kucing','kategori' => 'Cookies', 'stok' => 12,  'satuan' => 'Box', 'harga' => 55000,  'status' => 'Menipis'],
            ['kode' => 'PRD-003', 'nama' => 'Kastangel Keju',       'kategori' => 'Cookies', 'stok' => 30,  'satuan' => 'Box', 'harga' => 40000,  'status' => 'Tersedia'],
            ['kode' => 'PRD-004', 'nama' => 'Nastar Premium',       'kategori' => 'Cookies', 'stok' => 8,   'satuan' => 'Box', 'harga' => 35000,  'status' => 'Menipis'],
            ['kode' => 'PRD-005', 'nama' => 'Putri Salju',      'kategori' => 'Cookies', 'stok' => 0,   'satuan' => 'Box', 'harga' => 45000,  'status' => 'Habis'],
            ['kode' => 'PRD-006', 'nama' => 'Mini Delight Hampers',   'kategori' => 'Hampers', 'stok' => 18,  'satuan' => 'Pcs', 'harga' => 250000, 'status' => 'Tersedia'],
            ['kode' => 'PRD-007', 'nama' => 'Twin Delight Hampers',      'kategori' => 'Hampers', 'stok' => 5,   'satuan' => 'Pcs', 'harga' => 200000, 'status' => 'Menipis'],
            ['kode' => 'PRD-008', 'nama' => 'Premium Gift Box',     'kategori' => 'Hampers', 'stok' => 0,   'satuan' => 'Pcs', 'harga' => 350000, 'status' => 'Habis'],
            ['kode' => 'PRD-009', 'nama' => 'Coklat Kenari','kategori' => 'Hampers','stok' => 22,  'satuan' => 'Pcs', 'harga' => 280000, 'status' => 'Tersedia'],
            ['kode' => 'PRD-010', 'nama' => 'Rainbow Cookies',      'kategori' => 'Cookies', 'stok' => 3,   'satuan' => 'Box', 'harga' => 50000,  'status' => 'Menipis'],
        ];

        $stokStats = [
            'total'   => array_sum(array_column($produk, 'stok')),
            'menipis' => count(array_filter($produk, fn($p) => $p['status'] === 'Menipis')),
            'habis'   => count(array_filter($produk, fn($p) => $p['status'] === 'Habis')),
        ];

        $chartStok = [
            'cookies' => array_sum(array_column(array_filter($produk, fn($p) => $p['kategori'] === 'Cookies'), 'stok')),
            'hampers' => array_sum(array_column(array_filter($produk, fn($p) => $p['kategori'] === 'Hampers'), 'stok')),
        ];

        return view('pengelolaan', compact('username', 'produk', 'stokStats', 'chartStok'));
    }

    public function profile(Request $request)
    {
        $username = session('username', 'Admin');

        $user = [
            'nama'         => $username,
            'role'         => 'Administrator',
            'email'        => strtolower(str_replace(' ', '', $username)) . '@aliacookies.com',
            'tanggal_login'=> date('d F Y, H:i') . ' WIB',
            'bergabung'    => '01 Januari 2025',
            'toko'         => 'Alia Cookies',
            'lokasi'       => 'Jember, Indonesia',
            'no_hp'        => '+62 856-4856-9562',
        ];

        return view('profile', compact('username', 'user'));
    }

    public function logout()
    {
        session()->forget('username');
        return redirect()->route('login');
    }
}
