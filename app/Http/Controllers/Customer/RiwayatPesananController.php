<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPesananController extends Controller
{

    public function index()
    {
        $riwayat = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
        ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
        ->select('pesanan.*', 'produk.nama_produk', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
        ->where('pesanan.id_user', Auth::user()->id)
        ->where('pesanan.status', 'selesai')
        ->orderBy('pesanan.updated_at', 'desc')
        ->get();

        return view('customer.riwayat.riwayat_pesanan', compact(['riwayat']));
    }
}
