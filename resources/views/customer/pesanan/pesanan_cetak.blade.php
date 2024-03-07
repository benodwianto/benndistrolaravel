@extends('customer.layouts.master')


@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Invoice</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="page-content-wrapper">
            @php
                function rupiah($angka)
                {
                    $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                    return $hasil_rupiah;
                }
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <hr>
                                    <div class="row">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="invoice-title">
                                            <h4 class="float-end font-size-16"><strong>Order
                                                    #P00{{ $pesanan->id_pesanan }}</strong></h4>
                                            <h3 class="m-t-0">
                                                <img src="/morvin/dist/assets/images/Logo.png" alt="logo"
                                                    height="40" />
                                            </h3>
                                        </div>
                                        <div class="col-6">
                                            <address>
                                                <strong>Pemesan:</strong><br>
                                                {{ Str::title($pesanan->nama) }}<br>
                                                {{ $pesanan->email }}<br>
                                            </address>
                                        </div><!-- end col -->
                                        <div class="col-6 text-end">
                                            <address>
                                                <strong>Penerima / Lokasi Pengiriman:</strong><br>
                                                {{ Str::title($pesanan->nama_penerima) }}<br>
                                                {{ Str::title($pesanan->alamat) }}<br>
                                                Kab / Kota : {{ $pesanan->nama_kota }}<br>
                                                Prov : {{ $pesanan->nama_prov }} <br>
                                                [Telp : {{ $pesanan->no_telp }}]
                                            </address>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-6 m-t-30">
                                            <address>
                                                <strong>Metode Pembayaran :</strong><br>
                                                Transfer Bank<br>
                                                <img src='/bukti_bayar/{{ $pesanan->bukti_bayar }}' width='50'
                                                    height='50' /><br>
                                            </address>
                                        </div><!-- end col -->
                                        <div class="col-6 m-t-30 text-end">
                                            <address>
                                                <strong>Tanggal Pemesanan:</strong><br>
                                                @php
                                                    $tanggal_pesan = DB::table('pesanan')
                                                        ->where('id_pesanan', $pesanan->id_pesanan)
                                                        ->get();
                                                    foreach ($tanggal_pesan as $tanggal_pesan) {
                                                        echo $tanggal_pesan->updated_at;
                                                    }
                                                @endphp<br><br>
                                            </address>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="panel panel-default">
                                        <div class="p-2">
                                            <h3 class="panel-title font-size-20"><strong>Detail Orderan</strong></h3>
                                        </div>
                                        <div>
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th class="border-top-0" style="width: 100px;" scope="col">
                                                                Photo</th>
                                                            <th class="border-top-0" scope="col">Product</th>
                                                            <th class="border-top-0" scope="col">Harga</th>
                                                            <th class="border-top-0" scope="col">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><img src="/produk/{{ $pesanan->foto_produk1 }}"
                                                                    alt="product-img" title="product-img" class="avatar-md">
                                                            </td>
                                                            <td>
                                                                <h5 class="font-size-16 text-truncate"><a href="#"
                                                                        class="text-reset">{{ Str::upper($pesanan->nama_produk) }}</a>
                                                                </h5>
                                                                <p class="font-size-14 mb-0 text-muted">Jumlah Pesanan :
                                                                    {{ $pesanan->quantity }}</p>
                                                                <p class="font-size-14 mb-0 text-muted">Berat :
                                                                    {{ $pesanan->quantity * 145 }} Gram</p>
                                                            </td>
                                                            <td>
                                                                @if ($pesanan->quantity <= 11)
                                                                    @php
                                                                        $quantity = $pesanan->quantity;
                                                                        $harga = $pesanan->harga_produk1;
                                                                        echo rupiah($harga) . ' [6-11 pcs]';
                                                                    @endphp
                                                                @elseif ($pesanan->quantity <= 23)
                                                                    @php
                                                                        $quantity = $pesanan->quantity;
                                                                        $harga = $pesanan->harga_produk2;
                                                                        echo rupiah($harga) . ' [12-23 pcs]';
                                                                    @endphp
                                                                @elseif ($pesanan->quantity <= 50)
                                                                    @php
                                                                        $quantity = $pesanan->quantity;
                                                                        $harga = $pesanan->harga_produk3;
                                                                        echo rupiah($harga) . ' [24-50 pcs]';
                                                                    @endphp
                                                                @elseif ($pesanan->quantity <= 100)
                                                                    @php
                                                                        $quantity = $pesanan->quantity;
                                                                        $harga = $pesanan->harga_produk4;
                                                                        echo rupiah($harga) . ' [51-100 pcs]';
                                                                    @endphp
                                                                @elseif ($pesanan->quantity <= 200)
                                                                    @php
                                                                        $quantity = $pesanan->quantity;
                                                                        $harga = $pesanan->harga_produk5;
                                                                        echo rupiah($harga) . ' [101-200 pcs]';
                                                                    @endphp
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @php
                                                                    echo rupiah($pesanan->bayar);
                                                                @endphp
                                                            </td>
                                                        </tr>
                                                        @if (!empty($pesanan->variasi))
                                                            <tr>
                                                                <td colspan="1">
                                                                </td>
                                                                <td>Variasi : {{ Str::title($pesanan->variasi) }}</td>
                                                                <td>
                                                                    Rp. {{ $pesanan->variasi_harga }}
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        echo rupiah($pesanan->variasi_total);
                                                                    @endphp
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        @if (!empty($pesanan->sablon))
                                                            <tr>
                                                                <td colspan="1">
                                                                </td>
                                                                <td>Sablon : {{ Str::title($pesanan->sablon) }}</td>
                                                                <td> Rp. {{ $pesanan->sablon_harga }}</td>
                                                                <td>
                                                                    @php
                                                                        echo rupiah($pesanan->sablon_total);
                                                                    @endphp
                                                                </td>
                                                            </tr>
                                                        @endif
                                                        <tr>
                                                            <td colspan="1"></td>
                                                            <td>
                                                                <b>Biaya Pengiriman : [Jne-Reg]</b>
                                                            </td>
                                                            <td colspan="1">
                                                            </td>
                                                            <td>
                                                                @php
                                                                    echo rupiah($pesanan->ongkir);
                                                                @endphp
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="1">
                                                            </td>
                                                            <td colspan="1"></td>
                                                            <td>
                                                                <h6 class="m-0 text-end">Total Tagihan:</h6>
                                                            </td>
                                                            <td>
                                                                @php
                                                                    echo rupiah($pesanan->total_bayar).' <span class="badge bg-success">Lunas</span>';
                                                                @endphp
                                                            </td>
                                                        </tr>
                                                    </tbody><!-- end tbody -->
                                                </table>
                                            </div>

                                            <div class="d-print-none mo-mt-2">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i> Print Out</a>
                                                    <a href="{{ Route('pesanan.index') }}" class="btn btn-primary"> << Kembali</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>


    </div> <!-- container-fluid -->
@endsection
