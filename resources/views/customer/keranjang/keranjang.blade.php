@extends('customer.layouts.master')

@section('content')
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Keranjang</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Keranjang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-centered mb-0 table-nowrap">
                                    <thead class="bg-light">
                                        <tr>
                                            <th style="width: 120px">Foto Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Jumlah Pembelian</th>
                                            <th>Total Pembayaran</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @php
                                            function rupiah($angka)
                                            {
                                                $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                                return $hasil_rupiah;
                                            }
                                        @endphp
                                        @forelse ($keranjang as $produk)
                                            <tr>
                                                <td>
                                                    <img src="/produk/{{ $produk->foto_produk1 }}" alt="product-img"
                                                        title="product-img" class="avatar-md" />
                                                </td>
                                                <td>
                                                    <h5 class="font-size-14 text-truncate"><a
                                                            href="{{ route('customer.detail_produk', $produk->id_produk) }}"
                                                            class="text-reset">{{ Str::upper($produk->nama_produk) }}</a>
                                                    </h5>
                                                    <p class="mb-0">Color : <span class="font-weight-medium">All
                                                            Variant</span></p>
                                                </td>
                                                <td>
                                                    @if ($produk->total <= 11)
                                                        @php
                                                            echo rupiah($produk->harga_produk1);
                                                        @endphp
                                                    @elseif ($produk->total <= 23)
                                                        @php
                                                            echo rupiah($produk->harga_produk2);
                                                        @endphp
                                                    @elseif ($produk->total <= 50)
                                                        @php
                                                            echo rupiah($produk->harga_produk3);
                                                        @endphp
                                                    @elseif ($produk->total <= 100)
                                                        @php
                                                            echo rupiah($produk->harga_produk4);
                                                        @endphp
                                                    @elseif ($produk->total <= 200)
                                                        @php
                                                            echo rupiah($produk->harga_produk5);
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td>
                                                    <div style="width: 120px;" class="product-cart-touchspin">
                                                        <form
                                                            action="{{ route('keranjang.update', $produk->id_keranjang) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('put')
                                                            <input data-toggle="touchspin" type="text" name="pembelian"
                                                                value="{{ $produk->total }}">
                                                            <button type="submit"
                                                                class="form-control btn btn-success py-1">Perbaharui</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($produk->total <= 11)
                                                        @php
                                                            $total = $produk->total;
                                                            $harga = $produk->harga_produk1;
                                                            $jumlah = $harga * $total;
                                                            echo rupiah($jumlah);
                                                        @endphp
                                                    @elseif ($produk->total <= 23)
                                                        @php
                                                            $total = $produk->total;
                                                            $harga = $produk->harga_produk2;
                                                            $jumlah = $harga * $total;
                                                            echo rupiah($jumlah);
                                                        @endphp
                                                    @elseif ($produk->total <= 50)
                                                        @php
                                                            $total = $produk->total;
                                                            $harga = $produk->harga_produk3;
                                                            $jumlah = $harga * $total;
                                                            echo rupiah($jumlah);
                                                        @endphp
                                                    @elseif ($produk->total <= 100)
                                                        @php
                                                            $total = $produk->total;
                                                            $harga = $produk->harga_produk4;
                                                            $jumlah = $harga * $total;
                                                            echo rupiah($jumlah);
                                                        @endphp
                                                    @elseif ($produk->total <= 200)
                                                        @php
                                                            $total = $produk->total;
                                                            $harga = $produk->harga_produk5;
                                                            $jumlah = $harga * $total;
                                                            echo rupiah($jumlah);
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('keranjang.show', $produk->id_keranjang) }}" class="btn btn-success btn-sm waves-effect waves-light"><i class="mdi mdi-cart-variant"></i> Checkout</a>
                                                    -
                                                    <form action="{{ route('keranjang.destroy', $produk->id_keranjang) }}" method="POST"
                                                        style="display:inline"
                                                        onsubmit="return confirm('Apakah Yakin akan Di Hapus ?');">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm waves-effect waves-light "><i
                                                                class="mdi mdi-trash-can"></i> Hapus</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                        <!-- end tr -->
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

        </div>


    </div> <!-- container-fluid -->
@endsection

@section('css')
    <link href="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="/morvin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/morvin/dist/assets/js/pages/ecommerce-cart.init.js"></script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
@endsection
