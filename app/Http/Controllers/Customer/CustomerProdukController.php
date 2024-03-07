<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Produk;
use Illuminate\Http\Request;

class CustomerProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::latest()->paginate(9);
        $kategori = Kategori::orderBy('jenis_kategori', 'asc')->get();
        return view('customer.produk.produk', compact(['produk','kategori']));
    }

    public function detail_produk($id)
    {
        $produk = Produk::join('kategori', 'produk.kategori', '=', 'kategori.id_kategori')
        ->select('produk.*','kategori.jenis_kategori')
        ->find($id);

        $komentar = Komentar::join('produk', 'produk.id_produk', '=', 'komentar.id_produk')
        ->join('users','users.id','=','komentar.id_user')
        ->select('users.nama', 'komentar.*')
        ->where('komentar.id_produk', $id)
        ->orderBy('komentar.id_komentar', 'desc')
        ->limit(3)
        ->get();

        return view('customer.produk.detail_produk', compact(['produk', 'komentar']));
    }

    public function kategori_produk($id)
    {
        $produk = Produk::where('kategori', $id)->paginate(9);
        $kategori = Kategori::orderBy('jenis_kategori', 'asc')->get();
        $id = $id;
        return view('customer.produk.kategori_produk', compact(['produk','kategori','id']));
    }

}
