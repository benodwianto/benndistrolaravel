<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class LaporanPenjualanAdminController extends Controller
{
    public function laporan_penjualan()
    {
        $transaksi = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
        ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
        ->select('pesanan.*', 'produk.nama_produk', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
        ->where('pesanan.status', 'selesai')
        ->orWhere('pesanan.status', 'Barang Dalam Pengiriman')
        ->orderBy('pesanan.updated_at', 'desc')
        ->limit(10)
        ->get();

        return view('admin.laporan_penjualan.laporan_penjualan', compact(['transaksi']));
    }
}
