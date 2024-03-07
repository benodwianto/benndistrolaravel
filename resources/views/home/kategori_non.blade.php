@extends('home.layout.master')
@section('content')
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2></h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li>Kategori Produk</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <!-- PRODUCT-AREA START -->
    <div class="product-area pt-80 pb-80 product-style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    {{-- <!-- Widget-Search start -->
                    <aside class="widget widget-search mb-30">
                        <form action="#">
                            <input type="text" placeholder="Search here..." />
                            <button type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                    </aside> --}}
                    <!-- Widget-search end -->
                    <!-- Widget-Categories start -->
                    <aside class="widget widget-categories  mb-30">
                        <div class="widget-title">
                            <h4>Kategori Produk</h4>
                        </div>
                        <div id="cat-treeview" class="widget-info product-cat boxscrol2">
                            <ul>
                                <li class="open"><span>List Produk</span>
                                    <ul>
                                        @foreach ($kategori as $kategori)
                                            <li><a
                                                    href="{{ route('cari_kategori_non', $kategori->id_kategori) }}">{{ $kategori->jenis_kategori }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </aside>
                    <!-- Widget-categories end -->
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- Shop-Content End -->
                    <div class="shop-content mt-tab-30 mb-30 mb-lg-0">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="grid-view">
                                <div class="row">
                                    <!-- Single-product start -->
                                    @php
                                        function rupiah($angka)
                                        {
                                            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                            return $hasil_rupiah;
                                        }
                                    @endphp
                                    @forelse ($produk as $produks)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <span class="pro-label new-label">new</span>
                                                    {{-- <span class="pro-price-2">
                                                        @php
                                                            echo rupiah($produk->harga_produk1);
                                                        @endphp
                                                    </span> --}}
                                                    <a href="{{ route('detail_produk_non', $produks->id_produknon) }}"><img
                                                            src="/produk/{{ $produks->foto_produk1 }}" alt="" /></a>
                                                </div>
                                                <div class="product-info clearfix text-center">
                                                    <div class="fix">
                                                        <h4 class="post-title"><a
                                                                href="{{ route('detail_produk_non', $produks->id_produknon) }}">{{ Str::upper($produks->nama_produk) }}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="fix">
                                                        @php
                                                            echo rupiah($produks->harga_produk);
                                                        @endphp
                                                    </div>
                                                    <a href="{{ route('detail_produk_non', $produks->id_produknon) }}"
                                                        class="btn btn-warning mt-3 w-100">Pesan Produk</a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="alert alert-danger" role="alert">
                                            Maaf Produk Belum Tersedia
                                        </div>
                                    @endforelse
                                    <!-- Single-product end -->
                                </div>
                            </div>
                        </div>
                        <!-- Pagination start -->
                        <div class="shop-pagination text-center">
                            <div class="pagination">
                                <ul>
                                    {{ $produk->links('pagination::bootstrap-4') }}
                                </ul>

                            </div>
                        </div>
                        <!-- Pagination end -->
                    </div>
                    <!-- Shop-Content End -->
                </div>
            </div>
        </div>
    </div>
@endsection
