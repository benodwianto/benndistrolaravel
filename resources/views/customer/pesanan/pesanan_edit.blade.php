@extends('customer.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Pembayaran Pesanan</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pembayaran Pesanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @php
            function rupiah($angka)
            {
                $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                return $hasil_rupiah;
            }
        @endphp

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h6 class="header-title">Daftar Rekening Pembayaran Produk</h6>
                                @foreach ($rekening as $rekening)
                                    <div class="col-md-3">
                                        <div class="alert alert-secondary" role="alert">
                                            <p style="text-align:center"><b>{{ Str::upper($rekening->nama_rek) }}</b></p>
                                            <p style="text-align:center"><b>{{ Str::upper($rekening->no_rek) }}</b></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <h5 class="header-title">Informasi Tagihan</h5>
                            <p class="card-title-desc">Informasi Tagihan Pembayaran Untuk Pembelian Produk</p>
                            <hr>
                            <p class="card-title-desc">Metode Pengiriman Produk</p>
                            <div class="row">
                                @foreach ($ongkir as $ongkir)
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="card border rounded shipping-address">
                                            <div class="card-body">
                                                <img src="/annprint/jne.jpeg" width="60" height="60">
                                                <div class="mb-1">
                                                    <input class="form-check-input float-end" type="radio"
                                                        name="alamat_kirim" value="" id="formRadios2"
                                                        checked>{{ $ongkir['name'] }}
                                                </div>
                                                <p class="mb-1">Jenis Layanan :
                                                    <b>{{ $ongkir['costs'][1]['description'] }}</b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-lg-8 col-sm-6">
                                    <div class="card border rounded shipping-address">
                                        <div class="card-body">
                                            <h4 class="card-title font-size-16 mt-0">Lokasi Pengiriman : </h4>
                                            <p class="card-text">
                                                {{ Str::title($pesanan->alamat . ', ' . $pesanan->nama_kota . ' [ ' . $pesanan->nama_prov . ']') }}
                                            </p>
                                            <p class="card-text"><b>Penerima Produk</b></p>
                                            <p class="card-text">Nama Penerima :
                                                {{ Str::title($pesanan->nama_penerima . ' / ' . $pesanan->no_telp) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0" style="width: 100px;" scope="col">Photo</th>
                                            <th class="border-top-0" scope="col">Product</th>
                                            <th class="border-top-0" scope="col">Harga</th>
                                            <th class="border-top-0" scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="/produk/{{ $pesanan->foto_produk1 }}" alt="product-img"
                                                    title="product-img" class="avatar-md"></td>
                                            <td>
                                                <h5 class="font-size-16 text-truncate"><a href="#"
                                                        class="text-reset">{{ Str::upper($pesanan->nama_produk) }}</a></h5>
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
                                                    echo rupiah($pesanan->total_bayar);
                                                @endphp
                                            </td>
                                        </tr>
                                    </tbody><!-- end tbody -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('pesanan.update', $pesanan->id_pesanan) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <label class="form-label">Metode Pembayaran<span class="text-danger">*wajib</span></label>
                                <div class="col-md-12 mb-2">
                                    <select class="form-select @error('metode') is-invalid @enderror"
                                        id="validationCustom03" name="metode">
                                        <option value="">Pilih Metode Pembayaran</option>
                                        <option value="lunas">
                                            Lunas (
                                            @php
                                                echo rupiah($pesanan->total_bayar);
                                            @endphp
                                            )
                                        </option>
                                        <option value="dp">
                                            DP 50% (
                                            @php
                                            $dp = $pesanan->total_bayar * 0.5;
                                            echo rupiah($dp);
                                            @endphp
                                            )
                                        </option>
                                    </select>
                                    @error('metode')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <input type="text" name="dp" value="{{ $dp }}" id="" hidden>
                                <hr>
                                <label class="form-label">Upload Bukti Pembayaran / DP <span
                                        class="text-danger">*wajib</span></label>
                                <div class="col-md-12 mb-2">
                                    <input type="file" name="bukti_bayar"
                                        class="form-control @error('bukti_bayar') is-invalid @enderror" accept="image/*"
                                        id="imgInp1">
                                    @error('bukti_bayar')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <img id="output1" src="/morvin/dist/assets/images/upload.png" width="150px"
                                        height="110px" />
                                </div>
                                <hr>
                                <label class="form-label">Upload Desain <span class="text-danger">/ * Kosongkan Bila Tidak
                                        Ada</span></label>
                                <div class="col-md-12 mb-2">
                                    <input type="file" name="desain" class="form-control">
                                </div>
                                @if (!empty($pesanan->desain))
                                    <span class="text-primary">Desain Lama : {{ $pesanan->desain }}</span>
                                @endif
                                <hr>
                                <label class="form-label">Request Desain <span class="text-danger">/ * Kosongkan Bila
                                        Tidak
                                        Ada</span></label>
                                <div class="col-md-12 mb-2">
                                    <textarea name="request_desain" id="" cols="30" rows="5">{{ $pesanan->request_user }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Kirim Bukti Pembayaran</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files
            if (file) {
                output1.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
