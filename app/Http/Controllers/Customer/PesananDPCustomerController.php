<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananDPCustomerController extends Controller
{
    public function update_sisa(Request $request, $id)
    {
        $request->validate([
            'bukti_bayar' => 'required',
        ]);

        if ($request->hasFile('bukti_bayar')) {
            $bukit_pembayaran = $request->file('bukti_bayar')->getClientOriginalName();
            $request->bukti_bayar->move(public_path('bukti_bayar'), $bukit_pembayaran);
        }

        Pesanan::find($id)->update([
            'bukti_bayar_dp_lunas' => $bukit_pembayaran,
            'dp_status' => 'tagihan send',
        ]);

        return to_route('pesanan.index');
    }
}
