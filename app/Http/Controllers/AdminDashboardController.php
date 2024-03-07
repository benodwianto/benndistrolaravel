<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $transaksi = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
        ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
        ->select('pesanan.*', 'produk.nama_produk', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
        ->where('pesanan.status', 'selesai')
        ->orderBy('pesanan.updated_at', 'desc')
        ->limit(10)
        ->get();

        return view('admin.dashboard', compact(['transaksi']));
    }

    public function laporan(Request $request)
    {
        $laporan = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
        ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
        ->select('pesanan.*','produk.nama_produk', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
        // ->where('pesanan.status', 'selesai')
        // ->orWhere('pesanan.status', 'Barang Dalam Pengiriman')
        ->whereBetween('pesanan.updated_at', [$request->date_start, $request->date_end])
        ->where(function($query) {
            $query->where('pesanan.status', 'selesai')
                  ->orWhere('pesanan.status', 'Barang Dalam Pengiriman');
        })
        ->get();

        return view('admin.laporan.laporan', compact(['laporan']));
    }
}
