<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(Request $request) {
        $username = $request->query('username', 'Admin');

        $transactions = [
            ['tgl' => '20 Apr', 'cust' => 'Alia', 'total' => 150000, 'status' => 'Selesai'],
            ['tgl' => '21 Apr', 'cust' => 'Budi', 'total' => 200000, 'status' => 'Selesai'],
            ['tgl' => '22 Apr', 'cust' => 'Citra', 'total' => 100000, 'status' => 'Selesai'],
            ['tgl' => '23 Apr', 'cust' => 'Dedi', 'total' => 300000, 'status' => 'Selesai'],
            ['tgl' => '24 Apr', 'cust' => 'Eka', 'total' => 250000, 'status' => 'Selesai'],
            ['tgl' => '25 Apr', 'cust' => 'Fani', 'total' => 400000, 'status' => 'Selesai'],
            ['tgl' => '26 Apr', 'cust' => 'Gani', 'total' => 350000, 'status' => 'Selesai'],
        ];

        $chartLabels = array_column($transactions, 'tgl');
        $chartData = array_column($transactions, 'total');

        return view('dashboard', compact('username', 'transactions', 'chartLabels', 'chartData'));
    }

    public function profile(Request $request) {
        $username = $request->query('username', 'Admin');
        return view('profile', compact('username'));
    }

    public function pengelolaan(Request $request) {
        $username = $request->query('username', 'Admin');
        $products = [
            ['kode' => 'CK-01', 'nama' => 'Choco Lava', 'kategori' => 'Cookies', 'stok' => 12, 'harga' => 45000],
            ['kode' => 'CK-02', 'nama' => 'Almond Crisp', 'kategori' => 'Cookies', 'stok' => 4, 'harga' => 50000],
            ['kode' => 'HM-01', 'nama' => 'Hampers Lebaran', 'kategori' => 'Hampers', 'stok' => 10, 'harga' => 150000],
        ];
        return view('pengelolaan', compact('products', 'username'));
    }
}
