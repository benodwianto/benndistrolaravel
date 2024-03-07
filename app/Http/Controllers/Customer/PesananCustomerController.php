<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Rekening;
use App\Models\Variasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function get_ongkir($id_kota, $berat)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=399&destination=" . $id_kota . "&weight=" . $berat . "&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: f201c33f7b1021a48e2a76125bfa5e15"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $provinsi = $response['rajaongkir']['results'];
            return $provinsi;
        }
    }

    public function index()
    {
        $pesanan_paid = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
            ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
            ->select('pesanan.*', 'produk.*', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
            ->where('pesanan.id_user', Auth::user()->id)
            ->where(function($query){
                $query->where('pesanan.status', 'menunggu pembayaran')
                ->orWhere('pesanan.status','Bukti Pembayaraan Sedang Di Tinjau')
                ->orWhere('pesanan.status','Pesanan Di Tolak');
            })
            ->orderBy('pesanan.updated_at', 'desc')
            ->get();


            $ongoing = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
            ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
            ->select('pesanan.*', 'produk.*', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
            ->where('pesanan.id_user', Auth::user()->id)
            ->where('pesanan.status', 'Pesanan Di Terima')
            ->orderBy('pesanan.updated_at', 'desc')
            ->get();

            $kirim = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
            ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
            ->select('pesanan.*', 'produk.nama_produk', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
            ->where('pesanan.id_user', Auth::user()->id)
            ->where('pesanan.status', 'Barang Dalam Pengiriman')
            ->orderBy('pesanan.updated_at', 'desc')
            ->get();

            $tagihan = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
            ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
            ->select('pesanan.*', 'produk.nama_produk', 'user_alamat.nama_prov', 'user_alamat.nama_kota')
            ->where('pesanan.id_user', Auth::user()->id)
            ->where('pesanan.dp_status', 'tagihan deliver')
            ->orderBy('pesanan.updated_at', 'desc')
            ->get();
        return view('customer.pesanan.pesanan', compact(['pesanan_paid', 'ongoing','kirim','tagihan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->alamat_kirim == NULL) {
            return back()->with('error', 'Proses Gagal Wajib Memilih Salah Satu Alamat Pengiriman');
        }

        $id_keranjang = $request->id_keranjang;
        $harga_variasi = $request->variasi_harga;
        $harga_sablon = $request->sablon_harga;
        if ($harga_sablon == null) {
            $total_sablon = "0";
        }
        if ($harga_variasi == null) {
            $total_variasi = "0";
        }
        $total_variasi = array_sum(explode(',', $harga_variasi));
        $total_sablon = array_sum(explode(',', $harga_sablon));

        $kota = $request->alamat_kirim;
        $kota_result = explode('|', $kota);
        $id_kota = $kota_result[0];
        $id_alamat = $kota_result[1];

        $keranjang = Keranjang::join('produk', 'keranjang.id_produk', '=', 'produk.id_produk')
            ->select('keranjang.*', 'produk.*')
            ->find($id_keranjang);


        if ($keranjang->total <= 11) {
            $total = $keranjang->total;
            $harga = $keranjang->harga_produk1;
            $jumlah = $harga * $total;
        } elseif ($keranjang->total <= 23) {
            $total = $keranjang->total;
            $harga = $keranjang->harga_produk2;
            $jumlah = $harga * $total;
        } elseif ($keranjang->total <= 50) {
            $total = $keranjang->total;
            $harga = $keranjang->harga_produk3;
            $jumlah = $harga * $total;
        } elseif ($keranjang->total <= 100) {
            $total = $keranjang->total;
            $harga = $keranjang->harga_produk4;
            $jumlah = $harga * $total;
        } elseif ($keranjang->total <= 200) {
            $total = $keranjang->total;
            $harga = $keranjang->harga_produk5;
            $jumlah = $harga * $total;
        }

        $berat = $total * 145;
        $ongkir = $this->get_ongkir($id_kota, $berat);

        foreach ($ongkir as $ongkir) {
            // dd($ongkir['costs'][1]);
            $cost = $ongkir['costs'][1];
            foreach ($cost as $costs) {
                $costs = $cost['cost'];
                foreach ($costs as $costs) {
                    $harga_ongkir = $costs['value'];
                }
            }
        }

        $total_bayar = $jumlah + $harga_ongkir + $total_variasi + $total_sablon;

        Pesanan::create([
            'id_user' => Auth::user()->id,
            'id_produk' => $keranjang->id_produk,
            'quantity' => $keranjang->total,
            'id_alamat' => $id_alamat,
            'id_kota'   => $id_kota,
            'variasi'   => $request->variasi,
            'variasi_harga' => $harga_variasi,
            'variasi_total' => $total_variasi,
            'sablon'   => $request->sablon,
            'sablon_harga' => $harga_sablon,
            'sablon_total' => $total_sablon,
            'note_sablon_variasi' => $request->note,
            'bayar' => $jumlah,
            'ongkir' => $harga_ongkir,
            'total_bayar' => $total_bayar,
            'status' => "menunggu pembayaran",
        ]);

        Keranjang::find($id_keranjang)->delete();

        return to_route('pesanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
        ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
        ->join('users', 'users.id', '=', 'pesanan.id_user')
        ->select('pesanan.*', 'produk.*', 'user_alamat.no_telp','user_alamat.alamat','user_alamat.nama_penerima', 'user_alamat.nama_prov', 'user_alamat.nama_kota', 'users.*')
        ->find($id);

        return view('customer.pesanan.pesanan_cetak', compact(['pesanan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan  = Pesanan::join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
            ->join('user_alamat', 'user_alamat.id_user_alamat', '=', 'pesanan.id_alamat')
            ->select(
                'pesanan.*',
                'produk.*',
                'user_alamat.nama_prov',
                'user_alamat.nama_kota',
                'user_alamat.alamat',
                'user_alamat.kode_pos',
                'user_alamat.nama_penerima',
                'user_alamat.no_telp'
            )
            ->find($id);

        $rekening = Rekening::get();

        $id_kota = $pesanan->id_kota;
        $berat = $pesanan->quantity * 145;
        $ongkir = $this->get_ongkir($id_kota, $berat);

        // dd($ongkir);
        return view('customer.pesanan.pesanan_edit', compact(['pesanan', 'ongkir', 'rekening']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bukti_bayar' => 'required',
            'metode' => 'required'
        ]);

        $data_desain = Pesanan::find($id);

        if ($request->hasFile('bukti_bayar')) {
            $bukit_pembayaran = $request->file('bukti_bayar')->getClientOriginalName();
            $request->bukti_bayar->move(public_path('bukti_bayar'), $bukit_pembayaran);
        }

        if ($request->hasFile('desain')) {
            $desain = $request->file('desain')->getClientOriginalName();
            $request->desain->move(public_path('desain'), $desain);
        } else {
            $desain = $data_desain->desain;
        }

        if ($request->metode=='dp') {
            Pesanan::find($id)->update([
                'bukti_bayar_dp' => $bukit_pembayaran,
                'desain' => $desain,
                'request_user' => $request->request_desain,
                'status' => 'Bukti Pembayaraan Sedang Di Tinjau',
                'tipe_pembayaran' => 'dp',
            ]);
        }else{
            Pesanan::find($id)->update([
                'bukti_bayar' => $bukit_pembayaran,
                'desain' => $desain,
                'request_user' => $request->request_desain,
                'status' => 'Bukti Pembayaraan Sedang Di Tinjau',
                'tipe_pembayaran' => 'lunas',
            ]);
        }

        return to_route('pesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
