<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PesananAdminController extends Controller
{
    public function index()
    {
     $konfirmasi = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
     ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
     ->select('pesanan.*', 'produk.*', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
     ->Where('pesanan.status','Bukti Pembayaraan Sedang Di Tinjau')
     ->Where('pesanan.tipe_pembayaran', 'lunas')
     ->orderBy('pesanan.updated_at', 'desc')
     ->get();

    $ongoing = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
    ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
    ->join('users', 'users.id', '=', 'pesanan.id_user')
    ->select('pesanan.*', 'produk.nama_produk', 'user_alamat.nama_prov', 'user_alamat.nama_kota', 'users.nama')
    ->Where('pesanan.status','Pesanan Di Terima')
    ->Where('pesanan.tipe_pembayaran', 'lunas')
    ->orderBy('pesanan.id_pesanan', 'desc')
    ->get();

    $kirim = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
    ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
    ->join('users', 'users.id', '=', 'pesanan.id_user')
    ->select('pesanan.*', 'produk.nama_produk', 'user_alamat.nama_prov', 'user_alamat.nama_kota', 'users.nama')
    ->Where('pesanan.status','Barang Dalam Pengiriman')
    ->orderBy('pesanan.id_pesanan', 'desc')
    ->get();

    $konfirmasi_dp = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
    ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
    ->select('pesanan.*', 'produk.*', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
    ->Where('pesanan.status','Bukti Pembayaraan Sedang Di Tinjau')
    ->Where('pesanan.tipe_pembayaran', 'dp')
    ->orderBy('pesanan.updated_at', 'desc')
    ->get();

    $ongoing_dp = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
    ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
    ->join('users', 'users.id', '=', 'pesanan.id_user')
    ->select('pesanan.*', 'produk.nama_produk', 'user_alamat.nama_prov', 'user_alamat.nama_kota', 'users.nama')
    ->Where('pesanan.status','Pesanan Di Terima')
    ->Where('pesanan.tipe_pembayaran', 'dp')
    ->orderBy('pesanan.id_pesanan', 'desc')
    ->get();

     return view('admin.pesanan.pesanan', compact(['konfirmasi','ongoing','kirim','konfirmasi_dp','ongoing_dp']));
    }

    public function konfirm_pembayaran($id)
    {
        Pesanan::find($id)->update([
            'status'=>'Pesanan Di Terima'
        ]);
        return back();
    }

    public function tolak_pembayaran($id)
    {
        Pesanan::find($id)->update([
            'status'=>'Pesanan Di Tolak'
        ]);
        return back();
    }

    public function cetak_pesanan($id)
    {
        $pesanan = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
        ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
        ->join('users', 'users.id', '=', 'pesanan.id_user')
        ->select('pesanan.*', 'produk.*', 'user_alamat.no_telp','user_alamat.alamat','user_alamat.nama_penerima', 'user_alamat.nama_prov', 'user_alamat.nama_kota', 'users.*')
        ->find($id);

        return view('admin.pesanan.pesanan_cetak', compact(['pesanan']));
    }

    public function download_request($id)
    {
        $desain = Pesanan::find($id);
        $file = public_path()."/desain/".$desain->desain;
        return Response::download($file, '#P00'.$desain->id_pesanan.'-'.$desain->desain,);
    }

    public function store_resi(Request $request, $id)
    {
        $request->validate([
            'resi'=>'required'
        ]);

        Pesanan::find($id)->update([
            'status'=>'Barang Dalam Pengiriman',
            'no_resi'=>$request->resi,
        ]);

        return back();
    }

    public function kirim_tagihan($id)
    {
        Pesanan::find($id)->update([
            'dp_status'=>'tagihan deliver',
        ]);

        return back();
    }

    public function tolak_sisa_dp($id)
    {
        Pesanan::find($id)->update([
            'dp_status'=>'tagihan sisa tolak',
        ]);

        return back();
    }

    public function terima_sisa_dp($id)
    {
        Pesanan::find($id)->update([
            'dp_status'=>'lunas',
        ]);

        return back();
    }
}
