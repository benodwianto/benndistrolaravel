<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class KomentarCustomerController extends Controller
{
    public function store_komentar(Request $request)
    {
        $id_pesanan = $request->id_pesanan;
        $id_produk = $request->id_produk;
        $id_user = $request->id_user;

        Komentar::create([
            'id_pesanan' => $id_pesanan,
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'komentar_produk' => $request->komentar
        ]);

        Pesanan::find($id_pesanan)->update([
            'status'=>'selesai',
        ]);

        return to_route('customer.produk');

    }
}
