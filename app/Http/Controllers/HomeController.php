<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Produk;
use App\Models\ProdukNon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produk = Produk::join('kategori', 'produk.kategori', '=', 'kategori.id_kategori')
        ->select('produk.*','kategori.jenis_kategori')
        ->orderBy('produk.id_produk', 'desc')
        ->limit(5)
        ->get();
        return view('home.index', compact('produk'));
    }

    public function detail_produk($id)
    {
        $komentar = Komentar::join('produk', 'produk.id_produk', '=', 'komentar.id_produk')
        ->join('users','users.id','=','komentar.id_user')
        ->select('users.nama', 'komentar.*')
        ->where('komentar.id_produk', $id)
        ->orderBy('komentar.id_komentar', 'desc')
        ->limit(3)
        ->get();
        $detail = Produk::find($id);
        return view('home.detail_product', compact(['detail','komentar']));
    }

    public function grosir()
    {
        $produk = Produk::latest()->paginate(9);
        $kategori = Kategori::orderBy('jenis_kategori', 'asc')->get();
        return view('home.produk', compact(['kategori','produk']));
    }

    public function cari_kategori($id)
    {
        $produk = Produk::where('kategori', $id)->paginate(9);
        $kategori = Kategori::orderBy('jenis_kategori', 'asc')->get();
        return view('home.kategori', compact(['kategori','produk']));
    }

    public function non_grosir()
    {
        $produk = ProdukNon::latest()->paginate(9);
        $kategori = Kategori::orderBy('jenis_kategori', 'asc')->get();
        return view('home.produk_non', compact(['kategori','produk']));
    }

    public function detail_produk_non($id)
    {
        $detail = ProdukNon::find($id);


        return view('home.detail_product_non', compact(['detail']));
    }

    public function cari_kategori_non($id)
    {
        $produk = ProdukNon::where('kategori', $id)->paginate(9);
        $kategori = Kategori::orderBy('jenis_kategori', 'asc')->get();
        return view('home.kategori_non', compact(['kategori','produk']));
    }

    public function contact()
    {
        return view('home.contact');
    }
}
